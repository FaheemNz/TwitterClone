<?php

namespace App;

use App\Traits\Followable;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, Followable;

    protected $fillable = ['name', 'email', 'password', 'username', 'avatar'];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = ['email_verified_at' => 'datetime'];

    // Logic
    public function getTimeline()
    {
        $ids = $this->follows()->pluck('id')->push($this->id);
        return Tweet::whereIn('user_id', $ids)->withLikes()->latest()->get();
    }

    public function tweets()
    {
        return $this->hasMany('App\Tweet');
    }
    
    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    // Mutators
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
    
    // Accessors    
    public function getAvatarAttribute($value): string
    {
        return asset($value ?? 'Default.png');
    }
    
    public function getCreatedAtAttribute($time): string
    {
        return Carbon::parse($time)->diffForHumans();
    }
}
