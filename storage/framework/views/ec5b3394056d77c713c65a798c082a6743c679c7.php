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
<!-- ... end Header Standard Landing  -->
<div class="header-spacer--standard"></div>
<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <form method="post"  id="stepthree" action="<?php echo e(url('updateuserthree')); ?>">
                <?php echo csrf_field(); ?>
                <div class="ui-block">

                    <div class="ui-block-title">
                        <h6 class="title">Registration Steps</h6>
                    </div>
                    <div class="ui-block-content">
                        <div class="crumina-module crumina-heading with-title-decoration">
                            <h5 class="heading-title">Step 3</h5>
                        </div>

                        <?php if($errors->any()): ?>
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="err"><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>

                        <div class="row">
                            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group label-floating is-select">
                                    <label class="control-label">RELATIONSHIP</label>
                                    <select class="selectpicker form-control" name="relationship">
                                        <option value="none">None</option>
                                        <option value="single">Single</option>
                                        <option value="inrelationship">In a Relationship</option>
                                        <option value="engaged">Engaged</option>
                                        <option value="married">Married</option>
                                    </select>
                                </div>


                                <div class="form-group label-floating is-select">
                                    <label class="control-label">NATIONALITY</label>
                                    <select class="selectpicker form-control nationality" name="nationality" >
                                        <option value=""></option>
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($country->country); ?>"><?php echo e($country->country); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <div class="invalid-feedback errnationality">
                                        <div class="error-box">
                                            <div class="danger">
                                                <svg class="olymp-little-delete">
                                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-little-delete"></use>
                                                </svg>
                                            </div>
                                            <h5 class="title">Nationality REQUIRED</h5>
                                            <p>Enter your Nationality</p>
                                        </div>
                                    </div>

                                </div>





                                <div style="display: block;text-align: center;margin-left: auto;margin-right: auto;" class="loader"><img class="loader"
                                                         src="<?php echo e(asset('olympus/img/loader.gif')); ?>"
                                                         alt="Loading....">
                                </div>
                                    <select name="livingcity" id="select2">
                                        <option value="">Select Living City</option>
                                    </select>


                            </div>
                        </div>


                    </div>
                </div>

                <br> <br>
                <div class="row">
                    <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <button class="btn btn-md btn-success" style="margin-left: auto; margin-right: auto;
display: block; background: #00c46a; padding: 10px 55px;" type="submit">Next
                        </button>

                    </div>

                </div>
            </form>

        </div>
    </div>
</div>
</body>


<style>
    div#header--standard {
        background: #ff5e3a;
        padding: 16px 2px !important;
    }

    .err {
        background: #ff6e58;
        padding: 10px;
        color: white;
        font-size: 16px;
        margin: 1px;
    }

    .errliving > .error-box {
        bottom: 0px !important;
        height: 190px;
        top: 61px;

    }

    .errnationality > .error-box {
        bottom: 0px !important;
        top: 61px;
        height: 200px;
    }
    .loader{
        width:60px;
        display: none;
    }
    #select2{
        display:none;
    }
</style>

<?php echo $__env->make('site.layouts.foot', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script>
    $(document).ready(function () {
        $(document).on('submit', '#stepthree', function () {

            if ($(".nationality option:selected").text() === "") {
                $('.errnationality').show('slow');

            } else {
                $('#stepthree').submit();
            }
            return false;
        });


        var data = [ [{"id":1,"text":"black"}, {"id":2,"text":"blue"}],
            [{"id":"1","text":"9"},{"id":"1","text":"10"}]
            ];



        $(document).on('change', '.nationality', function (event) {
            $('#select2').hide('slow');
            $('.loader').show('slow');
            $('.errnationality').hide('slow');

            country=$(".nationality option:selected").text();

            event.preventDefault();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('#csfr').val()
                },
                url: "<?php echo e(route('getcities')); ?>",
                method: "GET",
                data: {country: country},
                success: function (data) {
                    console.log(data);

                    $("#select2 option").remove();
                    for (var i = 0; i < data.length; i++) {


                        $('#select2').append($('<option>', {
                            value: data[i].city_ascii,
                            text: data[i].city_ascii
                        }));
                    }
                    $('#select2').show('slow');
                    $('.loader').hide('slow');

                }
            });
        });

        });
</script>


