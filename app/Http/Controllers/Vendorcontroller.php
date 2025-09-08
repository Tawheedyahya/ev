<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Vendorcontroller extends Controller
{
    public function venue_login_form(){
        return view('vendor.venue_login_form');
    }
    public function venue_register_form(){
        return view('vendor.venue_register_form');
    }
}
