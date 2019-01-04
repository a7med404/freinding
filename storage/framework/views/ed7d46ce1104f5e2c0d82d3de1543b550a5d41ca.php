<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row display-flex">
        <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="landing-content">
                <?php echo $__env->make('auth.form_title', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <a href="<?php echo e(route('login')); ?>" class="btn btn-md btn-border c-white">Login Now!</a>
            </div>
        </div>
        <div class="col col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12">
            <!-- Login-Registration Form  -->
            <div class="registration-login-form">
                <!-- Nav tabs -->
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel" data-mh="log-tab">
                        <?php echo $__env->make('auth.passwords.form_email', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
            </div>
            <!-- ... end Login-Registration Form  -->	
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('site.layouts.app',['title' => 'Reset Password'], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>