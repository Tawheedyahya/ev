<?php

namespace App\Http\Controllers;

use App\Mail\Passwordmail;
use App\Models\Serfacility;
use App\Models\Serviceblog;
use App\Models\Serviceplace;
use App\Models\Serviceproviders;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class Serviceprovidercontroller extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $service=Serviceproviders::where('email',$request->input('email'))->first();
        if(empty($service)||$service==null){
            return back()->with('error','admin not found');
        }
        if(!Hash::check($request->input('password'),$service->password)){
            return back()->with('error','password not match');
        }
        if($service->status=='pending' || $service->status=='rejected'){
            return back()->with('error','your registration is ' .$service->status);
        }
        Auth::guard('ser')->login($service);
        // return Auth::guard('ser')->user()->name;
        return redirect('/service_provider/dashboard')->with('success','login successfully');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'company_name' => 'required',
            'email' => 'required|unique:serviceproviders,email',
            'city' => 'required',
            'category' => 'required',
            'phone' => 'required',
            'password' => 'required|confirmed',
        ]);
        $service = new Serviceproviders();
        $service->name = $request->input('name');
        $service->companyname = $request->input('company_name');
        $service->email = $request->input('email');
        // echo $emai
        $service->city = $request->input('city');
        $service->category = $request->input('category');
        $service->phone = $request->input('phone');
        $service->password = Hash::make($request->input('password'));
        @$service->instagram = $request->input('instagram') ?? null;
        @$service->facebook = $request->input('facebook') ?? null;
        // formail
        $token = Str::random(30);
        $url = url('/service_provider/verified?email=' . $request->input('email') . '&token=' . $token);
        // echo $url;
        $service->token = Hash::make($token);
        if ($service->save()) {
            Mail::to($request->input('email'))->queue(new Passwordmail($url));
        }
        return back()->with('success', 'email send check and verify your mail');
    }
    public function email(Request $request)
    {
        $email = $request->query('email');
        $token = $request->query('token');
        $service = Serviceproviders::where('email', $email)->first();
        if (!$service || empty($service)||$service->token==null) {
            return redirect()->route('err');
        }
        if (!Hash::check($token, $service->token)) {
            return redirect()->route('err');
        }
        if (Hash::check($token, $service->token)) {
            $service->token=null;
            $service->email_verified_at=date('Y-m-d H:i:s');
            if($service->save()){
                return redirect('/vendor/service_providers_login')->with('success','email_verified and try to login');
            }
        }
    }
    public function dashboard()
    {
        // echo 'hi';
        // return;
        return view('service_providers.dashboard');
    }
    public function blogs(){
        $blogs=Serviceblog::where('serviceproviderid',Auth::guard('ser')->user()->id)->get();
        // pr($blogs->toArray());
        return view('service_providers.show',compact('blogs'));
    }
    public function uploads(){
        return view('service_providers.form');
    }
    public function logout(){
        Auth::guard('ser')->logout();
        return redirect('/vendor/service_providers_login')->with('error','logout successfully');
    }
    public function post(Request $request){
        $request->validate([
            'description'=>'required',
            'room_doc'=>'required'
        ]);
           DB::transaction(function()use($request){
            if($request->hasFile('room_doc')){
                $img=$request->file('room_doc');
                $file_name=Auth::guard('ser')->user()->id.'_'.time().'.'.$img->getClientOriginalExtension();
                $img->move(public_path('service_blogs'),$file_name);
                $blogs=new Serviceblog();
                $blogs->serviceproviderid=Auth::guard('ser')->user()->id;
                $blogs->blogimg='service_blogs/'.$file_name;
                $blogs->description=$request->input('description');
                $blogs->save();
            }
        });
        return back()->with('success','blogs posted');
    }
    public function delete_post($id){
        $post=Serviceblog::findOrFail($id);
        if($post->serviceproviderid!=Auth::guard('ser')->user()->id){
            return redirect()->route('err');
        }
        $post->delete();
        return back()->with('error','blog deleted');
    }
    public function  profile_edit(){
        $user=Serviceproviders::with('places:id,name')->findOrFail(Auth::guard('ser')->user()->id);
        // pr($user->toArray());
        $serfacilitis=Serfacility::where('serpro_id',Auth::guard('ser')->user()->id)->get();
        $service_place=Serviceplace::all();
        // unset($user['places']);
        // pr($service_place);
        $pro_service_place=$user->places->pluck('id')->toArray();
        // pr($pro_service_place);
        return view('service_providers.edit',compact('user','service_place','pro_service_place'));
    }
    public function profile_update(Request $request){
        // $feature=$request->input('feature');
        // pr($feature);
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'logo'=>'mimes:png,jpg'
        ]);
        $user=Serviceproviders::findOrFail(Auth::guard('ser')->user()->id);
        DB::transaction(function () use($request,$user){
            $place=$request->input('ser_service_place')??[];
            $user->name=$request->input('name');
            $user->phone=$request->input('phone');
            $user->facebook=$request->input('facebook')??null;
            $user->instagram=$request->input('instagram')??null;
            if($request->hasFile('logo')){
                if(file_exists(public_path($user->logo))){
                    @unlink(public_path($user->logo));
                    $file=$request->file('logo');
                    $file_name=Auth::guard('ser')->user()->id.'_'.time().'.'.$file->getClientOriginalExtension();
                    $file->move(public_path('service_provider_logos'),$file_name);
                    $user->logo='service_provider_logos/'.$file_name;
                }
            }
            $user->places()->sync($place);
            $user->save();
        });
        return back()->with('success','profile updated');
    }
}
