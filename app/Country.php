<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Country
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $country
 * @property int $city_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereUpdatedAt($value)
 */
class Country extends Model
{
    public function cities(){
        return $this->belongsTo(City::class)->select('city');
    }
    public function artist(){
        return $this->hasOne(Artist::class);
    }
}
