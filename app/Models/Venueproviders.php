<?php

namespace App\Models;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Venueproviders extends User
{
    protected $guarded=[];
    public function venue(){
        return $this->hasMany(Venue::class,'venue_provider_id','id');
    }
}
