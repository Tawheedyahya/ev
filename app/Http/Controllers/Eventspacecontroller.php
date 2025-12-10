<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Occasion;
use App\Models\Professional;
use App\Models\Ratingall;
use App\Models\Serviceproviders;
use App\Models\User;
use App\Models\Venue;
use App\Models\Venuefacility;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Eventspacecontroller extends Controller
{
    public function dashboard()
    {
        $paginate = true;
        $occasions = Occasion::all();
        $venue_facilities = Venuefacility::all();
        $location =Venue::all()->pluck('venue_name')->toArray();
        $avail=Venue::select('venue_city')->distinct('venue_city')->pluck('venue_city')->toArray();
        // pr($avail);

        // Paginate instead of get()->toArray()
        $venues = Venue::with([
            'venueimages' => fn($q) => $q->select('venue_id', 'doc')->orderBy('id')
            ,'provider'
        ])->whereHas('provider',fn($q)=>$q->where('status','approved'))->orderByRaw("FIELD(food_provide, 'yes','no','null')")->orderByRaw("FIELD(halal, '1','0')")
            ->paginate(20) // per page
            ->through(function ($venue) {
                $venue->doc = optional($venue->venueimages->first())->doc;
                unset($venue->venueimages);
                return $venue;
            });
        // pr($venues->toArray());
        return view('eventscape.dashboard', compact('venues', 'location', 'paginate', 'occasions', 'venue_facilities','avail'));
    }

    public function location_filter(Request $request)
    {
        $paginate = true;
        $location =Venue::all()->pluck('venue_name')->toArray();
        Paginator::useBootstrapFive();

        $location = $request->get('location', '');  //i only declare as variable but it is a venue_name

        $venues = Venue::with([
            'venueimages' => fn($q) => $q->select('id', 'venue_id', 'doc')->oldest('id')->limit(1)
        ])
            ->when($location, fn($q) => $q->where('venue_name', $location))
            ->orderByDesc('id')
            ->paginate(100000)
            ->withQueryString()            // keep ?location=... on next/prev links
            ->through(function ($venue) {  // transform items but KEEP paginator
                $venue->doc = optional($venue->venueimages->first())->doc;
                unset($venue->venueimages);
                return $venue;
            });
        // pr($venues);
        // return response()->json($venues);
        $html = view('eventscape.venue_show', compact('venues', 'location', 'paginate'))->render();

        return response()->json(['html' => $html]);
    }
    public function filter(Request $request)
    {

        $paginate = false;
        $location = trim(strtolower($request->input('location'))) ?? null;
        // echo $location;
        // return;
        // $location='coimbatore';
        $seat_capacity = $request->input('seat_capacity') ?? null;
        $occ = array_map('intval', (array) $request->input('occasions', []));
        $fac = array_map('intval', (array) $request->input('facilities', []));
        $min = $request->input('min') ?? null;

        // Build placeholders only if arrays are non-empty
        $occPh = !empty($occ) ? implode(',', array_fill(0, count($occ), '?')) : '';
        $facPh = !empty($fac) ? implode(',', array_fill(0, count($fac), '?')) : '';

        // Start SQL
        $sql = "
        SELECT
            v.id,
            v.halal,v.food_provide,
            v.venue_name,
            v.venue_city,
            v.description,
            -- pick one image per venue
            (SELECT vi2.doc
             FROM venueimages vi2
             WHERE vi2.venue_id = v.id
             ORDER BY vi2.id ) AS doc
        FROM venues AS v
        JOIN appvenuefacilities AS vf ON vf.venue_id = v.id
        JOIN venuetypes AS vt         ON vt.venue_id = v.id
        JOIN venueproviders as vp on v.venue_provider_id=vp.id
        WHERE 1=1
    ";

        $bindings = [];
        $sql.="AND vp.status='approved'";
        // Optional occasion filter
        if (!empty($occ)) {
            $sql .= " AND vt.occasion_id IN ($occPh)";
            $bindings = array_merge($bindings, $occ);
        }


        // Optional price ceiling
        if (!is_null($min)) {
            $sql .= " AND v.amount <= ?";
            $bindings[] = $min;
        }

        // NEW: seat capacity ≤ filter
        if (!is_null($seat_capacity)) {
            $sql .= " AND v.venue_seat_capacity >= ?";   // change column name if yours is different
            $bindings[] = (int) $seat_capacity;
        }

        // Optional facilities filter (AND logic across ALL facilities)
        if (!empty($fac)) {
            $sql .= " AND vf.venue_facilities IN ($facPh)";
        }
        if ($location && $location != null && $location != '') {
            $sql .= " AND v.venue_city IN ('$location')";
        }

        // Group by venue-level cols (we selected one image via subquery)
        $sql .= "
        GROUP BY v.id, v.venue_name, v.venue_city, v.description,v.halal,v.food_provide
    ";

        // Only apply HAVING when we actually filtered by facilities
        if (!empty($fac)) {
            $sql .= " HAVING COUNT(DISTINCT vf.venue_facilities) = ?";
            $bindings = array_merge($bindings, $fac, [count($fac)]);
        }

        if (!is_null($min) && $min !== '' && !is_null($seat_capacity) && $seat_capacity !== '') {
            $sql .= " ORDER BY v.amount DESC, v.venue_seat_capacity ASC ";
        }
        if (!is_null($min) && $seat_capacity == null) {
            $sql .= " ORDER BY v.amount DESC,
          FIELD(v.food_provide, 'yes', 'no', '') ASC,
          FIELD(v.food_provide, 'null') ASC,
          FIELD(v.halal, '1', '0')";
        }
        // $sql .= " ORDER BY FIELD(v.food_provide, 'yes', 'no') ASC";

        $q = DB::select($sql, $bindings);
        $venues = array_map(function ($r) {
            return (array)$r;
        }, $q);
        // pr($venues);
        $html = view('eventscape.venue_show', compact('venues', 'location', 'paginate'))->render();
        return response()->json(['html' => $html]);
    }
    public function venue($id)
    {
        if ($id) {
            $rating=Ratingall::with('user')->where('type',1)->where('vorp_id',$id)->get();
            // pr($rating->toArray());
            $venue = Venue::with('venueimages', 'room', 'provider')->findOrFail($id)->toArray();
            $suggest=Venue::with('venueimages', 'room', 'provider')->whereNotIn('id',[$id])->where('venue_city',$venue['venue_city'])->inRandomOrder()->take(5)->get();
            // $provider=Venue::
            // echo data_get($venue,'venueimages.0.doc');
            // pr($suggest->toArray());
            $provider = $venue['provider'];
            unset($venue['provider']);
            $rooms = $venue['room'];
            $venue_img = $venue['venueimages'];
            $images = array_merge($venue_img, $rooms);
            // pr($venue);
            unset($venue['room']);
            unset($venue['venueimages']);
            // $venue=array_column($venue['venueimages'],'doc');
            // pr($venue);
            return view('eventscape.venue_show.show', compact('images', 'venue', 'provider','suggest','rating'));
        }
    }
    public function book($id, Request $request)
    {
        $user = Auth::id();
        if (!$user || $user == '' || $user == null) {
            return redirect('/customer/login_form')->with('error', 'Need to login');
        }
        $order_date = $request->input('starts_at');
        $upto_date = $request->input('ends_at');
        if ($order_date == null || $order_date == '' || $upto_date == null || $upto_date == '') {
            return back()->with('error', 'order date and upto date is required');
        }
        $booking = new Booking();
        $booking->venue_id = $id;
        $booking->user_id = Auth::id();
        $booking->name = Auth::user()->name;
        $booking->email = Auth::user()->email;
        $booking->phone = Auth::user()->phone;
        $booking->order_date = $order_date;
        $booking->upto_date = $upto_date;
        if ($booking->save()) {
            return back()->with('success', 'booking successfully go to your profile and check the status');
        }
    }
    public function prof_location(Request $request)
    {
        $paginate = false;
        $company = $request->get('location', '');
        // return response()->json($company);
        // $company=
        $professionals = Professional::with('professionlist')->where('companyname', $company)->get();
        //   return response()->json($professionals);
        $render = view('eventscape.professional.prof_show', compact('professionals', 'paginate'))->render();
        return response()->json(['html' => $render]);
    }

   public function prof_filter(Request $request)
{
    $min = $request->get('min');
    $places = $request->get('places');
    $category = $request->get('category');

    $query = DB::table('professionals as p')
        ->join('professionlists as pl', 'p.profession', '=', 'pl.id')->join('profinfos as pi','pi.professional_id','=','p.id');

    if (!empty($places)) {
        $query->join('proserviceplaces as pp', 'pp.pro_id', '=', 'p.id')
              ->where('pp.ser_id', $places);
    }
    if (!empty($min)) {
        $query->where('p.amount', '<=', (float) $min);
    }
    if (!empty($category)) {
        $query->where('pl.id', $category);
    }
    $query->where('p.status','approved');
    $rows = $query->select('p.*','pl.name as profession_name','pi.*')->get();
    // pr($rows);
    $professionals = $rows->map(function ($r) {
        return [
            'id'              => (int) $r->id,
            'name'            => (string) $r->name,
            'companyname'     => (string) $r->companyname,
            'address'         => (string) $r->address,
            'experience'      => isset($r->experience) ? (float) $r->experience : null,
            'price'           => isset($r->price) ? (float) $r->price : null,
            'prof_logo'       => $r->prof_logo ? asset($r->prof_logo) : asset('images/placeholder.jpg'),
            'email'           => (string) $r->email,
            'profession_id'   => (int) $r->profession,
            'profession_name' => $r->profession_name ?? null,
            'about_us'         =>(string)$r->about_us??null
        ];
    });
    $paginate = false;
    $html = view('eventscape.professional.prof_show', compact('paginate', 'professionals'))->render();
    return response()->json(['h' => $html]);
}
    public function ser_location(Request $request){
        $paginate = false;
        $company = $request->get('location', '');
        $professionals=Serviceproviders::with(['places','categories'])->where('companyname',$company)->get();
        $render=view('eventscape.service_providers.prof_show',compact('professionals','paginate'))->render();
        return response()->json(['html' => $render]);
    }
    public function ser_filter(Request $request){
    $places = $request->get('places');
    $category = $request->get('category');
    $price=$request->get('price');
    $query = DB::table('serviceproviders as sp')
        ->join('servicecategories as sc', 'sp.category', '=', 'sc.id');
    // pr($query);
    // pr((array)$query);
       if (!empty($places)) {
         $query->join('serserviceplaces as pp', 'pp.serpro_id', '=', 'sp.id')
              ->where('pp.serpla_id', $places);
    }
        if (!empty($category)) {
        $query->where('sp.category', $category);
    }
    if(!empty($price)){
        $query->where('sp.price','<=', $price);
    }
    $query->where('sp.status', 'approved');
      $rows = $query->select('sp.*','sc.name as profession_name')->get();
          $professionals = $rows->map(function ($r) {
        return [
            'id'              => (int) $r->id,
            'name'            => (string) $r->name,
            'companyname'     => (string) $r->companyname,
            'city'         => (string) $r->city,
            // 'experience'      => isset($r->experience) ? (float) $r->experience : null,
            'price'           => isset($r->price) ? (float) $r->price : null,
            'logo'       => $r->logo ? asset($r->logo) : asset('images/placeholder.jpg'),
            // 'email'           => (string) $r->email,
            // 'profession_id'   => (int) $r->profession,
            'profession_name' => $r->profession_name ?? null,
        ];
    });
    // pr($professionals);
      $paginate = false;
      $html = view('eventscape.service_providers.prof_show', compact('paginate', 'professionals'))->render();
      ;
      return response()->json(['h' => $html]);
    }

}
