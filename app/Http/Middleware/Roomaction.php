<?php

namespace App\Http\Middleware;

use App\Models\Room;
use App\Models\Venue;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Roomaction
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $provider_id = Auth::guard('venue_provider')->user()->id;
        $id = $request->route('id');
        $venue=Venue::findOrFail($id);
        $room_id = $request->route('room_id');
        if(!$id || !$room_id){
            return redirect('errors/auth');
        }
        // echo $id;
        if($provider_id !=$venue->venue_provider_id){
            return redirect('errors/auth');
        }
        $room=Room::find($room_id);
        if($id!=$room->venue_id){
            return redirect('errors/auth');
        }
        return $next($request);
    }
}
