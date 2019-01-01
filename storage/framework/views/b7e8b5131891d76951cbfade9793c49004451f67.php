<table class="visitortracker-table table table-sm table-striped fs-1">
    <thead>
        <th>Request</th>
        <th>Referrer</th>
        <th>Visitor</th>
    </thead>

    <tbody>
        <?php $__currentLoopData = $visits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="visitortracker-cell-break-words">
                    <?php echo e(\Carbon\Carbon::parse($visit->created_at)
                        ->tz(config('visitortracker.timezone', 'UTC'))
                        ->format(config('visitortracker.datetime_format'))); ?>

                    
                    <br>

                    <?php echo e($visit->is_ajax ? 'AJAX' : ''); ?>

                    
                    <?php if($visit->is_login_attempt): ?>
                        <img class="visitortracker-icon"
                            src="<?php echo e(asset('/vendor/visitortracker/icons/login_attempt.png')); ?>"
                            title="Login attempt">
                    <?php endif; ?>

                    <?php echo e($visit->method); ?> 

                    <a href="<?php echo e($visit->url); ?>"
                        title="<?php echo e($visit->url); ?>"
                        target="_blank"><?php echo e($visit->url); ?></a>
                </td>

                <td class="visitortracker-cell-break-words">
                    <?php echo $visit->referer
                        ? '<a href="' . $visit->referer . '" title="' . $visit->referer . '" target="_blank">' . $visit->referer . '</a>'
                        : '-'; ?>

                </td>

                <td class="visitortracker-cell-nowrap">
                    <?php echo $__env->make('visitstats::_visitor', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>