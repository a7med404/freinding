@extends('site.layouts.app')
@section('title','Friends')
@section('content')
  @include('usersite::profile_header')
  {{-- <div class="container">
    <div class="row">
      <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="ui-block responsive-flex">
          <div class="ui-block-title">
            <div class="h6 title">{{$user->name}}’s Followings ({{$followings->count()}})</div>
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

      <!-- Main Content -->

      <div class="col col-xl-12 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">

        <div id="newsfeed-items-grid">
          <div class="row list-follow">
            @if($followings)
              @foreach($followings as $following)
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                  <div class="ui-block">

                    <!-- Friend Item -->
                    <div class="friend-item">
                      <div class="friend-header-thumb">
                        <img style="height: 100px;" src="{{asset('olympus/img/top-header7.png')}}" alt="{{$following->display_name}} cover">
                      </div>
                      <div class="friend-item-content">
                        <div class="more">
                          <svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                          <ul class="more-dropdown">
                            <li>
                              <a href="#">Report Profile</a>
                            </li>
                            <li>
                              <a href="#">Block Profile</a>
                            </li>
                          </ul>
                        </div>
                        <div class="friend-avatar">
                          <div class="author-thumb">
                            <img style="width: 100px;height: 100px;" src="{{isset($following->image)?$following->image:asset('olympus/img/author-page.jpg') }}" alt="{{$following->display_name}}">
                          </div>
                          <div class="author-content">
                            <a target="_blank" href="{{route('profile.index',[$following->slug])}}" class="h5 author-name">{{$following->display_name}}</a>
                          </div>
                          <span>You Following him Since {{$following->created_at}} </span>
                          <span>{{date($following->created_at)}}</span>
                        </div>
                        <a href="{{route('un-follow', ['id' => $following->id])}}" class="btn bg-grey-lighter">
      										<i class="fa fa-times"></i>
      										Unfollowing
      									</a>
                      </div>
                    </div>
                    <!-- ... end Friend Item -->
                  </div>
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
          <!-- ... end Friends -->
        </div>
        {{-- <a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="items-to-load.html" data-container="newsfeed-items-grid">
        <svg class="olymp-three-dots-icon">
        <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
      </svg>
    </a> --}}
  {{-- </div>
</div>

<!-- ... end Main Content -->
</div> --}}



<following-component v-bind:user="{{$profile_user}}"></following-component>


<!-- ... end Friends -->

@endsection
