<?php

namespace Modules\Posts\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostReaction extends Model
{
    use SoftDeletes;
    protected $fillable = ['user_id', 'reaction_id', 'post_id'];
    protected $with = ['user','reaction'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reaction()
    {
        return $this->belongsTo(Reaction::class);
    }
}
