<?php

namespace Modules\Posts\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Site\SiteController;
use App\User;
use Illuminate\Routing\Controller;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;
use Modules\Posts\Entities\Comment;
use Modules\Posts\Entities\File;
use Modules\Posts\Entities\Post;
use Modules\Posts\Entities\PostReaction;
use Modules\Posts\Entities\Reaction;
use Modules\Posts\Entities\Topic;
use TomLingham\Searchy\Facades\Searchy;
use App\Traits\Paginate;

class PostsController extends SiteController
{
    use Paginate;

    public function index()
    {
        $users = User::where('id', Auth::user()->id)->first();
        if ($users->birthdate == Null) {
            return redirect('registration-two');
        } else if ($users->nationality == Null) {
            return redirect('registration-three');
        }

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

            $users = User::where('id', '!=', Auth::id())->get();

            $reactions = Reaction::where('is_active', 1)->get();

            return view('posts::newsfeed', compact('user', 'posts', 'admin_panel', 'user_key', 'users', 'reactions'));
        } else {
            return redirect()->route('close');
        }
    }

    public function storePostsPhotosInTemp(Request $request)
    {
        if ($request->has('image')) {
            $manager = new ImageManager(array('driver' => 'gd'));
            $image = $manager->make($request->get('image', ''));
            $fileTempName = sha1(time() . (int)rand(10000, 1000000)) . '.' . explode('/', $image->mime())[1];
            $image->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('app/public/temp/' . $fileTempName));
            $image->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('app/public/temp/mini_' . $fileTempName));
            $x = asset('storage/temp/' . $fileTempName);
//            $image->save(storage_path('app/public/images/'.$request->get('table').'/' . $fileTempName));
//            $x = asset('storage/images/'.$request->get('table').'/' . $fileTempName);
        } else {
            $img = Storage::disk('public')->putFileAs('/temp', $request->avatar, $request->name);
            $x = asset('storage/' . $img);

        }
//        $x = Storage::disk('public')->putFileAs('/temp', $request->avatar, $request->name);
//        $image = $request->input('image'); // your base64 encoded
//        $image = str_replace('data:image/png;base64,', '', $image);
//        $image = str_replace(' ', '+', $image);
//        $imageName = 'test.png';
//        \File::put(storage_path(). '/' . $imageName, base64_decode($image));
        return $x;
//        $x = Storage::disk('public')->putFileAs('/temp', $request->avatar, $request->name);
//        $img = Image::make(asset('storage/temp/'.$request->name));
//        $img->insert('public/images/waterMark.png','bottom-left', 10, 10);
//        return $x;

//        $x = Storage::disk('public')->putFileAs('/temp', $request->avatar, $request->name);
//        $path   = $request->file('avatar')->getRealPath();
//        $img = Image::make($path);
//        $img->insert('public/images/waterMark.png','bottom-left', 10, 10);
//        $img->save();
//        return $img;
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
                    $reactioners_photos = $reactioners_photos . '<li><a href="#"> <img src="' .
                        $reaction->user->image .
                        '" alt="friend"></a></li>';
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

    public function usersReactions(Request $request)
    {
        $data = PostReaction::where('post_id', $request->id)->orderBy('created_at', 'decs')->paginate(25);
        return $data;
    }

    public function newComment(Request $request)
    {
        $newComment = new Comment();
        $newComment->user_id = Auth::id();
        $newComment->post_id = $request->id;
        $newComment->text = $request->comment;
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
            , 'newestComment' => $newestComment, 'newCommentId' => $newComment->id]);
    }

    public function deletePost(Request $request)
    {
        $post = Post::where('user_id', Auth::id())->where('id', $request->id)->first();

        if ($post) {
            if ($post->type == "video" || $post->type == "picture") {
                $files = File::where('dependent_id', $post->id)->where('type', 'post')->get();
                foreach ($files as $file) {
                    Storage::disk('public')->delete('/images/posts/' . $file->real_name . '.' . $file->extension);
                    $file->Delete();
                }
            }
            $arrayshare = array();

            if ($post->posts) {
                foreach ($post->posts as $child) {
                    $arrayshare[] = $child->id;
                    if ($child->comments) {
                        foreach ($child->comments as $childcomment) {
                            $childcomment->delete();

                        }
                    }
                    if ($child->reactions) {
                        foreach ($child->reactions as $childreactions) {
                            $childreactions->delete();

                        }
                    }
                    $child->delete();
                }
            }
            if ($post->comments) {
                foreach ($post->comments as $child) {
                    $child->delete();
                }
            }
            if ($post->reactions) {
                foreach ($post->reactions as $childreactions) {
                    $childreactions->delete();
                }
            }

            if ($post->taggedFriends()) {
                foreach ($post->taggedFriends as $tag) {
                    $tag->Delete();
                }
            }

            $post->topics()->detach();

            $success = $post->Delete();
            return Response::json(['success' => $success, 'message' => 'Post deleted', 'arrayshare' => $arrayshare], 200);
        } else {
            return Response::json(['success' => false, 'message' => 'The Post has not been deleted'], 200);
        }
    }

    public function commentDelete(Request $request)
    {

        $canDelete = false;
        $comment = Comment::where('id', $request->id)->with(['post'])->first();
        $post = Post::where('id', $comment->post_id)->first();


        if ($comment->user_id == Auth::id() || $comment->post->user_id == Auth::id()) {
            $success = $comment->Delete();
            $post->comments_count = $post->comments_count - 1;
            $engagement = $post->reactions->count();
            $engagement += $post->supportFriends->count();
            $engagement += $post->comments->count();

            foreach ($post->comments as $comment) {
                $engagement += $comment->replies->count();
            }
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


            if ($post->comments_count > 0) {
                $newestcomment = Comment::where('deleted_at', null)->where('post_id', $post->id)->get()->last();
                $newestcomment['humansDate'] = $newestcomment->created_at->diffForHumans();
                $newestcomment['id'] = $newestcomment->id;


                return Response::json(['success' => true, 'message' => ' comment deleted', 200,
                    'newestcomment' => $newestcomment, 'engagement' => $engagement,
                    'reactioners' => $reactioners, 'reactioners_photos' => $reactioners_photos,
                    'react_count' => $react_count, 'post' => $post, 'comments_count' => $post->comments_count]);

            } else return Response::json(['success' => true, 'message' => ' comment deleted', 200, 'engagement' => $engagement,
                'reactioners' => $reactioners, 'reactioners_photos' => $reactioners_photos, 'react_count' => $react_count, 'post' => $post]);
        } else {
            return ['success' => false, 'message' => 'The comment has not been deleted', 404];
        }
    }

    public function newPost(Request $request)
    {
        if($request->oldTopics != null){
            $oldTopicsId = explode(',', $request->oldTopics);
            $totalTopicsIds = $oldTopicsId;
        }else{
            $totalTopicsIds = [];
        }

        if($request->newTopics != null){
            $newTopicsText = explode(',',$request->newTopics);
            foreach ($newTopicsText as $topic){
                $newTopic = new Topic();
                $newTopic->name = $topic;
                $newTopic->save();
                $totalTopicsIds[]=$newTopic->id;
            }
        }

        $newpost = new Post();
        $newpost->user_id = Auth::id();
        $newpost->text = $request->text;
        if ($request->post_has_files) {
            $newpost->type = "picture";
        } else {
            $newpost->type = "text";
        }
        $newpost->dir = "ltr";

        $success = $newpost->save();
        $newpost['humansDate'] = $newpost->created_at->diffForHumans();

        //add topics section//
        $newpost->topics()->attach($totalTopicsIds);
        // end add topics section//

        $html_for_pictures_popup = "";
        $html_for_pictures_popup = $html_for_pictures_popup .
            '<div class="modal fade" id="open-photo-popup-v1' . $newpost->id . '" tabindex="-1"' .
            ' role="dialog" aria-labelledby="open-photo-popup-v1" aria-hidden="true">' .
            '<div class="modal-dialog window-popup open-photo-popup open-photo-popup-v1" role="document">' .
            '<div class="modal-content">' .
            '<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">' .
            '<svg class="olymp-close-icon">' .
            '<use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-close-icon"></use>' .
            '</svg>' .
            '</a>' .
            '<div class="modal-body">' .
            '<div class="open-photo-thumb">' .
            '<div class="swiper-container" data-slide="fade">' .
            '<div class="swiper-wrapper">';

        $html_for_pictures = "";
        if ($request->post_has_files && sizeof($request['files']) > 1) {
            $html_for_pictures = $html_for_pictures .
                '<div class="picture-section swiper-container" data-slide="fade">' .
                '<div class="swiper-wrapper">';
        } else {
            $html_for_pictures = $html_for_pictures .
                '<div class="picture-section" data-slide="fade">' .
                '<div class="swiper-wrapper">';
        }


        if ($request->post_has_files) {
            foreach ($request['files'] as $file) {
                $file_name = explode('.', $file)[0];
                $file_ext = explode('.', $file)[1];
                Storage::disk('public')->move('temp/' . $file, 'images/posts/' . $file);
                $newfile = new File();
                $newfile->dependent_id = $newpost->id;
                $newfile->type = 'post';
                $newfile->real_name = $file_name;
                $newfile->store_name = $file_name;
                $newfile->extension = $file_ext;
                $newfile->save();

                $html_for_pictures_popup = $html_for_pictures_popup .
                    '<div class="swiper-slide">' .
                    '<div class="photo-item " style="display:block;">' .
                    '<img src="' . asset('storage/images/posts/' . $file) . '" alt="photo">' .
                    '<div class="overlay"></div>' .
                    '</div>' .
                    '</div>';

                $html_for_pictures = $html_for_pictures .
                    '<div class="swiper-slide">' .
                    '<div class="photo-item" style="display:block;">' .
                    '<img src="' . asset('storage/images/posts/' . $file) . '" alt="photo">' .
                    '<div class="overlay"></div>' .
                    '</div>' .
                    '</div>';

            }
        }

        $html_for_pictures_popup = $html_for_pictures_popup .
            '</div>' .
            '<svg class="btn-next-without olymp-popup-right-arrow">' .
            '<use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-popup-right-arrow"></use>' .
            '</svg>' .
            '<svg class="btn-prev-without olymp-popup-left-arrow">' .
            '<use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-popup-left-arrow"></use>' .
            '</svg>' .
            '</div>' .
            '</div>' .
            '</div>' .
            '</div>' .
            '</div>' .
            '</div>';

        $html_for_pictures = $html_for_pictures .
//            '<a data-toggle="modal" data-target="#open-photo-popup-v1{{$post->id}}"  href="#" class="full-block"></a>' .
            '</div>';
        if ($newpost->files()->count() > 1) {
            $html_for_pictures = $html_for_pictures .
                '<svg class="btn-next-without olymp-popup-right-arrow">' .
                '<use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-popup-right-arrow"></use>' .
                '</svg>' .
                '<svg class="btn-prev-without olymp-popup-left-arrow">' .
                '<use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-popup-left-arrow"></use>' .
                '</svg>';
        }
        $html_for_pictures = $html_for_pictures . '</div>';

        $tagsection = '<div class="teggedFriends pointer display-flex"'.
        'data-id="'.$newpost->id .'"data-url="'.url("posts/get-tagged-friends").'">';
        $arraytag = array();

        if ($request->selecttag) {

            foreach ($request->selecttag as $x) {
                $arraytag[] = [
                    'user_id' => (int)$x,
                ];
            }
            $newpost->taggedFriends()->createMany($arraytag);

            if ($newpost->taggedFriends) {
                if ($newpost->taggedFriends->count() == 1) {
                    $tagsection = $tagsection.'<span>&nbsp;With&nbsp;<a>' . $newpost->taggedFriends[0]->user->display_name . '</a></span>';
                } elseif ($newpost->taggedFriends->count() == 2) {
                    $tagsection = $tagsection.'<span>&nbsp;With&nbsp;<a>' . $newpost->taggedFriends[0]->user->display_name . '</a></span>' .
                        '<span>&nbsp;And&nbsp;<a>' . $newpost->taggedFriends[1]->user->display_name . '</a></span>';
                } elseif ($newpost->taggedFriends->count() > 2) {
                    $tagsection = $tagsection.'<span>&nbsp;With&nbsp;<a>' . $newpost->taggedFriends[0]->user->display_name . '</a></span>' .
                        '<span>&nbsp;And&nbsp;<a>' . $newpost->taggedFriends[1]->user->display_name . '</a></span>';
                    $name = "";
                    for ($i = 2; $i < $newpost->taggedFriends->count(); $i = $i + 1) {
                        $name = $name . $newpost->taggedFriends[$i]->user->display_name . "\n";
                    }

                    $tagsection = $tagsection . '<span title="' . $name . '">&nbsp;And ' . ($newpost->taggedFriends->count() - 2) . ' more</span>';
                }
            }
        }
        $tagsection = $tagsection .`</div>`;
        $react_url = route("react");
        $users_reactions = route('users-reactions');
        $new_comment = route('new-comment');
        $comment_delete = route('comment-delete');
        $share_url = route('share-post');

        if ($request->post_has_files) {
            return Response::json(['success' => $success,
                'newpost' => $newpost,
                'user_image' => Auth::user()->image,
                'user_name' => Auth::user()->display_name,
                'html_for_pictures_popup' => $html_for_pictures_popup,
                'html_for_pictures' => $html_for_pictures,
                'with_files' => true,
                'tagsection' => $tagsection,
                'react_url' => $react_url,
                'users_reactions' => $users_reactions,
                'new_comment' => $new_comment,
                'comment_delete' => $comment_delete,
                'share_url' => $share_url
            ]);
        } else {
            return Response::json(['success' => $success,
                'newpost' => $newpost,
                'user_image' => Auth::user()->image,
                'user_name' => Auth::user()->display_name,
                'with_files' => false,
                'tagsection' => $tagsection,
                'react_url' => $react_url,
                'users_reactions' => $users_reactions,
                'new_comment' => $new_comment,
                'comment_delete' => $comment_delete,
                'share_url' => $share_url
            ]);
        }
    }

    public function deleteFromTemp(Request $request)
    {
        $success = Storage::delete('temp/' . $request->photo_name);
        return ['success' => $success];
    }

    public function sharePost(Request $request)
    {
        $post = Post::where('user_id', Auth::id())->with(['post'])->where('id', $request->id)->first();

        if ($post->post) {
            $post = $post->post;
        }

        $user_id = Auth::id();
        $text = $request->share_text;
        $social_network_id = 1;
        $post_id = $post->id;

        $newPost = new Post();
        $newPost->user_id = $user_id;
        $newPost->text = $text;
        $newPost->post_id = $post_id;
        $newPost->social_network_id = $social_network_id;
        $success = $newPost->save();

        $post['humansDate'] = $post->created_at->diffForHumans();
        $ShareDate = $newPost->created_at->diffForHumans();

        $html_for_pictures_popup = "";
        $html_for_pictures_popup = $html_for_pictures_popup .
            '<div class="modal fade" id="open-photo-popup-v1' . $post->id . '" tabindex="-1"' .
            ' role="dialog" aria-labelledby="open-photo-popup-v1" aria-hidden="true">' .
            '<div class="modal-dialog window-popup open-photo-popup open-photo-popup-v1" role="document">' .
            '<div class="modal-content">' .
            '<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">' .
            '<svg class="olymp-close-icon">' .
            '<use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-close-icon"></use>' .
            '</svg>' .
            '</a>' .
            '<div class="modal-body">' .
            '<div class="open-photo-thumb">' .
            '<div class="swiper-container" data-slide="fade">' .
            '<div class="swiper-wrapper">';

        $html_for_pictures = "";

        if ($post->files->count() > 0) {
            $html_for_pictures = $html_for_pictures .
                '<div class="picture-section swiper-container" data-slide="fade">' .
                '<div class="swiper-wrapper">';
        } else {
            $html_for_pictures = $html_for_pictures .
                '<div class="picture-section" data-slide="fade">' .
                '<div class="swiper-wrapper">';
        }

        if ($post->files) {
            foreach ($post->files as $file) {
                $html_for_pictures_popup = $html_for_pictures_popup .
                    '<div class="swiper-slide">' .
                    '<div class="photo-item " style="display:block;">' .
                    '<img src="' . $file->store_name . '" alt="photo">' .
                    '<div class="overlay"></div>' .
                    '</div>' .
                    '</div>';

                $html_for_pictures = $html_for_pictures .
                    '<div class="swiper-slide">' .
                    '<div class="photo-item" style="display:block;">' .
                    '<img src="' . $file->store_name . '" alt="photo">' .
                    '<div class="overlay"></div>' .
                    '</div>' .
                    '</div>';

            }
        }
        $html_for_pictures_popup = $html_for_pictures_popup .
            '</div>' .
            '<svg class="btn-next-without olymp-popup-right-arrow">' .
            '<use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-popup-right-arrow"></use>' .
            '</svg>' .
            '<svg class="btn-prev-without olymp-popup-left-arrow">' .
            '<use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-popup-left-arrow"></use>' .
            '</svg>' .
            '</div>' .
            '</div>' .
            '</div>' .
            '</div>' .
            '</div>' .
            '</div>';

        $html_for_pictures = $html_for_pictures .
//            '<a data-toggle="modal" data-target="#open-photo-popup-v1{{$post->id}}"  href="#" class="full-block"></a>' .
            '</div>';
        if ($post->files->count() > 1) {
            $html_for_pictures = $html_for_pictures .
                '<svg class="btn-next-without olymp-popup-right-arrow">' .
                '<use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-popup-right-arrow"></use>' .
                '</svg>' .
                '<svg class="btn-prev-without olymp-popup-left-arrow">' .
                '<use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-popup-left-arrow"></use>' .
                '</svg>';
        }
        $html_for_pictures = $html_for_pictures . '</div>';
        $tagsection = '<div class="teggedFriends pointer display-flex"'.
            'data-id="'.$post->id .'"data-url="'.url("posts/get-tagged-friends").'">';
        if ($post->taggedFriends) {
            if ($post->taggedFriends->count() == 1)
                $tagsection = $tagsection.' <span>&nbsp;With&nbsp;<a>' . $post->taggedFriends[0]->user->display_name . '</a></span>';
            else if ($post->taggedFriends->count() == 2)
                $tagsection = $tagsection.'<span>&nbsp;With&nbsp;<a>' . $post->taggedFriends[0]->user->display_name . '</a></span>
                            <span>&nbsp;And&nbsp;<a>' . $post->taggedFriends[1]->user->display_name . '</a></span>';
            else if ($post->taggedFriends->count() > 2) {
                $tagsection = $tagsection.' <span>&nbsp;With&nbsp;<a>' . $post->taggedFriends[0]->user->display_name . '</a></span>
                            <span>&nbsp;And&nbsp;<a>' . $post->taggedFriends[1]->user->display_name . '</a></span>';

                $name = "";
                for ($i = 2; $i < $post->taggedFriends->count(); $i = $i + 1) {
                    $name = $name . $post->taggedFriends[$i]->user->display_name . "\n";
                }
                $rest = $post->taggedFriends->count() - 2;
                $tagsection = $tagsection . ' <span title="' . $name . '">&nbsp;And ' . $rest . ' more</span>';
            }
        }
        $tagsection = $tagsection .`</div>`;

        $react_url = route("react");
        $delete_url = route("delete-post");
        $share_url = route('share-post');
        $newCommentUrl = route('new-comment');
        $deleteCommentUrl = route('comment-delete');
        $users_reactions = route('users-reactions');

        if ($post->files->count() > 0) {
            return Response::json(['success' => $success,
                'ShareDate' => $ShareDate,
                'Friend_image' => $post->user->image,
                'Friend_name' => $post->user->display_name,
                'post' => $post,
                'user_image' => Auth::user()->image,
                'user_name' => Auth::user()->display_name,
                'html_for_pictures_popup' => $html_for_pictures_popup,
                'html_for_pictures' => $html_for_pictures,
                'with_files' => true,
                'newpost' => $newPost,
                'tagsection' => $tagsection,
                'react_url' => $react_url,
                'delete_url' => $delete_url,
                'share_url' => $share_url,
                'new_comment_url' => $newCommentUrl,
                'users_reactions' => $users_reactions,
                'dalete_comment_url' => $deleteCommentUrl]);
        } else {
            return Response::json(['success' => $success,
                'ShareDate' => $ShareDate,
                'Friend_image' => $post->user->image,
                'Friend_name' => $post->user->display_name,
                'post' => $post,
                'user_image' => Auth::user()->image,
                'user_name' => Auth::user()->display_name,
                'with_files' => false,
                'newpost' => $newPost,
                'tagsection' => $tagsection,
                'react_url' => $react_url,
                'delete_url' => $delete_url,
                'share_url' => $share_url,
                'new_comment_url' => $newCommentUrl,
                'users_reactions' => $users_reactions,
                'dalete_comment_url' => $deleteCommentUrl]);
        }
    }

    public function getTopics(Request $request){
        $term = trim($request->q);

        if (empty($term)) {
            return \Response::json([]);
        }

        $topics = Searchy::topics('name')->query($term)->get();

        $data = $this->paginate($topics,5,$request->page);

        $formatted_topics = [];
        foreach ($data->items() as $topic) {
            $formatted_topics[] = ['id' => $topic->id, 'text' => $topic->name];
        }
        return \Response::json(['results'=>$formatted_topics,'has_more'=>$data->nextPageUrl() ? true : false]);
    }

    public function getTaggedFriends(Request $request){
        $post_id = $request->id;
        $taggedFriends = Post::where('id',$post_id)->first()->taggedFriends()->with(['user' => function($query){
            return $query->select(['id','display_name','image']);
        }])->get();
       return $taggedFriends;
    }

}
