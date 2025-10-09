<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Profcheckmiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::guard('prof')->check()){
            return redirect('/vendor/professionals_login')->with('error','need to login first');
        }
        if(Auth::guard('prof')->user()->status!=='approved'){
         return redirect('/vendor/professionals_login')->with('error','your registeration is not verified');
        }
        return $next($request);
    }
}
