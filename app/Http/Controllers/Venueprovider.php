<?php

namespace App\Http\Controllers;

use App\Mail\Emailverfication;
use App\Mail\Passwordmail;
use App\Models\Occasion;
use App\Models\Venue;
use App\Models\Venuefacility;
use App\Models\Venueproviders;
use App\Models\Venuetype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Venueprovider extends Controller
{
    public function register(Request $request)
    {
        DB::transaction(function () use ($request) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:venueproviders,email',
                'phone' => 'required',
                'password' => 'required|confirmed',
                   'doc' => 'required|max:2048',
            ]);
            $name = trim($request->input('name'));
            $email = trim($request->input('email'));
            $phone = trim($request->input('phone'));
            $password = trim($request->input('password'));
            if ($request->hasFile('doc')) {
                $file = $request->file('doc');
                $file_name = time() . '_' . $name . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('venue_providers'), $file_name);
                $token = Str::random(60);
                $url = url('/venue_provider/verified_email?token=' . $token . '&email=' . $email);
                Venueproviders::create([
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'password' => Hash::make($password),
                    'doc' => $file_name,
                    'status' => 'pending',
                    'remember_token' => $token
                ]);
                Mail::to($email)->queue(new Passwordmail($url));
            }
        });
        return redirect('/vendor/venue_login_form')->with('success', 'mail send check and verified');
    }
    public function email_verify(Request $request)
    {
        $token = $request->query('token');
        $email = $request->query('email');
        $user = Venueproviders::where('email', $email)->first();
        if ($user) {
            if ($user->remember_token == $token) {
                Venueproviders::where('email', $email)->first()->update([
                    'remember_token' => null,
                    'email_verified_at' => now()
                ]);
                return redirect('/vendor/venue_login_form')->with('success', 'email verified');
            }
        }
        return 'bye';
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $email = trim($request->input('email'));
        $password = trim($request->input('password'));
        $user = Venueproviders::where('email', $email)->first();
        if (!$user) {
            return back()->with('error', 'user not found');
        }
        if ($user) {
            if ($user->email_verified_at == '' || $user->email_verified_at == null || strlen($user->remember_token) > 0) {
                return back()->with('error', 'email not verified');
            }
            if ($user->status == 'pending' || $user->status == 'disapproved') {
                return back()->with('error', 'your registration is ' . $user->status);
            }
            if (!Hash::check($password, $user->password)) {
                return back()->with('error', 'password wrong');
            }
        }
        Auth::guard('venue_provider')->login($user);
        return redirect('/venue_provider/dashboard')->with('success', Auth::guard('venue_provider')->user()->name . 'login successfully');
    }
    public function logout()
    {
        Auth::guard('venue_provider')->logout();
        return redirect('/');
    }
    public function dashboard()
    {
        return view('venue_provider.dashboard');
    }
    public function venue_dashboard()
    {
        $venues_collection = collect(Venue::with([
            'appvenuefacilitie:id',
            'occasion:id',
            'venueimages:id,venue_id,doc'
        ])->where('venue_provider_id', Auth::guard('venue_provider')->user()->id)->get()->toArray());
        $venues = $venues_collection->map(function ($venue) {
            return [
                'id'               => $venue['id'],
                'venue_name'       => $venue['venue_name'],
                'venue_address'    => $venue['venue_address'],
                'venue_city'       => $venue['venue_city'],
                'venue_seat_capacity' => $venue['venue_seat_capacity'],
                'latitude'         => $venue['latitude'],
                'longitude'        => $venue['longitude'],
                'description'      => $venue['description'],
                'amount'           => $venue['amount'],
                'appvenuefacilitie' => collect($venue['appvenuefacilitie'])->map(function ($item) {
                    return [
                        'id' => $item['id'],
                        'venue_id' => $item['pivot']['venue_id'],
                        'venue_facilities' => $item['pivot']['venue_facilities']
                    ];
                })->toArray(),
                'occasion'         => collect($venue['occasion'])->map(function ($item) {
                    return [
                        'id' => $item['id'],
                        'venue_id' => $item['pivot']['venue_id'],
                        'occasion_id' => $item['pivot']['occasion_id']
                    ];
                })->toArray(),
                'venueimages'      => collect($venue['venueimages'])->toArray(),
            ];
        })->toArray();
        // pr($venues);
        return view('venue_provider.venue_dashboard', compact('venues'));
    }
    public function add_venue(Request $request)
    {
        $venue = null;
        @$id = $request->route('id');
        if (@$id) {

            $venues_collection = Venue::with([
                'appvenuefacilitie:id',
                'occasion:id',
                'venueimages:id,venue_id,doc'
            ])->findOrFail($id)->toArray();
            $venue_facilities = collect($venues_collection['appvenuefacilitie'])->pluck('pivot');
            $venue_occasion = collect($venues_collection['occasion'])->pluck('pivot');
            // pr($venues_collection);
            $venue = [
                'id'               => $venues_collection['id'],
                'venue_name'       => $venues_collection['venue_name'],
                'venue_address'    => $venues_collection['venue_address'],
                'venue_city'       => $venues_collection['venue_city'],
                'venue_seat_capacity' => $venues_collection['venue_seat_capacity'],
                'latitude'         => $venues_collection['latitude'],
                'longitude'        => $venues_collection['longitude'],
                'description'      => $venues_collection['description'],
                'amount'           => $venues_collection['amount'],
                'appvenuefacilitie' => $venue_facilities->pluck('venue_facilities')->toArray(),
                'occasion'         => $venue_occasion->pluck('occasion_id')->toArray(),
                'doc'              => collect($venues_collection['venueimages'])->pluck('doc')->toArray()
            ];
            // pr($venue);
            $occasions = Occasion::all();
            $venue_facilities = Venuefacility::all();
            // pr($occasions);
            return view('venue_provider.add_venue', compact('occasions', 'venue_facilities', 'venue'));
        }
        $occasions = Occasion::all();
        $venue_facilities = Venuefacility::all();
        // pr($occasions);
        return view('venue_provider.add_venue', compact('occasions', 'venue_facilities', 'venue'));
    }
    public function register_venue(Request $request, $id = null)
    {
        if ($id) {
            $this->validate($request, $id);
            DB::transaction(function () use ($request, $id) {
                $venue_id = $this->venue_details_insert($request, $id);
                $this->venue_types_insert($request, $venue_id);
                $this->venue_facilities_insert($request, $venue_id);
                $re_entry = true;
                $this->venue_images_insert($request, $venue_id, $re_entry);
            });
            return back()->with('success','Venue updated successfully');
        }
        $this->validate($request);
        if (!$id || $id == null) {
            DB::transaction(function () use ($request) {
                $venue_id = $this->venue_details_insert($request);
                $this->venue_types_insert($request, $venue_id);
                $this->venue_facilities_insert($request, $venue_id);
                $this->venue_images_insert($request, $venue_id);
            });
            return back()->with('success', 'Venue uploaded successfully');
        }
    }

    public function validate($request, $id = null)
    {
        if ($id) {
            $request->validate([
                'venue_name' => 'required',
                'venue_type' => 'required|array|min:1',
                'venue_address' => 'required',
                'venue_city' => 'required',
                'venue_seat_capacity' => 'required',
                'venue_facilities' => 'required|array|min:1',
                'latitude' => 'required',
                'longitude' => 'required',
                // 'doc' => 'required',
                'amount' => 'required',
                'description' => 'required'
            ]);
            return;
        }
        $request->validate([
            'venue_name' => 'required',
            'venue_type' => 'required|array|min:1',
            'venue_address' => 'required',
            'venue_city' => 'required',
            'venue_seat_capacity' => 'required',
            'venue_facilities' => 'required|array|min:1',
            'latitude' => 'required',
            'longitude' => 'required',
            'doc' => 'required|mimes:jpg,jpeg,png|max:1024',
            'amount' => 'required',
            'description' => 'required'
        ]);
        return;
    }
    public function venue_details_insert($request, $id = null)
    {
        if ($id) {
            $venue = Venue::findOrFail($id);
        } if(!$id) {
            $venue = new Venue();
        }
        $seat = (int)$request->input('venue_seat_capacity');

        $venue->venue_name = $request->input('venue_name');
        $venue->venue_provider_id = Auth::guard('venue_provider')->user()->id;
        $venue->venue_address = $request->input('venue_address');
        $venue->venue_city = $request->input('venue_city');
        $venue->venue_seat_capacity = $seat;
        $venue->latitude = $request->input('latitude');
        $venue->longitude = $request->input('longitude');
        $venue->amount = $request->input('amount');
        $venue->description = $request->input('description');
        if ($venue->save()) {
            return $venue->id;
        } else {
            echo 'server error';
        }
    }
    public function venue_types_insert($request, $venue_id)
    {
        if ($venue_id) {
            $venue = Venue::find($venue_id);
            $occ = array_map('intval', $request->input('venue_type'));
            $venue->occasion()->sync($occ);
            return;
        }
    }
    public function venue_facilities_insert($request, $venue_id)
    {
        if ($venue_id) {
            $venue = Venue::find($venue_id);
            $app_ven_facilities = array_map('intval', $request->input('venue_facilities'));
            // pr($app_ven_facilities);
            $venue->appvenuefacilitie()->sync($app_ven_facilities);
            return;
        }
    }
    public function venue_images_insert($request, $venue_id, $re_entry = null)
    {
        if ($venue_id) {
            $venue = Venue::find($venue_id);
            if ($request->hasFile('doc')) {
                if ($re_entry!=null) {
                    $img = Venue::with(['venueimages' => function ($q) {
                        $q->orderBy('id')->limit(1);
                    }])->find($venue_id)->toArray();
                    $del = $img['venueimages'][0]['doc'];
                    if (file_exists(public_path("$del"))) {
                        @unlink(public_path($del));
                    }
                }
                $file = $request->file('doc');
                $file_name = time() . Str::slug($request->input('venue_name')) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('verified_venue_images'), $file_name);
                if($re_entry!=null){
                      $venue->venueimages()->update([
                    'doc' => 'verified_venue_images/' . $file_name
                ]);
                }else{
                    $venue->venueimages()->create([
                    'doc' => 'verified_venue_images/' . $file_name
                ]);
                }
                return;
            }
        }
    }
    public function delete_venue($id = null)
    {
        if (!$id || $id == null) {
            return view('errors.auth');
        }
        $venue = Venue::with([
            'appvenuefacilitie',
            'occasion',
            'venueimages',
            'room'
        ])->find($id);
        DB::transaction(function () use ($venue) {
            $venue->appvenuefacilitie()->detach();
            $venue->occasion()->detach();
            foreach ($venue->venueimages as $img) {
                // echo $img->doc;
                if (file_exists(public_path($img->doc))) {
                    File::delete(public_path($img->doc));
                }
            }
            $venue->venueimages()->delete();
            $venue->delete();
        });
        return back()->with('error', 'venue and his details deleted');
    }
}
