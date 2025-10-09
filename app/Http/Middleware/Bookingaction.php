<?php

namespace App\Http\Middleware;

use App\Models\Booking;
use App\Models\Venue;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Bookingaction
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id=$request->route('id');
        $booking = Booking::findOrFail($id);
        $venue_id = $booking->venue_id;
        if ($venue_id) {
            $venue = Venue::findOrFail($venue_id);
            if ($venue->venue_provider_id != Auth::guard('venue_provider')->user()->id) {
                return redirect()->route('err');
            }
        }
        return $next($request);
    }
}
