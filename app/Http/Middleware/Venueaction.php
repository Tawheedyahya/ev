<?php

namespace App\Http\Middleware;

use App\Models\Venue;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Venueaction
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id=$request->route('id');
        if(!$id){
            return redirect('errors/auth');
        }else{
            $venue=Venue::find($id);
            $provider_id=Auth::guard('venue_provider')->user()->id;
            if(!$venue || $venue==null){
                 return redirect('errors/auth');
            }else{
                if($provider_id!=$venue->venue_provider_id){
                    return redirect('errors/auth');
                }
            }
        }
        return $next($request);
    }
}
