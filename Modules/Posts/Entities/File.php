<?php

namespace Modules\Posts\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use SoftDeletes;

    const IMAGES_POSTS_PATH = "/storage/images/posts/";
    const VIDEOS_POSTS_PATH = "/storage/videos/posts/";

    protected $fillable = ['dependent_id', 'type', 'real_name', 'store_name', 'extension'];

    public function post()
    {
        return $this->belongsTo(Post::class,'dependent_id','id')->where($this->type, '==', 'post');
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class,'dependent_id','id')->where($this->type, '==', 'comment');
    }

    public function reply()
    {
        return $this->belongsTo(Reply::class,'dependent_id','id')->where($this->type, '==', 'reply');
    }

    public function getStoreNameAttribute($value){
        return $this->extension=='mp4'?asset(self::VIDEOS_POSTS_PATH.$value.'.'.$this->extension):asset(self::IMAGES_POSTS_PATH.$value.'.'.$this->extension);
    }
}
