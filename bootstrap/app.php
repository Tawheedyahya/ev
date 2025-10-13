<?php

use App\Http\Middleware\Bookingaction;
use App\Http\Middleware\Profcheckmiddleware;
use App\Http\Middleware\Roomaction;
use App\Http\Middleware\Venueaction;
use App\Http\Middleware\Venueproviderauth;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->validateCsrfTokens(except:[
            '*heart',
        ]);
        $middleware->alias(
            [
                'venue_provider_auth'=>Venueproviderauth::class,
                'venue_provider_action'=>Venueaction::class,
                'room_action'=>Roomaction::class,
                'book_action'=>Bookingaction::class,
                'prof'=>Profcheckmiddleware::class
            ]
            );
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
