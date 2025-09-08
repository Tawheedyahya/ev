<?php

use App\Http\Controllers\Customercontroller;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Vendorcontroller;
use App\Http\Controllers\Venueprovider;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/home/dashboard');
});

Route::prefix('/home')->group(function(){
    Route::get('/dashboard',[Homecontroller::class,'dashboard']);
});
Route::prefix('/eventspace')->group(function(){
    Route::get('/dashboard',[Homecontroller::class,'dashboard']);
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
Route::prefix('/venue_provider')->group(function(){
    Route::post('/register',[Venueprovider::class,'register'])->name('venue.register');
    Route::get('/verified_email',[Venueprovider::class,'email_verify']);
    Route::post('/login',[Venueprovider::class,'login'])->name('venue.login');
});
