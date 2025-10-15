<?php

namespace App\Http\Controllers;

use App\Models\Professional;
use App\Models\Professionlist;
use App\Models\Servicecategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Vendorcontroller extends Controller
{
    public function venue_login_form(){
        return view('vendor.venue_login_form');
    }
    public function venue_register_form(){
        return view('vendor.venue_register_form');
    }
    public function professionals_login_form(){
        // echo 'hi';
        // return;
        if(Auth::guard('prof')->check()){
            if(Auth::guard('prof')->user()->status=='approved')
            return redirect('/professionals/dashboard');
        }
        return view('vendor.professionals');
    }
    public function professionals_register_form(){
        $professional_list=Professionlist::all();
        // pr($professionals);
        return view('vendor.professionals_register_form',compact('professional_list'));
    }
    public function service_providers_login(){
        return view('vendor.service_providers_login');
    }
    public function service_providers_register(){
        $category=Servicecategory::all();
        // pr($category);
        return view('vendor.service_providers_register',compact('category'));
    }
}
