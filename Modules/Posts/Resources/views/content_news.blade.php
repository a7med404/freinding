<div class="container">
    <div class="row">

        <!-- Main Content -->

        <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">

            <div class="ui-block">

                <!-- News Feed Form  -->

                <div class="news-feed-form">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active inline-items" data-toggle="tab" href="#home-1" role="tab"
                               aria-expanded="true">

                                <svg class="olymp-status-icon">
                                    <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-status-icon"></use>
                                </svg>

                                <span>Status</span>
                            </a>
                        </li>
                        <!--      <li class="nav-item">
                                  <a class="nav-link inline-items" data-toggle="tab" href="#profile-1" role="tab"
                                     aria-expanded="false">

                                      <svg class="olymp-multimedia-icon">
                                          <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-multimedia-icon"></use>
                                      </svg>

                                      <span>Multimedia</span>
                                  </a>
                              </li>

                              <li class="nav-item">
                                  <a class="nav-link inline-items" data-toggle="tab" href="#blog" role="tab"
                                     aria-expanded="false">
                                      <svg class="olymp-blog-icon">
                                          <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-blog-icon"></use>
                                      </svg>

                                      <span>Blog Post</span>
                                  </a>
                              </li>-->
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="home-1" role="tabpanel" aria-expanded="true">
                            <form id="myNewPost">
                                {{ csrf_field() }}
                                <div class="author-thumb">
                                    <img src="olympus/img/author-page.jpg" alt="author">
                                </div>
                                <div class="form-group with-icon label-floating is-empty">
                                    <label class="control-label">Share what you are thinking here...</label>
                                    <textarea class="form-control" id="textpost" name="text_of_post"
                                              placeholder=""></textarea>
                                    <ul id="choosephoto">
                                    </ul>
                                </div>

                                <div class="modal fade" id="modal" tabindex="-1" role="dialog"
                                     aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabel">Crop the image</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div style="max-width: 100%;">
                                                    <img id="image"
                                                         src="https://avatars0.githubusercontent.com/u/3456749">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    Cancel
                                                </button>
                                                <button type="button" class="btn btn-primary" id="crop">Crop</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="add-options-message">


                                    <!--   <a href="#" class="options-message"  data-toggle="tooltip" data-placement="top"
                                           data-original-title="ADD PHOTOS" >

                                           <input type="file" class="custom-file-input" id="inputGroupFile01" id="file_field"  style="display:none" accept="image/png, image/jpeg ,video/mp4">
                                            <svg class="olymp-camera-icon"> <!--data-toggle="modal"
                                                 data-target="#update-header-photo">
                                                <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                                            </svg>
                                        </a>-->

                                    <input class="form-control" type="file" hidden id="file_field" name="imagefile"
                                           accept="video/*,  video/x-m4v, video/webm, video/x-ms-wmv, video/x-msvideo, video/3gpp, video/flv, video/x-flv, video/mp4, video/quicktime, video/mpeg, video/ogv, .ts, .mkv, image/*, image/heic, image/heif">

                                    <label class="options-message" data-toggle="tooltip" title="ADD PHOTOS">
                                        <svg class="olymp-camera-icon" style="margin-bottom: -8px;">
                                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                                        </svg>
                                        <input type="file" class="sr-only" id="input" name="image" accept="image/*">
                                    </label>

                                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"
                                       data-original-title="TAG YOUR FRIENDS">
                                        <svg class="olymp-computer-icon">
                                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-computer-icon"></use>
                                        </svg>

                                    </a>

                                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"
                                       data-original-title="ADD LOCATION">
                                        <svg class="olymp-small-pin-icon">
                                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-small-pin-icon"></use>
                                        </svg>
                                    </a>

                                    <button type="submit" class="btn btn-primary btn-md-2 float-right btn-post">
                                        Share
                                    </button>
                                    <!-- <button class="btn btn-md-2 btn-border-think btn-transparent c-grey">Preview
                                      </button>-->

                                </div>
                            </form>
                        </div>

                      <!--  <div class="tab-pane" id="profile-1" role="tabpanel" aria-expanded="true">
                            <form>
                                <div class="author-thumb">
                                    <img src="olympus/img/author-page.jpg" alt="author">
                                </div>
                                <div class="form-group with-icon label-floating is-empty">
                                    <label class="control-label">Share what you are thinking here...</label>
                                    <textarea class="form-control" placeholder=""></textarea>
                                </div>
                                <div class="add-options-message">
                                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"
                                       data-original-title="ADD PHOTOS">
                                        <svg class="olymp-camera-icon" data-toggle="modal"
                                             data-target="#update-header-photo">
                                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                                        </svg>
                                    </a>
                                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"
                                       data-original-title="TAG YOUR FRIENDS">
                                        <svg class="olymp-computer-icon">
                                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-computer-icon"></use>
                                        </svg>
                                    </a>

                                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"
                                       data-original-title="ADD LOCATION">
                                        <svg class="olymp-small-pin-icon">
                                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-small-pin-icon"></use>
                                        </svg>
                                    </a>

                                    <button class="btn btn-primary btn-md-2">Post Status</button>
                                    <button class="btn btn-md-2 btn-border-think btn-transparent c-grey">Preview
                                    </button>

                                </div>

                            </form>
                        </div>

                        <div class="tab-pane" id="blog" role="tabpanel" aria-expanded="true">
                            <form>
                                <div class="author-thumb">
                                    <img src="olympus/img/author-page.jpg" alt="author">
                                </div>
                                <div class="form-group with-icon label-floating is-empty">
                                    <label class="control-label">Share what you are thinking here...</label>
                                    <textarea class="form-control" placeholder=""></textarea>
                                </div>
                                <div class="add-options-message">
                                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"
                                       data-original-title="ADD PHOTOS">
                                        <svg class="olymp-camera-icon" data-toggle="modal"
                                             data-target="#update-header-photo">
                                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                                        </svg>
                                    </a>
                                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"
                                       data-original-title="TAG YOUR FRIENDS">
                                        <svg class="olymp-computer-icon">
                                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-computer-icon"></use>
                                        </svg>
                                    </a>

                                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"
                                       data-original-title="ADD LOCATION">
                                        <svg class="olymp-small-pin-icon">
                                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-small-pin-icon"></use>
                                        </svg>
                                    </a>

                                    <button class="btn btn-primary btn-md-2">Post Status</button>
                                    <button class="btn btn-md-2 btn-border-think btn-transparent c-grey">Preview
                                    </button>

                                </div>

                            </form>
                        </div>-->
                    </div>
                </div>
            </div>
            <!-- ... end News Feed Form  -->

            <!--loader-->
            <div id="containerloader" style=" margin: 20px;  width: 588px;  height: 8px;  ">
                <style>
                    @media only screen and (max-width: 680px) {
                        #containerloader {
                            display: flex;
                            flex-direction: row;
                            width: 100%;
                        }
                    }
                </style>
            </div>
            <!--endloader-->

            <div id="newsfeed-items-grid">
                <div class="container" id="AreaForPost">
                    <div class="modal fade" id="reactions" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog window-popup create-friend-group "
                             role="document">
                            <div class="modal-content">
                                <a href="javascript:void(0)" class="close icon-close" data-dismiss="modal"
                                   aria-label="Close">
                                    <svg class="olymp-close-icon">
                                        <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                                    </svg>
                                </a>

                                <div class="modal-header">
                                    <h6 class="title">Users Who Reactioned With This Post</h6>
                                </div>

                                <div class="modal-body modal-body1" style="max-height: 500px; overflow-y: scroll">
                                    <ul id="users_reaction"
                                        class="widget w-friend-pages-added notification-list friend-requests dynamicContent">
                                        <div id="wait" style="
                                    display:    none;
                                    position:   fixed;
                                    z-index:    1000;
                                    top:        0;
                                    left:       0;
                                    height:     100%;
                                    width:      100%;
                                    background: rgba( 255, 255, 255, .8 )
                                    url('http://i.stack.imgur.com/FhHRx.gif')
                                    50% 50%
                                    no-repeat;"
                                        ></div>
                                    </ul>

                                    <a href="javascript:void(0)" class="btn btn-blue btn-lg full-width test"
                                       data-dismiss="modal">Close</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @foreach($posts as $post)

                        <div id="AllPostDiv{{$post->id}}" class="ui-block">

                            <article class="hentry post video">
                                <div class="post__author author vcard inline-items">
                                    <img src="{{$post->user->image}}"
                                         alt="author">

                                    <div class="author-date">
                                        <a class="h6 post__author-name fn" href="#">{{$post->user->display_name}}</a>
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
                                                <a href="javascript:void(0)" class="post-delete" id="{{$post->id}}">Delete
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
                                <p>{{$post->text}}</p>
                                @if($post->type == 'picture')
                                    <div class="modal fade" id="open-photo-popup-v1{{$post->id}}" tabindex="-1"
                                         role="dialog" aria-labelledby="open-photo-popup-v1" aria-hidden="true">
                                        <div class="modal-dialog window-popup open-photo-popup open-photo-popup-v1"
                                             role="document">
                                            <div class="modal-content">
                                                <a href="#" class="close icon-close" data-dismiss="modal"
                                                   aria-label="Close">
                                                    <svg class="olymp-close-icon">
                                                        <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                                                    </svg>
                                                </a>
                                                <div class="modal-body">
                                                    <div class="open-photo-thumb">
                                                        <div class="swiper-container" data-slide="fade">
                                                            <div class="swiper-wrapper">

                                                                @foreach($post->files as $file)
                                                                    <div class="swiper-slide">
                                                                        <div class="photo-item " style="display:block;">
                                                                            <img src="{{$file->store_name}}"
                                                                                 alt="photo">
                                                                            <div class="overlay"></div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>

                                                            <!--Prev Next Arrows-->

                                                            <svg class="btn-next-without olymp-popup-right-arrow">
                                                                <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-popup-right-arrow"></use>
                                                            </svg>

                                                            <svg class="btn-prev-without olymp-popup-left-arrow">
                                                                <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-popup-left-arrow"></use>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-container" data-slide="fade">
                                        <div class="swiper-wrapper">
                                            @foreach($post->files as $file)
                                                <div class="swiper-slide">
                                                    <div class="photo-item" style="display:block;">
                                                        <img src="{{$file->store_name}}"
                                                             alt="photo">
                                                        <div class="flexFont" style="position: absolute;
                                                        bottom: 1%;
                                                        border-radius: 5px;
                                                        -ms-transform: rotate(45deg); /* IE 9 */
                                                        -webkit-transform: rotate(45deg); /* Safari 3-8 */
                                                        transform: rotate(45deg);">
                                                            <p style="padding: 10px;
                                                            color: #f2f3f7;
                                                            background-color: #9a9fbf85;
                                                            border-radius: 50px;">Friending</p></div>
                                                        <div class="overlay"></div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <a data-toggle="modal" data-target="#open-photo-popup-v1{{$post->id}}"
                                               href="#" class="full-block"></a>
                                        </div>
                                        <svg class="btn-next-without olymp-popup-right-arrow">
                                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-popup-right-arrow"></use>
                                        </svg>

                                        <svg class="btn-prev-without olymp-popup-left-arrow">
                                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-popup-left-arrow"></use>
                                        </svg>
                                    </div>
                                @elseif($post->type == 'video')
                                    <div class="swiper-container" data-slide="fade">
                                        <div class="swiper-wrapper">
                                            @foreach($post->files as $file)
                                                <div class="swiper-slide my-video">
                                                    <div class="photo-item" style="display:block;">
                                                        <div style="background-color: black;display: flex;justify-content: center;
                                                        align-items: center;" class="video_post">
                                                            <video class="video_post_element my-video"
                                                                   {{--id="forAutoPlay{{$post->id}}"--}} controls
                                                                   {{--autoplay--}} muted oncanplay="this.muted=true"
                                                                   src="{{$file->store_name}}"
                                                                   {{--data-src=""--}} type="video/mp4"
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
                                <div style="display: inline-block;">
                                    <ul>
                                        @foreach($post->topics as $topic)
                                            <li style="margin:5px; float: left">
                                                <a style="border-radius: 25px;
                                       background-color: #9a9fbf;
                                       display: block;
                                       text-align: center;
                                       color: aliceblue;
                                       padding: 3px;
                                       padding-left: 8px;
                                       padding-right: 8px;">
                                                    {{$topic->name}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            <!--<div class="post-additional-info inline-items">

                                    <a id="{{$post->id}}" class="post-add-icon inline-items post_reacts_users">
                                        <svg class="olymp-heart-icon">
                                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
                                        </svg>
                                        <span id="reactions_count{{$post->id}}">{{$post->reactions->count()}}</span>
                                    </a>


                                    <ul id="reactioners_photos{{$post->id}}" class="friends-harmonic">
                                      @php($liked=false)
                            @foreach($post->reactions as $reaction)
                                <?php
                                $liked = $reaction->user->id == Auth::id() || $liked
                                ?>
                                @if($loop->index<5)
                                    <li>
                                         <a href="#">
                                            <img src="{{$reaction->user->image}}" alt="friend">
                                                    </a>
                                                </li>
                                            @else
                                    @break
                                @endif
                            @endforeach
                                    </ul>

                                    <div class="names-people-likes" id="reactioners_name{{$post->id}}">
                                        @if($post->reactions->count()>2)
                                <a href="#">{{$post->reactions[0]->user->display_name}}</a>, <a
                                                    href="#">{{$post->reactions[1]->user->display_name}}</a> and
                                            <br>{{$post->reactions->count()-2}} more react this
                                        @elseif($post->reactions->count()==2)
                                <a href="#">{{$post->reactions[0]->user->display_name}}</a>, <a
                                                    href="#">{{$post->reactions[1]->user->display_name}}</a>
                                        @elseif($post->reactions->count()==1)
                                <a href="#">{{$post->reactions[0]->user->display_name}}</a>
                                        @endif
                                    </div>

                                    <div class="comments-shared">
                                        <a href="#" class="post-add-icon inline-items">
                                            <svg class="olymp-speech-balloon-icon">
                                                <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use>
                                            </svg>

                                            <span id="comment_count{{$post->id}}">{{$post->comments_count}}</span>
                                        </a>

                                        <a href="#" class="post-add-icon inline-items">
                                            <svg class="olymp-share-icon">
                                                <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-share-icon"></use>
                                            </svg>
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
                                    </div>

                                </div>-->
                                <!-- new reactions -->
                                <div class="post-additional-info form-inline post-control-button flex-container reaction">
                                    <a id="btn_react{{$post->id}}" class="btn btn-control btn_react_first "
                                       style="background-color: {{$liked?'red':''}};">
                                        <svg class="olymp-like-post-icon">
                                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-like-post-icon"></use>
                                        </svg>

                                    </a>

                                    <a id="comment_post{{$post->id}}" class="btn btn-control  ">
                                        <svg class="olymp-comments-post-icon">
                                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
                                        </svg>

                                    </a>

                                    <a href="#" class="btn btn-control ">
                                        <svg class="olymp-share-icon">
                                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-share-icon"></use>
                                        </svg>

                                    </a>

                                    <ul id="reactioners_photos{{$post->id}}"
                                        style=" position: absolute; right: 27%;"
                                        class="friends-harmonic inline-items float-right">
                                        @php($liked=false)
                                        @foreach($post->reactions as $reaction)
                                            <?php
                                            $liked = $reaction->user->id == Auth::id() || $liked
                                            ?>
                                            @if($loop->index<5)
                                                <li>
                                                    <a href="#">
                                                        <img src="{{$reaction->user->image}}" alt="friend">
                                                    </a>
                                                </li>
                                            @else
                                                @break
                                            @endif
                                        @endforeach
                                    </ul>

                                    <div class="post_reacts_users" id="{{$post->id}}"
                                         style="position: absolute;right: 5%;">
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
                                        <span {{--style="position: absolute;right: 5%;"--}}>&nbsp;Engagements</span>
                                    </div>

                                    <style>
                                        @media only screen and (max-width: 481px) {
                                            .reaction {
                                                display: flex;
                                                flex-direction: row;
                                                width: 100%;

                                            }
                                            .btn_react_first{
                                                margin-top: 10px;
                                            }

                                            /*  .post-control-button .btn-control {
                                                  margin-top: 10px;
                                              }*/
                                        }
                                    </style>
                                </div>
                                <!-- old reactions -->
                            <!-- <div style="position: absolute; top: 18px;right:20px;">
                                        <ul hidden  id="post_{{$post->id}}" style=" display: flex;margin-right: -5px;">
                                            @foreach($reactions as $reaction)
                                <li id="reaction{{$reaction->id}}" style="margin: 3px;margin-right: {{$loop->last?8:3}}px;">
                                                    <a>
                                                        <img src="{{$reaction->icon}}">
                                                    </a>
                                                </li>
                                            @endforeach
                                    </ul>
                                </div>-->
                            <!-- <div class="control-block-button post-control-button">
                                    <a id="btn_react{{$post->id}}" class="btn btn-control"
                                       style="background-color: {{$liked?'red':''}}">
                                        <svg class="olymp-like-post-icon">
                                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-like-post-icon"></use>
                                        </svg>
                                    </a>

                                    <a id="comment_post{{$post->id}}" class="btn btn-control">
                                        <svg class="olymp-comments-post-icon">
                                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
                                        </svg>
                                    </a>

                                    <a href="#" class="btn btn-control">
                                        <svg class="olymp-share-icon">
                                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-share-icon"></use>
                                        </svg>
                                    </a>

                                </div>-->
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
                                                   href="#">{{$post->newest_comment->user->display_name}}</a>
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
                                                        <a href="#">Edit comment</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)" class="comment-delete"
                                                           id="{{$post->newest_comment->id}}">Delete comment</a>
                                                    </li>

                                                </ul>
                                            </div>

                                        </div>

                                        <p>{{$post->newest_comment->text}}
                                        </p>

                                        <a href="#" class="post-add-icon inline-items">
                                            <svg class="olymp-heart-icon">
                                                <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
                                            </svg>
                                            <span>{{$post->newest_comment->reactions->count()}}</span>
                                        </a>
                                        <a href="#" class="reply">Reply</a>
                                    </li>


                                    <!-- ... end Comments -->

                                    <a href="#" class="more-comments">View more comments <span>+</span></a>
                                @endif
                            </ul>

                            <!-- Comment Form  -->

                            <form class="comment-form inline-items">

                                <div class="post__author author vcard inline-items">
                                    <img src="olympus/img/author-page.jpg" alt="author">

                                    <div class="form-group with-icon-right ">
                                <textarea id="comment_post_form{{$post->id}}" class="form-control"
                                          placeholder="Your Comment Here" required></textarea>
                                        <div class="add-options-message">
                                            <a href="#" class="options-message" data-toggle="modal"
                                               data-target="#update-header-photo">
                                                <svg class="olymp-camera-icon">
                                                    <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <button id="btn_comment_{{$post->id}}" class="btn btn-md-2 btn-primary">Post Comment
                                </button>

                                <button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color">Cancel
                                </button>

                            </form>

                            <!-- ... end Comment Form  -->
                        </div>

                    @endforeach

                    <div class="ui-block">

                        <article class="hentry post video">

                            <div class="post__author author vcard inline-items">
                                <img src="olympus/img/avatar7-sm.jpg" alt="author">

                                <div class="author-date">
                                    <a class="h6 post__author-name fn" href="#">Marina Valentine</a> shared a <a
                                            href="#">link</a>
                                    <div class="post__date">
                                        <time class="published" datetime="2004-07-24T18:18">
                                            March 4 at 2:05pm
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
                                            <a href="#">Delete Post</a>
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

                            <p>Hey <a href="#">Cindi</a>, you should really check out this new song by Iron Maid. The
                                next
                                time they come to the city we should totally go!</p>

                            <div class="post-video">
                                <div class="video-thumb">
                                    <img src="olympus/img/video-youtube1.jpg" alt="photo">
                                    <a href="https://youtube.com/watch?v=excVFQ2TWig" class="play-video">
                                        <svg class="olymp-play-icon">
                                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-play-icon"></use>
                                        </svg>
                                    </a>
                                </div>

                                <div class="video-content">
                                    <a href="#" class="h4 title">Iron Maid - ChillGroves</a>
                                    <p>Lorem ipsum dolor sit amet, consectetur ipisicing elit, sed do eiusmod tempor
                                        incididunt
                                        ut labore et dolore magna aliqua...
                                    </p>
                                    <a href="#" class="link-site">YOUTUBE.COM</a>
                                </div>
                            </div>

                            <div class="post-additional-info inline-items">

                                <a href="#" class="post-add-icon inline-items">
                                    <svg class="olymp-heart-icon">
                                        <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
                                    </svg>
                                    <span>18</span>
                                </a>

                                <ul class="friends-harmonic">
                                    <li>
                                        <a href="#">
                                            <img src="olympus/img/friend-harmonic9.jpg" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="olympus/img/friend-harmonic10.jpg" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="olympus/img/friend-harmonic7.jpg" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="olympus/img/friend-harmonic8.jpg" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="olympus/img/friend-harmonic11.jpg" alt="friend">
                                        </a>
                                    </li>
                                </ul>

                                <div class="names-people-likes">
                                    <a href="#">Jenny</a>, <a href="#">Robert</a> and
                                    <br>18 more liked this
                                </div>

                                <div class="comments-shared">
                                    <a href="#" class="post-add-icon inline-items">
                                        <svg class="olymp-speech-balloon-icon">
                                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use>
                                        </svg>

                                        <span>0</span>
                                    </a>

                                    <a href="#" class="post-add-icon inline-items">
                                        <svg class="olymp-share-icon">
                                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-share-icon"></use>
                                        </svg>

                                        <span>16</span>
                                    </a>
                                </div>


                            </div>

                            <div class="control-block-button post-control-button">

                                <a href="#" class="btn btn-control">
                                    <svg class="olymp-like-post-icon">
                                        <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-like-post-icon"></use>
                                    </svg>
                                </a>

                                <a href="#" class="btn btn-control">
                                    <svg class="olymp-comments-post-icon">
                                        <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
                                    </svg>
                                </a>

                                <a href="#" class="btn btn-control">
                                    <svg class="olymp-share-icon">
                                        <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-share-icon"></use>
                                    </svg>
                                </a>

                            </div>

                        </article>
                    </div>

                    <div class="ui-block">


                        <article class="hentry post">

                            <div class="post__author author vcard inline-items">
                                <img src="olympus/img/avatar10-sm.jpg" alt="author">

                                <div class="author-date">
                                    <a class="h6 post__author-name fn" href="#">Elaine Dreyfuss</a>
                                    <div class="post__date">
                                        <time class="published" datetime="2004-07-24T18:18">
                                            9 hours ago
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
                                            <a href="#">Delete Post</a>
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

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempo incididunt
                                ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco
                                laboris consequat.
                            </p>

                            <div class=" control-block-button post-additional-info inline-items ">

                                <a href="#" class="post-add-icon inline-items">
                                    <svg class="olymp-heart-icon">
                                        <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
                                    </svg>
                                    <span>24</span>
                                </a>

                                <ul class="friends-harmonic">
                                    <li>
                                        <a href="#">
                                            <img src="olympus/img/friend-harmonic7.jpg" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="olympus/img/friend-harmonic8.jpg" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="olympus/img/friend-harmonic9.jpg" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="olympus/img/friend-harmonic10.jpg" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="olympus/img/friend-harmonic11.jpg" alt="friend">
                                        </a>
                                    </li>
                                </ul>

                                <div class="names-people-likes">
                                    <a href="#">You</a>, <a href="#">Elaine</a> and
                                    <br>22 more liked this
                                </div>


                                <a href="#" class="btn btn-control">
                                    <svg class="olymp-like-post-icon">
                                        <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-like-post-icon"></use>
                                    </svg>
                                </a>

                                <a href="#" class="btn btn-control">
                                    <svg class="olymp-comments-post-icon">
                                        <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
                                    </svg>
                                </a>

                                <a href="#" class="btn btn-control">
                                    <svg class="olymp-share-icon">
                                        <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-share-icon"></use>
                                    </svg>
                                </a>

                            </div>

                            <div class="comments-shared inline-items">
                                <a href="#" class="post-add-icon inline-items">
                                    <svg class="olymp-speech-balloon-icon">
                                        <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use>
                                    </svg>
                                    <span>17</span>
                                </a>

                                <a href="#" class="post-add-icon inline-items">
                                    <svg class="olymp-share-icon">
                                        <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-share-icon"></use>
                                    </svg>
                                    <span>24</span>
                                </a>
                            </div>

                            <ul class="friends-harmonic inline-items">
                                <li>
                                    <a href="#">
                                        <img src="olympus/img/friend-harmonic7.jpg" alt="friend">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="olympus/img/friend-harmonic8.jpg" alt="friend">
                                    </a>
                                </li>
                                <li>

                                    <a href="#">
                                        <img src="olympus/img/friend-harmonic9.jpg" alt="friend">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="olympus/img/friend-harmonic10.jpg" alt="friend">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="olympus/img/friend-harmonic11.jpg" alt="friend">
                                    </a>
                                </li>
                            </ul>

                            <div class="control-block-button post-control-button">

                                <a href="#" class="btn btn-control">
                                    <svg class="olymp-like-post-icon">
                                        <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-like-post-icon"></use>
                                    </svg>
                                </a>

                                <a href="#" class="btn btn-control">
                                    <svg class="olymp-comments-post-icon">
                                        <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
                                    </svg>
                                </a>

                                <a href="#" class="btn btn-control">
                                    <svg class="olymp-share-icon">
                                        <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-share-icon"></use>
                                    </svg>
                                </a>

                            </div>

                        </article>

                        <!-- Comments -->

                        <ul class="comments-list">
                            <li class="comment-item">
                                <div class="post__author author vcard inline-items">
                                    <img src="olympus/img/author-page.jpg" alt="author">

                                    <div class="author-date">
                                        <a class="h6 post__author-name fn" href="02-ProfilePage.html">James Spiegel</a>
                                        <div class="post__date">
                                            <time class="published" datetime="2004-07-24T18:18">
                                                38 mins ago
                                            </time>
                                        </div>
                                    </div>

                                    <a href="#" class="more">
                                        <svg class="olymp-three-dots-icon">
                                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                        </svg>
                                    </a>

                                </div>

                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium der
                                    doloremque
                                    laudantium.</p>

                                <a href="#" class="post-add-icon inline-items">
                                    <svg class="olymp-heart-icon">
                                        <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
                                    </svg>
                                    <span>3</span>
                                </a>
                                <a href="#" class="reply">Reply</a>
                            </li>
                            <li class="comment-item">
                                <div class="post__author author vcard inline-items">
                                    <img src="olympus/img/avatar1-sm.jpg" alt="author">

                                    <div class="author-date">
                                        <a class="h6 post__author-name fn" href="#">Mathilda Brinker</a>
                                        <div class="post__date">
                                            <time class="published" datetime="2004-07-24T18:18">
                                                1 hour ago
                                            </time>
                                        </div>
                                    </div>

                                    <a href="#" class="more">
                                        <svg class="olymp-three-dots-icon">
                                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                        </svg>
                                    </a>

                                </div>

                                <p>Ratione voluptatem sequi en lod nesciunt. Neque porro quisquam est, quinder dolorem
                                    ipsum
                                    quia dolor sit amet, consectetur adipisci velit en lorem ipsum duis aute irure dolor
                                    in
                                    reprehenderit in voluptate velit esse cillum.
                                </p>

                                <a href="#" class="post-add-icon inline-items">
                                    <svg class="olymp-heart-icon">
                                        <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
                                    </svg>
                                    <span>8</span>
                                </a>
                                <a href="#" class="reply">Reply</a>
                            </li>
                        </ul>

                        <!-- ... end Comments -->

                        <a href="#" class="more-comments">View more comments <span>+</span></a>


                        <!-- Comment Form  -->

                        <form class="comment-form inline-items">

                            <div class="post__author author vcard inline-items">
                                <img src="olympus/img/author-page.jpg" alt="author">

                                <div class="form-group with-icon-right ">
                                    <textarea class="form-control" placeholder=""></textarea>
                                    <div class="add-options-message">
                                        <a href="#" class="options-message" data-toggle="modal"
                                           data-target="#update-header-photo">
                                            <svg class="olymp-camera-icon">
                                                <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-md-2 btn-primary">Post Comment</button>

                            <button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color">Cancel
                            </button>

                        </form>

                        <!-- ... end Comment Form  -->
                    </div>

                    <div class="ui-block">

                        <article class="hentry post has-post-thumbnail">

                            <div class="post__author author vcard inline-items">
                                <img src="olympus/img/avatar5-sm.jpg" alt="author">

                                <div class="author-date">
                                    <a class="h6 post__author-name fn" href="#">Green Goo Rock</a>
                                    <div class="post__date">
                                        <time class="published" datetime="2004-07-24T18:18">
                                            March 8 at 6:42pm
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
                                            <a href="#">Delete Post</a>
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

                            <p>Hey guys! We are gona be playing this Saturday of <a href="#">The Marina Bar</a> for
                                their
                                new Mystic Deer Party.
                                If you wanna hang out and have a really good time, come and join us. We’l be waiting for
                                you!
                            </p>

                            <div class="post-thumb">
                                <img src="olympus/img/post__thumb1.jpg" alt="photo">
                            </div>

                            <div class="post-additional-info inline-items">

                                <a href="#" class="post-add-icon inline-items">
                                    <svg class="olymp-heart-icon">
                                        <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
                                    </svg>
                                    <span>49</span>
                                </a>

                                <ul class="friends-harmonic">
                                    <li>
                                        <a href="#">
                                            <img src="olympus/img/friend-harmonic9.jpg" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="olympus/img/friend-harmonic10.jpg" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="olympus/img/friend-harmonic7.jpg" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="olympus/img/friend-harmonic8.jpg" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="olympus/img/friend-harmonic11.jpg" alt="friend">
                                        </a>
                                    </li>
                                </ul>

                                <div class="names-people-likes">
                                    <a href="#">Jimmy</a>, <a href="#">Andrea</a> and
                                    <br>47 more liked this
                                </div>


                                <div class="comments-shared">
                                    <a href="#" class="post-add-icon inline-items">
                                        <svg class="olymp-speech-balloon-icon">
                                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use>
                                        </svg>
                                        <span>264</span>
                                    </a>

                                    <a href="#" class="post-add-icon inline-items">
                                        <svg class="olymp-share-icon">
                                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-share-icon"></use>
                                        </svg>
                                        <span>37</span>
                                    </a>
                                </div>


                            </div>

                            <div class="control-block-button post-control-button">

                                <a href="#" class="btn btn-control">
                                    <svg class="olymp-like-post-icon">
                                        <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-like-post-icon"></use>
                                    </svg>
                                </a>

                                <a href="#" class="btn btn-control">
                                    <svg class="olymp-comments-post-icon">
                                        <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
                                    </svg>
                                </a>

                                <a href="#" class="btn btn-control">
                                    <svg class="olymp-share-icon">
                                        <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-share-icon"></use>
                                    </svg>
                                </a>

                            </div>

                        </article>
                    </div>

                    <div class="ui-block">

                        <article class="hentry post has-post-thumbnail">

                            <div class="post__author author vcard inline-items">
                                <img src="olympus/img/avatar3-sm.jpg" alt="author">

                                <div class="author-date">
                                    <a class="h6 post__author-name fn" href="#">Sarah Hetfield</a>
                                    <div class="post__date">
                                        <time class="published" datetime="2004-07-24T18:18">
                                            March 2 at 9:06am
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
                                            <a href="#">Delete Post</a>
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

                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                nulla
                                pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                deserunt
                                mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit
                                voluptatem
                                accusantium doloremque.
                            </p>

                            <div class="post-additional-info inline-items">

                                <a href="#" class="post-add-icon inline-items">
                                    <svg class="olymp-heart-icon">
                                        <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
                                    </svg>
                                    <span>0 Likes</span>
                                </a>

                                <div class="comments-shared">
                                    <a href="#" class="post-add-icon inline-items">
                                        <svg class="olymp-speech-balloon-icon">
                                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use>
                                        </svg>
                                        <span>0 Comments</span>
                                    </a>

                                    <a href="#" class="post-add-icon inline-items">
                                        <svg class="olymp-share-icon">
                                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-share-icon"></use>
                                        </svg>
                                        <span>2 Shares</span>
                                    </a>
                                </div>


                            </div>

                            <div class="control-block-button post-control-button">

                                <a href="#" class="btn btn-control">
                                    <svg class="olymp-like-post-icon">
                                        <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-like-post-icon"></use>
                                    </svg>
                                </a>

                                <a href="#" class="btn btn-control">
                                    <svg class="olymp-comments-post-icon">
                                        <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
                                    </svg>
                                </a>

                                <a href="#" class="btn btn-control">
                                    <svg class="olymp-share-icon">
                                        <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-share-icon"></use>
                                    </svg>
                                </a>

                            </div>

                        </article>
                    </div>

                    <div class="ui-block">

                        <article class="hentry post has-post-thumbnail">

                            <div class="post__author author vcard inline-items">
                                <img src="olympus/img/avatar2-sm.jpg" alt="author">

                                <div class="author-date">
                                    <a class="h6 post__author-name fn" href="#">Nicholas Grissom</a>
                                    <div class="post__date">
                                        <time class="published" datetime="2004-07-24T18:18">
                                            March 2 at 8:34am
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
                                            <a href="#">Delete Post</a>
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

                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                nulla
                                pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                deserunt
                                mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit
                                voluptatem
                                accusantium doloremque.
                            </p>

                            <div class="post-additional-info inline-items">

                                <a href="#" class="post-add-icon inline-items">
                                    <svg class="olymp-heart-icon">
                                        <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
                                    </svg>
                                    <span>22</span>
                                </a>

                                <ul class="friends-harmonic">
                                    <li>
                                        <a href="#">
                                            <img src="olympus/img/friend-harmonic9.jpg" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="olympus/img/friend-harmonic10.jpg" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="olympus/img/friend-harmonic7.jpg" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="olympus/img/friend-harmonic8.jpg" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="olympus/img/friend-harmonic11.jpg" alt="friend">
                                        </a>
                                    </li>
                                </ul>

                                <div class="names-people-likes">
                                    <a href="#">Jimmy</a>, <a href="#">Andrea</a> and
                                    <br>47 more liked this
                                </div>


                                <div class="comments-shared">
                                    <a href="#" class="post-add-icon inline-items">
                                        <svg class="olymp-speech-balloon-icon">
                                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use>
                                        </svg>
                                        <span>0</span>
                                    </a>

                                    <a href="#" class="post-add-icon inline-items">
                                        <svg class="olymp-share-icon">
                                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-share-icon"></use>
                                        </svg>
                                        <span>2</span>
                                    </a>
                                </div>


                            </div>

                            <div class="control-block-button post-control-button">

                                <a href="#" class="btn btn-control">
                                    <svg class="olymp-like-post-icon">
                                        <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-like-post-icon"></use>
                                    </svg>
                                </a>

                                <a href="#" class="btn btn-control">
                                    <svg class="olymp-comments-post-icon">
                                        <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
                                    </svg>
                                </a>

                                <a href="#" class="btn btn-control">
                                    <svg class="olymp-share-icon">
                                        <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-share-icon"></use>
                                    </svg>
                                </a>

                            </div>

                        </article>
                    </div>

                </div>
                <a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="items-to-load.html"
                   data-container="newsfeed-items-grid">
                    <svg class="olymp-three-dots-icon">
                        <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                    </svg>
                </a>
            </div>
        </main>

        <!-- ... end Main Content -->


        <!-- Left Sidebar -->

        <aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-12 col-12">
            <div class="ui-block">

                <!-- W-Weather -->

                <div class="widget w-wethear">
                    <a href="#" class="more">
                        <svg class="olymp-three-dots-icon">
                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                        </svg>
                    </a>

                    <div class="wethear-now inline-items">
                        <div class="temperature-sensor">64°</div>
                        <div class="max-min-temperature">
                            <span>58°</span>
                            <span>76°</span>
                        </div>

                        <svg class="olymp-weather-partly-sunny-icon">
                            <use xlink:href="olympus/svg-icons/sprites/icons-weather.svg#olymp-weather-partly-sunny-icon"></use>
                        </svg>
                    </div>

                    <div class="wethear-now-description">
                        <div class="climate">Partly Sunny</div>
                        <span>Real Feel: <span>67°</span></span>
                        <span>Chance of Rain: <span>49%</span></span>
                    </div>

                    <ul class="weekly-forecast">

                        <li>
                            <div class="day">sun</div>
                            <svg class="olymp-weather-sunny-icon">
                                <use xlink:href="olympus/svg-icons/sprites/icons-weather.svg#olymp-weather-sunny-icon"></use>
                            </svg>

                            <div class="temperature-sensor-day">60°</div>
                        </li>

                        <li>
                            <div class="day">mon</div>
                            <svg class="olymp-weather-partly-sunny-icon">
                                <use xlink:href="olympus/svg-icons/sprites/icons-weather.svg#olymp-weather-partly-sunny-icon"></use>
                            </svg>
                            <div class="temperature-sensor-day">58°</div>
                        </li>

                        <li>
                            <div class="day">tue</div>
                            <svg class="olymp-weather-cloudy-icon">
                                <use xlink:href="olympus/svg-icons/sprites/icons-weather.svg#olymp-weather-cloudy-icon"></use>
                            </svg>

                            <div class="temperature-sensor-day">67°</div>
                        </li>

                        <li>
                            <div class="day">wed</div>
                            <svg class="olymp-weather-rain-icon">
                                <use xlink:href="olympus/svg-icons/sprites/icons-weather.svg#olymp-weather-rain-icon"></use>
                            </svg>

                            <div class="temperature-sensor-day">70°</div>
                        </li>

                        <li>
                            <div class="day">thu</div>
                            <svg class="olymp-weather-storm-icon">
                                <use xlink:href="olympus/svg-icons/sprites/icons-weather.svg#olymp-weather-storm-icon"></use>
                            </svg>

                            <div class="temperature-sensor-day">58°</div>
                        </li>

                        <li>
                            <div class="day">fri</div>
                            <svg class="olymp-weather-snow-icon">
                                <use xlink:href="olympus/svg-icons/sprites/icons-weather.svg#olymp-weather-snow-icon"></use>
                            </svg>

                            <div class="temperature-sensor-day">68°</div>
                        </li>

                        <li>
                            <div class="day">sat</div>

                            <svg class="olymp-weather-wind-icon-header">
                                <use xlink:href="olympus/svg-icons/sprites/icons-weather.svg#olymp-weather-wind-icon-header"></use>
                            </svg>

                            <div class="temperature-sensor-day">65°</div>
                        </li>

                    </ul>

                    <div class="date-and-place">
                        <h5 class="date">Saturday, March 26th</h5>
                        <div class="place">San Francisco, CA</div>
                    </div>

                </div>

                <!-- W-Weather -->            </div>

            <div class="ui-block">

                <!-- W-Calendar -->

                <div class="w-calendar calendar-container">
                    <div class="calendar">
                        <header>
                            <h6 class="month">March 2017</h6>
                            <a class="calendar-btn-prev fas fa-angle-left" href="#"></a>
                            <a class="calendar-btn-next fas fa-angle-right" href="#"></a>
                        </header>
                        <table>
                            <thead>
                            <tr>
                                <td>Mon</td>
                                <td>Tue</td>
                                <td>Wed</td>
                                <td>Thu</td>
                                <td>Fri</td>
                                <td>Sat</td>
                                <td>San</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td data-month="12" data-day="1">1</td>
                                <td data-month="12" data-day="2" class="event-uncomplited event-complited">
                                    2
                                </td>
                                <td data-month="12" data-day="3">3</td>
                                <td data-month="12" data-day="4">4</td>
                                <td data-month="12" data-day="5">5</td>
                                <td data-month="12" data-day="6">6</td>
                                <td data-month="12" data-day="7">7</td>
                            </tr>
                            <tr>
                                <td data-month="12" data-day="8">8</td>
                                <td data-month="12" data-day="9">9</td>
                                <td data-month="12" data-day="10" class="event-complited">10</td>
                                <td data-month="12" data-day="11">11</td>
                                <td data-month="12" data-day="12">12</td>
                                <td data-month="12" data-day="13">13</td>
                                <td data-month="12" data-day="14">14</td>
                            </tr>
                            <tr>
                                <td data-month="12" data-day="15" class="event-complited-2">15</td>
                                <td data-month="12" data-day="16">16</td>
                                <td data-month="12" data-day="17">17</td>
                                <td data-month="12" data-day="18">18</td>
                                <td data-month="12" data-day="19">19</td>
                                <td data-month="12" data-day="20">20</td>
                                <td data-month="12" data-day="21">21</td>
                            </tr>
                            <tr>
                                <td data-month="12" data-day="22">22</td>
                                <td data-month="12" data-day="23">23</td>
                                <td data-month="12" data-day="24">24</td>
                                <td data-month="12" data-day="25">25</td>
                                <td data-month="12" data-day="26">26</td>
                                <td data-month="12" data-day="27">27</td>
                                <td data-month="12" data-day="28" class="event-uncomplited">28</td>
                            </tr>
                            <tr>
                                <td data-month="12" data-day="29">29</td>
                                <td data-month="12" data-day="30">30</td>
                                <td data-month="12" data-day="31">31</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="list">

                            <div id="accordion-1" role="tablist" aria-multiselectable="true" class="day-event"
                                 data-month="12" data-day="2">
                                <div class="ui-block-title ui-block-title-small">
                                    <h6 class="title">TODAY’S EVENTS</h6>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingOne-1">
                                        <div class="event-time">
                                            <span class="circle"></span>
                                            <time datetime="2004-07-24T18:18">9:00am</time>
                                            <a href="#" class="more">
                                                <svg class="olymp-three-dots-icon">
                                                    <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                                </svg>
                                            </a>
                                        </div>
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-1"
                                               aria-expanded="true" aria-controls="collapseOne-1">
                                                Breakfast at the Agency
                                                <svg class="olymp-dropdown-arrow-icon">
                                                    <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                                                </svg>
                                            </a>
                                        </h5>
                                    </div>

                                    <div id="collapseOne-1" class="collapse" role="tabpanel">
                                        <div class="card-body">
                                            Hi Guys! I propose to go a litle earlier at the agency to have breakfast and
                                            talk a little more about the new design project we have been working on.
                                            Cheers!
                                        </div>
                                        <div class="place inline-items">
                                            <svg class="olymp-add-a-place-icon">
                                                <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-add-a-place-icon"></use>
                                            </svg>
                                            <span>Daydreamz Agency</span>
                                        </div>

                                        <ul class="friends-harmonic inline-items">
                                            <li>
                                                <a href="#">
                                                    <img src="olympus/img/friend-harmonic5.jpg" alt="friend">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="olympus/img/friend-harmonic10.jpg" alt="friend">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="olympus/img/friend-harmonic7.jpg" alt="friend">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="olympus/img/friend-harmonic8.jpg" alt="friend">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="olympus/img/friend-harmonic2.jpg" alt="friend">
                                                </a>
                                            </li>
                                            <li class="with-text">
                                                Will Assist
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header" role="tab" id="headingTwo-1">
                                        <div class="event-time">
                                            <span class="circle"></span>
                                            <time datetime="2004-07-24T18:18">9:00am</time>
                                            <a href="#" class="more">
                                                <svg class="olymp-three-dots-icon">
                                                    <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                                </svg>
                                            </a>
                                        </div>
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo-1"
                                               aria-expanded="true" aria-controls="collapseTwo-1">
                                                Send the new “Olympus” project files to the Agency
                                                <svg class="olymp-dropdown-arrow-icon">
                                                    <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                                                </svg>
                                            </a>
                                        </h5>
                                    </div>

                                    <div id="collapseTwo-1" class="collapse" role="tabpanel">
                                        <div class="card-body">
                                            Hi Guys! I propose to go a litle earlier at the agency to have breakfast and
                                            talk a little more about the new design project we have been working on.
                                            Cheers!
                                        </div>
                                    </div>

                                </div>

                                <div class="card">
                                    <div class="card-header" role="tab" id="headingThree-1">
                                        <div class="event-time">
                                            <span class="circle"></span>
                                            <time datetime="2004-07-24T18:18">6:30am</time>
                                            <a href="#" class="more">
                                                <svg class="olymp-three-dots-icon">
                                                    <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                                </svg>
                                            </a>
                                        </div>
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                               href="#" aria-expanded="false">
                                                Take Querty to the Veterinarian
                                            </a>
                                        </h5>
                                    </div>
                                    <div class="place inline-items">
                                        <svg class="olymp-add-a-place-icon">
                                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-add-a-place-icon"></use>
                                        </svg>
                                        <span>Daydreamz Agency</span>
                                    </div>
                                </div>

                                <a href="#" class="check-all">Check all your Events</a>
                            </div>

                            <div id="accordion-2" role="tablist" aria-multiselectable="true" class="day-event"
                                 data-month="12" data-day="10">
                                <div class="ui-block-title ui-block-title-small">
                                    <h6 class="title">TODAY’S EVENTS</h6>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingOne-2">
                                        <div class="event-time">
                                            <span class="circle"></span>
                                            <time datetime="2004-07-24T18:18">9:00am</time>
                                            <a href="#" class="more">
                                                <svg class="olymp-three-dots-icon">
                                                    <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                                </svg>
                                            </a>
                                        </div>
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-2"
                                               aria-expanded="true" aria-controls="collapseOne-2">
                                                Breakfast at the Agency
                                                <svg class="olymp-dropdown-arrow-icon">
                                                    <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                                                </svg>
                                            </a>
                                        </h5>
                                    </div>

                                    <div id="collapseOne-2" class="collapse" role="tabpanel">
                                        <div class="card-body">
                                            Hi Guys! I propose to go a litle earlier at the agency to have breakfast and
                                            talk a little more about the new design project we have been working on.
                                            Cheers!
                                        </div>
                                        <div class="place inline-items">
                                            <svg class="olymp-add-a-place-icon">
                                                <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-add-a-place-icon"></use>
                                            </svg>
                                            <span>Daydreamz Agency</span>
                                        </div>

                                        <ul class="friends-harmonic inline-items">
                                            <li>
                                                <a href="#">
                                                    <img src="olympus/img/friend-harmonic5.jpg" alt="friend">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="olympus/img/friend-harmonic10.jpg" alt="friend">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="olympus/img/friend-harmonic7.jpg" alt="friend">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="olympus/img/friend-harmonic8.jpg" alt="friend">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="olympus/img/friend-harmonic2.jpg" alt="friend">
                                                </a>
                                            </li>
                                            <li class="with-text">
                                                Will Assist
                                            </li>
                                        </ul>
                                    </div>

                                </div>

                                <a href="#" class="check-all">Check all your Events</a>
                            </div>

                            <div id="accordion-3" role="tablist" aria-multiselectable="true" class="day-event"
                                 data-month="12" data-day="15">
                                <div class="ui-block-title ui-block-title-small">
                                    <h6 class="title">TODAY’S EVENTS</h6>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingOne-3">
                                        <div class="event-time">
                                            <span class="circle"></span>
                                            <time datetime="2004-07-24T18:18">9:00am</time>
                                            <a href="#" class="more">
                                                <svg class="olymp-three-dots-icon">
                                                    <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                                </svg>
                                            </a>
                                        </div>
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-3"
                                               aria-expanded="true" aria-controls="collapseOne-3">
                                                Breakfast at the Agency
                                                <svg class="olymp-dropdown-arrow-icon">
                                                    <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                                                </svg>
                                            </a>
                                        </h5>
                                    </div>

                                    <div id="collapseOne-3" class="collapse" role="tabpanel">
                                        <div class="card-body">
                                            Hi Guys! I propose to go a litle earlier at the agency to have breakfast and
                                            talk a little more about the new design project we have been working on.
                                            Cheers!
                                        </div>

                                        <div class="place inline-items">
                                            <svg class="olymp-add-a-place-icon">
                                                <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-add-a-place-icon"></use>
                                            </svg>
                                            <span>Daydreamz Agency</span>
                                        </div>

                                        <ul class="friends-harmonic inline-items">
                                            <li>
                                                <a href="#">
                                                    <img src="olympus/img/friend-harmonic5.jpg" alt="friend">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="olympus/img/friend-harmonic10.jpg" alt="friend">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="olympus/img/friend-harmonic7.jpg" alt="friend">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="olympus/img/friend-harmonic8.jpg" alt="friend">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="olympus/img/friend-harmonic2.jpg" alt="friend">
                                                </a>
                                            </li>
                                            <li class="with-text">
                                                Will Assist
                                            </li>
                                        </ul>
                                    </div>

                                </div>

                                <div class="card">
                                    <div class="card-header" role="tab" id="headingTwo-3">
                                        <div class="event-time">
                                            <span class="circle"></span>
                                            <time datetime="2004-07-24T18:18">12:00pm</time>
                                            <a href="#" class="more">
                                                <svg class="olymp-three-dots-icon">
                                                    <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                                </svg>
                                            </a>
                                        </div>
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo-3"
                                               aria-expanded="true" aria-controls="collapseTwo-3">
                                                Send the new “Olympus” project files to the Agency
                                                <svg class="olymp-dropdown-arrow-icon">
                                                    <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                                                </svg>
                                            </a>
                                        </h5>
                                    </div>

                                    <div id="collapseTwo-3" class="collapse" role="tabpanel">
                                        <div class="card-body">
                                            Hi Guys! I propose to go a litle earlier at the agency to have breakfast and
                                            talk a little more about the new design project we have been working on.
                                            Cheers!
                                        </div>
                                    </div>

                                </div>

                                <div class="card">
                                    <div class="card-header" role="tab" id="headingThree-3">
                                        <div class="event-time">
                                            <span class="circle"></span>
                                            <time datetime="2004-07-24T18:18">6:30pm</time>
                                            <a href="#" class="more">
                                                <svg class="olymp-three-dots-icon">
                                                    <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                                </svg>
                                            </a>
                                        </div>
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                               href="#" aria-expanded="false">
                                                Take Querty to the Veterinarian
                                            </a>
                                        </h5>
                                    </div>
                                    <div class="place inline-items">
                                        <svg class="olymp-add-a-place-icon">
                                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-add-a-place-icon"></use>
                                        </svg>
                                        <span>Daydreamz Agency</span>
                                    </div>
                                </div>

                                <a href="#" class="check-all">Check all your Events</a>
                            </div>

                            <div id="accordion-4" role="tablist" aria-multiselectable="true" class="day-event"
                                 data-month="12" data-day="28">
                                <div class="ui-block-title ui-block-title-small">
                                    <h6 class="title">TODAY’S EVENTS</h6>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingOne-4">
                                        <div class="event-time">
                                            <span class="circle"></span>
                                            <time datetime="2004-07-24T18:18">9:00am</time>
                                            <a href="#" class="more">
                                                <svg class="olymp-three-dots-icon">
                                                    <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                                </svg>
                                            </a>
                                        </div>
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-4"
                                               aria-expanded="true" aria-controls="collapseOne-4">
                                                Breakfast at the Agency
                                                <svg class="olymp-dropdown-arrow-icon">
                                                    <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                                                </svg>
                                            </a>
                                        </h5>
                                    </div>

                                    <div id="collapseOne-4" class="collapse" role="tabpanel"
                                         aria-labelledby="headingOne-4">
                                        <div class="card-body">
                                            Hi Guys! I propose to go a litle earlier at the agency to have breakfast and
                                            talk a little more about the new design project we have been working on.
                                            Cheers!
                                        </div>
                                        <div class="place inline-items">
                                            <svg class="olymp-add-a-place-icon">
                                                <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-add-a-place-icon"></use>
                                            </svg>
                                            <span>Daydreamz Agency</span>
                                        </div>

                                        <ul class="friends-harmonic inline-items">
                                            <li>
                                                <a href="#">
                                                    <img src="olympus/img/friend-harmonic5.jpg" alt="friend">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="olympus/img/friend-harmonic10.jpg" alt="friend">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="olympus/img/friend-harmonic7.jpg" alt="friend">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="olympus/img/friend-harmonic8.jpg" alt="friend">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="olympus/img/friend-harmonic2.jpg" alt="friend">
                                                </a>
                                            </li>
                                            <li class="with-text">
                                                Will Assist
                                            </li>
                                        </ul>
                                    </div>

                                </div>

                                <a href="#" class="check-all">Check all your Events</a>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- ... end W-Calendar -->            </div>

            <div class="ui-block">
                <div class="ui-block-title">
                    <h6 class="title">Pages You May Like</h6>
                    <a href="#" class="more">
                        <svg class="olymp-three-dots-icon">
                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                        </svg>
                    </a>
                </div>

                <!-- W-Friend-Pages-Added -->

                <ul class="widget w-friend-pages-added notification-list friend-requests">
                    <li class="inline-items">
                        <div class="author-thumb">
                            <img src="olympus/img/avatar41-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">The Marina Bar</a>
                            <span class="chat-message-item">Restaurant / Bar</span>
                        </div>
                        <span class="notification-icon" data-toggle="tooltip" data-placement="top"
                              data-original-title="ADD TO YOUR FAVS">
                            <a href="#">
                                <svg class="olymp-star-icon"><use
                                            xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
                            </a>
                        </span>

                    </li>

                    <li class="inline-items">
                        <div class="author-thumb">
                            <img src="olympus/img/avatar42-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Tapronus Rock</a>
                            <span class="chat-message-item">Rock Band</span>
                        </div>
                        <span class="notification-icon" data-toggle="tooltip" data-placement="top"
                              data-original-title="ADD TO YOUR FAVS">
                            <a href="#">
                                <svg class="olymp-star-icon"><use
                                            xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
                            </a>
                        </span>

                    </li>

                    <li class="inline-items">
                        <div class="author-thumb">
                            <img src="olympus/img/avatar43-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Pixel Digital Design</a>
                            <span class="chat-message-item">Company</span>
                        </div>
                        <span class="notification-icon" data-toggle="tooltip" data-placement="top"
                              data-original-title="ADD TO YOUR FAVS">
                            <a href="#">
                                <svg class="olymp-star-icon"><use
                                            xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
                            </a>
                        </span>
                    </li>

                    <li class="inline-items">
                        <div class="author-thumb">
                            <img src="olympus/img/avatar44-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Thompson’s Custom Clothing Boutique</a>
                            <span class="chat-message-item">Clothing Store</span>
                        </div>
                        <span class="notification-icon" data-toggle="tooltip" data-placement="top"
                              data-original-title="ADD TO YOUR FAVS">
                            <a href="#">
                                <svg class="olymp-star-icon"><use
                                            xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
                            </a>
                        </span>

                    </li>

                    <li class="inline-items">
                        <div class="author-thumb">
                            <img src="olympus/img/avatar45-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Crimson Agency</a>
                            <span class="chat-message-item">Company</span>
                        </div>
                        <span class="notification-icon" data-toggle="tooltip" data-placement="top"
                              data-original-title="ADD TO YOUR FAVS">
                            <a href="#">
                                <svg class="olymp-star-icon"><use
                                            xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
                            </a>
                        </span>
                    </li>

                    <li class="inline-items">
                        <div class="author-thumb">
                            <img src="olympus/img/avatar46-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Mannequin Angel</a>
                            <span class="chat-message-item">Clothing Store</span>
                        </div>
                        <span class="notification-icon" data-toggle="tooltip" data-placement="top"
                              data-original-title="ADD TO YOUR FAVS">
                            <a href="#">
                                <svg class="olymp-star-icon"><use
                                            xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
                            </a>
                        </span>
                    </li>
                </ul>

                <!-- .. end W-Friend-Pages-Added -->
            </div>
        </aside>

        <!-- ... end Left Sidebar -->


        <!-- Right Sidebar -->

        <aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">

            <div class="ui-block">

                <!-- W-Birthsday-Alert -->

                <div class="widget w-birthday-alert">
                    <div class="icons-block">
                        <svg class="olymp-cupcake-icon">
                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-cupcake-icon"></use>
                        </svg>
                        <a href="#" class="more">
                            <svg class="olymp-three-dots-icon">
                                <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                            </svg>
                        </a>
                    </div>

                    <div class="content">
                        <div class="author-thumb">
                            <img src="olympus/img/avatar48-sm.jpg" alt="author">
                        </div>
                        <span>Today is</span>
                        <a href="#" class="h4 title">Marina Valentine’s Birthday!</a>
                        <p>Leave her a message with your best wishes on her profile page!</p>
                    </div>
                </div>

                <!-- ... end W-Birthsday-Alert -->            </div>

            <div class="ui-block">
                <div class="ui-block-title">
                    <h6 class="title">Friend Suggestions</h6>
                    <a href="#" class="more">
                        <svg class="olymp-three-dots-icon">
                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                        </svg>
                    </a>
                </div>


                <!-- W-Action -->

                <ul class="widget w-friend-pages-added notification-list friend-requests">
                    <li class="inline-items">
                        <div class="author-thumb">
                            <img src="olympus/img/avatar38-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Francine Smith</a>
                            <span class="chat-message-item">8 Friends in Common</span>
                        </div>
                        <span class="notification-icon">
                            <a href="#" class="accept-request">
                                <span class="icon-add without-text">
                                    <svg class="olymp-happy-face-icon"><use
                                                xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                                </span>
                            </a>
                        </span>
                    </li>

                    <li class="inline-items">
                        <div class="author-thumb">
                            <img src="olympus/img/avatar39-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Hugh Wilson</a>
                            <span class="chat-message-item">6 Friends in Common</span>
                        </div>
                        <span class="notification-icon">
                            <a href="#" class="accept-request">
                                <span class="icon-add without-text">
                                    <svg class="olymp-happy-face-icon"><use
                                                xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                                </span>
                            </a>
                        </span>
                    </li>

                    <li class="inline-items">
                        <div class="author-thumb">
                            <img src="olympus/img/avatar40-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Karen Masters</a>
                            <span class="chat-message-item">6 Friends in Common</span>
                        </div>
                        <span class="notification-icon">
                            <a href="#" class="accept-request">
                                <span class="icon-add without-text">
                                    <svg class="olymp-happy-face-icon"><use
                                                xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                                </span>
                            </a>
                        </span>
                    </li>

                </ul>

                <!-- ... end W-Action -->
            </div>

            <div class="ui-block">

                <div class="ui-block-title">
                    <h6 class="title">Activity Feed</h6>
                    <a href="#" class="more">
                        <svg class="olymp-three-dots-icon">
                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                        </svg>
                    </a>
                </div>


                <!-- W-Activity-Feed -->

                <ul class="widget w-activity-feed notification-list">
                    <li>
                        <div class="author-thumb">
                            <img src="olympus/img/avatar49-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Marina Polson</a> commented on Jason Mark’s <a
                                    href="#" class="notification-link">photo.</a>.
                            <span class="notification-date"><time class="entry-date updated"
                                                                  datetime="2004-07-24T18:18">2 mins ago</time></span>
                        </div>
                    </li>

                    <li>
                        <div class="author-thumb">
                            <img src="olympus/img/avatar9-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Jake Parker </a> liked Nicholas Grissom’s <a
                                    href="#" class="notification-link">status update.</a>.
                            <span class="notification-date"><time class="entry-date updated"
                                                                  datetime="2004-07-24T18:18">5 mins ago</time></span>
                        </div>
                    </li>

                    <li>
                        <div class="author-thumb">
                            <img src="olympus/img/avatar50-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Mary Jane Stark </a> added 20 new photos to her
                            <a href="#" class="notification-link">gallery album.</a>.
                            <span class="notification-date"><time class="entry-date updated"
                                                                  datetime="2004-07-24T18:18">12 mins ago</time></span>
                        </div>
                    </li>

                    <li>
                        <div class="author-thumb">
                            <img src="olympus/img/avatar51-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Nicholas Grissom </a> updated his profile <a
                                    href="#" class="notification-link">photo</a>.
                            <span class="notification-date"><time class="entry-date updated"
                                                                  datetime="2004-07-24T18:18">1 hour ago</time></span>
                        </div>
                    </li>
                    <li>
                        <div class="author-thumb">
                            <img src="olympus/img/avatar48-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Marina Valentine </a> commented on Chris
                            Greyson’s <a href="#" class="notification-link">status update</a>.
                            <span class="notification-date"><time class="entry-date updated"
                                                                  datetime="2004-07-24T18:18">1 hour ago</time></span>
                        </div>
                    </li>

                    <li>
                        <div class="author-thumb">
                            <img src="olympus/img/avatar52-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Green Goo Rock </a> posted a <a href="#"
                                                                                                       class="notification-link">status
                                update</a>.
                            <span class="notification-date"><time class="entry-date updated"
                                                                  datetime="2004-07-24T18:18">1 hour ago</time></span>
                        </div>
                    </li>
                    <li>
                        <div class="author-thumb">
                            <img src="olympus/img/avatar10-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Elaine Dreyfuss </a> liked your <a href="#"
                                                                                                          class="notification-link">blog
                                post</a>.
                            <span class="notification-date"><time class="entry-date updated"
                                                                  datetime="2004-07-24T18:18">2 hours ago</time></span>
                        </div>
                    </li>

                    <li>
                        <div class="author-thumb">
                            <img src="olympus/img/avatar10-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Elaine Dreyfuss </a> commented on your <a
                                    href="#" class="notification-link">blog post</a>.
                            <span class="notification-date"><time class="entry-date updated"
                                                                  datetime="2004-07-24T18:18">2 hours ago</time></span>
                        </div>
                    </li>

                    <li>
                        <div class="author-thumb">
                            <img src="olympus/img/avatar53-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Bruce Peterson </a> changed his <a href="#"
                                                                                                          class="notification-link">profile
                                picture</a>.
                            <span class="notification-date"><time class="entry-date updated"
                                                                  datetime="2004-07-24T18:18">15 hours ago</time></span>
                        </div>
                    </li>

                </ul>

                <!-- .. end W-Activity-Feed -->
            </div>


            <div class="ui-block">


                <!-- W-Action -->

                <div class="widget w-action">

                    <img src="olympus/img/logo.png" alt="Olympus">
                    <div class="content">
                        <h4 class="title">OLYMPUS</h4>
                        <span>THE BEST SOCIAL NETWORK THEME IS HERE!</span>
                        <a href="01-LandingPage.html" class="btn btn-bg-secondary btn-md">Register Now!</a>
                    </div>
                </div>

                <!-- ... end W-Action -->
            </div>

        </aside>

        <!-- ... end Right Sidebar -->

    </div>
</div>
@include('site.home.popup')