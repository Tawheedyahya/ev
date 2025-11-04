<?php

namespace App\Http\Controllers;

use App\Models\Professional;
use App\Models\Serviceproviders;
use App\Models\Venue;
use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    public function dashboard(){
        $venues=Venue::with('venueimages')->get()->toArray();
        $venues=array_slice($venues,0,5);
        // pr($venues);
        $venues=array_map(function($venues){
            return [
                'id'=>$venues['id'],
                'venue_name'=>$venues['venue_name'],
                'venue_city'=>$venues['venue_city'],
                'doc'=>$venues['venueimages'][0]['doc']??null
            ];
        },$venues);
        return view('home.dashboard',compact('venues'));
    }
    public function aboutus(){
        return view('vr');
    }
    public function contactus(){
        return view('contactus');
    }
    public function prof(){
        $prof=Professional::where('status','approved')->get()->toArray();
        $profs=array_slice($prof,0,5);
        // pr($profs);
        $action='prof.professional';
        $venues=array_map(function($venues){
            return [
                'id'=>$venues['id'],
                'venue_name'=>$venues['companyname'],
                'venue_city'=>$venues['address'],
                'doc'=>$venues['prof_logo']
            ];
        },$profs);
        return view('components.category_show',compact('venues','action'));
    }
    public function ser(){
        $ser=Serviceproviders::where('status','approved')->get()->toArray();
        $sers=array_slice($ser,0,5);
        // pr($sers);
        $action='ser.service_provider';
        $venues=array_map(function($venues){
            return [
                'id'=>$venues['id'],
                'venue_name'=>$venues['companyname'],
                'venue_city'=>$venues['city'],
                'doc'=>$venues['logo']
            ];
        },$sers);
         return view('components.category_show',compact('venues','action'));
    }
}
