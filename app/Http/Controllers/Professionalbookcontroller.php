<?php

namespace App\Http\Controllers;

use App\Models\Occasion;
use App\Models\Professional;
use App\Models\Professionlist;
use App\Models\Serviceplace;
use App\Models\Venuefacility;
use Illuminate\Http\Request;

class Professionalbookcontroller extends Controller
{
    public function dashboard()
    {
        $location=Professional::all()->pluck('companyname')->toArray();
        $service_places=Serviceplace::all();
        $professionals=Professional::with('professionlist')->paginate(5);
        $category=Professionlist::all();
        // pr($professionals->toArray());
        $paginate=true;
        return view('eventscape.professional.dashboard',compact('location','professionals','paginate','service_places','category'));
    }
    public function professional($id){
$professionals = Professional::with('proserviceplace')->findOrFail($id);
// pr($professionals->toArray());
// Ensure that the professional exists before proceeding
if ($professionals) {
    // Wrap the model instance in a collection, even though it’s only a single model
    $prof = collect([$professionals])->map(function($q) {
        return [
            'name' => $q->name,                  // Correctly accessing the 'name' property
            'company_name' => $q->companyname,   // Correctly accessing the 'companyname' property
            'prof_logo' => $q->prof_logo,        // Correctly accessing the 'prof_logo' property
            'experience' => $q->experience,      // Correctly accessing the 'experience' property
            'price' => $q->price,                // Correctly accessing the 'price' property
            'proservice_place' => $q->proserviceplace->map(function($place){
                return $place->name;
            })->toArray() // Correctly accessing the 'proserviceplace' relationship
        ];
    })->toArray();
    $service_place=(object)$prof[0]['proservice_place'];
    unset($prof[0]['proservice_place']);
    $professional=(object)$prof[0];
    // echo $professional->prof_logo;
    // return;
    // pr($professional);
    // pr($service_place);


    // Output the result as an array
    // pr($prof);
    return view('eventscape.professional.professional_show.show',compact('professional','service_place'));
} else {
    pr('Professional not found.');
}
    }
}
