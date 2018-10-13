<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CommentMeta extends Model {

    protected $table = 'comment_meta';
    public $timestamps = false;
    protected $fillable = [
        'comment_id', 'meta_type', 'meta_key', 'meta_value'
    ];

    public function comment() {
        return $this->belongsTo(\App\Model\Comment::class);
    }

    public static function deleteMeta($comment_id, $meta_type) {
        return static::where('comment_id', $comment_id)->where('meta_type', $meta_type)->delete();
    }

}
