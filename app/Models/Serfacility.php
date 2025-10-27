<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serfacility extends Model
{
    public function service_provider(){
        return $this->belongsTo(Serviceproviders::class,'serpro_id');
    }
}
