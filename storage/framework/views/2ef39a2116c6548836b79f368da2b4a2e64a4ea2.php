<!-- ... end Header-BP-logout -->
<div class="header-spacer"></div>
<!-- Top Header-Profile Logout -->
<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ui-block">
                <div class="top-header">
                    <div class="top-header-thumb">
                        <img src="<?php echo e(asset('olympus/img/top-header1.jpg')); ?>" alt="nature">
                    </div>
                    <div class="profile-section">
                        <div class="row">
                            <div class="col col-lg-5 col-md-5 col-sm-12 col-12">
                                <ul class="profile-menu">
                                    <li>
                                        <a href="#" class="friend-count-item">
                                            <div class="h6">58</div>
                                            <div class="title">Friends</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="friend-count-item">
                                            <div class="h6">240</div>
                                            <div class="title">Photos</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="friend-count-item">
                                            <div class="h6">12</div>
                                            <div class="title">Videos</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col col-lg-5 ml-auto col-md-5 col-sm-12 col-12">
                                <ul class="profile-menu">
                                    <li>
                                        <a href="#" class="friend-count-item">
                                            <div class="h6">835</div>
                                            <div class="title">Posts</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="friend-count-item">
                                            <div class="h6">12.6K</div>
                                            <div class="title">Comments</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="friend-count-item">
                                            <div class="h6">970</div>
                                            <div class="title">Likes</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="control-block-button">
                            <a href="35-YourAccount-FriendsRequests.html" class="btn btn-control bg-blue">
                                <svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                            </a>

                            <a href="#" class="btn btn-control bg-purple">
                                <svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
                            </a>
                        </div>
                    </div>
                    <div class="top-header-author">
                        <a href="02-ProfilePage.html" class="author-thumb">
                            <img src="<?php echo e(asset('olympus/img/author-main1.jpg')); ?>" alt="author">
                        </a>
                        <div class="author-content">
                            <a href="02-ProfilePage.html" class="h4 author-name">James Spiegel</a>
                            <div class="country">San Francisco, CA</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ... end Top Header-Profile Logout -->
<section class="medium-padding120">
    <div class="container">
        <div class="row">
            <div class="col col-xl-4 col-lg-12 col-md-12 m-auto">
                <div class="logout-content">
                    <div class="logout-icon">
                        <i class="fas fa-times"></i>
                    </div>
                    <h6>Do you wanna check James’s Profile?</h6>
                    <p><a href="01-LandingPage.html">Login</a> or <a href="01-LandingPage.html">Register</a> now to create your own profile
                        and have access to all the Olympus awesome features!
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="registration-login-form-popup" tabindex="-1" role="dialog" aria-labelledby="registration-login-form-popup" aria-hidden="true">
    <div class="modal-dialog window-popup registration-login-form-popup" role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
            </a>
            <div class="modal-body">
                <div class="registration-login-form">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home1" role="tab">
                                <svg class="olymp-login-icon">
                                <use xlink:href="svg-icons/sprites/icons.svg#olymp-login-icon"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#profile1" role="tab">
                                <svg class="olymp-register-icon">
                                <use xlink:href="svg-icons/sprites/icons.svg#olymp-register-icon"></use>
                                </svg>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <?php echo $__env->make('auth.form_register', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->make('auth.form_login', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
