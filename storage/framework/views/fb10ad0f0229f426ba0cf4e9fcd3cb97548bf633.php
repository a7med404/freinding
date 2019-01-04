<!DOCTYPE html>
<html>
<head>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('olympus/Bootstrap/dist/css/bootstrap-reboot.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('olympus/Bootstrap/dist/css/bootstrap.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('olympus/Bootstrap/dist/css/bootstrap-grid.css')); ?>">

    <!-- Main Styles CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('olympus/css/main.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('olympus/css/fonts.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('olympus/css/custom.css')); ?>">

    <!--tag-style-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/select2.min.css')); ?>">

    <!--cropp-image-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/cropper.css')); ?>">

    <!--notifications-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/sweetalert.css')); ?>">


<body>
<div class="content-bg-wrap" style="background: url(../img/testimonial-header.png);"></div>
<!-- Header Standard Landing  -->
<div class="header--standard header--standard-landing" id="header--standard">
    <div class="container">
        <div class="">
            <!--header--standard-wrap-->
            <a href="<?php echo e(route('home')); ?>" class="logo">
                <div class="img-wrap">
                    <img src="<?php echo e(asset('olympus/img/logo.png')); ?>" alt="Friending">
                    <img src="<?php echo e(asset('olympus/img/logo-colored-small.png')); ?>" alt="Friending" class="logo-colored">
                </div>
                <div class="title-block">
                    <h6 class="logo-title">Friending</h6>
                    <div class="sub-title">SOCIAL NETWORK</div>
                </div>
            </a>
            <a href="#" class="open-responsive-menu js-open-responsive-menu">
                <svg class="olymp-menu-icon">
                    <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-menu-icon"></use>
                </svg>
            </a>
            <div class="nav nav-pills nav1 header-menu">
                <div class="mCustomScrollbar">
                    <ul>
                        <li class="nav-item">
                            <a href="<?php echo e(route('home')); ?>" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">About us</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Terms & Conditions</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Privacy Policy</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Contact us</a>
                        </li>
                        <li class="close-responsive-menu js-close-responsive-menu">
                            <svg class="olymp-close-icon">
                                <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                            </svg>
                        </li>
                        <li class="nav-item js-expanded-menu">
                            <a href="#" class="nav-link">
                                <svg class="olymp-menu-icon">
                                    <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-menu-icon"></use>
                                </svg>
                                <svg class="olymp-close-icon">
                                    <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header-spacer--standard"></div>

<h2 style="text-align: center;font-weight: 500;"> SUGGESTIONS USERS</h2>
<br><br>
<div class="container">
    <div class="row">
        <!--row-->
        <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
            <div class="ui-block">

                <!-- Friend Item -->

                <div class="friend-item">
                    <div class="friend-header-thumb">
                        <img src="<?php echo e(asset('olympus/img/friend7temp.jpg')); ?>" alt="friend">
                    </div>
                    <div class="friend-item-content">
                        <div class="friend-avatar">
                            <div class="author-thumb">
                                <img src="<?php echo e(asset('olympus/img/avatar7temp.jpg')); ?>" alt="author">
                            </div>
                            <div class="author-content">
                                <a href="#" class="h5 author-name">Nicholas Grissom</a>
                                <div class="country">San Francisco, CA</div>
                            </div>
                        </div>

                    </div>
                    <div class="checkbox" style="text-align: center;">
                        <label>
                            <input type="checkbox" name="optionsCheckboxes" disabled checked>
                            Checked
                        </label>
                    </div>
                </div>

                <!-- ... end Friend Item -->            </div>
        </div>
        <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
            <div class="ui-block">

                <!-- Friend Item -->

                <div class="friend-item">
                    <div class="friend-header-thumb">
                        <img src="<?php echo e(asset('olympus/img/friend7temp.jpg')); ?>" alt="friend">
                    </div>

                    <div class="friend-item-content">
                        <div class="friend-avatar">
                            <div class="author-thumb">
                                <img src="<?php echo e(asset('olympus/img/avatar7temp.jpg')); ?>" alt="author">
                            </div>
                            <div class="author-content">
                                <a href="#" class="h5 author-name">Marina Valentine</a>
                                <div class="country">Long Island, NY</div>
                            </div>
                        </div>

                    </div>
                    <div class="checkbox" style="text-align: center;">
                        <label>
                            <input type="checkbox" name="optionsCheckboxes" disabled checked>
                            Checked
                        </label>
                    </div>
                </div>

                <!-- ... end Friend Item -->            </div>
        </div>
        <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
            <div class="ui-block">

                <!-- Friend Item -->

                <div class="friend-item">
                    <div class="friend-header-thumb">
                        <img src="<?php echo e(asset('olympus/img/friend7temp.jpg')); ?>" alt="friend">
                    </div>

                    <div class="friend-item-content">
                        <div class="friend-avatar">
                            <div class="author-thumb">
                                <img src="<?php echo e(asset('olympus/img/avatar7temp.jpg')); ?>" alt="author">
                            </div>
                            <div class="author-content">
                                <a href="#" class="h5 author-name">Nicholas Grissom</a>
                                <div class="country">Los Angeles, CA</div>
                            </div>
                        </div>
                    </div>
                    <div class="checkbox" style="text-align: center;">
                        <label>
                            <input type="checkbox" name="optionsCheckboxes" disabled checked>
                            Checked
                        </label>
                    </div>
                </div>

                <!-- ... end Friend Item -->            </div>
        </div>
        <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
            <div class="ui-block">

                <!-- Friend Item -->

                <div class="friend-item">
                    <div class="friend-header-thumb">
                        <img src="<?php echo e(asset('olympus/img/friend7temp.jpg')); ?>" alt="friend">
                    </div>

                    <div class="friend-item-content">
                        <div class="friend-avatar">
                            <div class="author-thumb">
                                <img src="<?php echo e(asset('olympus/img/avatar7temp.jpg')); ?>" alt="author">
                            </div>
                            <div class="author-content">
                                <a href="#" class="h5 author-name">Chris Greyson</a>
                                <div class="country">Austin, TX</div>
                            </div>
                        </div>

                    </div>
                    <div class="checkbox" style="text-align: center;">
                        <label>
                            <input type="checkbox" name="optionsCheckboxes" disabled checked>
                            Checked
                        </label>
                    </div>
                </div>

                <!-- ... end Friend Item -->            </div>
        </div>


        
        <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
            <div class="ui-block">

                <!-- Friend Item -->

                <div class="friend-item">
                    <div class="friend-header-thumb">
                        <img src="<?php echo e(asset('olympus/img/friend7temp.jpg')); ?>" alt="friend">
                    </div>

                    <div class="friend-item-content">
                        <div class="friend-avatar">
                            <div class="author-thumb">
                                <img src="<?php echo e(asset('olympus/img/avatar7temp.jpg')); ?>" alt="author">
                            </div>
                            <div class="author-content">
                                <a href="#" class="h5 author-name">Elaine Dreifuss</a>
                                <div class="country">New York, NY</div>
                            </div>
                        </div>

                    </div>
                    <div class="checkbox" style="text-align: center;">
                        <label>
                            <input type="checkbox" name="optionsCheckboxes" checked>
                            Checked
                        </label>
                    </div>
                </div>

                <!-- ... end Friend Item -->            </div>
        </div>
        <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
            <div class="ui-block">

                <!-- Friend Item -->

                <div class="friend-item">
                    <div class="friend-header-thumb">
                        <img src="<?php echo e(asset('olympus/img/friend7temp.jpg')); ?>" alt="friend">
                    </div>

                    <div class="friend-item-content">
                        <div class="friend-avatar">
                            <div class="author-thumb">
                                <img src="<?php echo e(asset('olympus/img/avatar7temp.jpg')); ?>" alt="author">
                            </div>
                            <div class="author-content">
                                <a href="#" class="h5 author-name">Bruce Peterson</a>
                                <div class="country">Austin, TX</div>
                            </div>
                        </div>

                    </div>
                    <div class="checkbox" style="text-align: center;">
                        <label>
                            <input type="checkbox" name="optionsCheckboxes" checked>
                            Checked
                        </label>
                    </div>
                </div>

                <!-- ... end Friend Item -->            </div>
        </div>
        <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
            <div class="ui-block">

                <!-- Friend Item -->

                <div class="friend-item">
                    <div class="friend-header-thumb">
                        <img src="<?php echo e(asset('olympus/img/friend7temp.jpg')); ?>" alt="friend">
                    </div>

                    <div class="friend-item-content">
                        <div class="friend-avatar">
                            <div class="author-thumb">
                                <img src="<?php echo e(asset('olympus/img/avatar7temp.jpg')); ?>" alt="author">
                            </div>
                            <div class="author-content">
                                <a href="#" class="h5 author-name">Carol Summers</a>
                                <div class="country">Los Angeles, CA</div>
                            </div>
                        </div>

                    </div>
                    <div class="checkbox" style="text-align: center;">
                        <label>
                            <input type="checkbox" name="optionsCheckboxes" checked>
                            Checked
                        </label>
                    </div>
                </div>

                <!-- ... end Friend Item -->            </div>
        </div>
        <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
            <div class="ui-block">

                <!-- Friend Item -->

                <div class="friend-item">
                    <div class="friend-header-thumb">
                        <img src="<?php echo e(asset('olympus/img/friend7temp.jpg')); ?>" alt="friend">
                    </div>

                    <div class="friend-item-content">
                        <div class="friend-avatar">
                            <div class="author-thumb">
                                <img src="<?php echo e(asset('olympus/img/avatar7temp.jpg')); ?>" alt="author">
                            </div>
                            <div class="author-content">
                                <a href="#" class="h5 author-name">Michael Maximoff</a>
                                <div class="country">Portland, OR</div>
                            </div>
                        </div>

                    </div>
                    <div class="checkbox" style="text-align: center;">
                        <label>
                            <input type="checkbox" name="optionsCheckboxes" checked>
                            Checked
                        </label>
                    </div>
                </div>

                <!-- ... end Friend Item -->            </div>
        </div>


        <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
            <div class="ui-block">

                <!-- Friend Item -->

                <div class="friend-item">
                    <div class="friend-header-thumb">
                        <img src="<?php echo e(asset('olympus/img/friend7temp.jpg')); ?>" alt="friend">
                    </div>

                    <div class="friend-item-content">
                        <div class="friend-avatar">
                            <div class="author-thumb">
                                <img src="<?php echo e(asset('olympus/img/avatar7temp.jpg')); ?>" alt="author">
                            </div>
                            <div class="author-content">
                                <a href="#" class="h5 author-name">Elaine Dreifuss</a>
                                <div class="country">New York, NY</div>
                            </div>
                        </div>

                    </div>
                    <div class="checkbox" style="text-align: center;">
                        <label>
                            <input type="checkbox" name="optionsCheckboxes" checked>
                            Checked
                        </label>
                    </div>
                </div>

                <!-- ... end Friend Item -->            </div>
        </div>
        <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
            <div class="ui-block">

                <!-- Friend Item -->

                <div class="friend-item">
                    <div class="friend-header-thumb">
                        <img src="<?php echo e(asset('olympus/img/friend7temp.jpg')); ?>" alt="friend">
                    </div>

                    <div class="friend-item-content">
                        <div class="friend-avatar">
                            <div class="author-thumb">
                                <img src="<?php echo e(asset('olympus/img/avatar7temp.jpg')); ?>" alt="author">
                            </div>
                            <div class="author-content">
                                <a href="#" class="h5 author-name">Bruce Peterson</a>
                                <div class="country">Austin, TX</div>
                            </div>
                        </div>

                    </div>
                    <div class="checkbox" style="text-align: center;">
                        <label>
                            <input type="checkbox" name="optionsCheckboxes" checked>
                            Checked
                        </label>
                    </div>
                </div>

                <!-- ... end Friend Item -->            </div>
        </div>
        <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
            <div class="ui-block">

                <!-- Friend Item -->

                <div class="friend-item">
                    <div class="friend-header-thumb">
                        <img src="<?php echo e(asset('olympus/img/friend7temp.jpg')); ?>" alt="friend">
                    </div>

                    <div class="friend-item-content">
                        <div class="friend-avatar">
                            <div class="author-thumb">
                                <img src="<?php echo e(asset('olympus/img/avatar7temp.jpg')); ?>" alt="author">
                            </div>
                            <div class="author-content">
                                <a href="#" class="h5 author-name">Carol Summers</a>
                                <div class="country">Los Angeles, CA</div>
                            </div>
                        </div>

                    </div>
                    <div class="checkbox" style="text-align: center;">
                        <label>
                            <input type="checkbox" name="optionsCheckboxes" checked>
                            Checked
                        </label>
                    </div>
                </div>

                <!-- ... end Friend Item -->            </div>
        </div>
        <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
            <div class="ui-block">

                <!-- Friend Item -->

                <div class="friend-item">
                    <div class="friend-header-thumb">
                        <img src="<?php echo e(asset('olympus/img/friend7temp.jpg')); ?>" alt="friend">
                    </div>

                    <div class="friend-item-content">
                        <div class="friend-avatar">
                            <div class="author-thumb">
                                <img src="<?php echo e(asset('olympus/img/avatar7temp.jpg')); ?>" alt="author">
                            </div>
                            <div class="author-content">
                                <a href="#" class="h5 author-name">Michael Maximoff</a>
                                <div class="country">Portland, OR</div>
                            </div>
                        </div>

                    </div>
                    <div class="checkbox" style="text-align: center;">
                        <label>
                            <input type="checkbox" name="optionsCheckboxes" checked>
                            Checked
                        </label>
                    </div>
                </div>

                <!-- ... end Friend Item -->            </div>
        </div>


        <br><br><br>


    </div>
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <a href="<?php echo e(url('posts')); ?>" class="btn btn-md btn-success" style="margin-left: auto; margin-right: auto;
display: block; background: #00c46a; padding: 10px 55px;width: 250px;margin-bottom: 100px; margin-top: 30px;">FOLLOWING & FINISH
            </a>
        </div>

    </div>
</div>

<style>

    div#header--standard {
        background: #ff5e3a;
        padding: 16px 2px !important;
    }
</style>
<?php echo $__env->make('site.layouts.foot', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>










