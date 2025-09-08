<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Eventspacecontroller extends Controller
{
    public function dashboard(){
        return view('home.dashboard');
    }
}
