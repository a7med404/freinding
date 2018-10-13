<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
class Comment extends Model

{

    protected $table = 'comments';
    protected $fillable = [
        'user_id','visitor', 'name', 'email','commentable_id',
        'commentable_type','parent_id','content','comment_format','is_read','is_active','update_by'
    ];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function commentMeta() {
        return $this->hasMany(\App\Model\CommentMeta::class);
    }
    
    public function childrens() {
        return $this->hasMany(\App\Model\Comment::class, 'parent_id');
    }

    public function parentID() {
        return $this->belongsTo(\App\Model\Comment::class, 'parent_id');
    }
    
    public static function updateCommentColum($id,$colum,$valcolum) {
        $comment = static::findOrFail($id);
        $comment->$colum  = $valcolum;
        return $comment->save();
        
    }
    
    public static function updateCommentUser($id,$user_id,$name,$email) {
        $comment = static::findOrFail($id);
        $comment->user_id = $user_id;
        $comment->name = $name;
        $comment->email = $email;
        return $comment->save();
        
    }
    
    public static function updateCommentRead($id) {
        $comment = static::findOrFail($id);
        $comment->is_read  = 1;
        return $comment->save();
        
    }
    
    public static function countUnRead() {
        return static::where('is_read', 0)->count();
    }
    
    public static function countChild($parent_id) {
        return static::where('parent_id', $parent_id)->where('is_active', 1)->count();
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


//$comments = Comment::where('parent_id', '0')->orderBy('comment_id', 'asc')->get();
//
//$result = array();
//foreach ($comments as $comment) {
//    $list = array();
//    $list = array_merge($list, [['comment_id' => $comment->comment_id, 'parent_id' => $comment->parent_id, 'comment' => $comment->comment]]);
//    $result = array_merge($result, $this->get_child_comment($comment->comment_id, 0, $list));
//}
//
//function get_child_comment($pid, $level, $list = array()) {
//    $sub_comments = Comment::where('parent_id', '=', $pid)->where('comment_id', '!=', $pid)->orderBy('comment_id', 'asc')->get();
//    foreach ($sub_comments as $sub_comment) {
//        $space = "&nbsp;";
//        $sigm = '-';
//        for ($j = 0; $j <= $level; $j++) {
//            $space .= $space;
//        }
//        for ($j = 0; $j <= $level; $j++) {
//            $space .= $sigm;
//        }
//        $sub_comment->comment = html_entity_decode($space, ENT_QUOTES, "utf-8") . ' ' . $sub_comment->comment;
//
//        $list = array_merge($list, array(['comment_id' => $sub_comment->comment_id, 'parent_id' => $sub_comment->parent_id, 'comment' => $sub_comment->comment]));
//
//        $list = $this->get_child_comment($sub_comment->comment_id, $level + 1, $list);
//    }
//    return $list;
//}
//
//foreach ($result as $val) {
//    echo $val['comment'] . '<br>';
//}