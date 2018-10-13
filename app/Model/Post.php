<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class Post extends Model {


    protected $fillable = [
        'user_id','update_by','parent_id' ,'name', 'link', 'type', 'image' ,'view_count','description','content'
        ,'comment_count', 'order_id','is_comment','is_read', 'is_active'
    ];

    public function user() {
        return $this->belongsTo(\App\User::class);
    }
    
    public function categories(){
        return $this->belongsToMany(\App\Model\Category::class);
    }
    
    public function actions() {
        return $this->morphMany(\App\Model\Action::class, 'actionable');
    }

    public function comments() {
        return $this->morphMany(\App\Model\Comment::class, 'commentable');
    }

    public function postMeta() {
        return $this->hasMany(\App\Model\PostMeta::class);
    }
 
    public static function updatePostViewCount($id) {
        return static::where('id', $id)->increment('view_count');
    }

    public static function countPostUnRead() {
        return static::where('is_read', 0)->count();
    }

    public static function countPostTypeUnRead($type = 'post') {
        return static::where('type', $type)->where('is_read', 0)->count();
    }
    
    public static function updatePostColumn($id, $column,$column_value) {
        $post = static::findOrFail($id);
        $post->$column = $column_value;
        return $post->save();
    }
    
    public static function postData($id,$column = 'name'){

        $post = static::where('id', $id)->first();
        if(isset($post)){
        return $post->$column;
        }
    }
    
    public static function lastMonth($month,$date){

        $count = static::select(DB::raw('COUNT(*)  count'))->whereBetween(DB::raw('created_at'), [$month, $date])->get();
        return $count[0]->count;
    }
    
    public static function lastWeek($week,$date){

        $count = static::select(DB::raw('COUNT(*)  count'))->whereBetween(DB::raw('created_at'), [$week, $date])->get();
        return $count[0]->count;
    }
    
    public static function lastDay($day,$date){

        $count = static::select(DB::raw('COUNT(*)  count'))->whereBetween(DB::raw('created_at'), [$day, $date])->get();
        return $count[0]->count;
    }
}