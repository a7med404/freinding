<?php

namespace Modules\Posts\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reaction extends Model
{
    use SoftDeletes;

    protected $fillable = ['name_en','name_ar','icon','is_active'];

    const ICONS_PATH = "/storage/images/reactions/";

    public function posts(){
        return $this->belongsToMany(Post::class);
    }

    public function comments(){
        return $this->belongsToMany(Comment::class);
    }

    public function replies(){
        return $this->belongsToMany(Reply::class);
    }

    public function getIconAttribute($value){
        return asset(self::ICONS_PATH.$value);
    }
//    public function getImageAttribute($value)
//    {
//        return ($value ? asset(self::IMAGE_URL_PATH . $value) : asset('storage/images/users/avatar.jpg'));
//    }

}
