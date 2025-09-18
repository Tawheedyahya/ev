<?php

use App\Http\Controllers\Customercontroller;
use App\Http\Controllers\Eventspacecontroller;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Roomcontroller;
use App\Http\Controllers\Vendorcontroller;
use App\Http\Controllers\Venueprovider;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/home/dashboard');
});

Route::prefix('errors')->group(function(){
    Route::get('/auth',function(){
        return view("errors.auth");
    });
});

Route::prefix('/home')->group(function(){
    Route::get('/dashboard',[Homecontroller::class,'dashboard']);
});
Route::prefix('/eventspace')->group(function(){
    Route::get('venues_provider/dashboard',[Eventspacecontroller::class,'dashboard'])->name('eventspace.dashboard');
    Route::get('/location_filter',[Eventspacecontroller::class,'location_filter'])->name('eventspace.location');
    Route::post('/filter',[Eventspacecontroller::class,'filter'])->name('eventspace.filter');
});
Route::prefix('/aboutus')->group(function(){
    Route::get('/dashboard',[Homecontroller::class,'dashboard']);
});
Route::prefix('/contactus')->group(function(){
    Route::get('/dashboard',[Homecontroller::class,'dashboard']);
});

Route::prefix('/customer')->group(function(){
    Route::get('/register_form',[Customercontroller::class,'register_form']);
    Route::get('/login_form',[Customercontroller::class,'login_form']);
    Route::post('/register_form',[Customercontroller::class,'register'])->name('customer.register');
    Route::post('/login',[Customercontroller::class,'login'])->name('customer.login');
    Route::get('/forgot_password',[Customercontroller::class,'forgot_password']);
    Route::post('/password_resend',[Customercontroller::class,'password_resend'])->name('customer.password_resend');
    Route::get('/reset_password',[Customercontroller::class,'reset_password']);
    Route::post('/set_password/{id}',[Customercontroller::class,'set_password'])->name('customer.password_reset');
    Route::get('/profile',[Customercontroller::class,'profile']);
    Route::get('/logout',[Customercontroller::class,'logout']);
});

Route::prefix('/vendor')->group(function(){
    Route::get('/venue_login_form',[Vendorcontroller::class,'venue_login_form']);
    Route::get('/venue_register_form',[Vendorcontroller::class,'venue_register_form']);
});
// lovider
Route::prefix('/venue_provider')->group(function(){
    Route::post('/register',[Venueprovider::class,'register'])->name('venue.register');
    Route::get('/verified_email',[Venueprovider::class,'email_verify']);
    Route::post('/login',[Venueprovider::class,'login'])->name('venue.login');
    Route::get('/logout',[Venueprovider::class,'logout'])->name('vp.logout');
    Route::get('/dashboard',[Venueprovider::class,'dashboard'])->name('venue_provider.dashboard')->middleware('venue_provider_auth');
    Route::get('/venues/dashbaord',[Venueprovider::class,'venue_dashboard'])->middleware('venue_provider_auth');
    Route::get('/venues/add_venue',[Venueprovider::class,'add_venue'])->name('vp.venue.add')->middleware('venue_provider_auth');
    Route::post('/venues/add_venue',[Venueprovider::class,'register_venue'])->name('vp.venue.register')->middleware('venue_provider_auth');
    Route::get('/venues/edit_venue/{id}',[Venueprovider::class,'add_venue'])->name('vp.venue.edit')->middleware(['venue_provider_auth','venue_provider_action']);
    Route::get('/venues/delete_venue/{id}',[Venueprovider::class,'delete_venue'])->name('vp.venue.delete')->middleware(['venue_provider_auth','venue_provider_action']);
    Route::post('/venues/update_venue/{id}',[Venueprovider::class,'register_venue'])->name('vp.venue.update')->middleware(['venue_provider_auth','venue_provider_action']);
    Route::prefix('/venues')->group(function(){
        Route::get('/rooms/{id}',[Roomcontroller::class,'dashboard'])->name('rooms.dashboard')->middleware(['venue_provider_auth','venue_provider_action']);
        Route::get('/rooms/add/{id}',[Roomcontroller::class,'add_rooms'])->name('rooms.add')->middleware(['venue_provider_auth','venue_provider_action']);
        Route::post('/room/insert/{id}',[Roomcontroller::class,'insert_room'])->name('room.insert')->middleware(['venue_provider_auth','venue_provider_action']);
        Route::get('/room/edit/{id}/{room_id}',[Roomcontroller::class,'add_rooms'])->name('room.edit')->middleware(['venue_provider_auth','room_action']);
        Route::post('/room/update/{id}/{room_id}',[Roomcontroller::class,'insert_room'])->name('room.update')->middleware(['venue_provider_auth','room_action']);
        Route::get('/room/delete/{id}/{room_id}',[Roomcontroller::class,'delete_room'])->name('room.delete')->middleware(['venue_provider_auth','room_action']);
    });
});

