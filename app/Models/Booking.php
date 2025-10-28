<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    // public function user(){
    //     return $this->belongsTo(User::class,'user_id');
    // }
        public function venue(){
        return $this->hasMany(Venue::class,'venue_id');
    }
    public function dubvenue(){
        return $this->belongsTo(Venue::class,'venue_id');
    }
}
