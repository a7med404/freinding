<?php

namespace Modules\Posts\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'text', 'type', 'dir', 'view_count', 'is_pined', 'privacy', 'time', 'is_boost', 'check_in','post_id','social_network_id'];
    protected $appends=['newest_comment','is_liked'];
    protected $with=['user'/*,'comments'*/,'reactions','files','taggedFriends','supportFriends','topics','post'];
    protected $withCount=['comments'];

    public function getNewestCommentAttribute(){
      return Comment::where('post_id',$this->id)->orderBy('created_at','desc')->first();
    }

    public function getIsLikedAttribute(){
        return PostReaction::where('post_id',$this->id)->where('user_id',\Auth::id())->count()>0;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at','desc');
    }

    public function reactions(){
        return $this->hasMany(PostReaction::class)->orderBy('created_at','desc');
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
    public function Posts()
    {
        return $this->hasMany(post::class);
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function social_network()
    {
        return $this->belongsTo(social_network::class);
    }
}
