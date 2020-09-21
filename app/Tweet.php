<?php

namespace App;

use App\Traits\Likeable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use Likeable;

    protected $guarded = [];

    // Logic
    

    // Relationships
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // Accessors
    public function getCreatedAtAttribute($time)
    {
        return Carbon::parse($time)->diffForHumans();
    }
}