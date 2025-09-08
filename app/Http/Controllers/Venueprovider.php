<?php

namespace App\Http\Controllers;

use App\Mail\Emailverfication;
use App\Mail\Passwordmail;
use App\Models\Venueproviders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
                'doc' => 'required'
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
                    'remember_token'=>null,
                    'email_verified_at'=>now()
                ]);
                return redirect('/vendor/venue_login_form')->with('success','email verified');
            }
        }
        return 'bye';
    }
    public function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $email=trim($request->input('email'));
        $password=trim($request->input('password'));
        $user=Venueproviders::where('email',$email)->first();
        if(!$user){
            return back()->with('error','user not found');
        }
        if($user){
            if($user->email_verified_at=='' || $user->email_verified_at==null || strlen($user->remember_token)>0){
                return back()->with('error','email not verified');
            }
            if($user->status=='pending'||$user->status=='disapproved'){
                return back()->with('error','your registration is '.$user->status);
            }
            if(!Hash::check($password,$user->password)){
                return back()->with('error','password wrong');
            }
        }
        Auth::guard('venue_provider')->login($user);
        return back()->with('success','login successfully');
}}
