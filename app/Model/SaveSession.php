<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SaveSession extends Model
{
    protected $table = 'save_session';
    protected $fillable = [
        'user_id', 'session_id', 'start_time', 'last_activity_time'
    ];

    public function user() {
        return $this->belongsTo(\App\User::class);
    }
}
