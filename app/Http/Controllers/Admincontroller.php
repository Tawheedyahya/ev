<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admincontroller extends Controller
{
    public function login(){
        return view('super_admin.login');
    }
}
