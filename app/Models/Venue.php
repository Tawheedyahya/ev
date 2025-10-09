<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Venue extends Model
{
    public function occasion()
    {
        return $this->belongsToMany(Occasion::class, 'venuetypes', 'venue_id', 'occasion_id');
    }
    public function appvenuefacilitie()
    {
        return $this->belongsToMany(Occasion::class, 'appvenuefacilities', 'venue_id', 'venue_facilities');
    }
    public function venueimages()
    {
        return $this->hasMany(Venueimage::class, 'venue_id');
    }
    public function room()
    {
        return $this->hasMany(Room::class, 'venue_id');
    }
    public function provider()
    {
        return $this->belongsTo(Venueproviders::class, 'venue_provider_id', 'id');
    }
    public function booking(){
        return $this->belongsTo(Booking::class,'venue_id');
    }
    public function user()
    {
        return $this->belongsToMany(User::class, 'bookings', 'venue_id', 'user_id')->
            withPivot(['name','email','phone','status','notes','order_date','upto_date'])
            ;
    }
        public function hearts(){
        return $this->belongsToMany(User::class,'hearts','user_id','venue_id')->withPivot('category')->withTimestamps();
    }
}
