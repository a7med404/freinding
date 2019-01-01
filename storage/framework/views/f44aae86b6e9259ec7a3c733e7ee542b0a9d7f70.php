<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row display-flex">
        <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="landing-content">
                <?php echo $__env->make('auth.form_title', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
        <div class="col col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12">
            <!-- Login-Registration Form  -->
            <div class="registration-login-form">
                <!-- Nav tabs -->
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel" data-mh="log-tab">
                        <div class="title h6">Register to Friending</div>
                        <form class="content" role="form" method="POST" action="">
                            <?php echo e(csrf_field()); ?>

                            <div class="row">
                                <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <?php echo $__env->make('auth.form_register', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- ... end Login-Registration Form  -->	
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('site.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>