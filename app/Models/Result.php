<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'answer_id',
        'sender_id',
        'recevier_id',
        'content',
        'name',
        'email',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($result) {
            $result->created_at = Carbon::now();
        });
    }

    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function recevier()
    {
        return $this->belongsTo(User::class, 'recevier_id');
    }
}
