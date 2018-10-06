<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model {

    protected $table = 'category_post';
    public $timestamps = false;
    protected $fillable = [
         'category_id','post_id'
    ];
    public static function foundCategoryPost($post_id, $category_id) {

        $category  = self::where('post_id', $post_id)->where('category_id', $category_id)->first();
        if (isset($category)) {
            return 1;
        }  else {
            return 0;
        }
    }
    
    public static function deleteCategoryPost($post_id, $category_id) {
        return self::where('post_id', $post_id)->where('category_id', $category_id)->delete();
    }
    
    public static function deletePost($post_id) {
        return self::where('post_id', $post_id)->delete();
    }
    
    
    public static function deleteCategory($category_id) {
        return self::where('category_id', $category_id)->delete();
    }
}

