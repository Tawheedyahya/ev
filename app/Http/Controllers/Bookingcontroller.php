<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Bookingcontroller extends Controller
{
    public function dashboard()
    {
        $provider_id = Auth::guard('venue_provider')->user()->id;
        // return $provider_id;
        $bookings = DB::table('bookings as b')
            ->leftJoin('venues as v', 'b.venue_id', '=', 'v.id')
            ->where('v.venue_provider_id', $provider_id)
            ->select('b.*','v.venue_name')->orderBy('b.id','desc')   // all booking fields
            ->get()->toArray();
        // pr($bookings);
        // $b=Booking::with('venue')->where();
        return view('venue_provider.bookings.dashboard',compact('bookings'));
    }
    public function approve($id){
       $booking=Booking::findOrFail($id);
       if($booking->status!='approved'){
        $booking->status='approved';
        $booking->notes='';
        if($booking->save()){
            return back()->with('success','booking approved successfully contact your client frequently');
        }
       }
       return back()->with('success','Already approved');
    }
    public function reject($id,Request $request){
        $booking=Booking::findOrFail($id);
        if($booking->status!='rejected'){
            $booking->status='rejected';
            $booking->notes=$request->input('rejection_note');
            if($booking->save()){
                return back()->with('error','booking rejected');
            }
        }
        return back()->with('error','Already booking rejected');
    }
}
