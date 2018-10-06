<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserSearch extends Model {

    protected $table = 'user_search';
    protected $fillable = [
        'search_id','user_id', 'visitor', 'country_name', 'region_name' ,'city', 'latitude', 'longitude','result_count'
    ];

    public function search() {
        return $this->belongsTo(\App\Model\Search::class);
    }

    public static function updateSearchCount($visitor,$user_id) {
        return static::where('visitor', $visitor)->where('user_id', 0)->update(['user_id' => $user_id]);
    }
}
