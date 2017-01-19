<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $fillable = [
        'sender_id',
        'recevier_id',
        'survey_id',
        'token',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function recevier()
    {
        return $this->belongsTo(User::class, 'recevier_id');
    }

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    public function setTokenAttribute()
    {
        $this->attributes['token'] = md5(uniqid(rand(), true));
    }
}
