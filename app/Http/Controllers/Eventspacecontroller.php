<?php

namespace App\Http\Controllers;

use App\Models\Occasion;
use App\Models\Venue;
use App\Models\Venuefacility;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class Eventspacecontroller extends Controller
{
    public function dashboard()
    {
        $paginate = true;
        $occasions = Occasion::all();
        $venue_facilities = Venuefacility::all();
        $location = Venue::select('venue_city')
            ->distinct()
            ->get()
            ->map(fn($city) => $city->venue_city)
            ->toArray();

        // Paginate instead of get()->toArray()
        $venues = Venue::with([
            'venueimages' => fn($q) => $q->select('venue_id', 'doc')->orderBy('id')
        ])
            ->paginate(4) // per page
            ->through(function ($venue) {
                $venue->doc = optional($venue->venueimages->first())->doc;
                unset($venue->venueimages);
                return $venue;
            });
        // pr($venues);
        return view('eventscape.dashboard', compact('venues', 'location', 'paginate', 'occasions', 'venue_facilities'));
    }

    public function location_filter(Request $request)
    {
        $paginate = true;
        $location = Venue::select('venue_city')
            ->distinct()
            ->get()
            ->map(fn($city) => $city->venue_city)
            ->toArray();
        Paginator::useBootstrapFive();

        $location = $request->get('location', '');

        $venues = Venue::with([
            'venueimages' => fn($q) => $q->select('id', 'venue_id', 'doc')->oldest('id')->limit(1)
        ])
            ->whereRaw('LOWER(venue_city) = LOWER(?)', [$location])
            ->orderByDesc('id')
            ->paginate(100000)
            ->withQueryString()            // keep ?location=... on next/prev links
            ->through(function ($venue) {  // transform items but KEEP paginator
                $venue->doc = optional($venue->venueimages->first())->doc;
                unset($venue->venueimages);
                return $venue;
            });
        // pr($venues);
        // return response()->json($venues);
        $html = view('eventscape.venue_show', compact('venues', 'location', 'paginate'))->render();

        return response()->json(['html' => $html]);
    }
    public function filter(Request $request)
    {

        $paginate = false;
        $location = trim(strtolower($request->input('location'))) ?? null;
        // echo $location;
        // return;
        // $location='coimbatore';
        $seat_capacity = $request->input('seat_capacity') ?? null;
        $occ = array_map('intval', (array) $request->input('occasions', []));
        $fac = array_map('intval', (array) $request->input('facilities', []));
        $min = $request->input('min') ?? null;

        // Build placeholders only if arrays are non-empty
        $occPh = !empty($occ) ? implode(',', array_fill(0, count($occ), '?')) : '';
        $facPh = !empty($fac) ? implode(',', array_fill(0, count($fac), '?')) : '';

        // Start SQL
        $sql = "
        SELECT
            v.id,
            v.venue_name,
            v.venue_city,
            v.description,
            -- pick one image per venue
            (SELECT vi2.doc
             FROM venueimages vi2
             WHERE vi2.venue_id = v.id
             ORDER BY vi2.id ) AS doc
        FROM venues AS v
        JOIN appvenuefacilities AS vf ON vf.venue_id = v.id
        JOIN venuetypes AS vt         ON vt.venue_id = v.id
        WHERE 1=1
    ";

        $bindings = [];

        // Optional occasion filter
        if (!empty($occ)) {
            $sql .= " AND vt.occasion_id IN ($occPh)";
            $bindings = array_merge($bindings, $occ);
        }


        // Optional price ceiling
        if (!is_null($min)) {
            $sql .= " AND v.amount <= ?";
            $bindings[] = $min;
        }

        // NEW: seat capacity ≤ filter
        if (!is_null($seat_capacity)) {
            $sql .= " AND v.venue_seat_capacity >= ?";   // change column name if yours is different
            $bindings[] = (int) $seat_capacity;
        }

        // Optional facilities filter (AND logic across ALL facilities)
        if (!empty($fac)) {
            $sql .= " AND vf.venue_facilities IN ($facPh)";
        }
        if ($location && $location!=null && $location!='') {
            $sql .= " AND v.venue_city IN ('$location')";
        }

        // Group by venue-level cols (we selected one image via subquery)
        $sql .= "
        GROUP BY v.id, v.venue_name, v.venue_city, v.description
    ";

        // Only apply HAVING when we actually filtered by facilities
        if (!empty($fac)) {
            $sql .= " HAVING COUNT(DISTINCT vf.venue_facilities) = ?";
            $bindings = array_merge($bindings, $fac, [count($fac)]);
        }


        $q = DB::select($sql, $bindings);
        $venues = array_map(function ($r) {
            return (array)$r;
        }, $q);

        $html = view('eventscape.venue_show', compact('venues', 'location', 'paginate'))->render();
        return response()->json(['html' => $html]);
    }
}
