<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    public function dashboard(){
        return view('home.dashboard');
    }
}
