<?php

use App\Http\Controllers\Bookingcontroller;
use App\Http\Controllers\Customercontroller;
use App\Http\Controllers\Eventspacecontroller;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Professionalbookcontroller;
use App\Http\Controllers\Professionalcontroller;
use App\Http\Controllers\Roomcontroller;
use App\Http\Controllers\Vendorcontroller;
use App\Http\Controllers\Venueprovider;
use App\Models\Professional;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/home/dashboard');
});


Route::prefix('errors')->group(function(){
    Route::get('/auth',function(){
        return view("errors.auth");
    })->name('err');
});

Route::prefix('/home')->group(function(){
    Route::get('/dashboard',[Homecontroller::class,'dashboard']);
});
Route::prefix('/eventspace')->group(function(){
    Route::get('/venues_provider/dashboard',[Eventspacecontroller::class,'dashboard'])->name('eventspace.dashboard');
    Route::get('/location_filter',[Eventspacecontroller::class,'location_filter'])->name('eventspace.location');
    Route::post('/filter',[Eventspacecontroller::class,'filter'])->name('eventspace.filter');
    Route::get('/venues/{id}',[Eventspacecontroller::class,'venue'])->name('card.venue');
    Route::get('/profession_filter',[Eventspacecontroller::class,'prof_location'])->name('prof.location');
    Route::get('/professiona_filer_opt',[Eventspacecontroller::class,'prof_filter'])->name('eventspace.prof.filter');
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
    Route::get('/liked_venues',[Customercontroller::class,'liked_venues']);
    Route::delete('/booking/cancel/{id}',[Customercontroller::class,'booking_cancel'])->name('booking.cancel');
    Route::patch('/booking/date/{id}',[Customercontroller::class,'booking_date'])->name('booking.date');
    Route::get('/logout',[Customercontroller::class,'logout']);
    // professional
    Route::get('/professional',[Customercontroller::class,'professional_book']);
    Route::delete('/professional/booking/cancel/{id}',[Customercontroller::class,'prof_booking_cancel'])->name('prof.booking.cancel');
    Route::patch('/professional/booking/date/{id}',[Customercontroller::class,'prof_booking_date'])->name('prof.booking.date');
    // heart
    Route::post('/heart',[Customercontroller::class,'heart']);
});

Route::prefix('/vendor')->group(function(){
    Route::get('/venue_login_form',[Vendorcontroller::class,'venue_login_form']);
    Route::get('/venue_register_form',[Vendorcontroller::class,'venue_register_form']);
    Route::get('/professionals_login',[Vendorcontroller::class,'professionals_login_form']);
    Route::get('/professionals_register_form',[Vendorcontroller::class,'professionals_register_form']);
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
    // Bookings
    Route::get('/bookings/dashboard',[Bookingcontroller::class,'dashboard'])->middleware('venue_provider_auth');
    Route::get('/booking/approve/{id}',[Bookingcontroller::class,'approve'])->name('booking.approve')->middleware(['venue_provider_auth','book_action']);
    Route::post('/booking/reject/{id}',[Bookingcontroller::class,'reject'])->name('booking.reject')->middleware(['venue_provider_auth','book_action']);

    Route::prefix('/venues')->group(function(){
        Route::get('/rooms/{id}',[Roomcontroller::class,'dashboard'])->name('rooms.dashboard')->middleware(['venue_provider_auth','venue_provider_action']);
        Route::get('/rooms/add/{id}',[Roomcontroller::class,'add_rooms'])->name('rooms.add')->middleware(['venue_provider_auth','venue_provider_action']);
        Route::post('/room/insert/{id}',[Roomcontroller::class,'insert_room'])->name('room.insert')->middleware(['venue_provider_auth','venue_provider_action']);
        Route::get('/room/edit/{id}/{room_id}',[Roomcontroller::class,'add_rooms'])->name('room.edit')->middleware(['venue_provider_auth','room_action']);
        Route::post('/room/update/{id}/{room_id}',[Roomcontroller::class,'insert_room'])->name('room.update')->middleware(['venue_provider_auth','room_action']);
        Route::get('/room/delete/{id}/{room_id}',[Roomcontroller::class,'delete_room'])->name('room.delete')->middleware(['venue_provider_auth','room_action']);
    });
});

Route::prefix('/professionals')->group(function(){
    Route::post('/login',[Professionalcontroller::class,'login'])->name('professionals.login');
    Route::post('/register',[Professionalcontroller::class,'register'])->name('professionals.register');
    Route::get('/verified_email',[Professionalcontroller::class,'verify_email']);
    Route::get('/dashboard',[Professionalcontroller::class,'dashboard'])->middleware(['prof'])->name('professional.dashboard');
    Route::get('/dashboard/edit',[Professionalcontroller::class,'edit'])->middleware(['prof'])->name('prof.profile.edit');
    Route::get('/logout',[Professionalcontroller::class,'logout'])->middleware(['prof'])->name('pf.logout');
    Route::post('/edit',[Professionalcontroller::class,'update'])->middleware(['prof'])->name('prof.prof.edit');
    Route::get('/bookings',[Professionalcontroller::class,'bookings'])->middleware(['prof'])->name('professional.bookings');
    Route::get('/booking/accept/{id}',[Professionalcontroller::class,'accept'])->middleware(['prof'])->name('prof.booking.approve');
    Route::post('/booking/reject/{id}',[Professionalcontroller::class,'reject'])->middleware(['prof'])->name('prof.booking.reject');
});
Route::prefix('/eventspace/prof')->group(function(){
    Route::get('/dashboard',[Professionalbookcontroller::class,'dashboard'])->name('prof.dashboard');
    // Route::get('/')
    Route::get('/professional/{id}',[Professionalbookcontroller::class,'professional'])->name('prof.professional');
    Route::post('/professional/booking/{id}',[Professionalbookcontroller::class,'booking'])->name('prof.book');
    Route::post('/professional/{id}/heart',[Professionalbookcontroller::class,'likes']);
});


Route::prefix('/booking')->group(function(){
    Route::post('/book/{id}',[Eventspacecontroller::class,'book'])->name('venue.book');
});

