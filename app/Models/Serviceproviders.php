<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Serviceproviders extends Authenticatable
{
        protected $hidden = [
        'password',
        'remember_token',
    ];
    public function places(){
        return $this->belongsToMany(Serviceplace::class,'serserviceplaces','serpro_id','serpla_id');
    }
    public function serserplace(){
        return $this->hasMany(Serfacility::class,'serpro_id');
    }
    public function categories(){
        return $this->belongsTo(Servicecategory::class,'category');
    }
    public function blogs(){
        return $this->hasMany(Serviceblog::class,'serviceproviderid');
    }
}
