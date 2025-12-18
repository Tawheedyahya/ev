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
        $venues=Venue::with('venueimages')->where('halal',0)->orWhereNull('halal')->limit(8)->get()->toArray();
        $verified_venues=Venue::with('venueimages')->where('halal',1)->limit(4)->get()->toArray();
        // SLIDDER
        $categories=[1,4,5,6];
        $c_k=['weddings','birthday','corporate','social'];
        $slidder=[];
        foreach($categories as $index=>$c){
            $slidder[$c_k[$index]]=Venue::select('id','venue_name','venue_city','description','amount')->with(['venueimages'=>function($q){$q->select('id','venue_id','doc')->orderBy('id')->limit(1);}])->whereHas('occasion',fn($q)=>$q->where('occasions.id',$c))->where('venue_city','kula lampur')->limit(4)->get()->map(function($venue){
                return [
                      'id'          => $venue->id,
            'venue_name'  => $venue->venue_name,
            'venue_city'  => $venue->venue_city,
            'description' => $venue->description,
            'image'       => $venue->venueimages[0]['doc']?? null,
            'amount'=>$venue->amount
                ];
            })->toArray();
            }
        // pr($slidder);    
        // END SLIDDER
        $action='card.venue';
        $footer=Footer::pluck('value','type');
        // pr($footer->toArray());
        $venues=array_slice($venues,0,8);
        // pr($venues);z
        $venues=array_map(function($venues){
            return [
                'id'=>$venues['id'],
                'venue_name'=>$venues['venue_name'],
                'venue_city'=>$venues['venue_city'],
                'doc'=>$venues['venueimages'][0]['doc']??null,
                'amount'=>$venues['amount'],
                'new_venue'=> 'yes',
                'verified'=>$venues['halal']==0?'Halal Verified':'Null',
                'description'=>$venues['description']
            ];
        },$venues);
        // pr($venues);
        return view('home.dashboard',compact('venues','action','footer','verified_venues','slidder'));
    }
    public function aboutus(){
        return view('vr');
    }
    public function contactus(){
        return view('contactus');
    }
    public function prof(){
        $prof=Professional::with("info")->where('status','approved')->get()->toArray();
        $profs=array_slice($prof,0,20);
        // pr($profs);
        // return response()->json($profs);
        $action='prof.professional';
        $venues=array_map(function($venues){
            return [
                'id'=>$venues['id'],
                'venue_name'=>$venues['companyname'],
                'venue_city'=>$venues['address'],
                'doc'=>$venues['prof_logo'],
                'amount'=>$venues['amount'],
                'new_venue'=> 'no',
                'description'=>$venues['info']['about_us']??'Excellent professional providing top-notch services.'
            ];
        },$profs);

        return view('home.category_show',compact('venues','action'));
    }
    public function ser(){
        $ser=Serviceproviders::where('status','approved')->get()->toArray();
        $sers=array_slice($ser,0,20);
        //  pr($sers);
        $action='ser.service_provider';
        $venues=array_map(function($venues){
            return [
                'id'=>$venues['id'],
                'venue_name'=>$venues['companyname'],
                'venue_city'=>$venues['city'],
                'doc'=>$venues['logo'],
                'amount'=>$venues['price'],
                'new_venue'=> 'no',
                'description'=>$venues['about_us']??'Excellent Service provider top-notch services.'
            ];
        },$sers);
        // pr($sers);
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
