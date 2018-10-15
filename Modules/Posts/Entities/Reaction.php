<?php

namespace Modules\Posts\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reaction extends Model
{
    use SoftDeletes;

    protected $fillable = ['name_en','name_ar','icon','is_active'];

    public static $icons_path = "/storage/images/reactions/";

    public function posts(){
        return $this->belongsToMany(Post::class);
    }

    public function comments(){
        return $this->belongsToMany(Comment::class);
    }

    public function replies(){
        return $this->belongsToMany(Reply::class);
    }


}
