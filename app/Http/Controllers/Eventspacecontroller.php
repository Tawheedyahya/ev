<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;

class Eventspacecontroller extends Controller
{
    public function dashboard()
    {
        $location=['chennai',];
        // pr($location);
        $venues = Venue::with([
            'venueimages' => fn($q) => $q->select('venue_id', 'doc')->orderBy('id')
        ])->get()
            ->map(function ($venue) {
                // attach first doc to the parent
                $venue->doc = optional($venue->venueimages->first())->doc;
                unset($venue->venueimages);
                return $venue;
            })
            ->toArray();

        // pr($venues);
        return view('eventscape.dashboard', compact('venues','location'));
    }
}
