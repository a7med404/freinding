<?php

namespace Modules\Posts\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaggedFriend extends Model
{
    use SoftDeletes;
    protected $fillable = ['post_id','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
