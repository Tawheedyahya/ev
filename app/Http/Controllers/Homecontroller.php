<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\Professional;
use App\Models\Rating;
use App\Models\Ratingall;
use App\Models\Serviceproviders;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Homecontroller extends Controller
{
    public function dashboard(){
        $venues=Venue::with('venueimages')->get()->toArray();
        $action='card.venue';
        $footer=Footer::pluck('value','type');
        // pr($footer->toArray());
        $venues=array_slice($venues,0,20);
        // pr($venues);
        $venues=array_map(function($venues){
            return [
                'id'=>$venues['id'],
                'venue_name'=>$venues['venue_name'],
                'venue_city'=>$venues['venue_city'],
                'doc'=>$venues['venueimages'][0]['doc']??null,
                'amount'=>$venues['amount']
            ];
        },$venues);
        return view('home.dashboard',compact('venues','action','footer'));
    }
    public function aboutus(){
        return view('vr');
    }
    public function contactus(){
        return view('contactus');
    }
    public function prof(){
        $prof=Professional::where('status','approved')->get()->toArray();
        $profs=array_slice($prof,0,20);
        // pr($profs);
        $action='prof.professional';
        $venues=array_map(function($venues){
            return [
                'id'=>$venues['id'],
                'venue_name'=>$venues['companyname'],
                'venue_city'=>$venues['address'],
                'doc'=>$venues['prof_logo'],
                'amount'=>$venues['amount']
            ];
        },$profs);
        return view('home.category_show',compact('venues','action'));
    }
    public function ser(){
        $ser=Serviceproviders::where('status','approved')->get()->toArray();
        $sers=array_slice($ser,0,20);
        // pr($sers);
        $action='ser.service_provider';
        $venues=array_map(function($venues){
            return [
                'id'=>$venues['id'],
                'venue_name'=>$venues['companyname'],
                'venue_city'=>$venues['city'],
                'doc'=>$venues['logo'],
                'amount'=>$venues['price']
            ];
        },$sers);
         return view('home.category_show',compact('venues','action'));
    }
    public function ratings(Request $request,$id,$type){

        if(!Auth::check()){
            return redirect('/customer/login_form')->with('error','Need to Login First');
        }
        if(!$request->has('rating')){
            return back()->with('error','rating is required');
        }
        // echo $type;
        $user=Auth::user()->id;
        Ratingall::updateOrCreate(
            [
                'user_id'=>$user,
                'vorp_id'=>$id,
                'type'=>$type
            ],
            [
                'ratings'=>$request->input('rating'),
                'description'=>$request->input('description')??null
            ]
        );
        return back()->with('success','Ratings done for this booking');
    }
}
