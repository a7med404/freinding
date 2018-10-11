<?php $__env->startSection('title'); ?> update Role
<?php $__env->stopSection(); ?>
<?php $__env->startSection('head_content'); ?>
<?php echo $__env->make('admin.roles.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.errors.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo Form::model($role, ['method' => 'PATCH','route' => ['admin.roles.update', $role->id],'data-parsley-validate'=>""]); ?>

<?php echo $__env->make('admin.roles.form', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('after_head'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/admin/vendors/select2/css/select2.min.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/admin/vendors/select2/css/select2-bootstrap.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('after_foot'); ?>
<script type="text/javascript" src="<?php echo e(asset('css/admin/vendors/select2/js/select2.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>