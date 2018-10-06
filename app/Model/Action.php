<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Action extends Model {

    protected $table = 'actions';
    public $timestamps = false;
    protected $fillable = [
        'user_id', 'actionable_id', 'actionable_type','action_type', 'action_key', 'action_value', 'action_group'
    ];

    public function actionable()
    {
        return $this->morphTo();
    }
    
    public function user() {
        return $this->belongsTo(\App\User::class);
    }

    public function insertAction($user_id, $actionable_id,$actionable_type, $action_type, $action_key, $action_value , $action_group = NULL) {

        $this->user_id = $user_id;
        $this->actionable_id = $actionable_id;
        $this->actionable_type = $actionable_type;
        $this->action_type  = $action_type;
        $this->action_key   = $action_key;
        $this->action_value = $action_value;
        $this->action_group = $action_group;
        return $this->save();
    }
    
    public function updateAction($actionable_id,$actionable_type, $action_type, $action_key, $action_value,$action_group = NULL) {
        $post_action = static::where('actionable_id', $actionable_id)->where('actionable_type', $actionable_type)->where('action_type', $action_type)->first();
        if (isset($post_action)) {
            $post_action->action_key = $action_key;
            $post_action->action_value = $action_value;
            $post_action->action_group = $action_group;
            return $post_action->save();
        } else {
            return $this->insertAction($actionable_id,$actionable_type, $action_type, $action_key, $action_value,$action_group);
        }
    }

    public static function deleteAction($actionable_id,$actionable_type, $action_type) {
        return static::where('actionable_id', $actionable_id)->where('actionable_type', $actionable_type)->where('action_type', $action_type)->delete();
    }

}
