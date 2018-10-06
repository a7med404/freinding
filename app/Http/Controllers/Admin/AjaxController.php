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

    public function postStatus(Request $request) {
        $response = false;
        if ($this->user->can(['access-all', 'post-type-all', 'post-all', 'post-edit'])) {
            $input = $request->all();
            $post = new Post();
            $response = $post->updatePostActive($input['id'], $input['status']);
        }

        return response()->json($response);
    }

    public function postRead(Request $request) {
        $response = false;
        if ($this->user->can(['access-all', 'post-type-all', 'post-all', 'post-edit'])) {
            $input = $request->all();
            $post = new Post();
            $response = $post->updatePostRead($input['id']);
        }

        return response()->json($response);
    }

    public function categoryStatus(Request $request) {
        $response = false;
        if ($this->user->can(['access-all', 'post-type-all', 'post-all', 'category-all', 'category-edit'])) {
            $input = $request->all();
            $category = new Category();
            $response = $category->updateCategoryActive($input['id'], $input['status']);
        }

        return response()->json($response);
    }

    public function searchStatus(Request $request) {
        $response = false;
        if ($this->user->can(['access-all', 'post-type-all', 'post-all'])) {
            $input = $request->all();
            $search = new Search();
            $response = $search->updateSearchActive($input['id'], $input['status']);
        }

        return response()->json($response);
    }

    public function commentStatus(Request $request) {
        $response = false;
        if ($this->user->can(['access-all', 'post-type-all', 'post-all', 'comment-all', 'comment-edit'])) {
            $input = $request->all();
            $comment = new Comment();
            $response = $comment->updateCommentActive($input['id'], $input['status']);
        }

        return response()->json($response);
    }

    public function commentRead(Request $request) {
        $response = false;
        if ($this->user->can(['access-all', 'post-type-all', 'post-all', 'comment-all', 'comment-edit'])) {
            $input = $request->all();
            $comment = new Comment();
            $response = $comment->updateCommentRead($input['id']);
        }

        return response()->json($response);
    }

    public function contactRead(Request $request) {
        $response = false;
        if ($this->user->can(['access-all', 'post-type-all', 'post-all'])) {
            $input = $request->all();
            $contact = new Contact();
            $response = $contact->updateContactRead($input['id']);
        }

        return response()->json($response);
    }

    public function contactReply(Request $request) {
        $response = false;
        if ($this->user->can(['access-all', 'post-type-all', 'post-all'])) {
            $input = $request->all();
            $contact = new Contact();
            $response = $contact->updateContactReply($input['id']);
        }

        return response()->json($response);
    }

}
