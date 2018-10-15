<?php

namespace Modules\Posts\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'text', 'type', 'dir', 'view_count', 'is_pined', 'privacy', 'time', 'is_boost', 'check_in'];

    protected $with=['user','comments','reactions','files','taggedFriends','supportFriends','topics'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function reactions(){
        return $this->belongsToMany(Reaction::class);
    }

    public function files(){
        return $this->hasMany(File::class,'dependent_id','id')->where('type','=','post');;
    }

    public function taggedFriends(){
        return $this->hasMany(TaggedFriend::class);
    }

    public function supportFriends(){
        return $this->hasMany(SupportFriend::class);
    }

    public function topics(){
        return $this->belongsToMany(Topic::class);
    }
}
