<?php $__env->startSection('title'); ?> Add New User
<?php $__env->stopSection(); ?>
<?php $__env->startSection('head_content'); ?>
<?php echo $__env->make('admin.users.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('admin.errors.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('admin.users.form', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('after_head'); ?>

<link href="<?php echo e(asset('css/admin/vendors/jasny-bootstrap/css/jasny-bootstrap.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('css/admin/vendors/x-editable/css/bootstrap-editable.css')); ?>" rel="stylesheet" type="text/css" />

<link href="<?php echo e(asset('css/admin/vendors/daterangepicker/css/daterangepicker.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('css/admin/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('css/admin/vendors/clockface/css/clockface.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('css/admin/vendors/jasny-bootstrap/css/jasny-bootstrap.css')); ?>" rel="stylesheet" type="text/css" />


<link href="<?php echo e(asset('css/admin/css/pages/user_profile.css')); ?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/admin/vendors/select2/css/select2.min.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/admin/vendors/select2/css/select2-bootstrap.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('css/admin/jquery.fancybox.css')); ?>" >
<?php $__env->stopSection(); ?>
<?php $__env->startSection('after_foot'); ?>
<script src="<?php echo e(asset('css/admin/vendors/jasny-bootstrap/js/jasny-bootstrap.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('css/admin/vendors/jquery-mockjax/js/jquery.mockjax.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('css/admin/vendors/x-editable/js/bootstrap-editable.js')); ?>" type="text/javascript"></script>

<script src="<?php echo e(asset('css/admin/vendors/moment/js/moment.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('css/admin/vendors/daterangepicker/js/daterangepicker.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('css/admin/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('css/admin/vendors/clockface/js/clockface.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('css/admin/vendors/jasny-bootstrap/js/jasny-bootstrap.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/admin/pages/datepicker.js')); ?>" type="text/javascript"></script>

<!--<script src="<?php echo e(asset('js/admin/pages/user_profile.js')); ?>" type="text/javascript"></script>-->
<script src="<?php echo e(asset('js/admin/jquery.repeater.min.js')); ?>"></script>
<!--<script src="<?php echo e(asset('js/admin/tinymce/tinymce.min.js')); ?>"></script>-->
<script src="<?php echo e(asset('js/admin/jquery.fancybox.js')); ?>"></script>
<script src="<?php echo e(asset('js/admin/jquery.fancybox.pack.js')); ?>"></script>
<?php echo $__env->make('admin.users.repeater', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>