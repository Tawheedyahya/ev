<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Roomcontroller extends Controller
{
    public function dashboard($id = null)
    {
        // $id = $id;
        $rooms = Venue::with('room')->findOrFail($id)->toArray()['room'];
        // pr($rooms);
        return view('venue_provider.room.dashboard', compact('id', 'rooms'));
    }
    public function add_rooms($id, Request $request, $room_id = null)
    {
        if ($room_id) {
            $room = Room::findOrFail($room_id);
            return view('venue_provider.room.add_room', compact('id', 'room'));
        }
        // echo $id;
        // return;
        return view('venue_provider.room.add_room', compact('id'));
    }
    public function insert_room($id, Request $request, $room_id = null)
    {
        if ($room_id) {
            // echo 'hii';
            $this->validate($request, $room_id);
            DB::transaction(function () use ($request, $id, $room_id) {
                return $this->room_details_insert($request, $id, $room_id);
            });
            return back()->with('success','room details updated');
        }
        $this->validate($request);
        if (!$room_id || $room_id == null) {
            DB::transaction(function () use ($request, $id, $room_id) {
                return $this->room_details_insert($request, $id, $room_id);
            });
            return back()->with('success', 'room inserted');
        }
    }
    public function validate($request, $room_id = null)
    {
        if ($room_id) {
            $request->validate([
                'room_name' => 'required',
                'room_capacity' => 'required',
                // 'room_doc'=>'required|mimes:png,jpg'
            ]);
            return;
        }
        $request->validate([
            'room_name' => 'required',
            'room_capacity' => 'required',
            'room_doc' => 'required|mimes:png,jpg'
        ]);
        return;
    }
    public function room_details_insert($request, $id, $room_id = null)
    {
        if ($room_id) {
            $room = Room::findOrFail($room_id);
        }
        if (!$room_id || $room_id == null) {
            // echo 'hi';
            // return;
            $room = new Room();
        }
        $room->room_name = $request->input('room_name');
        $room->venue_id = (int)$id;
        $room->room_capacity = $request->input('room_capacity');
        @$room_doc = $room->room_doc;
        if ($request->hasFile('room_doc')) {
            if ($room_doc != '') {
                if (file_exists(public_path("$room_doc"))) {
                    @unlink(public_path($room_doc));
                    echo 'hi';
                }
            }
            $file = $request->file('room_doc');
            $file_name = time() . Str::slug($request->input('room_name')).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('room_images'), $file_name);
            $room->room_doc = "room_images/$file_name";
        }
        if ($room->save()) {
            return;
        }
    }
    public function delete_room($id,$room_id){
        $room=Room::findOrFail($room_id);
        $room->delete();
        return back()->with('error','room deleted');
    }
}
