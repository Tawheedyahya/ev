<?php

namespace App\Http\Controllers;

use App\Mail\Passwordmail;
use App\Models\Booking;
use App\Models\User;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Str;

class Customercontroller extends Controller
{
    public function register_form()
    {
        if (Auth::check()) {
            return redirect('/customer/profile')->with('error', 'logout first');
        }
        return view("customer.register_form");
    }
    public function login_form()
    {
        if (Auth::check()) {
            return redirect('/customer/profile');
        }
        return view("customer.login_form");
    }
    public function register(Request $request)
    {
        // echo 'hi';

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required',
            'password' => 'required|confirmed',
        ]);
        $user = new User();
        $user->name = trim($request->input('name'));
        $user->email = trim($request->input('email'));
        $user->phone = trim($request->input('phone'));
        $user->password = Hash::make(trim($request->input('password')));
        if ($user->save()) {
            return back()->with('success', 'registerd successfully and go back to login');
        }
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $email = trim($request->input('email'));
        $password = trim($request->input('password'));
        $user = User::where('email', $email)->first();
        if ($user == null || $user == '') {
            return back()->with('error', 'user not found');
        }
        if (!Hash::check($password, $user->password)) {
            return back()->with('error', 'password not match');
        }
        Auth::login($user);
        return redirect('/customer/profile')->with('success', 'login successfully');
    }
    public function forgot_password()
    {
        return view("customer.forgot_password");
    }
    public function password_resend(Request $request)
    {
        $request->validate([
            'email' => 'required'
        ]);
        $email = trim($request->input('email'));
        $user = User::where('email', $email)->first();
        if (!$user || $user == null) {
            return back()->with('error', 'Email not found');
        }
        if ($user) {
            $email = $user->email;
            $token = \Str::random(60);
            User::where('email', $email)->update([
                'remember_token' => $token
            ]);
            $url = url('/customer/reset_password?token=' . $token . '&id=' . $user->id);
            if (Mail::to($email)->send(new Passwordmail($url))) {
                return back()->with('success', 'Resend link send to your email');
            }
        }
    }
    public function reset_password(Request $request)
    {
        $id = $request->query('id') . "<br>";
        $token = $request->query('token');
        $user = User::find($id);
        if (!$user || $user == null) {
            return 'user not found';
        }
        $orginal_token = $user->remember_token;
        if ($token != $orginal_token) {
            return 'link not acceptance try again';
        }
        // echo $id;
        // return;
        return view("customer.password_reset", compact('id'));
    }
    public function set_password($id, Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed'
        ]);
        User::where('id', $id)->update([
            'password' => trim(Hash::make($request->input('password'))),
            'remember_token' => ''
        ]);
        $msg = 'password changed successfully goo to login';
        return redirect('/customer/login_form')->with('success', 'password changed');
    }
    public function profile()
    {
        if (!Auth::check()) {
            return redirect('/customer/login_form')->with('error', 'Need to login first');
        }
        $bookings = Booking::where('user_id', Auth::id())->orderBy('created_at','DESC')->get();
        $venues   = Venue::with(['venueimages:venue_id,doc', 'provider:id,name,phone'])
            ->whereIn('id', $bookings->pluck('venue_id'))
            ->get()
            ->keyBy('id');
        // pr($venues);

        $orders = $bookings->map(function ($b) use ($venues) {
            // attach the venue model as a loaded relation
            $b->setRelation('venue', $venues->get($b->venue_id));
            return $b;
        })->toArray();
        // pr($orders);
        return view('customer.profile', compact('orders'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/customer/login_form');
    }
    public function booking_cancel($id)
    {
        $booking = Booking::findOrFail($id);
        if ($booking->user_id != Auth::id()) {
            return redirect()->route('err');
        }
        $booking->status = 'cancelled';
        if ($booking->save()) {
            return back()->with('error', 'booking cancell       ed');
        }
    }
    public function booking_date($id, Request $request)
    {
        $booking = Booking::findOrFail($id);
        if ($booking->user_id != Auth::id()) {
            return redirect()->route('err');
        }
        $order_date = $request->input('starts_at');
        $upto_date = $request->input('ends_at');
        if ($order_date == '' || $order_date == null || $upto_date == null || $upto_date == '') {
            return back()->with('error', 'update dates are required');
        }
        $booking->order_date = $order_date;
        $booking->upto_date = $upto_date;
        if ($booking->save()) {
            return back()->with('success', 'dates updated');
        }
    }
    public function heart(Request $request)
    {
        // return response()->json('hii');
        $venue_id = $request->input('venue_id');
        $user_id = $request->input('user_id');
        $user = User::findOrFail($user_id);
        $venue = Venue::findOrFail($venue_id);
        // check if already liked
        if ($user->hearts()->where('venue_id', $venue_id)->exists()) {
            // if already liked, you can either ignore or toggle (unlike)
            $user->hearts()->detach($venue_id);
            return response()->json(['status' => 'unliked']);
        } else {
            // attach a like
            $user->hearts()->attach($venue_id, ['category' => 'venue']);
            return response()->json(['status' => 'liked']);
        }
    }
    public function liked_venues()
    {
        $user = User::findOrFail(Auth::id());
        // All venues the user liked
        $venuess = $user->hearts()
            ->with('venueimages')   // assumes Venue::venueimages() relationship
            ->get();

        $venues = $venuess->map(function ($e) {
            return [
                'id'     => $e->id,
                'venue_name'   => $e->venue_name,
                'venue_city'=>$e->venue_city,
                'description'=>$e->venue_description,
                'doc' =>  optional($e->venueimages->first())->doc, // returns array of image paths
            ];
        });
        $paginate=false;
        return view('customer.likedvenues',compact('venues','paginate'));
        pr($venues->toArray());
    }
}
