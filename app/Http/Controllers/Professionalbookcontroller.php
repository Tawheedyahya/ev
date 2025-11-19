<?php

namespace App\Http\Controllers;

use App\Models\Bookprofessional;
use App\Models\Occasion;
use App\Models\Professional;
use App\Models\Professionlist;
use App\Models\Ratingall;
use App\Models\Serviceplace;
use App\Models\User;
use App\Models\Venuefacility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Professionalbookcontroller extends Controller
{
    public function dashboard()
    {
        $location=Professional::where('status','approved')->pluck('companyname')->toArray();
        $service_places=Serviceplace::all();
        $professionals=Professional::with('professionlist')->where('status','approved')->paginate(10);
        $category=Professionlist::all();
        // pr($professionals->toArray());
        $paginate=true;
        return view('eventscape.professional.dashboard',compact('location','professionals','paginate','service_places','category'));
    }
    public function professional($id){
         $rating=Ratingall::with('user')->where('type',2)->where('vorp_id',$id)->get();
$professionals = Professional::with('proserviceplace','professionlist','info')->findOrFail($id);
// pr($professionals->toArray());
$info=$professionals->info;
unset($professionals->info);
$suggest = Professional::with('proserviceplace','professionlist')
    ->whereNotIn('id', [$id])->where('profession',$professionals->profession)->where('status','approved')
    ->inRandomOrder()
    ->take(5)
    ->get();

// pr($suggest->toArray());
$p_c=$professionals->professionlist->name;
// return $p_c;
    if($professionals->status=='pending'||$professionals->staus=='pending'){
        return redirect()->route('err');
    }
// pr($professionals->toArray());
// Ensure that the professional exists before proceeding
if ($professionals) {
    // Wrap the model instance in a collection, even though it’s only a single model
    $prof = collect([$professionals])->map(function($q) {
        return [
            'id'=>$q->id,
            'name' => $q->name,                  // Correctly accessing the 'name' property
            'company_name' => $q->companyname,   // Correctly accessing the 'companyname' property
            'prof_logo' => $q->prof_logo,        // Correctly accessing the 'prof_logo' property
            'experience' => $q->experience,      // Correctly accessing the 'experience' property
            'price' => $q->price,                // Correctly accessing the 'price' property
            'proservice_place' => $q->proserviceplace->map(function($place){
                return $place->name;
            })->toArray(), // Correctly accessing the 'proserviceplace' relationship

        ];
    })->toArray();
    $service_place=(object)$prof[0]['proservice_place'];
    unset($prof[0]['proservice_place']);
    $professional=(object)$prof[0];
    // echo $professional->prof_logo;
    // return;
    // pr($professional);
    // pr($service_place);


    // Output the result as an array
    // pr($prof);
    return view('eventscape.professional.professional_show.show',compact('professional','service_place','suggest','p_c','info','rating'));
} else {
    pr('Professional not found.');
}
    }

    public function booking($id,Request $request){
        if(!Auth::check()){
            return redirect('/customer/login_form')->with('error','need to login first');
        }
        $order_date=$request->input('order_date');
        $upto_date=$request->input('upto_date');
        // echo $order_date;
        // echo $upto_date;
        // return;
        $user=Auth::user();
        // pr($user);
        $booking=new Bookprofessional();
        $booking->professional_id=$id;
        $booking->user_id=Auth::id();
        $booking->phone=Auth::user()->phone;
        $booking->status='pending';
        $booking->order_date=$order_date;
        $booking->upto_date=$upto_date;
        if($booking->save()){
            return back()->with('success','booked successfully view your profile booking for more details');
        }
        // $booking->order_date=
    }
public function likes(Request $request)
{
    $professional_id = $request->input('professional_id'); // or (int) $request->input('professional_id');
    $user_id = Auth::id();
         // or (int) $request->input('user_id');
    $like=$request->input('like');

    $professional = Professional::findOrFail((int) $professional_id);
    $user = User::with('likedProfessionals')->findOrFail((int) $user_id);

    // Check if user already likes this professional
    $exists = $user->likedProfessionals()
                   ->where('professional_id', (int) $professional_id)
                   ->exists();
    if($like=='yes' && !$exists){
        $user->likedProfessionals()->attach($professional_id);
    }
    if($like=='no' && $exists){
        $user->likedProfessionals()->detach($professional_id);
    }
    return response()->json([
        'status'=>'unliked'
    ],200);
}

}
