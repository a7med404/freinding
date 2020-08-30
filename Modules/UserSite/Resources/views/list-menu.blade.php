<!-- Left Sidebar -->
@if($profile_user->id==Auth::id())
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
                      <a href="{{ route('profile.countsetting') }}">Account Settings</a>
                  </li>
									<li>
										<a href="{{ route('profile.setting') }}">Personal Information</a>
									</li
									<li>
										<a href="{{ route('profile.changepassword') }}">Change Password</a>
									</li>
									<li>
										<a href="{{ route('profile.verification') }}">Request Verification</a>
									</li>
									<li>
										<a href="{{ route('profile.stage') }}">profile stage</a>
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
						<a href="{{ route('profile.countsetting') }}" class="h6 title">Notifications</a>
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

  @else


		<div class="ui-block">
			<div class="ui-block-title">
				<h6 class="title">About Me</h6>
			</div>
			<div class="ui-block-content">

				<!-- W-Personal-Info -->

				<ul class="widget w-personal-info item-block">
					<li>
						<!-- <span class="title">About Me:</span>  delete-->
						<span class="text">Hi My Name Is: {{Auth::user()->display_name}}</span>
					</li>
					<li>
						<span class="title">Birthday</span>
						<span class="text">{{date('d / F',strtotime(Auth::user()->birthdate))}}</span>
					</li>
					<li>
						<span class="title">Relationship</span>
						<span class="text">{{ucfirst(Auth::user()->social_status)}}</span>
					</li>
					<li>
						<span class="title">Nationality</span>
						<span class="text">{{ucfirst(Auth::user()->nationality)}}</span>
					</li>
					<li>
						<span class="title">Living City</span>
						<span class="text">{{ucfirst(Auth::user()->country)}}</span>
					</li>
				</ul>
				<!-- .. end W-Personal-Info -->
				<!-- W-Socials -->
				<div class="widget w-socials">
					<h6 class="title">Social Networks:</h6>
					{{-- <a href="#" class="social-item bg-facebook">
						<svg class="svg-inline--fa fa-facebook-f fa-w-9" aria-hidden="true" data-prefix="fab" data-icon="facebook-f" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 264 512" data-fa-i2svg=""><path fill="currentColor" d="M76.7 512V283H0v-91h76.7v-71.7C76.7 42.4 124.3 0 193.8 0c33.3 0 61.9 2.5 70.2 3.6V85h-48.2c-37.8 0-45.1 18-45.1 44.3V192H256l-11.7 91h-73.6v229"></path></svg><!-- <i class="fab fa-facebook-f" aria-hidden="true"></i> -->
						Facebook
					</a>
					<a href="#" class="social-item bg-twitter">
						<svg class="svg-inline--fa fa-twitter fa-w-16" aria-hidden="true" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg><!-- <i class="fab fa-twitter" aria-hidden="true"></i> -->
						Twitter
					</a>
					<a href="#" class="social-item bg-dribbble">
						<svg class="svg-inline--fa fa-dribbble fa-w-16" aria-hidden="true" data-prefix="fab" data-icon="dribbble" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119.252 8 8 119.252 8 256s111.252 248 248 248 248-111.252 248-248S392.748 8 256 8zm163.97 114.366c29.503 36.046 47.369 81.957 47.835 131.955-6.984-1.477-77.018-15.682-147.502-6.818-5.752-14.041-11.181-26.393-18.617-41.614 78.321-31.977 113.818-77.482 118.284-83.523zM396.421 97.87c-3.81 5.427-35.697 48.286-111.021 76.519-34.712-63.776-73.185-116.168-79.04-124.008 67.176-16.193 137.966 1.27 190.061 47.489zm-230.48-33.25c5.585 7.659 43.438 60.116 78.537 122.509-99.087 26.313-186.36 25.934-195.834 25.809C62.38 147.205 106.678 92.573 165.941 64.62zM44.17 256.323c0-2.166.043-4.322.108-6.473 9.268.19 111.92 1.513 217.706-30.146 6.064 11.868 11.857 23.915 17.174 35.949-76.599 21.575-146.194 83.527-180.531 142.306C64.794 360.405 44.17 310.73 44.17 256.323zm81.807 167.113c22.127-45.233 82.178-103.622 167.579-132.756 29.74 77.283 42.039 142.053 45.189 160.638-68.112 29.013-150.015 21.053-212.768-27.882zm248.38 8.489c-2.171-12.886-13.446-74.897-41.152-151.033 66.38-10.626 124.7 6.768 131.947 9.055-9.442 58.941-43.273 109.844-90.795 141.978z"></path></svg><!-- <i class="fab fa-dribbble" aria-hidden="true"></i> -->
						Dribbble
					</a> --}}
					No Social Networks Yet.
				</div>
				<!-- ... end W-Socials -->
			</div>
		</div>




      {{-- <div class="card">
          <div class="card-body" style="padding: 0;">
              <div class="your-profile">
                  <div class="ui-block-title ui-block-title-small">
                      <h4 class="font-weight-bold">About Me:</h4>
                  </div>
                  <ul class="unstyled p-4">
                      <li class="mb-5"><a href="javascript:void(0)" class="h5 font-weight-bold">Hi My Name Is: {{Auth::user()->display_name}}</a>
                      </li>
                      <li class="mb-2"><a href="javascript:void(0)" class="h5 ">Birthday</a></li>
                      <li class="mb-5"><a href="javascript:void(0)" class="h6 title"
                                          style="color: #9a9fbf;">{{date('d / F',strtotime(Auth::user()->birthdate))}}</a>
                      </li>
                      <li class="mb-2"><a href="javascript:void(0)" class="h5 ">Relationship</a></li>
                      <li class="mb-5"><a href="javascript:void(0)" class="h6 title"
                                          style="color: #9a9fbf;">{{ucfirst(Auth::user()->social_status)}}</a></li>
                      <li class="mb-2"><a href="javascript:void(0)" class="h5 ">Nationality</a></li>
                      <li class="mb-5"><a href="javascript:void(0)" class="h6 title"
                                          style="color: #9a9fbf;">{{ucfirst(Auth::user()->nationality)}}</a></li>
                      <li class="mb-2"><a href="javascript:void(0)" class="h5 ">Living City</a></li>
                      <li class="mb-5"><a href="javascript:void(0)" class="h6 title"
                                          style="color: #9a9fbf;">{{ucfirst(Auth::user()->country)}}</a></li>
                      <li class="mb-2"><a href="javascript:void(0)" class="h5 ">Social Networks</a></li>
                      <li class="mb-1"><a href="javascript:void(0)" class="h6 title"
                                          style="color: #9a9fbf;">No Social Networks Yet.</a></li>
                  </ul>

              </div>
          </div>
      </div> --}}
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Badges</h6>
				</div>
				<div class="ui-block-content">

					<!-- W-Badges -->

					<ul class="widget w-badges">
						{{-- <li>
							<a href="24-CommunityBadges.html">
								<img src="img/badge1.png" alt="author">
								<div class="label-avatar bg-primary">2</div>
							</a>
						</li> --}}
					</ul>

					<p class="h6">No Badges Yet.</p>
					<!--.. end W-Badges -->
				</div>
			</div>
  @endif
<!-- ... end Left Sidebar -->
