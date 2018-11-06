<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\City
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $city
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereUpdatedAt($value)
 */
class City extends Model
{
    public function countries(){
        return $this->hasOne(Country::class);
    }
}
