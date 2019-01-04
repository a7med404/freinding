<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProfileStage extends Model
{
    protected $table = 'profile_stage';
    protected $fillable = [
        'user_id', 'stage'
    ];

    public function user() {
        return $this->belongsTo(\App\User::class);
    }
}
