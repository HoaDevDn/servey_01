<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $fillable = [
        'sender_id',
        'recevier_id',
        'survey_id',
        'mail',
<<<<<<< HEAD
=======
        'number_answer',
>>>>>>> 502c1acb71f54042b858c3957071bf85add283df
        'status',
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
}
