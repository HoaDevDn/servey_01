<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
<<<<<<< HEAD
    protected $table = 'requests';

=======
>>>>>>> 502c1acb71f54042b858c3957071bf85add283df
    protected $fillable = [
        'content',
        'status',
        'admin_id',
        'action_type',
        'member_id',
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function member()
    {
        return $this->belongsTo(User::class, 'member_id');
    }
}
