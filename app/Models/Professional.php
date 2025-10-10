<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Professional extends User
{
    public function proserviceplace(){
        return $this->belongsToMany(Serviceplace::class,'proserviceplaces','pro_id','ser_id');
    }
    public function professionlist(){
        return $this->belongsTo(Professionlist::class,'profession','id');
    }
      public function professionalbooking(){
        return $this->belongsTo(Professional::class,'professional_id','id');
    }
}
