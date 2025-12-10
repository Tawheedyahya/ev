<?php

namespace App\Http\Controllers;

use App\Models\Professional;
use App\Models\Serviceproviders;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class Apicontroller extends Controller
{
    //
    public function venues_list()
    {
        $venues = Cache::remember('list_venues', 120, function () {
            $venues_list = [];
            Venue::with('venueimages', 'room', 'provider')
                ->chunk(300, function ($chunk) use (&$venues_list) {
                    foreach ($chunk as $venue) {
                        $venues_list[] = $venue;
                    }
                });

            return $venues_list;
        });
        return response()->json([
            'msg' => 'success',
            'json_data' => $venues
        ], 200);
    }
    public function venue(Request $request)
    {
        $id = $request->query('id') ?? null;
        $name = $request->query('name') ?? null;
        if ($id == null && $name == null) {
            return response()->json([
                'msg' => 'missing both id and name any one is required',
            ], 400);
        }
        if ($id) {
            $venue = Venue::with('venueimages', 'room', 'provider')->find($id);
            if (empty($venue)) {
                return response()->json([
                    'msg' => 'no venue found regarding to the id'
                ], 404);
            }
            return response()->json([
                'msg' => 'success',
                'json_data' => $venue
            ], 200);
        }
        if ($id == null && $name) {
            $venue = Venue::with('venueimages', 'room', 'provider')->where('venue_name', $name)->get();
            if ($venue->isEmpty()) {
                return response()->json([
                    'msg' => 'no venues found regarding to the name'
                ], 404);
            }
            return response()->json([
                'msg' => 'success',
                'json_data' => $venue
            ], 200);
        }
    }
    public function prof_list()
    {
        // Cache::forget('prof_list');
        $prof = Cache::remember('prof_list', 120, function () {
            $professionals = [];
            Professional::with('proserviceplace', 'professionlist', 'info')->chunk(100, function ($pro) use (&$professionals) {
                foreach ($pro as $p) {
                    $professionals[] = $p;
                }
            });
            return $professionals;
        });
        return response()->json([
            'msg' => 'success',
            'json_data' => $prof
        ], 200);
    }
    public function prof(Request $request)
    {
        $id = $request->query('id') ?? null;
        $name = $request->query('name') ?? null;
        if ($id == null && $name == null) {
            return response()->json([
                'msg' => 'missing both id and name any one is required',
            ], 400);
        }
        if ($id) {
            $prof =  Professional::with('proserviceplace', 'professionlist', 'info')->find($id);
            if (empty($prof)) {
                return response()->json([
                    'msg' => 'no professional found regarding to the id'
                ], 404);
            }
            return response()->json([
                'msg' => 'success',
                'json_data' => $prof
            ], 200);
        }
        if ($id == null && $name) {
            $prof =  Professional::with('proserviceplace', 'professionlist', 'info')->where('companyname', $name)->get();
            if ($prof->isEmpty()) {
                return response()->json([
                    'msg' => 'no professional found regarding to the name'
                ], 404);
            }
            return response()->json([
                'msg' => 'success',
                'json_data' => $prof
            ], 200);
        }
    }

    public function service_list()
    {
        $ser = Cache::remember('service_list', 120, function () use (&$services) {
            $services = [];
            Serviceproviders::with(['categories', 'places', 'blogs', 'info'])->chunk(300, function ($chunk) use (&$services) {
                foreach ($chunk as $s) {
                    $services[] = $s;
                }
            });
            return $services;
        });
        return response()->json([
            'msg' => 'success',
            'json_data' => $ser
        ], 200);
    }

    public function service(Request $request)
    {
        $id = $request->query('id') ?? null;
        $name = $request->query('name') ?? null;
        if ($id == null && $name == null) {
            return response()->json([
                'msg' => 'missing both id and name any one is required',
            ], 400);
        }
        if ($id) {
            $service =  Serviceproviders::with(['categories', 'places', 'blogs', 'info'])->find($id);
            if (empty($service)) {
                return response()->json([
                    'msg' => 'no service found regarding to the id'
                ], 404);
            }
            return response()->json([
                'msg' => 'success',
                'json_data' => $service
            ], 200);
        }
        if ($id == null && $name) {
            $prof =   Serviceproviders::with(['categories', 'places', 'blogs', 'info'])->where('companyname', $name)->get();
            if ($prof->isEmpty()) {
                return response()->json([
                    'msg' => 'no professional found regarding to the name'
                ], 404);
            }
            return response()->json([
                'msg' => 'success',
                'json_data' => $prof
            ], 200);
        }
    }
}
