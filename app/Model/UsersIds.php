<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UsersIds extends \Eloquent
{
    protected $table = 'users_ids';
    protected $fillable = [
        'user_id', 'id_image', 'status'
    ];

    public function user() {
        return $this->belongsTo(\App\User::class);
    }
}
