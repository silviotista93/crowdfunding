<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Donation
 *
 * @mixin \Eloquent
 * @property int $id
 * @property float $amount
 * @property int $project_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Donation whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Donation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Donation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Donation whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Donation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Donation whereUserId($value)
 */
class Donation extends Model
{
    public function projects(){
        return $this->belongsTo(Project::class);
    }
}
