<?php

namespace App\Http\Controllers;

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
}
