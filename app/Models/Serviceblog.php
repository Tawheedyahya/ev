<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serviceblog extends Model
{
    public function provider(){
        return $this->belongsTo(Serviceproviders::class,'serviceproviderid');
    }
}
