<?php

namespace Modules\Posts\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Modules\Posts\Entities\Comment;
use Modules\Posts\Entities\File;
use Modules\Posts\Entities\Post;
use Modules\Posts\Entities\PostReaction;
use Modules\Posts\Entities\Reaction;
use App\Http\Controllers\Site\SiteController;
use App\User;



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

            $users = User::where('id', '!=', Auth::id())->get();

            $reactions = Reaction::where('is_active', 1)->get();
            return view('posts::newsfeed', compact('user', 'posts', 'reactions', 'admin_panel', 'user_key','users'));
        } else {
            return redirect()->route('close');
        }
    }

    public function storePostsPhotosInTemp(Request $request)
    {
        $image = $request->file('avatar');
        $destinationPath =public_path('storage/temp');
        $fileName = $request->name;
        $img = Image::make($image->getRealPath());
        $watermark = Image::make(public_path('/storage/images/waterMark.png'));
        $img->insert($watermark,'bottom-left', 15, 15);
        $img->save($destinationPath.'/'.$fileName);

//        $jpg = $img->encode('jpg',0);
//        $jpg->save($destinationPath.'/'.explode('.',$fileName)[0].'1.jpg');
        return $fileName;

    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('posts::create');
    }

    public function show()
    {
        return view('posts::show');
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

    public function usersReactions(Request $request)
    {
        $data = PostReaction::where('post_id', $request->id)->paginate(25);
//        dd($data->count());
//        dd($data->currentPage());
//        dd($data->hasMorePages());
//        dd($data->nextPageUrl());
//        dd($data->items());
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
                $file = File::where('dependent_id', $post->id)->where('type', 'post')->first();
                //  Storage::delete( 'images/posts/' . $file->store_name.$file->extension);
                //   File::delete('app/public/images/posts//' . $file->store_name.$file->extension);
                //  unlink('app/public/images/posts/' . $file->store_name.$file->extension);
                $file->Delete();
            }
            $arrayshare = array();

            if ($post->posts) {
                foreach ($post->posts as $child) {
                    $arrayshare[] = [
                        'post_id' => $child,
                    ];
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
            if ($post->taggedFriends) {
                foreach ($post->taggedFriends as $childtaggedFriends) {
                    $childtaggedFriends->delete();

                }
            }

            $success = $post->Delete();
            return Response::json(['success' => true, 'message' => 'Post deleted','arrayshare'=>$arrayshare], 200);
        } else {
            return Response::json(['success' => false, 'message' => 'The Post has not been deleted'], 200);
        }
    }



    /* public function commentDelete(Request $request)
     {
         $canDelete = false;
         $comment = Comment::where('id', $request->id)->with(['post'])->first();
         $post = Post::where('id',$comment->post_id)->first();

         if ($comment->user_id == Auth::id() || $comment->post->user_id == Auth::id()) {
             $success = $comment->Delete();
             $newestcomment=Comment::where('deleted_at',null)->where('post_id',$post->id)->get()->last();

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

             $newestcomment['humansDate'] = $newestcomment->created_at->diffForHumans();
             $newestcomment['id']=$newestcomment->id;

             return Response::json(['success' => true, 'message' => ' comment deleted', 200,'newestcomment'=>$newestcomment , 'engagement' => $engagement, 'comment_count' => $comment_count,
                 'reactioners' => $reactioners, 'reactioners_photos' => $reactioners_photos, 'react_count' => $react_count,'post_id'=>$post->id]);
         } else {


             return ['success' => false, 'message' => 'The comment has not been deleted', 404];
         }
     }*/
	
	public function commentDelete(Request $request)
    {

        $canDelete = false;
        $comment = Comment::where('id', $request->id)->with(['post'])->first();
        $post = Post::where('id', $comment->post_id)->first();


        if ($comment->user_id == Auth::id() || $comment->post->user_id == Auth::id()) {
            $success = $comment->Delete();
            $post->comments_count =$post->comments_count-1;
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
            }
            elseif ($post->reactions->count() == 2) {
                $reactioners = '<a href="#">' . $post->reactions[0]->user->display_name . '</a>, <a
                                    href="#">' . $post->reactions[1]->user->display_name . '</a>';
            }
            elseif ($post->reactions->count() == 1) {
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
                    'react_count' => $react_count, 'post' => $post, 'comments_count'=>$post->comments_count ]);

            } else return Response::json(['success' => true, 'message' => ' comment deleted', 200, 'engagement' => $engagement,
                'reactioners' => $reactioners, 'reactioners_photos' => $reactioners_photos, 'react_count' => $react_count, 'post' => $post]);
        } else {
            return ['success' => false, 'message' => 'The comment has not been deleted', 404];
        }
    }

    public function newPost(Request $request)
    {

        $newpost = new Post();
        $newpost->user_id = Auth::id();
        $newpost->text = $request->text;
        $newpost->post_id = '0';
        $newpost->social_network_id = '0';
        if ($request->post_has_files) {
            $newpost->type = "picture";
        } else {
            $newpost->type = "text";
        }
        $newpost->dir = "ltr";


        $htmlnewpost = "";
//        if ($request->file()) {
//            $newfile = new File();
//            $newfile = $request->file;
//            $newfile->post_id = $newpost->id;

//            if ($newfile->extension == "mp4") {
//                $newpost->type = "video";
//                foreach ($newpost->files as $file) {
//                    $htmlnewpost = $htmlnewpost' <div style="background-color: black;display: flex;justify-content: center;  align-items: center;" id="video_post_'newpost->id'">
//                                            <video controls style="width: 100%;height: auto;">
//                                                <source src="' + $newpost->file->name_store + '" type="video/mp4">
//                                           </video>
//                                        </div>'
//
//
//								  }
//            }
//            elseif ($newfile->extension == "jpg" | $newfile->extension == "png") {
//                $newpost->type = "picture";
//                $htmlnewpost = '<div class="swiper-container" data-slide="fade">' +
//                    '< div class="swiper-wrapper" >';
//                foreach ($newpost->files as $file) {
//                    $htmlnewpost += ' <div class="swiper-slide" >'+
//                                                   ' <div class="photo-item" style = "display:block;" >'+
//                                                     '  <img src = "' + $newpost->file->name_store + '"'+
//                                                            ' alt = "photo" >'+
//                                                        '<div class="overlay" ></div >'+
//                                                  '  </div > '+
//												}
//                $htmlnewpost += ' </div >	'+
//                                       ' <svg class="btn-next-without olymp-popup-right-arrow" >'+
//                                         ' <use xlink:href = "olympus/svg-icons/sprites/icons.svg#olymp-popup-right-arrow" ></use>'+
//                                       '</svg >'+
//                                       '<svg class="btn-prev-without olymp-popup-left-arrow" >'+
//                                            '<use xlink:href = "olympus/svg-icons/sprites/icons.svg#olymp-popup-left-arrow" ></use>'+
//                                        '</svg >'+
//                                    '</div > ';
//	   }
//            $newfile->save();


        $success = $newpost->save();
        $newpost['humansDate'] = $newpost->created_at->diffForHumans();
        $newpost['id'] = $newpost->id;

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
        if ($request->post_has_files && sizeof($request['files'])>1){
            $html_for_pictures = $html_for_pictures .
                '<div class="swiper-container" data-slide="fade">' .
                '<div class="swiper-wrapper">';
        }else{
            $html_for_pictures = $html_for_pictures .
                '<div class="" data-slide="fade">' .
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
//                    '<div class="flexFont" style="position: absolute;bottom: 1%; border-radius: 5px;' .
//                    '-ms-transform: rotate(45deg); /* IE 9 */' .
//                    '-webkit-transform: rotate(45deg); /* Safari 3-8 */' .
//                    'transform: rotate(45deg);">' .
//                    '<p style="padding: 10px;color: #f2f3f7;' .
//                    'background-color: #9a9fbf85;border-radius: 50px;">Friending' .
//                    '</p>' .
//                    '</div>' .
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
        if($newpost->files()->count()>1){
            $html_for_pictures = $html_for_pictures .
            '<svg class="btn-next-without olymp-popup-right-arrow">' .
            '<use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-popup-right-arrow"></use>' .
            '</svg>' .
            '<svg class="btn-prev-without olymp-popup-left-arrow">' .
            '<use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-popup-left-arrow"></use>' .
            '</svg>';
        }
        $html_for_pictures = $html_for_pictures .'</div>';
        //dima
        $tagsection='';
        $arraytag=array();

        if($request->selecttag)
        {

            foreach ($request->selecttag as $x )
            {
                $arraytag[] = [
                    'user_id'    =>  (int)$x,
                ];
            }
            $newpost->taggedFriends()->createMany($arraytag);

            if($newpost->taggedFriends){
                if($newpost->taggedFriends->count()==1){
                    $tagsection='<span>&nbsp;With&nbsp;<a>'.$newpost->taggedFriends[0]->user->display_name.'</a></span>';
                }
                elseif($newpost->taggedFriends->count()==2){
                    $tagsection='<span>&nbsp;With&nbsp;<a>'.$newpost->taggedFriends[0]->user->display_name.'</a></span>'.
                        '<span>&nbsp;And&nbsp;<a>'.$newpost->taggedFriends[1]->user->display_name.'</a></span>';
                }
                elseif($newpost->taggedFriends->count()>2){
                    $tagsection='<span>&nbsp;With&nbsp;<a>'.$newpost->taggedFriends[0]->user->display_name.'</a></span>'.
                        '<span>&nbsp;And&nbsp;<a>'.$newpost->taggedFriends[1]->user->display_name.'</a></span>';
                    $name = "";
                    for ($i = 2; $i < $newpost->taggedFriends->count(); $i = $i + 1) {
                        $name = $name . $newpost->taggedFriends[$i]->user->display_name ."\n";
                    }

                    $tagsection=$tagsection.'<span title="'.$name.'">&nbsp;And '. ($newpost->taggedFriends->count()-2) .' more</span>';
                }
            }


            /*if ($newpost->taggedFriends->count() > 2) {
                $tagsection='<a style="background-color: peachpuff">WITH:</a>
                                                            <a>'.$newpost->taggedFriends[0]->user->display_name.'</a>
                                                            <span>and</span>
                                                            <a>'.$newpost->taggedFriends[1]->user->display_name.'</a>
                                                            <span>and</span>
                                                            <span>($newpost->taggedFriends->count() - 2)</span>
                                                            <a>MORE</a>';
            }
            elseif ($newpost->taggedFriends->count() == 2) {
                $tagsection='<a style="background-color: peachpuff">WITH:</a>
                                                            <a>'.$newpost->taggedFriends[0]->user->display_name.'</a>
                                                            <span>and</span>
                                                            <a>'.$newpost->taggedFriends[1]->user->display_name.'</a>    ';
            }
            elseif ($newpost->taggedFriends->count() == 1) {
                $tagsection=' <a style="background-color: peachpuff">WITH:</a>
                                                            <a>'.$newpost->taggedFriends[0]->user->display_name.'</a>  ';
            }*/

        }
        //endtag

        if ($request->post_has_files){
            return Response::json(['success' => $success,
                'htmlnewpost' => $htmlnewpost,
                'newpost' => $newpost,
                'user_image' => Auth::user()->image,
                'user_name' => Auth::user()->display_name,
                'html_for_pictures_popup'=>$html_for_pictures_popup,
                'html_for_pictures'=>$html_for_pictures,
                'with_files'=>true,
                'tagsection'=>$tagsection
            ]);
        }else{
            return Response::json(['success' => $success,
                'htmlnewpost' => $htmlnewpost,
                'newpost' => $newpost,
                'user_image' => Auth::user()->image,
                'user_name' => Auth::user()->display_name,
                'with_files'=>false,
                'tagsection'=>$tagsection
            ]);
        }
    }

    public function deleteFromTemp(Request $request){
       $success =  Storage::delete('temp/'.$request->photo_name);
       return ['success'=>$success];
    }
    public function sharePost(Request $request)
    {
        $post = Post::where('user_id', Auth::id())->where('id', $request->id)->first();
        $success = $post->posts()->create([
            'user_id' => Auth::id(),
            'text' => $request->share_text,
            'post_id' => $post->id,
            'social_network_id' => '1'
        ]);
        $post['humansDate'] = $post->created_at->diffForHumans();
        $ShareDate = $post->posts->last()->created_at->diffForHumans();

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
        if ($post->files()->count() > 0) {
            $html_for_pictures = $html_for_pictures .
                '<div class="swiper-container" data-slide="fade">' .
                '<div class="swiper-wrapper">';
        } else {
            $html_for_pictures = $html_for_pictures .
                '<div class="" data-slide="fade">' .
                '<div class="swiper-wrapper">';
        }


        if ($post->files()) {
            foreach ($post->files() as $file) {

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
                    '<div class="flexFont" style="position: absolute;bottom: 1%; border-radius: 5px;' .
                    '-ms-transform: rotate(45deg); /* IE 9 */' .
                    '-webkit-transform: rotate(45deg); /* Safari 3-8 */' .
                    'transform: rotate(45deg);">' .
                    '<p style="padding: 10px;color: #f2f3f7;' .
                    'background-color: #9a9fbf85;border-radius: 50px;">Friending' .
                    '</p>' .
                    '</div>' .
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
        if ($post->files()->count() > 1) {
            $html_for_pictures = $html_for_pictures .
                '<svg class="btn-next-without olymp-popup-right-arrow">' .
                '<use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-popup-right-arrow"></use>' .
                '</svg>' .
                '<svg class="btn-prev-without olymp-popup-left-arrow">' .
                '<use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-popup-left-arrow"></use>' .
                '</svg>';
        }
        $html_for_pictures = $html_for_pictures . '</div>';
        $tagsection = "";
        if ($post->taggedFriends) {
            if ($post->taggedFriends->count() == 1)
                $tagsection = ' <span>&nbsp;With&nbsp;<a>' . $post->taggedFriends[0]->user->display_name . '</a></span>';
            else if ($post->taggedFriends->count() == 2)
                $tagsection = '<span>&nbsp;With&nbsp;<a>' . $post->taggedFriends[0]->user->display_name . '</a></span>
                            <span>&nbsp;And&nbsp;<a>' . $post->taggedFriends[1]->user->display_name . '</a></span>';
            else if ($post->taggedFriends->count() > 2) {
                $tagsection = ' <span>&nbsp;With&nbsp;<a>' . $post->taggedFriends[0]->user->display_name . '</a></span>
                            <span>&nbsp;And&nbsp;<a>' . $post->taggedFriends[1]->user->display_name . '</a></span>';

                $name = "";
                for ($i = 2; $i < $post->taggedFriends->count(); $i = $i + 1) {
                    $name = $name . $post->taggedFriends[$i]->user->display_name . "\n";
                }

                $tagsection = $tagsection + ' <span title="' . $name . '">And ' . $post->taggedFriends->count() - 2 . ' more</span>';
            }
        }
        if ($post->files()->count() > 0) {
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
                'newpost' => $post->posts->last(),
                'tagsection' => $tagsection
            ]);
        } else {
            return Response::json(['success' => $success,
                'ShareDate' => $ShareDate,
                'Friend_image' => $post->user->image,
                'Friend_name' => $post->user->display_name,
                'post' => $post,
                'user_image' => Auth::user()->image,
                'user_name' => Auth::user()->display_name,
                'with_files' => false,
                'newpost' => $post->posts->last(),
                'tagsection' => $tagsection
            ]);


        }
    }

}
