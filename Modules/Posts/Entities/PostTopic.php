<?php

namespace Modules\Posts\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostTopic extends Model
{
    use SoftDeletes;
    protected $fillable = ['post_id','topic_id'];

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function topic(){
        return $this->belongsTo(Topic::class);
    }
}
