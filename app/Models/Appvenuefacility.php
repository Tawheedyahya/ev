<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appvenuefacility extends Model
{
    public function venue(){
        return $this->belongsToMany(Venue::class,'venuetypes','venue_id','venue_facility');
    }
}
