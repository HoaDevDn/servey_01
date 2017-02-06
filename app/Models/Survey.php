<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Survey extends Model
{
    protected $fillable = [
        'title',
        'user_id',
        'feature',
        'token',
    ];

    public function invites()
    {
        return $this->hasMany(Invite::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function setTokenAttribute($value)
    {
        return $this->attributes['token'] = (strlen($value) >= 32) ? $value : md5(uniqid(rand(), true));
    }

    public function getIsLikedAttribute()
    {
        $like = $this->likes()->where('user_id', Auth::id())->first();

        return (!is_null($like)) ? true : false;
    }
}
