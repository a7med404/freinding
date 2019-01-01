
<?php $__env->startSection('title'); ?> All roles
<?php $__env->stopSection(); ?>
<?php $__env->startSection('head_content'); ?>
<?php echo $__env->make('admin.roles.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info filterable">
            <div class="panel-heading clearfix">
                <h3 class="panel-title pull-left add_remove_title">
                    <i class="fa fa-align-center"></i> Roles List
                </h3>
                <div class="pull-right">
                    <?php if($role_create > 0 ): ?>
                    <a class="btn btn-lg btn-success fa fa-plus fontbtn" href="<?php echo e(route('admin.roles.create')); ?>"> Add Role</a>
                    <?php endif; ?>
                    <!--<a class="btn btn-primary fa fa-search" href="<?php echo e(route('admin.roles.search')); ?>"></a>-->
                </div>
            </div>
            <?php echo $__env->make('admin.errors.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="panel-body table-responsive">
                <table class="table" id="table3">
                    <?php echo $__env->make('admin.roles.table', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
                </table>
                <?php echo e($data->links()); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('after_head'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/admin/vendors/datatables/css/dataTables.bootstrap.css')); ?>">
<link href="<?php echo e(asset('css/admin/css/pages/tables.css')); ?>" rel="stylesheet" type="text/css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('after_foot'); ?>
<?php echo $__env->make('admin.layouts.delete', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.layouts.status', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>