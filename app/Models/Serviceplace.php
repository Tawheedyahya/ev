<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serviceplace extends Model
{
    public function proserviceplace(){
        return $this->belongsToMany(Professional::class,'proserviceplaces','pro_id','ser_id');
    }
}
