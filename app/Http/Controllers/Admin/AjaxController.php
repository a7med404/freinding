<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Model\Post;
use App\Model\Category;
use App\Model\Comment;
use App\Model\Contact;
use App\Model\Search;

class AjaxController extends AdminController {


    //****************************************************************
    public function userStatus(Request $request) {
        $response = false;
        if ($this->user->can(['access-all', 'user-all'])) {
            $input = $request->all();
            if ($input['id'] != 1) {
                $user = User::find($input['id']);
                $user->is_active = $input['status'];
                $response = $user->save();
            }
        }
        return response()->json($response);
    }

}
