<?php $__env->startSection($visitortrackerSectionContent); ?>
    <link rel="stylesheet"
        property="stylesheet"
        href="/vendor/visitortracker/css/visitortracker.css">

    <h1>Statistics</h1>

    <?php echo $__env->yieldContent('visitortracker_content'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make($visitortrackerLayout, \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>