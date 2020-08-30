<!-- Top Header-Profile -->

<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block">
				<div class="top-header">
          <div class="top-header-thumb">
              <img class="header-image" src="{{ isset($user->cover_image) ? asset('storage/images/headers/'.$user->cover_image) : asset('storage/images/default_images/default_cover.jpg') }}" alt="nature">
                {{-- @if($profile_user->id == Auth::id())
                  <span class="header-update change-cover">
                      <i class="fas fa-camera"></i> Update Cover Photo
                  </span>
                  <input type="file" data-modal="header-image-modal" accept="image/*" name="file_input" hidden class="file-input-header">
               @else
                  <span class="header-update show-cover">
                      <i class="fas fa-search-plus"></i> Show
                  </span>
               @endif --}}
          </div>
					<div class="profile-section">
						<div class="row">
							<div class="col col-lg-5 col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
									<li>
										<a href="02-ProfilePage.html" class="active">Timeline</a>
									</li>
									<li>
										<a href="07-ProfilePage-Photos.html">Photos</a>
									</li>
									<li>
										<a href="09-ProfilePage-Videos.html">Videos</a>
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
								</ul>
							</div>
						</div>
						<div class="control-block-button">
							<a href="#" class="btn btn-control bg-purple">
								<svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
							</a>
							<div class="btn btn-control bg-primary more">
								<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown more-with-triangle triangle-bottom-right">
									<li>
										<a href="#" data-toggle="modal" data-target="#update-header-photo">Update Profile Photo</a>
									</li>
									<li>
										<a href="#" data-toggle="modal" data-target="#update-header-photo">Update Header Photo</a>
									</li>
									<li>
										<a href="{{ route('profile.setting') }}">Account Settings</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
          <div class="top-header-author">
              @if($profile_user->id == Auth::id())
                  <a href="javascript:void(0)" class="author-thumb">
                      @if(!empty($profile_user->image))
                          <img class="profileimg" alt="author" src="{{ $profile_user->image }}">
                      @else
                          <img alt="author" src="{{ asset('storage/images/default_images/default_avatar.png') }}">
                      @endif
                      {{-- <span class="image-auth edit-image">
                          <i class="fa fa-camera fa-2x center-vertical"></i>
                      </span>
                      <input type="file" data-modal="user-modal" accept="image/*" name="file_input sr-only " class="file-input-user"> --}}
                  </a>
              @else
                  <a href="javascript:void(0)" class="author-thumb">
                      @if(!empty($profile_user->image))
                          <img class="profileimg" alt="author" src="{{ $profile_user->image }}">
                      @else
                          <img alt="author" src="{{ asset('storage/images/default_images/default_avatar.png') }}">
                      @endif
                      {{-- <span class="image-auth show-image">
                          <i class="fa fa-search-plus fa-2x center-vertical"></i>
                      </span> --}}
                  </a>
              @endif
              <div class="author-content">
                  @if(empty($verified_status) || $verified_status->status=="unverified" || $verified_status->status=="underprocess")
                      <a href="{{ route('profile.index',[$profile_user->slug]) }}" class="h4 author-name">{{$profile_user->display_name}}</a>
                  @else
                      <a href="{{ route('profile.index',[$profile_user->slug]) }}" class="h4 author-name">{{$profile_user->display_name}} <i style="color:green; font-size:17px;" class="fas fa-check-circle"></i></a>
                  @endif
                  <div class="country">{!!countryData($profile_user->country)!!}</div>
              </div>
          </div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ... end Top Header-Profile -->
