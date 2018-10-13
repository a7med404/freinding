<?php

namespace Modules\Posts\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Reply extends Model
{
    use SoftDeletes;
    protected $fillable = ['user_id','comment_id','text'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function files(){
        return $this->hasMany(File::class)->where('type','=','reply');
    }

    public function reactions(){
        return $this->belongsToMany(Reaction::class);
    }

    public function comment(){
        return $this->belongsTo(Comment::class);
    }
}
