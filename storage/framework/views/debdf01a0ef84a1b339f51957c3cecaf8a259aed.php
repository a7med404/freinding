<?php $__env->startSection('visitortracker_content'); ?>
<div class="row">
	<div class="col-md-12">
		<h5><?php echo e($visitortrackerSubtitle); ?></h5>

		<?php echo $__env->make('visitstats::_table_requests', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<?php echo e($visits->links()); ?>

	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('visitstats::layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>