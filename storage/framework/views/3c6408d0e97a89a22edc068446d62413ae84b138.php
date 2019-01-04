<?php if(!isset($hideLastVisitDatetime)): ?>
    <?php echo e(\Carbon\Carbon::parse($visit->created_at)
        ->tz(config('visitortracker.timezone', 'UTC'))
        ->format(config('visitortracker.datetime_format'))); ?><br>
<?php endif; ?>

<?php echo $__env->make('visitstats::_visitor', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>