<?php $__env->startSection('visitortracker_content'); ?>
<div class="row">
	<div class="col-md-12">
		<h5><?php echo e($visitortrackerSubtitle); ?></h5>

		<table class="visitortracker-table table table-sm table-striped fs-1">
			<thead>
				<th>Browser</th>
				<th>Unique Visitors</th>
				<th>Visits</th>
				<th>Last Visit</th>
			</thead>

			<tbody>
				<?php $__currentLoopData = $visits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td>
							<?php if($visit->browser_family): ?>
								<?php if(file_exists(public_path('vendor/visitortracker/icons/browsers/'.$visit->browser_family.'.png'))): ?>
									<img class="visitortracker-icon"
										src="<?php echo e(asset('/vendor/visitortracker/icons/browsers/'.$visit->browser_family.'.png')); ?>"
										title="<?php echo e(ucwords(str_replace('-', ' ', $visit->browser_family))); ?>"
										alt="<?php echo e(ucwords(str_replace('-', ' ', $visit->browser_family))); ?>">
								<?php endif; ?>

                                <?php echo e(ucwords(str_replace('-', ' ', $visit->browser_family))); ?>

                            <?php else: ?>
                                <span>Unknown</span>
                            <?php endif; ?>
						</td>
							
						<td>
							<?php echo e($visit->visitors_count); ?>

						</td>

						<td>
							<?php echo e($visit->visits_count); ?>

						</td>

						<td>
							<?php echo $__env->make('visitstats::_last_visit', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						</td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>

		<?php echo e($visits->links()); ?>

	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('visitstats::layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>