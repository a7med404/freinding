<!-- Top Header-Profile -->
<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ui-block">
                <div class="top-header">
                    <div class="top-header-thumb">
                        <img src="{{ asset('storage/images/headers/default.jpg') }}" alt="nature">

                    </div>
                    <div class="profile-section">
                        <div class="row">
                            <div class="col col-lg-5 col-md-5 col-sm-12 col-12">
                                <ul class="profile-menu">
                                    <li>
                                        <a href="{{ route('profile.index') }}" class="active">Timeline</a>
                                    </li>
                                    <li>
                                        <a href="05-ProfilePage-About.html">Photos</a>
                                    </li>
                                    <li>
                                        <a href="06-ProfilePage.html">Videos</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col col-lg-5 ml-auto col-md-5 col-sm-12 col-12">
                                <ul class="profile-menu">
                                    <li>
                                        <a href="{{route('profile.friends',[$profile_user->slug])}}">Friends</a>
                                    </li>
                                    <li>
                                        <a href="{{route('profile.followers',[$profile_user->slug])}}">Followers</a>
                                    </li>
                                    <li>
                                        <a href="{{route('profile.following',[$profile_user->slug])}}">Following</a>
                                    </li>
                                    {{--<li>--}}
                                    {{--<div class="more">--}}
                                    {{--<svg class="olymp-three-dots-icon">--}}
                                    {{--<use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>--}}
                                    {{--</svg>--}}
                                    {{--<ul class="more-dropdown more-with-triangle">--}}
                                    {{--<li>--}}
                                    {{--<a href="#">Report Profile</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                    {{--<a href="#">Block Profile</a>--}}
                                    {{--</li>--}}
                                    {{--</ul>--}}
                                    {{--</div>--}}
                                    {{--</li>--}}
                                </ul>
                            </div>
                        </div>

                        <div class="control-block-button">
                            {{--<a href="35-YourAccount-FriendsRequests.html" class="btn btn-control bg-blue">--}}
                                {{--<svg class="olymp-happy-face-icon">--}}
                                    {{--<use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use>--}}
                                {{--</svg>--}}
                            {{--</a>--}}

                            <a href="#" class="btn btn-control bg-purple">
                                <svg class="olymp-chat---messages-icon">
                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use>
                                </svg>
                            </a>

                            <div class="btn btn-control bg-primary more">
                                <svg class="olymp-settings-icon">
                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-settings-icon"></use>
                                </svg>

                                <ul class="more-dropdown more-with-triangle triangle-bottom-right">
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#update-header-photo">Update
                                            Profile Photo</a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#update-header-photo">Update Header
                                            Photo</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('profile.setting') }}">Account Settings</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="top-header-author">
                        <a href="{{ route('profile.index',[$profile_user->slug]) }}" class="author-thumb">
                            @if(!empty($profile_user->image))
                                <img class="profileimg" alt="author" src="{{ $profile_user->image }}">
                            @else
                                <img alt="author" src="{{ asset('olympus/img/author-page.jpg') }}">
                            @endif
                        </a>
                        <div class="author-content">

                            @if(empty($verified_status) || $verified_status->status=="unverified" || $verified_status->status=="underprocess")
                                <a href="{{ route('profile.index',[$profile_user->slug]) }}"
                                   class="h4 author-name">{{$profile_user->display_name}}</a>
                            @else
                                <a href="{{ route('profile.index',[$profile_user->slug]) }}"
                                   class="h4 author-name">{{$profile_user->display_name}} <i
                                            style="color:green; font-size:17px;" class="fas fa-check-circle"></i></a>
                            @endif
                            <div class="country">{!!countryData($profile_user->country)!!}</div>

                        </div>
                    </div>
                </div>
            </div>
          @if(URL::current() == route('profile.index',[$profile_user->slug]))
              @include('usersite::relation-section')
              @endif
        </div>
    </div>
</div>
<!-- ... end Top Header-Profile -->
