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
        $providers=Serviceproviders::with('places')->where('status','approved')->paginate(5);
        $paginate=true;
        // pr($providers->toArray());
        return view('eventscape.service_providers.dashboard',compact('location'));
    }
}
