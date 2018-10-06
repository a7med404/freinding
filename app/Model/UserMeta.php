<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model {

    protected $table = 'user_meta';
    public $timestamps = false;
    protected $fillable = [
        'user_id', 'meta_type', 'meta_key', 'meta_value'
    ];

    public function user() {
        return $this->belongsTo(\App\User::class);
    }
    public function deleteMeta($user_id, $meta_type) {
        return static::where('user_id', $user_id)->where('meta_type', $meta_type)->delete();
    }

}
