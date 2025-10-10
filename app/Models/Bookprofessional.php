<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookprofessional extends Model
{
    public function professionals(){
        return $this->belongsTo(Professional::class,'professional_id','id');
    }
}
