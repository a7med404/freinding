<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class social_network extends Model
{
	use SoftDeletes;	
	
     public function Post()
    {
        return $this->hasMany(post::class);
    }
}
