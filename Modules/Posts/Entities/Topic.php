<?php

namespace Modules\Posts\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    use SoftDeletes;
    protected $fillable = ['name'];

    public function topics(){
        return $this->belongsToMany(Post::class);
    }
}
