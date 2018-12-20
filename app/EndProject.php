<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class EndProject extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
        'end_time',
    ];

    protected $guarded = [];

    public function getEndTimeAttribute($date){
        return new Date($date);
    }
}
