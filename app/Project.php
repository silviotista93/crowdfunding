<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Project
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property string $short_description
 * @property string|null $description
 * @property string|null $project_picture
 * @property string $status
 * @property string|null $iframe_video
 * @property string|null $end_time
 * @property float $price
 * @property string $slug
 * @property int $category_id
 * @property int|null $update_id
 * @property int $previous_approved
 * @property int $previous_rejected
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereIframeVideo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project wherePreviousApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project wherePreviousRejected($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereProjectPicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereUpdateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereUpdatedAt($value)
 */
class Project extends Model
{
    const REVISION = 1;
    const PREAPPROVAL = 2;
    const APPROVAL = 3;
    const PUBLISHED = 4;
    const REJECTED = 5;

    public function category(){
        return $this->belongsTo(Category::class)->select('id','category');
    }
    public function updates(){
        return $this->hasMany(Update::class)->select('id','project_id','title','description','media','created_at');
    }

    public function donations(){
        return $this->hasMany(Donation::class)->select('id','user_id','project_id','amount','created_at');
    }

    public function reviews(){
        return $this->hasMany(Review::class)->select('id','user_id','project_id','rating','comment','created_at');
    }

    public function rewards(){
        return $this->hasMany(Reward::class)->select('id','title','description','price','project_id','created_at');
    }

    public function artists(){
        return $this->belongsToMany(Artist::class,'artist_projects','project_id','artist_id');
    }

    public function management(){
        return $this->belongsToMany(Management::class,'management_project','project_id','management_id');
    }
}
