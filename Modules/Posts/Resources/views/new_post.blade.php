<div class="ui-block">
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
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="home-1" role="tabpanel" aria-expanded="true">
                <form id="myNewPost" data-url="{{route('new-post')}}" data-delete-post-url="{{route('delete-post')}}">
                    {{ csrf_field() }}
                    <div class="author-thumb">
                        <img style="width: 36px;" src="{{\Auth::user()->image}}" alt="author">
                    </div>
                    <div class="form-group with-icon label-floating is-empty">
                        <label class="control-label">Share what you are thinking here...</label>
                        <textarea class="form-control" id="textpost" name="text_of_post"
                                  placeholder=""></textarea>
                        <ul id="choosephoto">
                        </ul>
                    </div>

                    <div class="add-options-message">

                        <label class="options-message" data-toggle="tooltip" title="ADD PHOTOS">
                            <svg class="olymp-camera-icon" style="margin-bottom: -8px;">
                                <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                            </svg>
                            <input type="file" class="sr-only" id="input" name="image" accept="image/*">
                        </label>


                        <a id="TAG-YOUR-FRIENDS" href="javascript:void(0)" class="options-message"
                           data-toggle="tooltip" data-placement="top"
                           data-original-title="TAG YOUR FRIENDS">
                            <svg class="olymp-computer-icon">
                                <use xlink:href="svg/at.svg#Capa_1"></use>
                            </svg>
                        </a>

                        <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"
                           data-original-title="ADD LOCATION">
                            <svg class="olymp-small-pin-icon">
                                <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-small-pin-icon"></use>
                            </svg>
                        </a>

                        <button id="newShare" type="submit"
                                class="btn btn-primary btn-md-2 float-right btn-post">
                            Share
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--loader-->
<div id="containerloader" style=" margin: 20px;  /*width: 588px;*/  height: 8px;  ">
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