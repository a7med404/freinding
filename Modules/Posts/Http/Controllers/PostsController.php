<?php

namespace Modules\Posts\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Auth;
use Modules\Posts\Entities\Post;
use Modules\Posts\Entities\Reaction;
use App\Http\Controllers\Site\SiteController;

class PostsController extends SiteController {

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index() {
        if ($this->site_open == 1 || $this->site_open == "1") {
            $user = Auth::user();
            $user_key = $user->name;
            $admin_panel =0;
            if ($user->can(['access-all', 'post-type-all', 'post-all'])) {
                $admin_panel = 1;
            }
//            $title = 'Posts' . " &#8211; " . $this->site_title;
//            View::share('title', $title);
            $posts = Post::OrderBy('created_at', 'desc')->get();
            $reactions = Reaction::where('is_active', 1)->get();
//        dd(Auth::user());
//        return $posts;
            return view('posts::newsfeed', compact('user','posts', 'reactions', 'admin_panel', 'user_key'));
        } else {
            return redirect()->route('close');
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create() {
        return view('posts::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request) {
        
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show() {
        return view('posts::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit() {
        return view('posts::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request) {
        
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy() {
        
    }

}
