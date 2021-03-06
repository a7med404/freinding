<!-- Window-popup Update Header Photo -->

<div class="modal fade" id="update-header-photo" tabindex="-1" role="dialog" aria-labelledby="update-header-photo"
     aria-hidden="true">
    <div class="modal-dialog window-popup update-header-photo" role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon">
                    <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                </svg>
            </a>

            <div class="modal-header">
                <h6 class="title">Update Header Photo</h6>
            </div>

            <div class="modal-body">
                <div class="upload-photo-item">
                    <input class="form-control" type="file" hidden id="file_field" name="imagefile"
                           accept="video/*,  video/x-m4v, video/webm, video/x-ms-wmv, video/x-msvideo, video/3gpp, video/flv, video/x-flv, video/mp4, video/quicktime, video/mpeg, video/ogv, .ts, .mkv, image/*, image/heic, image/heif">

                    <label class="options-message" data-toggle="tooltip" title="ADD PHOTOS">
                        <svg class="olymp-camera-icon" style="margin-bottom: -8px;">
                            <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                        </svg>
                        <input type="file" class="sr-only" id="input" name="image" accept="image/*">
                    </label>
                    <h6>Upload Photo</h6>
                    <span>Browse your computer.</span>
                </div>


                <a href="#" class="upload-photo-item" data-toggle="modal" data-target="#choose-from-my-photo">

                    <svg class="olymp-photos-icon">
                        <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-photos-icon"></use>
                    </svg>

                    <h6>Choose from My Photos</h6>
                    <span>Choose from your uploaded photos</span>
                </a>
            </div>
        </div>
    </div>
</div>


<!-- ... end Window-popup Update Header Photo -->

<!-- Window-popup Choose from my Photo -->

<div class="modal fade" id="choose-from-my-photo" tabindex="-1" role="dialog" aria-labelledby="choose-from-my-photo"
     aria-hidden="true">
    <div class="modal-dialog window-popup choose-from-my-photo" role="document">

        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon">
                    <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                </svg>
            </a>
            <div class="modal-header">
                <h6 class="title">Choose from My Photos</h6>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-expanded="true">
                            <svg class="olymp-photos-icon">
                                <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-photos-icon"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-expanded="false">
                            <svg class="olymp-albums-icon">
                                <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-albums-icon"></use>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="modal-body">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel" aria-expanded="true">

                        <div class="choose-photo-item" data-mh="choose-item">
                            <div class="radio">
                                <label class="custom-radio">
                                    <img src="{{ asset('olympus/img/choose-photo1.jpg') }}" alt="photo">
                                    <input type="radio" name="optionsRadios">
                                </label>
                            </div>
                        </div>
                        <div class="choose-photo-item" data-mh="choose-item">
                            <div class="radio">
                                <label class="custom-radio">
                                    <img src="{{ asset('olympus/img/choose-photo2.jpg') }}" alt="photo">
                                    <input type="radio" name="optionsRadios">
                                </label>
                            </div>
                        </div>
                        <div class="choose-photo-item" data-mh="choose-item">
                            <div class="radio">
                                <label class="custom-radio">
                                    <img src="{{ asset('olympus/img/choose-photo3.jpg') }}" alt="photo">
                                    <input type="radio" name="optionsRadios">
                                </label>
                            </div>
                        </div>

                        <div class="choose-photo-item" data-mh="choose-item">
                            <div class="radio">
                                <label class="custom-radio">
                                    <img src="{{ asset('olympus/img/choose-photo4.jpg') }}" alt="photo">
                                    <input type="radio" name="optionsRadios">
                                </label>
                            </div>
                        </div>
                        <div class="choose-photo-item" data-mh="choose-item">
                            <div class="radio">
                                <label class="custom-radio">
                                    <img src="{{ asset('olympus/img/choose-photo5.jpg') }}" alt="photo">
                                    <input type="radio" name="optionsRadios">
                                </label>
                            </div>
                        </div>
                        <div class="choose-photo-item" data-mh="choose-item">
                            <div class="radio">
                                <label class="custom-radio">
                                    <img src="{{ asset('olympus/img/choose-photo6.jpg') }}" alt="photo">
                                    <input type="radio" name="optionsRadios">
                                </label>
                            </div>
                        </div>

                        <div class="choose-photo-item" data-mh="choose-item">
                            <div class="radio">
                                <label class="custom-radio">
                                    <img src="{{ asset('olympus/img/choose-photo7.jpg') }}" alt="photo">
                                    <input type="radio" name="optionsRadios">
                                </label>
                            </div>
                        </div>
                        <div class="choose-photo-item" data-mh="choose-item">
                            <div class="radio">
                                <label class="custom-radio">
                                    <img src="{{ asset('olympus/img/choose-photo8.jpg') }}" alt="photo">
                                    <input type="radio" name="optionsRadios">
                                </label>
                            </div>
                        </div>
                        <div class="choose-photo-item" data-mh="choose-item">
                            <div class="radio">
                                <label class="custom-radio">
                                    <img src="{{ asset('olympus/img/choose-photo9.jpg') }}" alt="photo">
                                    <input type="radio" name="optionsRadios">
                                </label>
                            </div>
                        </div>


                        <a href="#" class="btn btn-secondary btn-lg btn--half-width">Cancel</a>
                        <a href="#" class="btn btn-primary btn-lg btn--half-width">Confirm Photo</a>

                    </div>
                    <div class="tab-pane" id="profile" role="tabpanel" aria-expanded="false">

                        <div class="choose-photo-item" data-mh="choose-item">
                            <figure>
                                <img src="{{ asset('olympus/img/choose-photo10.jpg') }}" alt="photo">
                                <figcaption>
                                    <a href="#">South America Vacations</a>
                                    <span>Last Added: 2 hours ago</span>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="choose-photo-item" data-mh="choose-item">
                            <figure>
                                <img src="{{ asset('olympus/img/choose-photo11.jpg') }}" alt="photo">
                                <figcaption>
                                    <a href="#">Photoshoot Summer 2016</a>
                                    <span>Last Added: 5 weeks ago</span>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="choose-photo-item" data-mh="choose-item">
                            <figure>
                                <img src="{{ asset('olympus/img/choose-photo12.jpg') }}" alt="photo">
                                <figcaption>
                                    <a href="#">Amazing Street Food</a>
                                    <span>Last Added: 6 mins ago</span>
                                </figcaption>
                            </figure>
                        </div>

                        <div class="choose-photo-item" data-mh="choose-item">
                            <figure>
                                <img src="{{ asset('olympus/img/choose-photo13.jpg') }}" alt="photo">
                                <figcaption>
                                    <a href="#">Graffity & Street Art</a>
                                    <span>Last Added: 16 hours ago</span>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="choose-photo-item" data-mh="choose-item">
                            <figure>
                                <img src="{{ asset('olympus/img/choose-photo14.jpg') }}" alt="photo">
                                <figcaption>
                                    <a href="#">Amazing Landscapes</a>
                                    <span>Last Added: 13 mins ago</span>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="choose-photo-item" data-mh="choose-item">
                            <figure>
                                <img src="{{ asset('olympus/img/choose-photo15.jpg') }}" alt="photo">
                                <figcaption>
                                    <a href="#">The Majestic Canyon</a>
                                    <span>Last Added: 57 mins ago</span>
                                </figcaption>
                            </figure>
                        </div>


                        <a href="#" class="btn btn-secondary btn-lg btn--half-width">Cancel</a>
                        <a href="#" class="btn btn-primary btn-lg disabled btn--half-width">Confirm Photo</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- ... end Window-popup Choose from my Photo -->
<a class="back-to-top" href="#">
    <img src="{{ asset('olympus/svg-icons/back-to-top.svg') }}" alt="arrow" class="back-icon">
</a>


<!-- Window-popup-CHAT for responsive min-width: 768px -->

<div class="ui-block popup-chat popup-chat-responsive" tabindex="-1" role="dialog" aria-labelledby="update-header-photo"
     aria-hidden="true">

    <div class="modal-content">
        <div class="modal-header">
            <span class="icon-status online"></span>
            <h6 class="title">Chat</h6>
            <div class="more">
                <svg class="olymp-three-dots-icon">
                    <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                </svg>
                <svg class="olymp-little-delete js-chat-open">
                    <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-little-delete"></use>
                </svg>
            </div>
        </div>
        <div class="modal-body">
            <div class="mCustomScrollbar">
                <ul class="notification-list chat-message chat-message-field">
                    <li>
                        <div class="author-thumb">
                            <img src="{{ asset('olympus/img/avatar14-sm.jpg') }}" alt="author" class="mCS_img_loaded">
                        </div>
                        <div class="notification-event">
                            <span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
                            <span class="notification-date"><time class="entry-date updated"
                                                                  datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
                        </div>
                    </li>

                    <li>
                        <div class="author-thumb">
                            <img src="{{ asset('olympus/img/author-page.jpg') }}" alt="author" class="mCS_img_loaded">
                        </div>
                        <div class="notification-event">
                            <span class="chat-message-item">Don’t worry Mathilda!</span>
                            <span class="chat-message-item">I already bought everything</span>
                            <span class="notification-date"><time class="entry-date updated"
                                                                  datetime="2004-07-24T18:18">Yesterday at 8:29pm</time></span>
                        </div>
                    </li>

                    <li>
                        <div class="author-thumb">
                            <img src="{{ asset('olympus/img/avatar14-sm.jpg') }}" alt="author" class="mCS_img_loaded">
                        </div>
                        <div class="notification-event">
                            <span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
                            <span class="notification-date"><time class="entry-date updated"
                                                                  datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
                        </div>
                    </li>
                </ul>
            </div>

            <form class="need-validation">

                <div class="form-group label-floating is-empty">
                    <label class="control-label">Press enter to post...</label>
                    <textarea class="form-control" placeholder=""></textarea>
                    <div class="add-options-message">
                        <a href="#" class="options-message">
                            <svg class="olymp-computer-icon">
                                <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-computer-icon"></use>
                            </svg>
                        </a>
                        <div class="options-message smile-block">

                            <svg class="olymp-happy-sticker-icon">
                                <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-happy-sticker-icon"></use>
                            </svg>

                            <ul class="more-dropdown more-with-triangle triangle-bottom-right">
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('olympus/img/icon-chat1.png') }}" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('olympus/img/icon-chat2.png') }}" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('olympus/img/icon-chat3.png') }}" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('olympus/img/icon-chat4.png') }}" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('olympus/img/icon-chat5.png') }}" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('olympus/img/icon-chat6.png') }}" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('olympus/img/icon-chat7.png') }}" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('olympus/img/icon-chat8.png') }}" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('olympus/img/icon-chat9.png') }}" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('olympus/img/icon-chat10.png') }}" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('olympus/img/icon-chat11.png') }}" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('olympus/img/icon-chat12.png') }}" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('olympus/img/icon-chat13.png') }}" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('olympus/img/icon-chat14.png') }}" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('olympus/img/icon-chat15.png') }}" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('olympus/img/icon-chat16.png') }}" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('olympus/img/icon-chat17.png') }}" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('olympus/img/icon-chat18.png') }}" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('olympus/img/icon-chat19.png') }}" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('olympus/img/icon-chat20.png') }}" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('olympus/img/icon-chat21.png') }}" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('olympus/img/icon-chat22.png') }}" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('olympus/img/icon-chat23.png') }}" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('olympus/img/icon-chat24.png') }}" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('olympus/img/icon-chat25.png') }}" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('olympus/img/icon-chat26.png') }}" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('olympus/img/icon-chat27.png') }}" alt="icon">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>

<!-- model tag friends -->
<div class="modal fade" id="tag-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">TAG YOUR FRIENDS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--tag-->
                <div id="tag-post-section">
                    <select class="js-example-basic-multiple" name="states[]" multiple="multiple"
                            data-placeholder="Select a friend">
                        @if(isset($users))
                            @foreach($users as $user)
                                <option id="tagselected{{$user->id}}" value="{{$user->id}}"
                                        data-image="{{$user->image}} " data-text="{{$user->display_name}} "
                                        style="margin:5%"></option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <!--end-tag-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="addtag" type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- end model tag friends -->

<!-- crop image model -->
{{--<div class="modal fade" id="modal" tabindex="-1" role="dialog"--}}
     {{--aria-labelledby="modalLabel" aria-hidden="true">--}}
    {{--<div class="modal-dialog" role="document">--}}
        {{--<div class="modal-content">--}}
            {{--<div class="modal-header">--}}
                {{--<h5 class="modal-title" id="modalLabel">Crop the image</h5>--}}
                {{--<button type="button" class="close" data-dismiss="modal"--}}
                        {{--aria-label="Close">--}}
                    {{--<span aria-hidden="true">&times;</span>--}}
                {{--</button>--}}
            {{--</div>--}}
            {{--<div class="modal-body">--}}
                {{--<div style="max-width: 100%;">--}}
                    {{--<img id="image"--}}
                         {{--src="https://avatars0.githubusercontent.com/u/3456749">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="modal-footer">--}}
                {{--<button type="button" class="btn btn-default" data-dismiss="modal">--}}
                    {{--Cancel--}}
                {{--</button>--}}
                {{--<button type="button" class="btn btn-primary" id="crop" data-url="{{route('storePostsPhotosInTemp')}}"--}}
                        {{--data-delete-url="{{route('deleteFromTemp')}}">Crop--}}
                {{--</button>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
<!-- end crop image model-->

<!-- users reactioners model -->
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
                                    url('images/FhHRx.gif')
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
<!-- end users reactioners model -->

<!-- model-share -->
<div class="modal fade" id="Modal-Share" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Share Post </h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group label-floating is-empty">
                    <label class="control-label">Share what you are thinking here...</label>
                    <textarea class="form-control" id="taxt-share"
                              placeholder="" style="width: 100%; margin-bottom: 5px"></textarea>
                </div>
                <div class="ui-block">
                    <article class="hentry post video">
                        <div class="post__author author vcard inline-items">
                        </div>
                        <p style="word-wrap: break-word;"></p>
                        <div class="picture-section" data-slide="fade">
                        </div>
                        <div class="video-section swiper-container" data-slide="fade">
                        </div>
                        <div class="topic-section" style="display: inline-block;">
                        </div>
                    </article>
                </div>
            </div>
            <!--end-body-model-->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Close
                </button>
                <button id="addShare" type="button" data-url="{{route('share-post')}}"
                        class="btn btn-primary btn-share-section">Share
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end model-share -->
