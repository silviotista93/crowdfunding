<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    public function question (){

        return $this->hasMany(question::class);
    }


}
