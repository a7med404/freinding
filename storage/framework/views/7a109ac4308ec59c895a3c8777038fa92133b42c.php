<!-- Top Header-Profile -->
<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ui-block">
                <div class="top-header">
                    <div class="top-header-thumb">
                        <img src="<?php echo e(asset('storage/images/headers/default.jpg')); ?>" alt="nature">
                       <p class="cangecover"><i class="fas fa-camera"></i> Update Cover Photo</p>
                    </div>
                    <div class="profile-section">
                        <div class="row">
                            <div class="col col-lg-5 col-md-5 col-sm-12 col-12">
                                <ul class="profile-menu">
                                    <li>
                                        <a href="<?php echo e(route('profile.index')); ?>" class="active">Timeline</a>
                                    </li>
                                    <li>
                                        <a href="05-ProfilePage-About.html">About</a>
                                    </li>
                                    <li>
                                        <a href="06-ProfilePage.html">Friends</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col col-lg-5 ml-auto col-md-5 col-sm-12 col-12">
                                <ul class="profile-menu">
                                    <li>
                                        <a href="07-ProfilePage-Photos.html">Photos</a>
                                    </li>
                                    <li>
                                        <a href="09-ProfilePage-Videos.html">Videos</a>
                                    </li>
                                    <li>
                                        <div class="more">
                                            <svg class="olymp-three-dots-icon">
                                                <use xlink:href="/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                            </svg>
                                            <ul class="more-dropdown more-with-triangle">
                                                <li>
                                                    <a href="#">Report Profile</a>
                                                </li>
                                                <li>
                                                    <a href="#">Block Profile</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="control-block-button">
                            <a href="35-YourAccount-FriendsRequests.html" class="btn btn-control bg-blue">
                                <svg class="olymp-happy-face-icon">
                                    <use xlink:href="/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use>
                                </svg>
                            </a>

                            <a href="#" class="btn btn-control bg-purple">
                                <svg class="olymp-chat---messages-icon">
                                    <use xlink:href="/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use>
                                </svg>
                            </a>

                            <div class="btn btn-control bg-primary more">
                                <svg class="olymp-settings-icon">
                                    <use xlink:href="/svg-icons/sprites/icons.svg#olymp-settings-icon"></use>
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
                                        <a href="<?php echo e(route('profile.setting')); ?>">Account Settings</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="top-header-author">
                        <a href="<?php echo e(route('profile.index')); ?>" class="author-thumb">
                            <?php if(!empty($user->image)): ?>
                                <img class="profileimg" alt="author" src="<?php echo e($user->image); ?>">
                            <?php else: ?>
                                <img alt="author" src="<?php echo e(asset('olympus/img/author-page.jpg')); ?>">
                            <?php endif; ?>
                        </a>
                        <div class="author-content">
                            <?php if(empty($verstatus) || $verstatus->status=="unverified" || $verstatus->status=="underprocess"): ?>
                                <a href="<?php echo e(route('profile.index')); ?>"
                                   class="h4 author-name"><?php echo e($user->display_name); ?></a>
                            <?php else: ?>
                                <a href="<?php echo e(route('profile.index')); ?>" class="h4 author-name"><?php echo e($user->display_name); ?> <i
                                            style="color:green; font-size:17px;" class="fas fa-check-circle"></i></a>
                            <?php endif; ?>
                            <div class="country"><?php echo countryData($user->country); ?></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ... end Top Header-Profile -->
