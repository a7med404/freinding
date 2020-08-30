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

    public static function getUserMeta($user_id, $colum = '') {
        $user = static::where('user_id', $user_id)->first();
        if (!empty($user)) {
            $user_data = json_decode($user, TRUE);
            if (!empty($colum)) {
                return $user_data[$colum];
            } else {
                return $user_data;
            }
        } else {
            return [];
        }
    }
home
}
