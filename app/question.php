<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    public function survey (){

        return $this->hasOne(Survey::class);
    }

    public function answer(){

        return $this->hasMany(Answer::class);
    }
}
