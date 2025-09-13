<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Occasion extends Model
{
    public function venue(){
        return $this->belongsToMany(Venue::class,'venuetypes','venue_id','occasion_id');
    }
}
