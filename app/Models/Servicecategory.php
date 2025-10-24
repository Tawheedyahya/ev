<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicecategory extends Model
{
    public function provider(){
        return $this->hasOne(Serviceproviders::class,'category');
    }
}
