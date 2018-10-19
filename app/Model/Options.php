<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;


class Options extends Model

{

    protected $table = 'options';
    public $timestamps = false;
    protected $fillable = [
         'option_type','option_key', 'option_value','option_etc','option_group','autoload'
    ];

    
    public function insertOption($option_type, $option_key,$option_value,$autoload = 1,$option_group = NULL,$option_etc = NULL) {
        
        $this->option_type    = $option_type;
        $this->option_key     = $option_key;
        $this->option_value   = $option_value;
        $this->option_etc     = $option_etc;
        $this->option_group   = $option_group;
        $this->autoload       = $autoload;
        return $this->save();       
    }

    
    public static function updateOption($option_key,$option_value,$autoload = 1,$option_group = NULL,$option_etc = NULL) {
        $option = static::where('option_type', $option_key)->where('option_key', $option_key)->first();
        if (isset($option)) {
            $option->option_value   = $option_value;
            $option->option_etc     = $option_etc;
            $option->option_group   = $option_group;
            $option->autoload       = $autoload;
            return $option->save();
        } else {
            return $this->insertOption($option_key, $option_key,$option_value,$autoload,$option_group);
        }
        
    }
    
    public function deleteOption($option_type) {
        return static::where('option_type', $option_type)->delete();
        
    }
    
    public function deleteOptionGroup($option_group) {
        return Options::where('option_group', $option_group)->delete();
        
    }
    public static function get_Option($option_group, $array_option_key) {
//         whereIn('option_group', $option_group)->
        $options = Options::whereIn('option_key', $array_option_key)->get();
        return $options;
    }
}


