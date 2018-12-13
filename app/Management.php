<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Management
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property string|null $company
 * @property string|null $description
 * @property string|null $website_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Management whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Management whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Management whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Management whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Management whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Management whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Management whereWebsiteUrl($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Category[] $categories
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Project[] $projects
 * @property-read \App\User $users
 */
class Management extends Model
{
    public function projects(){
        return $this->belongsToMany(Project::class);
    }
    public function users(){
        return $this->belongsTo(User::class,'id')->select('id','name','last_name','picture','phone_1','phone_2','state','slug','email','created_at');
    }
    public function categories(){
        return $this->belongsToMany(Category::class,'categories_management','management_id','category_id');
    }
}
