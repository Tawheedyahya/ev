<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professionlist extends Model
{
    public function professions(){
        return $this->hasOne(Professional::class,'profession','id');
    }
}
