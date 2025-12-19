<?php

use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\Apicontroller;
use App\Http\Controllers\Bookingcontroller;
use App\Http\Controllers\Customercontroller;
use App\Http\Controllers\Eventspacecontroller;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Professionalbookcontroller;
use App\Http\Controllers\Professionalcontroller;
use App\Http\Controllers\Roomcontroller;
use App\Http\Controllers\Servicebookcontroller;
use App\Http\Controllers\Serviceprovider;
use App\Http\Controllers\Serviceprovidercontroller;
use App\Http\Controllers\Vendorcontroller;
use App\Http\Controllers\Venueprovider;
use App\Models\Professional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
    Route::get('/filter',[Eventspacecontroller::class,'filter'])->name('eventspace.filter');
    Route::get('/venues/{id}',[Eventspacecontroller::class,'venue'])->name('card.venue');
    Route::get('/profession_filter',[Eventspacecontroller::class,'prof_location'])->name('prof.location');
    Route::get('/professiona_filer_opt',[Eventspacecontroller::class,'prof_filter'])->name('eventspace.prof.filter');
    Route::get('/service_provider_filter',[Eventspacecontroller::class,'ser_location'])->name('ser.location');
    Route::get('/servicer_provider_filter_opt',[Eventspacecontroller::class,'ser_filter'])->name('eventspace.ser.filter');
});
Route::view('/terms','terms');
Route::prefix('/aboutus')->group(function(){
    Route::get('/dashboard',[Homecontroller::class,'aboutus']);
});
Route::view('/privacy','privacy');


Route::prefix('/contactus')->group(function(){
    Route::get('/dashboard',[Homecontroller::class,'contactus']);
});

Route::prefix('/customer')->group(function(){
    Route::get('/verified_email',[Customercontroller::class,'verified']);
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
    Route::get('/liked_professionals',[Customercontroller::class,'liked_professionals']);
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
    Route::get('/service_providers_login',[Vendorcontroller::class,'service_providers_login']);
    Route::get('/service_providers_register',[Vendorcontroller::class,'service_providers_register']);
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
    Route::delete('/venues/delete_venue/{id}',[Venueprovider::class,'delete_venue'])->name('vp.venue.delete')->middleware(['venue_provider_auth','venue_provider_action']);
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
Route::prefix('/eventspace/service')->group(function(){
    Route::get('/dashboard',[Servicebookcontroller::class,'dashboard'])->name('serpro.dashboard');
    Route::get('/service_provider/{id}',[Servicebookcontroller::class,'provider'])->name('ser.service_provider');
});


Route::prefix('/booking')->group(function(){
    Route::post('/book/{id}',[Eventspacecontroller::class,'book'])->name('venue.book');
});
Route::prefix('/service_provider')->group(function(){
    Route::post('/login',[Serviceprovidercontroller::class,'login'])->name('service.login');
    Route::post('/register',[Serviceprovidercontroller::class,'register'])->name('serviceprovider.register');
    Route::get('/verified',[Serviceprovidercontroller::class,'email']);
});
Route::prefix('/service_provider')->middleware('sercheck')->group(function(){
    Route::get('/dashboard',[Serviceprovidercontroller::class,'dashboard'])->name('service.dashboard');
    Route::get('/blogs',[Serviceprovidercontroller::class,'blogs'])->name('service.blogs');
    Route::get('/uploads',[Serviceprovidercontroller::class,'uploads'])->name('service.uploads');
    Route::get('/logout',[Serviceprovidercontroller::class,'logout'])->name('service.logout');
    Route::post('/post',[Serviceprovidercontroller::class,'post'])->name('service.post');
    Route::delete('/post/delete/{id}',[Serviceprovidercontroller::class,'delete_post'])->name('service.blog.delete');
    Route::get('/edit_profile',[Serviceprovidercontroller::class,'profile_edit'])->name('ser.prof.edit');
    Route::post('/update/profile',[Serviceprovidercontroller::class,'profile_update'])->name('ser.prof.update');
});
// Route::get('/about',function(){
//     return view('vr');
// });
Route::get('/password_resend/{id}',[Customercontroller::class,'forgot'])->name('overall.password_resend');
Route::post('/r_password/{id}',[Customercontroller::class,'password_reset'])->name('overall.reset.password');
Route::get('/r_update/reset_password',[Customercontroller::class,'update_pass']);
Route::post('/update_pass/{id}/{v_id}/{token}',[Customercontroller::class,'set_pass'])->name('set_pass');
Route::prefix('/admin')->group(function(){
    Route::get('/login',[Admincontroller::class,'login']);
    Route::post('/login',[Admincontroller::class,'log'])->name('admin.login');
});
Route::prefix('/admin')->middleware('superadmin')->group(function(){
    Route::get('/venue_providers',[Admincontroller::class,'venue_providers_dahaboard'])->name('ad.vn.ds');
    Route::get('/logout',[Admincontroller::class,'logout'])->name('super_admin.logout');
    Route::post('/venue_provider/rejection/{c_id}',[Admincontroller::class,'venue_provider_rejection'])->name('venue_provider.rejection');
    Route::get('/venue_provider/approved/{id}/{c_id}',[Admincontroller::class,'venue_provider_approved'])->name('venue_provider.approved');
    Route::get('/venue_providers/venues/{id}',[Admincontroller::class,'venue_provider_venues'])->name('venue_provider.venues');
    Route::get('/venue_providers/bookings/{id}',[Admincontroller::class,'venue_provider_bookings'])->name('venue_provider.abookings');
    Route::get('/professionals',[Admincontroller::class,'professionals_dashboard'])->name('ad.p.ds');
    Route::get('/professionals/bookings/{id}',[Admincontroller::class,'professional_bookings'])->name('professional.abookings');
    Route::get('/service_providers',[Admincontroller::class,'service_providers_dahboard'])->name('ad.sp.ds');
    Route::get('/footer',[Admincontroller::class,'footer'])->name('ad.footer');
    Route::post('/footer',[Admincontroller::class,'footer_submit'])->name('ad.footer.submit');
});
Route::get('/yahi',[Homecontroller::class,'prof']);
Route::get('/ya',[Homecontroller::class,'ser']);
Route::post('/ratings/{id}/{type}',[Homecontroller::class,'ratings'])->name('overall_ratings');
Route::prefix('/api')->group(function(){
    Route::get('/venues_list',[Apicontroller::class,'venues_list']);
    Route::get('/venue',[Apicontroller::class,'venue']);
    Route::get('/prof_list',[Apicontroller::class,'prof_list']);
    Route::get('/prof',[Apicontroller::class,'prof']);
    Route::get('/service_list',[Apicontroller::class,'service_list']);
    Route::get('/service',[Apicontroller::class,'service']);
});
