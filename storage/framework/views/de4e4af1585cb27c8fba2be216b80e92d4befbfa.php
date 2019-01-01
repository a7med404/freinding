<?php $__env->startSection('content'); ?>
    <div class="main-header">
        <div class="content-bg-wrap bg-group"></div>
        <div class="container">
            <div class="row">
                <div class="col col-lg-8 m-auto col-md-8 col-sm-12 col-12">
                    <div class="main-header-content">
                        <h1>Choose your profile Stage</h1>
                    </div>
                </div>
            </div>
        </div>
        <img class="img-bottom" src="<?php echo e(asset('olympus/img/account-bottom.png')); ?>" alt="friends">
    </div>

    <div class="container">
        <div class="row">
            <div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
                <div class="row">
                    <div class="col col-lg-12 col-sm-12 col-12" style="background: white;">
<p class="title">REQUEST STAGE</p>
                        <div class="ui-block">
                            <div class="alert" id="message" style="display: none"></div>

                            <form method="post" id="changestage">
                                <input type="hidden" id="csfr" value="<?php echo e(csrf_token()); ?>">


                                <div class="center">
                                <label class="layersMenu">
                                    <input type="radio" <?php echo e(($checkprofilestage->stage=="1")? "checked" : ""); ?> id="personal" name="profilestage" value="1"  />
                                    <img class="chsst" src="<?php echo e(asset('olympus/img/user.png')); ?>">
                                    <div class="fontst">Personal Profile</div>
                                </label>

                                <label class="layersMenu">
                                    <input type="radio" <?php echo e(($checkprofilestage->stage=="2")? "checked" : ""); ?> id="business" name="profilestage" value="2" />
                                    <img class="chsst" src="<?php echo e(asset('olympus/img/business.png')); ?>">
                                    <div class="fontst">Business Profile</div>
                                </label>
                                </div>

                                <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <input type="submit" name="upload" id="upload"
                                           class="btn btn-primary btn-sm full-width" value="Change Stage">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col col-xl-3 order-xl-1 col-lg-3 order-lg-1 col-md-12 order-md-2 col-sm-12  responsive-display-none">
                <div class="ui-block">
                    <!-- Your Profile  -->
                <?php echo $__env->make('usersite::listmenu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <!-- ... end Your Profile  -->
                </div>
            </div>


        </div>
    </div>
<?php $__env->stopSection(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#changestage').on('submit', function (event) {
            event.preventDefault();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('#csfr').val()
                },
                url: "<?php echo e(route('poststage')); ?>",
                method: "POST",
                data: {stage:$("input[name='profilestage']:checked").val()},
                dataType: 'JSON',
                success: function (data) {
                    $('#message').css('display', 'block');
                    $('#message').html(data.message);
                }
            });
        });
    });


</script>
    <style>
        label { display: inline-block }
        label > input { /* HIDE RADIO */
            visibility: hidden; /* Makes input not-clickable */
            position: absolute; /* Remove input from document flow */
        }
        label > input + img { /* IMAGE STYLES */
            cursor:pointer;
            border:2px solid transparent;
        }
        label > input:checked + img { /* (RADIO CHECKED) IMAGE STYLES */
            -webkit-filter: none;
            -moz-filter: none;
            filter: none;
        }

        label > input:hover + img{
            -webkit-filter: brightness(1.2) grayscale(.5) opacity(.9);
            -moz-filter: brightness(1.2) grayscale(.5) opacity(.9);
            filter: brightness(1.2) grayscale(.5) opacity(.9);
        }

        label > input + img{
            cursor:pointer;
            background-size:contain;
            background-repeat:no-repeat;
            display:inline-block;
            -webkit-transition: all 100ms ease-in;
            -moz-transition: all 100ms ease-in;
            transition: all 100ms ease-in;
            -webkit-filter: brightness(1.8) grayscale(1) opacity(.7);
            -moz-filter: brightness(1.8) grayscale(1) opacity(.7);
            filter: brightness(1.8) grayscale(1) opacity(.7);
        }

        .center {
            display: block;
            position: relative;
            text-align: center;
        }
        .chsst{
            width: 200px;
            margin: 40px 80px;
            margin-bottom: 16px;
        }
        .fontst{
            font-size: 18px;
            color: #515365;
        }
        .title{
            font-size: 18px;
            margin-top: 20px;
            color: #515365;
            font-weight: 700;
        }
        input#upload {
            width: 20%;
            float: right;
            position: relative;
            margin-top: 40px;
            font-size: 14px;
        }
        div#message {
            background: #9cff9c;
            color: green;
        }

    </style>
<?php echo $__env->make('site.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>