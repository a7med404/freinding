<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    protected $table = 'categories';
    protected $fillable = [
        'name', 'link', 'type', 'content', 'parent_id', 'order_id', 'user_id', 
        'is_active', 'icon_image', 'icon', 'update_by'
    ];

    public function categoryMeta() {
        return $this->hasMany(\App\Model\CategoryMeta::class);
    }

    public function posts() {
        return $this->belongsToMany(\App\Model\Post::class);
    }

    public function user() {
        return $this->belongsToMany(\App\User::class);
    }

    public function childrens() {
        return $this->hasMany(\App\Model\Category::class, 'parent_id');
    }

    public function parentID() {
        return $this->belongsTo(\App\Model\Category::class, 'parent_id');
    }

    public static function foundLink($link, $type = "main") {
        $link_found = static::where('link', $link)->where('type', $type)->first();
        if (isset($link_found)) {
            return 1;
        } else {
            return 0;
        }
    }

    public static function updateCategoryColum($id, $colum,$valcolum) {
        $category = static::findOrFail($id);
        $category->colum = $valcolum;
        return $category->save();
    }

    public static function get_categoryID($id,$colum) {
        $category = Category::where('id', $id)->first();
        return $category->$colum;
    }
    public static function get_category_ParentID($id) {
        $subcategories = Category::where('parent_id', $id)->get();
        return $subcategories;
    }


}

//$categories = Category::with('children')
//->where('parent_id', '=', 0)
//->get();
//
//<ul>
//@foreach ($categories as $parent)
//<li>
//<input type="checkbox" id="md_checkbox_{{ $parent->category_id }}"
//class="filled-in chk-col-pink category_id" value="{{ $parent->category_id }}" />
//<label for="md_checkbox_{{ $parent->category_id }}">{{ $parent->category_name }}</label>
//
//@if ($parent->children->count())
//<ul>
//@foreach ($parent->children as $child)
//<li>
//<input type="checkbox" id="md_checkbox_{{ $child->category_id }}" class="filled-in chk-col-pink category_id" value="{{ $child->category_id }}" />
//<label for="md_checkbox_{{ $child->category_id }}">{{ $child->category_name }}</label>
//</li>
//@if ($child->children->count())
//<ul>
//@foreach ($child->children as $child)
//<li>
//<input type="checkbox" id="md_checkbox_{{ $child->category_id }}" class="filled-in chk-col-pink category_id" name="categroy_id" value="{{ $child->category_id }}" />
//<label for="md_checkbox_{{ $child->category_id }}">{{ $child->category_name }}</label>
//</li>
//@endforeach
//</ul>
//@endif
//@endforeach
//</ul>
//@endif
//</li>
//@endforeach
