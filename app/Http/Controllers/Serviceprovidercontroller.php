<?php

namespace App\Http\Controllers;

use App\Mail\Passwordmail;
use App\Models\Serviceproviders;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class Serviceprovidercontroller extends Controller
{
    public function login()
    {
        // return 'b';
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
}
