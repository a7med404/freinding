@extends('site.layouts.app')
@section('after_head')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    {{-- @include('usersite::profile_header') --}}
    <div class="container">
        <div class="row">
            {{-- <div class="col col-xl-3 order-xl-1 col-lg-3 order-lg-1 col-md-12 order-md-1 col-sm-12  responsive-display-none">
                @include('usersite::list-menu')
            </div> --}}

            <!-- Main Content -->

        		<div class="col col-xl-9 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
        			<div id="newsfeed-items-grid">
        				<!-- Friends -->
        				<div class="recived-requests">

        					<div class="ui-block">
        						<div class="ui-block-title">
        							<h6 class="title">Recived Requests</h6>
        						</div>
        						<div class="ui-block-content">
        							<div class="row">
        								<div class="mCustomScrollbar" data-mcs-theme="dark">
        									<ul class="notification-list friend-requests text-capitalize">
                            @foreach($notifications as $notification)
          										<li>
                                @if($notification->type == "App\Notifications\Friend\AddFriendNotification")
            											<div class="author-thumb">
            												<img src="{{asset($notification->data['user']['image'])}}" alt="author">
            											</div>
            											<div class="notification-event">
                                    <a href="{{route('profile.index', ['username' => $notification->data['user']['slug']])}}" class="h6 ">{{ $notification->data['user']['name'] }}</a>
            												<span class="chat-message-item">sent you a friend request.</span>
            											</div>
            											<span class="notification-icon">
            												<a href="{{route('accept-friend', ['id' => $notification->data['user']['id']])}}" class="accept-request">
            													<i class="fa fa-check"></i>  Accept Friend Request
            												</a>
            												<a href="{{route('delete-friendship', ['id' => $notification->data['user']['id']])}}" class="accept-request request-del">
            													<i class="fa fa-times"></i>
            												</a>
            											</span>
                                @elseif($notification->type == "App\Notifications\Friend\AcceptFriendNotification")
                                  <div class="author-thumb">
            												<img src="{{asset($notification->data['user']['image'])}}" alt="author">
            											</div>
            											<div class="notification-event">
                                    You and
            												<a href="{{route('profile.index', ['username' => $notification->data['user']['slug']])}}" class="h6 ">{{ $notification->data['user']['name'] }}</a>

            												<span class="">just became friends. Write on.</span>
            											</div>
                                @elseif($notification->type == "App\Notifications\Follow\FollowNotification")
                                  <div class="author-thumb">
            												<img src="{{asset($notification->data['user']['image'])}}" alt="author">
            											</div>
            											<div class="notification-event">
                                    <a href="{{route('profile.index', ['username' => $notification->data['user']['slug']])}}" class="h6 ">{{ $notification->data['user']['name'] }}</a>
            												<span class="chat-message-item">starting following you.</span>
            											</div>
                                @elseif($notification->type == "App\Notifications\Follow\ReFollowNotification")
                                  <div class="author-thumb">
                                    <img src="{{asset($notification->data['user']['image'])}}" alt="author">
                                  </div>
                                  <div class="notification-event">
                                    <a href="{{route('profile.index', ['username' => $notification->data['user']['slug']])}}" class="h6 ">{{ $notification->data['user']['name'] }}</a>
                                    <span class="chat-message-item">starting following you.</span>
                                  </div>
                                  <span class="notification-icon">
                                    <a href="{{route('re-follow', ['id' => $notification->data['user']['id']])}}" class="accept-request bg-primary">
                                      <i class="fa fa-arrow-right"></i> Follow Back
                                    </a>
                                  </span>
                                @endif
          										</li>


                            @endforeach

        										<li>
        											<div class="author-thumb">
        												<img src="img/avatar56-sm.jpg" alt="author">
        											</div>
        											<div class="notification-event">
        												<a href="#" class="h6 notification-friend">Tony Stevens</a>
        												<span class="chat-message-item">4 Friends in Common</span>
        											</div>
        											<span class="notification-icon">
        												<a href="#" class="accept-request">
        													<i class="fa fa-check"></i> Accept Friend Request
        												</a>
        												<a href="#" class="accept-request request-del">
        													<i class="fa fa-times"></i>
        												</a>
        											</span>

        										</li>

        										<li class="accepted">
        											<div class="author-thumb">
        												<img src="img/avatar57-sm.jpg" alt="author">
        											</div>
        											<div class="notification-event">
        												You and <a href="#" class="h6 notification-friend">Mary Jane</a> just became friends.
        											</div>
        										</li>

        										<li>
        											<div class="author-thumb">
        												<img src="img/avatar58-sm.jpg" alt="author">
        											</div>
        											<div class="notification-event">
        												<a href="#" class="h6 notification-friend">Stagg Clothing</a>
        												<span class="chat-message-item">9 Friends in Common</span>
        											</div>
        											<span class="notification-icon">
        												<a href="#" class="accept-request">
        													<i class="fa fa-check"></i>  Accept Friend Request
        												</a>
        												<a href="#" class="accept-request request-del">
        													<i class="fa fa-times"></i>
        												</a>
        											</span>
        										</li>

        									</ul>
        								</div>



        							</div>
        						</div>
        					</div>

        				</div>

        				<!-- ... end Friends -->

        			</div>
        		</div>

        		<!-- ... end Main Content -->


        		<!-- Left Sidebar -->

        				<div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12 l-side">

        					<div class="ui-block">
        						<!-- Your Profile  -->
        						<div class="your-profile">
        							<div id="accordion" role="tablist" aria-multiselectable="true">
        								<div class="card">
        									<div class="card-header" role="tab" id="headingOne">
        										<h6 class="mb-0">
        											<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne1" aria-expanded="true" aria-controls="headingOne1">
        												Profile Settings
        												<svg class="olymp-dropdown-arrow-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
        											</a>
        										</h6>
        									</div>
        									<div id="collapseOne1" class="collapse" role="tabpanel" aria-labelledby="headingOne">
        										<ul class="your-profile-menu">
        											<li>
        												<a href="28-YourAccount-PersonalInformation.html">Personal Information</a>
        											</li>
        											<li>
        												<a href="30-YourAccount-ChangePassword.html">Change Password</a>
        											</li>
        											<li>
        												<a href="29-YourAccount-AccountSettings.html">Request Verification</a>
        											</li>
        											<li>
        												<a href="02-ProfilePageStage.html">profile stage</a>
        											</li>
        											<li>
        												<a href="32-YourAccount-EducationAndEmployement.html">delete account</a>
        											</li>
        										</ul>
        									</div>
        								</div>
        							</div>
        						</div>
        						<!-- ... end Your Profile  -->
        					</div>

        					<div class="ui-block">
        						<!-- Your Profile  -->
        						<div class="your-profile">
        							<div class="ui-block-title">
        								<a href="02-ProfilePagePrivacy.html" class="h6 title">Privacy</a>
        							</div>
        						</div>
        						<!-- ... end Your Profile  -->
        					</div>

        					<div class="ui-block">
        						<!-- Your Profile  -->
        						<div class="your-profile">
        							<div class="ui-block-title">
        								<a href="33-YourAccount-Notifications.html" class="h6 title">Notifications</a>
        								<a href="#" class="items-round-little bg-primary">8</a>
        							</div>
        						</div>
        						<!-- ... end Your Profile  -->
        					</div>

        					<div class="ui-block">
        						<!-- Your Profile  -->
        						<div class="your-profile">
        							<div id="accordion" role="tablist" aria-multiselectable="true">
        								<div class="card">
        									<div class="card-header" role="tab" id="headingOne">
        										<h6 class="mb-0">
        											<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne2" aria-expanded="true" aria-controls="collapseOne2">
        												Requests Sent
        												<svg class="olymp-dropdown-arrow-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
        											</a>
        										</h6>
        									</div>
        									<div id="collapseOne2" class="collapse" role="tabpanel" aria-labelledby="headingOne">
        										<ul class="your-profile-menu">
        											<li>
        												<a href="02-ProfilePageSentRequests.html">Sent Requests</a>
        											</li>
        										</ul>
        									</div>
        								</div>
        							</div>
        						</div>
        						<!-- ... end Your Profile  -->
        					</div>

        					<div class="ui-block">
        						<!-- Your Profile  -->
        						<div class="your-profile">
        							<div class="ui-block-title">
        								<a href="02-ProfilePageVisitors.html" class="h6 title">Visitors</a>
        							</div>
        						</div>
        						<!-- ... end Your Profile  -->
        					</div>

        					<div class="ui-block">
        						<!-- Your Profile  -->
        						<div class="your-profile">
        							<div id="accordion" role="tablist" aria-multiselectable="true">
        								<div class="card">
        									<div class="card-header" role="tab" id="headingOne">
        										<h6 class="mb-0">
        											<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne3" aria-expanded="true" aria-controls="collapseOne3">
        												Badges & Medals
        												<svg class="olymp-dropdown-arrow-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
        											</a>
        										</h6>
        									</div>
        									<div id="collapseOne3" class="collapse" role="tabpanel" aria-labelledby="headingOne">
        										<ul class="your-profile-menu">
        											<li>
        												<a href="28-YourAccount-PersonalInformation.html">Personal Information</a>
        											</li>
        											<li>
        												<a href="29-YourAccount-AccountSettings.html">Account Settings</a>
        											</li>
        										</ul>
        									</div>
        								</div>
        							</div>
        						</div>
        						<!-- ... end Your Profile  -->
        					</div>

        					<div class="ui-block">
        						<!-- Your Profile  -->
        						<div class="your-profile">
        							<div class="ui-block-title">
        								<a href="36-FavPage-SettingsAndCreatePopup.html" class="h6 title">Membership</a>
        							</div>
        						</div>
        						<!-- ... end Your Profile  -->
        					</div>

        					<div class="ui-block">
        						<!-- Your Profile  -->
        						<div class="your-profile">
        							<div class="ui-block-title">
        								<a href="02-ProfilePageBlock.html" class="h6 title">Block List</a>
        							</div>
        						</div>
        						<!-- ... end Your Profile  -->
        					</div>

        					<div class="ui-block">
        						<!-- Your Profile  -->
        						<div class="your-profile">
        							<div id="accordion" role="tablist" aria-multiselectable="true">
        								<div class="card">
        									<div class="card-header" role="tab" id="headingOne">
        										<h6 class="mb-0">
        											<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne4" aria-expanded="true" aria-controls="collapseOne4">
        												Warnings & Penalties
        												<svg class="olymp-dropdown-arrow-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
        											</a>
        										</h6>
        									</div>
        									<div id="collapseOne4" class="collapse" role="tabpanel" aria-labelledby="headingOne">
        										<ul class="your-profile-menu">
        											<li>
        												<a href="28-YourAccount-PersonalInformation.html">Personal Information</a>
        											</li>
        											<li>
        												<a href="29-YourAccount-AccountSettings.html">Account Settings</a>
        											</li>
        										</ul>
        									</div>
        								</div>
        							</div>
        						</div>
        						<!-- ... end Your Profile  -->
        					</div>

        					<div class="ui-block">
        						<!-- Your Profile  -->
        						<div class="your-profile">
        							<div class="ui-block-title">
        								<a href="02-ProfilePageStatistics.html" class="h6 title">Statistics</a>
        							</div>
        						</div>
        						<!-- ... end Your Profile  -->
        					</div>

        					<div class="ui-block">
        						<!-- Your Profile  -->
        						<div class="your-profile">
        							<div class="ui-block-title">
        								<a href="36-FavPage-SettingsAndCreatePopup.html" class="h6 title">support Center</a>
        							</div>
        						</div>
        						<!-- ... end Your Profile  -->
        					</div>

        					<div class="ui-block">
        						<!-- Your Profile  -->
        						<div class="your-profile">
        							<div id="accordion" role="tablist" aria-multiselectable="true">
        								<div class="card">
        									<div class="card-header" role="tab" id="headingOne">
        										<h6 class="mb-0">
        											<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne5" aria-expanded="true" aria-controls="collapseOne5">
        												Activities Log
        												<svg class="olymp-dropdown-arrow-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
        											</a>
        										</h6>
        									</div>
        									<div id="collapseOne5" class="collapse" role="tabpanel" aria-labelledby="headingOne">
        										<ul class="your-profile-menu">
        											<li>
        												<a href="28-YourAccount-PersonalInformation.html">Personal Information</a>
        											</li>
        											<li>
        												<a href="29-YourAccount-AccountSettings.html">Account Settings</a>
        											</li>
        										</ul>
        									</div>
        								</div>
        							</div>
        						</div>
        						<!-- ... end Your Profile  -->
        					</div>

        				</div>

        		<!-- ... end Left Sidebar -->


        </div>
    </div>
    @include('site.home.popup')
    @include('site.partials.crop-image',['width'=>1220,'height'=>400,'callback'=>'updateHeaderImage','crop'=>'square','table'=>'headers','id'=>'header-image-modal'])
    @include('site.partials.crop-image',['width'=>110,'height'=>110,'callback'=>'ajaxCall','crop'=>'circle','table'=>'users','id'=>'user-modal'])
    <div class="image-container" style="display: none">
        <span class="close-image">
            <i class="fas fa-times fa-2x"></i>
        </span>
        <div class="text-center">
            <img src="{{asset('storage/images/headers/1b6c8467-f6dc-1eb6-a028-66447ff63c9a.jpg')}}" alt="image"
                 class="image-user">
        </div>
    </div>
@endsection
@section('after_foot')
@endsection
