<?php $__env->startSection('title'); ?>

    <title>Unauthorized Exeption</title>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('head_content'); ?>
 <h1>
        Unauthorized Page
      </h1>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

                <div class="error-page">


                    <div class="error-content">

                        <h2 class="text-red">No Way!</h2>
                        <h3><i class="fa fa-warning text-red"></i> Oops! You are not authorized to do this.</h3>

                        <p>
                            Meanwhile, you may <a href="/admin">return home</a>.
                        </p>


                    </div>
                    <!-- /.error-content -->
                </div>
                <!-- /.error-page -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>