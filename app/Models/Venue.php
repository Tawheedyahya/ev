<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    public function occasion(){
        return $this->belongsToMany(Occasion::class,'venuetypes','venue_id','occasion_id');
    }
    public function appvenuefacilitie(){
        return $this->belongsToMany(Occasion::class,'appvenuefacilities','venue_id','venue_facilities');
    }
    public function venueimages(){
        return $this->hasMany(Venueimage::class,'venue_id');
    }
    public function room(){
        return $this->hasMany(Room::class,'venue_id');
    }
}
