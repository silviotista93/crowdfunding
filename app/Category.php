<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Category
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $category
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereUpdatedAt($value)
 * @property string $slug
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Management[] $managements
 * @property-read \App\Project $projects
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereSlug($value)
 */
class Category extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function projects(){
        return $this->hasOne(Project::class);
    }

    public function managements(){
        return $this->belongsToMany(Management::class);
    }
}
