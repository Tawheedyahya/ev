<?php

namespace App\Http\Controllers;

use App\Models\Servicecategory;
use App\Models\Serviceplace;
use App\Models\Serviceproviders;
use Illuminate\Http\Request;

class Servicebookcontroller extends Controller
{
    public function dashboard()
    {
        $location=Serviceproviders::where('status','approved')->pluck('companyname')->toArray();
        $service_places=Serviceplace::all();
        $category=Servicecategory::all();
        $professionals=Serviceproviders::with(['places','categories'])->where('status','approved')->paginate(5);
        // pr($professionals->toArray());
        $paginate=true;
        // pr($providers->toArray());
        return view('eventscape.service_providers.dashboard',compact('location','service_places','category','professionals','paginate'));
    }
    public function provider($id){
        // return 'hi';
        $provider=Serviceproviders::with(['categories:id,name','places','blogs','info'])->findOrFail($id);
        // pr($provider->toArray());
        $info=$provider->info;
        unset($provider->info);
        $blogs=$provider->blogs;
        $category=$provider->categories;
        $service_place=$provider->places;
        unset($provider['places']);
        unset($provider['categories']);
        // pr($provider->toArray());
        return view('eventscape.service_providers.serviceprovider_show.show',compact('provider','category','service_place','blogs','info'));
    }
}
