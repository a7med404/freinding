<?php

namespace Modules\Posts\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use SoftDeletes;
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
}
