<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * App\Artist
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property string|null $nickname
 * @property string $biography
 * @property string|null $website_url
 * @property string|null $facebook
 * @property string|null $instagram
 * @property string|null $youtube
 * @property int $level_id
 * @property int $country_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Artist whereBiography($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Artist whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Artist whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Artist whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Artist whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Artist whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Artist whereLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Artist whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Artist whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Artist whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Artist whereWebsiteUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Artist whereYoutube($value)
 * @property-read \App\Country|null $countries
 * @property-read \App\Level|null $levels
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Project[] $projects
 * @property-read \App\User $users
 */
class Artist extends Model
{
    protected $fillable = ['user_id','nickname','biography','website_url','facebook','instagram','youtube','level_id','country_id'];

    public function projects(){
        return $this->belongsToMany(Project::class,'artist_projects','artist_id','project_id');
    }

    public function levels(){
       return $this->belongsTo(Level::class,'level_id')->select('id','level');
    }

    public function countries(){
        return $this->belongsTo(Country::class,'country_id');
    }
    public function users(){
        return $this->belongsTo(User::class,'user_id')->select('id','name','last_name','picture','phone_1','phone_2','state','slug','email','created_at');
    }


    public function answers(){
        return $this->belongsToMany(Answer::class,'answer_artist','answer_id','artist_id');
    }

    /**
     * Consultas $
     */

}
