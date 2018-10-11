<?php $__env->startSection('title'); ?> عرض العضو 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('head_content'); ?>
<?php echo $__env->make('admin.users.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="box">
        <div class="box-body">


            <div class="form-group">

                <label>Name:</label>

                <?php echo e($user->name); ?>


            </div>

            <div class="form-group">

                <label> Display Name:</label>

                <?php echo e($user->display_name); ?>


            </div>


            <div class="form-group">

                <label>Email:</label>

                <?php echo e($user->email); ?>


            </div>

            <div class="form-group">

                <label>Phone:</label>

                <?php echo e($user->phone); ?>


            </div>

            <div class="form-group">

                <label>Address:</label>

                <?php echo e($user->address); ?>


            </div>

            <div class="form-group">

                <label>Image:</label>

                <img  src="<?php echo e($image); ?>"  width="20%" height="auto" <?php if($image == Null): ?>  style="display:none;" <?php endif; ?> />


            </div>
            <?php if(Auth::user()->can('access-all','user-all')): ?>


            <div class="form-group">
                <label>Roles:</label>
                <?php if(!empty($user->roles)): ?>
                <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <label class="label label-success"><?php echo e($v->display_name); ?></label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label> Status:</label>
                <?php echo e(statusName($user->is_active)); ?>

            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>