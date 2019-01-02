<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function cities(){
        return $this->belongsTo(City::class)->select('city');
    }
    public function artist(){
        return $this->hasOne(Artist::class);
    }
    public function management(){
        return $this->hasOne(Management::class);
    }
}
