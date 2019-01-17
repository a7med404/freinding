<div class="container">
    <div class="row">

        <!-- Main Content -->

        <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">

            <!-- News Feed Form  -->
        @include('posts::new_post')
        <!-- ... end News Feed Form  -->

            <!-- Posts section-->
            <div id="newsfeed-items-grid">
                <div class="container" id="AreaForPost">
                    @foreach($posts as $post)
                        <div id="AllPostDiv{{$post->id}}" class="ui-block">

                            <article class="hentry post video">
                                <div class="post__author author vcard inline-items">
                                    <img src="{{$post->user->image}}"
                                         alt="author">

                                    <div class="author-date">
                                        <div class="row m-0">
                                            <a class="h6 post__author-name fn "
                                               href="#">{{$post->user->display_name}}</a>
                                            <div class="teggedFriends pointer display-flex" data-id="{{$post->id}}"
                                                 data-url="{{url('posts/get-tagged-friends')}}">
                                                @if($post->taggedFriends)
                                                    @if($post->taggedFriends->count()==1)
                                                        <span>&nbsp;With&nbsp;<a>{{$post->taggedFriends[0]->user->display_name}}</a></span>
                                                    @elseif($post->taggedFriends->count()==2)
                                                        <span>&nbsp;With&nbsp;<a>{{$post->taggedFriends[0]->user->display_name}}</a></span>
                                                        <span>&nbsp;And&nbsp;<a>{{$post->taggedFriends[1]->user->display_name}}</a></span>
                                                    @elseif($post->taggedFriends->count()>2)
                                                        <span>&nbsp;With&nbsp;<a>{{$post->taggedFriends[0]->user->display_name}}</a></span>
                                                        <span>&nbsp;And&nbsp;<a>{{$post->taggedFriends[1]->user->display_name}}</a></span>
                                                        <?php
                                                        $name = "";
                                                        for ($i = 2; $i < $post->taggedFriends->count(); $i = $i + 1) {
                                                            $name = $name . $post->taggedFriends[$i]->user->display_name . "\n";
                                                        }
                                                        ?>
                                                        <span title="{{$name}}">&nbsp;And {{$post->taggedFriends->count()-2}} more</span>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                        <div class="post__date">
                                            <time class="published" datetime="2004-07-24T18:18">
                                                {{$post->created_at->diffForHumans()}}
                                            </time>
                                        </div>
                                    </div>

                                    <div class="more">
                                        <svg class="olymp-three-dots-icon">
                                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                        </svg>
                                        <ul class="more-dropdown">
                                            <li>
                                                <a href="#">Edit Post</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" class="post-delete" id="{{$post->id}}"
                                                   data-url="{{route('delete-post')}}">Delete
                                                    Post</a>
                                            </li>
                                            <li>
                                                <a href="#">Turn Off Notifications</a>
                                            </li>
                                            <li>
                                                <a href="#">Select as Featured</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <p style="word-wrap: break-word;">{{$post->text}}</p>
                                @if($post->type == 'picture')
                                    <div class="picture-section {{$post->files->count()>1?'swiper-container':""}}"
                                         data-slide="fade">
                                        <div class="swiper-wrapper">
                                            @foreach($post->files as $file)
                                                <div class="swiper-slide">
                                                    <div class="photo-item" style="display:block;">
                                                        <img src="{{$file->store_name}}"
                                                             alt="photo">
                                                        <div class="overlay"></div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        @if($post->files->count()>1)
                                            <svg class="btn-next-without olymp-popup-right-arrow">
                                                <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-popup-right-arrow"></use>
                                            </svg>

                                            <svg class="btn-prev-without olymp-popup-left-arrow">
                                                <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-popup-left-arrow"></use>
                                            </svg>
                                        @endif
                                    </div>
                                @elseif($post->type == 'video')
                                    <div class="video-section swiper-container" data-slide="fade">
                                        <div class="swiper-wrapper">
                                            @foreach($post->files as $file)
                                                <div class="swiper-slide my-video">
                                                    <div class="photo-item" style="display:block;">
                                                        <div style="background-color: black;display: flex;justify-content: center;
                                                        align-items: center;" class="video_post">
                                                            <video class="video_post_element my-video" controls
                                                                   muted oncanplay="this.muted=true"
                                                                   src="{{$file->store_name}}" type="video/mp4"
                                                                   style="width: 100%;height: auto;">
                                                            </video>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        @if($post->files->count()>1)
                                            <svg class="btn-next-without olymp-popup-right-arrow video_choser">
                                                <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-popup-right-arrow"></use>
                                            </svg>
                                            <svg class="btn-prev-without olymp-popup-left-arrow video_choser">
                                                <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-popup-left-arrow"></use>
                                            </svg>
                                        @endif
                                    </div>
                                @endif
                            <!--post shared-->
                                @if($post->post_id != 0 && $post->social_network_id==1)
                                    <article class="hentry post video"
                                             style="border: 3px solid;border-radius: 10px;border-color: #9a9fbf;">
                                        <div class="post__author author vcard inline-items">
                                            <img src="{{$post->post->user->image}}" alt="author">
                                            <div class="author-date">
                                                <div class="row m-0">
                                                    <a class="h6 post__author-name fn "
                                                       href="#">{{$post->post->user->display_name}}</a>
                                                    <div class="teggedFriends pointer display-flex"
                                                         data-id="{{$post->post->id}}"
                                                         data-url="{{url('posts/get-tagged-friends')}}">
                                                        @if($post->post->taggedFriends)
                                                            @if($post->post->taggedFriends->count()==1)
                                                                <span>&nbsp;With&nbsp;<a>{{$post->post->taggedFriends[0]->user->display_name}}</a></span>
                                                            @elseif($post->post->taggedFriends->count()==2)
                                                                <span>&nbsp;With&nbsp;<a>{{$post->post->taggedFriends[0]->user->display_name}}</a></span>
                                                                <span>&nbsp;And&nbsp;<a>{{$post->post->taggedFriends[1]->user->display_name}}</a></span>
                                                            @elseif($post->post->taggedFriends->count()>2)
                                                                <span>&nbsp;With&nbsp;<a>{{$post->post->taggedFriends[0]->user->display_name}}</a></span>
                                                                <span>&nbsp;And&nbsp;<a>{{$post->post->taggedFriends[1]->user->display_name}}</a></span>
                                                                <?php
                                                                $name = "";
                                                                for ($i = 2; $i < $post->post->taggedFriends->count(); $i = $i + 1) {
                                                                    $name = $name . $post->post->taggedFriends[$i]->user->display_name . "\n";
                                                                }
                                                                ?>
                                                                <span title="{{$name}}">&nbsp;And {{$post->post->taggedFriends->count()-2}} more</span>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="post__date">
                                                    <time class="published" datetime="2004-07-24T18:18">
                                                        {{$post->post->created_at->diffForHumans()}}
                                                    </time>
                                                </div>
                                            </div>
                                        </div>
                                        <p style="word-wrap: break-word;">{{$post->post->text}}</p>
                                        @if($post->post->type == 'picture')
                                            <div class="picture-section {{$post->post->files->count()>1?'swiper-container':""}}"
                                                 data-slide="fade">
                                                <div class="swiper-wrapper">
                                                    @foreach($post->post->files as $file)
                                                        <div class="swiper-slide">
                                                            <div class="photo-item" style="display:block;">
                                                                <img src="{{$file->store_name}}"
                                                                     alt="photo">
                                                                <div class="overlay"></div>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div>
                                                @if($post->post->files->count()>1)
                                                    <svg class="btn-next-without olymp-popup-right-arrow">
                                                        <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-popup-right-arrow"></use>
                                                    </svg>

                                                    <svg class="btn-prev-without olymp-popup-left-arrow">
                                                        <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-popup-left-arrow"></use>
                                                    </svg>
                                                @endif
                                            </div>
                                        @elseif($post->post->type == 'video')
                                            <div class="video-section swiper-container" data-slide="fade">
                                                <div class="swiper-wrapper">
                                                    @foreach($post->post->files as $file)
                                                        <div class="swiper-slide my-video">
                                                            <div class="photo-item" style="display:block;">
                                                                <div style="background-color: black;display: flex;justify-content: center;
                                                        align-items: center;" class="video_post">
                                                                    <video class="video_post_element my-video"
                                                                           id="forAutoPlay{{$post->id}}" controls
                                                                           autoplay muted
                                                                           oncanplay="this.muted=true"
                                                                           src="{{$file->store_name}}"
                                                                           data-src="" type="video/mp4"
                                                                           style="width: 100%;height: auto;">
                                                                    </video>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <svg class="btn-next-without olymp-popup-right-arrow video_choser">
                                                    <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-popup-right-arrow"></use>
                                                </svg>

                                                <svg class="btn-prev-without olymp-popup-left-arrow video_choser">
                                                    <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-popup-left-arrow"></use>
                                                </svg>
                                            </div>
                                        @endif
                                        <div class="topic-section inLineBlock">
                                            <ul>
                                                @foreach($post->post->topics as $topic)
                                                    <li class="liForTopic">
                                                        <a class="aForTopic">
                                                            {{$topic->name}}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </article>
                            @endif
                            <!--end post shared-->
                                <div class="topic-section inLineBlock">
                                    <ul>
                                        @foreach($post->topics as $topic)
                                            <li class="liForTopic">
                                                <a class="aForTopic">
                                                    {{$topic->name}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="post-additional-info form-inline post-control-button flex-container reaction">
                                    <a id="btn_react{{$post->id}}" class="btn btn-control btn_react_first "
                                       style="background-color: {{$post->is_liked?'red':''}};"
                                       data-url="{{route('react')}}">
                                        <svg class="olymp-like-post-icon">
                                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-like-post-icon"></use>
                                        </svg>
                                    </a>
                                    <a id="comment_post{{$post->id}}" class="btn btn-control  ">
                                        <svg class="olymp-comments-post-icon">
                                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
                                        </svg>
                                    </a>

                                    <!--share-section-->
                                    <div class="more">
                                        <a href="#" class="btn btn-control ">
                                            <svg class="olymp-share-icon">
                                                <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-share-icon"></use>
                                            </svg>
                                        </a>
                                        <ul class="more-dropdown">
                                            <li>
                                                <a href="javascript:void(0)" id="sharePost" data-id="{{$post->id}}"
                                                   data-share-url="{{route('share-post')}}">Share</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">Share in group</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">share on friend's diary</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--end-share-section-->

                                    <ul id="reactioners_photos{{$post->id}}"
                                        style=" position: absolute; right: 27%;"
                                        class="friends-harmonic inline-items float-right">
                                        @foreach($post->reactions as $reaction)
                                            @if($loop->index<5)
                                                <li>
                                                    <a href="javascript:void(0)">
                                                        <img src="{{$reaction->user->image}}" alt="friend">
                                                    </a>
                                                </li>
                                            @else
                                                @break
                                            @endif
                                        @endforeach
                                    </ul>
                                    <div class="post_reacts_users" id="{{$post->id}}"
                                         data-url="{{route('users-reactions')}}"
                                         style="position: absolute;right: 5%;cursor: pointer;">
                                        <a class="post-add-icon inline-items">
                                            <?php
                                            $engagement = $post->reactions->count();
                                            $engagement += $post->supportFriends->count();
                                            $engagement += $post->comments_count;
                                            foreach ($post->comments as $comment) {
                                                $engagement += $comment->replies->count();
                                            }
                                            ?>
                                            <span id="engagement_count{{$post->id}}">{{$engagement}}</span>
                                        </a>
                                        <span>&nbsp;Engagements</span>
                                    </div>
                                    <style>
                                        @media only screen and (max-width: 481px) {
                                            .reaction {
                                                display: flex;
                                                flex-direction: row;
                                                width: 100%;
                                            }

                                            .btn_react_first {
                                                margin-top: 10px;
                                            }
                                        }
                                    </style>
                                </div>
                            </article>
                            <!-- Comments -->
                            <ul class="comments-list comments-list--{{$post->id}}">
                                @if($post->newest_comment)

                                    <li id="newestComment{{$post->id}}"
                                        class="comment-item Allcommentul{{$post->newest_comment->id}}">
                                        <div class="post__author author vcard inline-items">
                                            <img src="{{$post->newest_comment->user->image}}" alt="author">

                                            <div class="author-date">
                                                <a class="h6 post__author-name fn"
                                                   href="javascript:void(0)">{{$post->newest_comment->user->display_name}}</a>
                                                <div class="post__date">
                                                    <time class="published" datetime="2004-07-24T18:18">
                                                        {{$post->newest_comment->created_at->diffForHumans()}}
                                                    </time>
                                                </div>
                                            </div>


                                            <div class="more">
                                                <svg class="olymp-three-dots-icon">
                                                    <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                                </svg>
                                                <ul class="more-dropdown">
                                                    <li>
                                                        <a href="javascript:void(0)">Edit comment</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)" class="comment-delete"
                                                           data-url="{{route('comment-delete')}}"
                                                           id="{{$post->newest_comment->id}}">Delete comment</a>
                                                    </li>

                                                </ul>
                                            </div>

                                        </div>

                                        <p>{{$post->newest_comment->text}}
                                        </p>

                                        <a href="javascript:void(0)" class="post-add-icon inline-items">
                                            <svg class="olymp-heart-icon">
                                                <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
                                            </svg>
                                            <span>{{$post->newest_comment->reactions->count()}}</span>
                                        </a>
                                        <a href="javascript:void(0)" class="reply">Reply</a>
                                    </li>
                                    <!-- ... end Comments -->
                                    <a href="javascript:void(0)" class="more-comments">View more comments <span>+</span></a>
                                @endif
                            </ul>

                            <!-- Comment Form  -->

                            <form class="comment-form inline-items">

                                <div class="post__author author vcard inline-items">
                                    <img src="{{\Auth::user()->image}}" alt="author">

                                    <div class="form-group with-icon-right">
                                <textarea id="comment_post_form{{$post->id}}" class="form-control"
                                          placeholder="Your Comment Here" required></textarea>
                                        <div class="add-options-message">
                                            <a href="javascript:void(0)" class="options-message" data-toggle="modal"
                                               data-target="#update-header-photo">
                                                <svg class="olymp-camera-icon">
                                                    <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <button id="btn_comment_{{$post->id}}" class="btn btn-md-2 btn-primary"
                                        data-url="{{route('new-comment')}}"
                                        data-delete-url="{{route('comment-delete')}}">Post Comment
                                </button>

                                <button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color">Cancel
                                </button>

                            </form>

                            <!-- ... end Comment Form  -->
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- end Posts section-->

        </main>

        <!-- ... end Main Content -->

        <!-- Left Sidebar -->
    @include('posts::left_sidebar')
    <!-- ... end Left Sidebar -->

        <!-- Right Sidebar -->
    @include('posts::right_sidebar')
    <!-- ... end Right Sidebar -->

    </div>
</div>

@include('site.home.popup')
@include('posts::popups.add_topics')
@include('posts::popups.tagged_friends')