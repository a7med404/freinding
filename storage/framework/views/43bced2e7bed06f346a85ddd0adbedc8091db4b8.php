<?php $__env->startSection('content'); ?>
<?php echo $__env->make('usersite::settingheader', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- Your Account Personal Information -->
<div class="container">
    <div class="row">
        <div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
            <div class="ui-block">
                    <!-- Personal Information Form  -->
                    <?php if($form_type=='personal'): ?>
                    <?php echo $__env->make('usersite::form.form_personal', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php elseif($form_type=='changepassword'): ?>
                    <?php echo $__env->make('usersite::form.form_changepassword', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php elseif($form_type=='countsetting'): ?>
                    <?php echo $__env->make('usersite::form.form_countsetting', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endif; ?>
                    <!-- ... end Personal Information Form  -->
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
<!-- ... end Your Account Personal Information -->
<?php echo $__env->make('site.home.popup', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('site.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>