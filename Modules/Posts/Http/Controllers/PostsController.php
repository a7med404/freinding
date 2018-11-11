<?php

namespace Modules\Posts\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Auth;
use Illuminate\Support\Facades\Response;
use Modules\Posts\Entities\Comment;
use Modules\Posts\Entities\Post;
use Modules\Posts\Entities\PostReaction;
use Modules\Posts\Entities\Reaction;
use App\Http\Controllers\Site\SiteController;

class PostsController extends SiteController
{

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        if ($this->site_open == 1 || $this->site_open == "1") {
            $user = Auth::user();
            $user_key = $user->name;
            $admin_panel = 0;
            if ($user->can(['access-all', 'post-type-all', 'post-all'])) {
                $admin_panel = 1;
            }
//            $title = 'Posts' . " &#8211; " . $this->site_title;
//            View::share('title', $title);
            $posts = Post::OrderBy('created_at', 'desc')->get();
//            return $posts;
            $reactions = Reaction::where('is_active', 1)->get();
            return view('posts::newsfeed', compact('user', 'posts', 'reactions', 'admin_panel', 'user_key'));
        } else {
            return redirect()->route('close');
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('posts::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('posts::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('posts::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {

    }

    public function react(Request $request)
    {
        $react = PostReaction::where('user_id', Auth::id())->where('post_id', $request->id)->first();
        $like = false;
        if ($react) {
            $success = $react->forceDelete();
            $like = false;
        } else {
            $newReact = new PostReaction();
            $newReact->user_id = Auth::id();
            $newReact->post_id = $request->id;
            $newReact->reaction_id = 1001;
            $success = $newReact->save();
            $like = true;
        }
        if ($success) {
            $post = Post::wherekey($request->id)->first();
            $engagement = $post->reactions->count();
            $engagement += $post->supportFriends->count();
            $engagement += $post->comments_count;
            foreach ($post->comments as $comment) {
                $engagement += $comment->replies->count();
            }
            $comment_count = $post->comments_count;
            $reactioners = "";

            if ($post->reactions->count() > 2) {
                $reactioners = '<a href="#">' . $post->reactions[0]->user->display_name .
                    '</a>, <a href="#">' . $post->reactions[1]->user->display_name . '</a> and <br>' .
                    ($post->reactions->count() - 2) . ' more react this';
            } elseif ($post->reactions->count() == 2) {
                $reactioners = '<a href="#">' . $post->reactions[0]->user->display_name . '</a>, <a
                                    href="#">' . $post->reactions[1]->user->display_name . '</a>';
            } elseif ($post->reactions->count() == 1) {
                $reactioners = '<a href="#">' . $post->reactions[0]->user->display_name . '</a>';
            }
            $reactioners_photos = '';
            $loop = 0;
            foreach ($post->reactions as $reaction) {
                if ($loop < 5) {
                    $reactioners_photos = $reactioners_photos . '<li>
                                    <a href="#">
                                        <img src="' . $reaction->user->image . '" alt="friend">
                                    </a>
                                </li>';
                    $loop++;
                } else {
                    break;
                }
            }

            $react_count = $post->reactions->count();

            return Response::json(['success' => $success, 'engagement' => $engagement, 'comment_count' => $comment_count,
                'reactioners' => $reactioners, 'reactioners_photos' => $reactioners_photos, 'react_count' => $react_count
                , 'like' => $like]);
        } else {
            return Response::json(['success' => $success]);
        }

    }

    public function usersReactions(Request $request){
        $data = PostReaction::where('post_id',$request->id)->paginate(25);
//        dd($data->count());
//        dd($data->currentPage());
//        dd($data->hasMorePages());
//        dd($data->nextPageUrl());
//        dd($data->items());
        return $data;
    }

    public function newComment(Request $request){
       $newComment = new Comment();
       $newComment->user_id=Auth::id();
       $newComment->post_id=$request->id;
       $newComment->text=$request->comment;
       $success = $newComment->save();

        $post = Post::wherekey($request->id)->first();

        $engagement = $post->reactions->count();
        $engagement += $post->supportFriends->count();
        $engagement += $post->comments_count;
        foreach ($post->comments as $comment) {
            $engagement += $comment->replies->count();
        }
        $comment_count = $post->comments_count;
        $reactioners = "";

        if ($post->reactions->count() > 2) {
            $reactioners = '<a href="#">' . $post->reactions[0]->user->display_name .
                '</a>, <a href="#">' . $post->reactions[1]->user->display_name . '</a> and <br>' .
                ($post->reactions->count() - 2) . ' more react this';
        } elseif ($post->reactions->count() == 2) {
            $reactioners = '<a href="#">' . $post->reactions[0]->user->display_name . '</a>, <a
                                    href="#">' . $post->reactions[1]->user->display_name . '</a>';
        } elseif ($post->reactions->count() == 1) {
            $reactioners = '<a href="#">' . $post->reactions[0]->user->display_name . '</a>';
        }
        $reactioners_photos = '';
        $loop = 0;
        foreach ($post->reactions as $reaction) {
            if ($loop < 5) {
                $reactioners_photos = $reactioners_photos . '<li>
                                    <a href="#">
                                        <img src="' . $reaction->user->image . '" alt="friend">
                                    </a>
                                </li>';
                $loop++;
            } else {
                break;
            }
        }

        $react_count = $post->reactions->count();
        $newestComment = $post->newest_comment;
        $newestComment['humansDate'] = $newestComment->created_at->diffForHumans();
        $newestComment['commentReactions'] = $newestComment->reactions->count();
        return Response::json(['success' => $success, 'engagement' => $engagement, 'comment_count' => $comment_count,
            'reactioners' => $reactioners, 'reactioners_photos' => $reactioners_photos, 'react_count' => $react_count
        ,'newestComment'=>$newestComment]);
    }
}
