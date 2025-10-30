<?php

namespace App\Http\Controllers;

use App\Mail\Confirmation;
use App\Models\Booking;
use App\Models\Bookprofessional;
use App\Models\Professional;
use App\Models\Serviceproviders;
use App\Models\Venueproviders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class Admincontroller extends Controller
{
    public function login(){
        $action='admin.login';
        $register='#';
        $forgot='#';
        return view('super_admin.login',compact('action','register','forgot'));
    }
    public function log(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        if(Auth::guard('superadmin')->attempt(['email'=>$request->email,'password'=>$request->password])){
            // echo 'hi';
            return redirect()->route('ad.vn.ds');
            // echo Auth::guard('superadmin')->user()->name;
        }
        else{
            return back()->with('error','not found');
        }
    }
    public function venue_providers_dahaboard(){
        $venue_providers=Venueproviders::orderByRaw("FIELD(status,'pending','approved','disapproved' )")->get();
        return view('super_admin.venue_provider_dashboard',compact('venue_providers'));
    }
    public function logout(){
        Auth::guard('superadmin')->logout();
        return redirect('/');
    }
    public function venue_provider_rejection(Request $request,$c_id){
        $modal=[
            1=>Venueproviders::class,
            2=>Professional::class,
            3=>Serviceproviders::class
        ];
        $request->validate([
            'rejection_note'=>'required'
        ]);
        if(!array_key_exists($c_id,$modal)){
            return redirect()->route('err');
        }
        $id=$request->provider_id;
        if($id){
            $user=$modal[$c_id]::findOrFail($id);
            $email=$user->email;
            Mail::to($email)->send(new Confirmation($request->rejection_note));
            $user->status='disapproved';
            $user->save();
            return back()->with('error',$user->name.' registeration disapproved');
        }

    }
    public function venue_provider_approved($id,$c_id){
        // return $c_id;
        $modal=[
            1=>Venueproviders::class,
            2=>Professional::class,
            3=>Serviceproviders::class
        ];
        if(!array_key_exists($c_id,$modal)){
            return redirect()->route('err');
        }
        // if($c_id==1){
        $user=$modal[$c_id]::findOrFail($id);
        $email=$user->email;
        $message='Your registeration of evvisa has approved';
        Mail::to($email)->queue(new Confirmation($message));
        $user->status='approved';
        $user->save();
        return back()->with('success',$user->name.' registeration approved');
    }
    public function venue_provider_venues($id){
        $venue=Venueproviders::with('venue')->findOrFail($id);
        $venues=$venue->venue->toArray();
        // pr($venues->toArray());
        return view('super_admin.venue_provider_venues',compact('venues'));
    }
    public function venue_provider_bookings($id){
        // echo $id;
        $venue_provider=Venueproviders::with('venue')->findOrFail($id);
        // pr($venue_provider->toArray());
        $venues_id=$venue_provider->venue->pluck('id')->toArray();
        // pr($venues_id);
      $bookings = Booking::with('dubvenue')
    ->whereIn('venue_id', $venues_id)->get();
    // pr($bookings->toArray());

    return view('super_admin.venue_provider_bookings',compact('bookings'));
    }
    public function professionals_dashboard(){
        // echo 'hi';
        $professionals=Professional::with('professionlist')->orderByRaw("FIELD(status,'pending','approved','disapproved')")->get();
        // pr($professionals->toArray());
        return view('super_admin.professionals_dashboard',compact('professionals'));
        // pr($professionals->toArray());
    }
    public function professional_bookings($id){
        $bookings=Bookprofessional::with('user')->where('professional_id',$id)->get();
        // pr($bookings->toArray());
        return view('super_admin.professional_bookings',compact('bookings'));
    }
    public function service_providers_dahboard(){
        // echo 'hi';
        $service_providers=Serviceproviders::with('categories')->orderByRaw("FIELD(status,'pending','approved','disapproved')")->get();
        // pr($service_providers->toArray());
        return view('super_admin.service_providers_dashboard',compact('service_providers'));

    }
}
