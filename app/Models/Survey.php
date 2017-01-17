<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
=======
>>>>>>> 502c1acb71f54042b858c3957071bf85add283df
use Carbon\Carbon;

class Survey extends Model
{
    protected $fillable = [
        'title',
        'user_id',
        'feature',
        'token',
<<<<<<< HEAD
        'token_manage',
        'status',
        'deadline',
        'description'
=======
        'status',
        'deadline',
        'description',
        'mail',
>>>>>>> 502c1acb71f54042b858c3957071bf85add283df
    ];

    public function invites()
    {
        return $this->hasMany(Invite::class);
    }

    public function settings()
    {
        return $this->hasMany(Setting::class);
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

<<<<<<< HEAD
    public function getIsLikedAttribute()
    {
        $like = $this->likes()->where('user_id', Auth::id())->first();

        return (!is_null($like)) ? true : false;
    }

    public function getDeadlineAttribute()
    {
        return (!empty($this->attributes['deadline'])) ? Carbon::parse($this->attributes['deadline'])->format('Y/m/d H:i') : null;
=======
    public function getDeadlineAttribute()
    {
        return (!empty($this->attributes['deadline']))
            ? Carbon::parse($this->attributes['deadline'])->format('Y/m/d H:i')
            : null;
    }

    public function temps()
    {
        return $this->hasMany(Temp::class);
>>>>>>> 502c1acb71f54042b858c3957071bf85add283df
    }
}
