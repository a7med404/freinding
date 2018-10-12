<?php

namespace Modules\Posts\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    protected $fillable = ['user_id','post_id','text'];
    protected $with = ['user','post','replies','reactions','files'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function replies(){
        return $this->hasMany(Reply::class);
    }

    public function reactions(){
        return $this->belongsToMany(Reaction::class);
    }

    public function files(){
        return $this->hasMany(File::class)->where('type','=','comment');
    }


}
