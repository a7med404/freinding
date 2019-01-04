<?php $__env->startSection('visitortracker_content'); ?>
<div class="row">
	<div class="col-md-12">
		<h5>Summary</h5>

		<table class="visitortracker-table table table-sm table-striped fs-1">
			<thead>
				<th>Period</th>
				<th>Unique Visitors</th>
				<th>Visits</th>
			</thead>

			<tbody>
                <tr>
                    <td>24 hours</td>

                    <td><?php echo e($unique24h); ?></td>

                    <td><?php echo e($visits24h); ?></td>
                </tr>

                <tr>
                    <td>1 week</td>

                    <td><?php echo e($unique1w); ?></td>

                    <td><?php echo e($visits1w); ?></td>
                </tr>

                <tr>
                    <td>1 month</td>

                    <td><?php echo e($unique1m); ?></td>

                    <td><?php echo e($visits1m); ?></td>
                </tr>

                <tr>
                    <td>1 year</td>

                    <td><?php echo e($unique1y); ?></td>

                    <td><?php echo e($visits1y); ?></td>
                </tr>

                <tr>
                    <td>All time</td>

                    <td><?php echo e($uniqueTotal); ?></td>

                    <td><?php echo e($visitsTotal); ?></td>
                </tr>
			</tbody>
		</table>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<h5>Last 10 Requests</h5>

		<?php echo $__env->make('visitstats::_table_requests', ['visits' => $lastVisits], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('visitstats::layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>