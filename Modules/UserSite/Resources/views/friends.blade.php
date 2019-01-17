@extends('site.layouts.app')
@section('title','Friends')
@section('content')
    @include('usersite::profile_header')
    <div class="container">
        <div class="row">
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="ui-block responsive-flex">
                    <div class="ui-block-title">
                        <div class="h6 title">{{$user->name}}’s Friends (86)</div>
                        <form class="w-search">
                            <div class="form-group with-button">
                                <input class="form-control" type="text" placeholder="Search Friends...">
                                <button>
                                    <svg class="olymp-magnifying-glass-icon">
                                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use>
                                    </svg>
                                </button>
                            </div>
                        </form>
                        <a href="#" class="more">
                            <svg class="olymp-three-dots-icon">
                                <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Friends -->

    <div class="container">
        <div class="row">
            @if($friends)
                @foreach($friends as $friend)
                    <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="ui-block">

                            <!-- Friend Item -->

                            <div class="friend-item">
                                <div class="friend-header-thumb">
                                    <img src="{{asset('olympus/img/top-header7.png')}}"
                                         alt="{{$friend->display_name}} cover">
                                </div>

                                <div class="friend-item-content">

                                    <div class="more">
                                        <svg class="olymp-three-dots-icon">
                                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                        </svg>
                                        <ul class="more-dropdown">
                                            <li>
                                                <a href="#">Report Profile</a>
                                            </li>
                                            <li>
                                                <a href="#">Block Profile</a>
                                            </li>
                                            <li>
                                                <a href="#">Turn Off Notifications</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="friend-avatar">
                                        <div class="author-thumb">
                                            <img style="width: 100px;height: 100px;"
                                                 src="{{isset($friend->image)?$friend->image:asset('olympus/img/author-page.jpg') }}"
                                                 alt="{{$friend->display_name}}">
                                        </div>
                                        <div class="author-content">
                                            <a target="_blank" href="{{route('profile.index',[$friend->slug])}}" class="h5 author-name">{{$friend->display_name}}</a>
                                            <div class="country">{{$friend->nationality}}</div>
                                        </div>
                                        <div class="author-content mt-4">
                                            <div class="text-center">
                                                <button class="btn btn-breez btn-md-2">Message</button>
                                            </div>
                                        </div>
                                    </div>

                                    {{--<div class="swiper-container" data-slide="fade">--}}
                                    {{--<div class="swiper-wrapper">--}}
                                    {{--<div class="swiper-slide">--}}
                                    {{--<div class="friend-count" data-swiper-parallax="-500">--}}
                                    {{--<a href="#" class="friend-count-item">--}}
                                    {{--<div class="h6">52</div>--}}
                                    {{--<div class="title">Friends</div>--}}
                                    {{--</a>--}}
                                    {{--<a href="#" class="friend-count-item">--}}
                                    {{--<div class="h6">240</div>--}}
                                    {{--<div class="title">Photos</div>--}}
                                    {{--</a>--}}
                                    {{--<a href="#" class="friend-count-item">--}}
                                    {{--<div class="h6">16</div>--}}
                                    {{--<div class="title">Videos</div>--}}
                                    {{--</a>--}}
                                    {{--</div>--}}
                                    {{--<div class="control-block-button" data-swiper-parallax="-100">--}}
                                    {{--<a href="#" class="btn btn-control bg-blue">--}}
                                    {{--<svg class="olymp-happy-face-icon">--}}
                                    {{--<use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use>--}}
                                    {{--</svg>--}}
                                    {{--</a>--}}

                                    {{--<a href="#" class="btn btn-control bg-purple">--}}
                                    {{--<svg class="olymp-chat---messages-icon">--}}
                                    {{--<use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use>--}}
                                    {{--</svg>--}}
                                    {{--</a>--}}

                                    {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="swiper-slide">--}}
                                    {{--<p class="friend-about" data-swiper-parallax="-500">--}}
                                    {{--Hi!, I’m Marina and I’m a Community Manager for “Gametube”. Gamer--}}
                                    {{--and full-time mother.--}}
                                    {{--</p>--}}

                                    {{--<div class="friend-since" data-swiper-parallax="-100">--}}
                                    {{--<span>Friends Since:</span>--}}
                                    {{--<div class="h6">December 2014</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<!-- If we need pagination -->--}}
                                    {{--<div class="swiper-pagination"></div>--}}
                                    {{--</div>--}}
                                </div>
                            </div>

                            <!-- ... end Friend Item -->            </div>
                    </div>
                @endforeach
            @else
                <div class="col-lg-12 m-5">
                    <div class="text-center">
                       {{$message_friend}}
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- ... end Friends -->

@endsection
