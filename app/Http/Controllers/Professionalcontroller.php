<?php

namespace App\Http\Controllers;

use App\Mail\Passwordmail;
use App\Models\Bookprofessional;
use App\Models\Professional;
use App\Models\Profinfo;
use App\Models\Serviceplace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Str;

class Professionalcontroller extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $professional=Professional::where('email',$request->input('email'))->first();
        if(!$professional ||$professional==''||$professional==null){
            return back()->with('error','Professional not found try with Correct email');
        }
        if(!Hash::check($request->input('password'),$professional->password)){
            return back()->with('error','Password does not match');
        }
           if($professional->status=='rejected'){
            return back()->with('error','Sorry Your Registeration is Rejected');
        }
        if($professional->status!='approved'){
            return back()->with('error','Your Registeration is Pending!');
        }
        if($professional->status=='approved'){
            Auth::guard('prof')->login($professional);
            return redirect('/professionals/dashboard')->with('success','Login Successfully');
        }
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'company_name'=>'required',
            'email' => 'required|unique:professionals,email',
            'city' => 'required',
            'profession' => 'required',
            'experience' => 'required',
            'phone' => 'required',
            'password' => 'required|confirmed',
            'doc' => 'required|mimes:pdf|max:2048', // 2 MB max
        ]);
        $professional = new Professional();
        $professional->name = $request->input('name');
        $professional->companyname=$request->input('company_name');
        $professional->email = $request->input('email');
        $professional->address = $request->input('city');
        $professional->profession = $request->input('profession');
        $professional->experience = $request->input('experience');
        $professional->phone = $request->input('phone');
        $professional->password = Hash::make($request->input('password'));
        if ($request->hasFile('doc')) {
            $file = $request->file('doc');
            $ext = $file->getClientOriginalExtension();
            $file_name = time() . \Str::slug($request->input('name')) . '.' . $ext;
            $file->move(public_path('professionals'), $file_name);
            $professional->doc = $file_name;
            $token = \Str::random(30);
            $professional->token = $token;
            if ($professional->save()) {
                //   Mail::to($email)->queue(new ($url));
                $url = url('/professionals/verified_email?token=' . $token . '&email=' . $request->input('email'));
                Mail::to($request->input('email'))->queue(new Passwordmail($url));
                return back()->with('success', 'Email Send check and Verify your Email');
            }
            // return back()->with('sucess','');
        }
    }
    public function verify_email(Request $request) {
        $token=$request->get('token');
        $email=$request->get('email');
        $professional=Professional::where('email',$email)->first();
        if($professional->token==null){
            return redirect('/vendor/professionals_login')->with('success','Email already Verified');
        }
        if(!$professional||$professional==null or $professional==''){
            return redirect()->route('err');
        }
        if($professional->token!=$token || $professional->token=='' || $professional->token==null){
            return redirect()->route('err');

        }
        $professional->email_verified_at=date('Y-m-d H:i:s');
        $professional->token=null;
        if($professional->save()){
            return redirect('/vendor/service_providers_login' )->with('success','Email Verified Successfully');
        }

    }
    public function dashboard(){
        // Auth::guard('prof')->logout();
        Auth::guard('prof')->user()->status;
        $professional=Professional::findOrFail(Auth::guard('prof')->user()->id);
        $places=$professional->proserviceplace()->get()->pluck('name');
// pr($h);
// pr(Auth::guard('prof')->user()->toArray());
        return view('professionals.dashboard',compact('places'));
    }
    public function edit(){
        $user=Auth::guard('prof')->user();
        $service_place=Serviceplace::all();
        // pr($service_place);
        $pro_place=Professional::with('proserviceplace','info')->find($user->id)->toArray();
        // pr($pro_place);
        $info=(object)$pro_place['info'];
        // pr($info);
        $pro_service_place=collect($pro_place['proserviceplace'])->pluck('id')->toArray();
        // pr($pro_service_place);
        // pr($user);
        return view('professionals.edit',compact('user','pro_service_place','service_place','info'));
    }
    public function logout(){
        Auth::guard('prof')->logout();
        return redirect('/vendor/professionals_login')->with('error','Logout successfully');
    }
    public function update(Request $request){
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'experience'=>'required',
            'pro_service_place'=>'required',
         'prof_logo' => 'mimes:jpg,jpeg,png,gif,svg,webp|max:1536',
         'amount'=>'required',
         'about_us'=>'required'

        ]);
        $professional=Professional::findOrFail(Auth::guard('prof')->user()->id);
        if($professional){
            $professional->name=$request->input('name');
            $professional->phone=$request->input('phone');
            $professional->experience=$request->input('experience');
            $professional->amount=$request->input('amount');
            if($request->hasFile('prof_logo')){
                $file=$request->file('prof_logo');
                $filename=Auth::guard('prof')->user()->id.'.'.$file->getClientOriginalExtension();
                // @$filename=public_path('prof_logo/'.Auth::guard('prof').'.'.$ext);
                if(file_exists(public_path($professional->prof_logo))){
                    @unlink($filename);
                }
                $file->move(public_path('prof_logo'),$filename);
                $professional->prof_logo='prof_logo/'.$filename;
            }
            $professional->save();
            $professional->proserviceplace()->sync($request->input('pro_service_place'));
            if($request->has('about_us')||$request->has('long_description')){
                $u_info=Profinfo::where('professional_id',Auth::guard('prof')->user()->id)->first();
                if(!$u_info||empty($u_info)){
                    $u_info=new Profinfo();
                    $u_info->professional_id=Auth::guard('prof')->user()->id;
                }
                $u_info->about_us=$request->input('about_us')??null;
                $u_info->long_description=$request->input('long_description')??null;
                $u_info->save();
            }
            return back()->with('success','Updated Successfully');
        }

    }
    public function bookings(){
        // return 'hi';
      $bookings = Bookprofessional::with(['user:id,name,email,phone'])
    ->where('professional_id', Auth::guard('prof')->user()->id)
    ->get()->toArray();
    // pr($bookings);
    return view('professionals.booking',compact('bookings'));
    }
    public function accept($id){
        $booking=Bookprofessional::findOrFail($id);
        $c=Bookprofessional::with('user')->where('id',$id)->first();
        // pr($c->);
        if($booking && ($booking->status=='pending' || $booking->status=='rejected')){
            $booking->status='approved';
            $booking->notes=null;
            $booking->save();
            return back()->with('success',"booking accepted for customer ".$booking->user->name);
        }
    }
    public function reject($id,Request $request){
        $booking=Bookprofessional::findOrFail($id);
        // echo 'hi';
        // pr($booking->toArray());
        // return;
        $c=Bookprofessional::with('user')->where('id',$id)->first();
        // pr($c->toArray());
        if($booking && ($booking->status=='pending' || $booking->status=='approved')){
            // echo 'hi';return;
            $booking->notes=$request->input('rejection_note');
            $booking->status='rejected';
            $booking->save();
            return back()->with('error',"booking rejected for customer ".$booking->user->name);
        }
    }
    public function ratings(){
        // echo 'hi';
        $query=DB::query()->from('ratingalls as r')->join('users as u','u.id','=','r.user_id')->where('r.vorp_id',Auth::guard('prof')->user()->id)->where('type',2)->select('r.id','r.ratings','r.description','u.name','r.status','r.status_id')->get();
        // pr($query);
        return view('professionals.ratings',compact('query'));
    }
    public function rate_action(){
        return 'hi';
    }
}
