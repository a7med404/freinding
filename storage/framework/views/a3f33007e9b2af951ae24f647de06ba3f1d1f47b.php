<?php if(!isset($hideUserAndIp)): ?>
    <?php if($visit->user_id): ?>
        <img class="visitortracker-icon"
            src="<?php echo e(asset('/vendor/visitortracker/icons/user.png')); ?>"
            title="Authenticated user: <?php echo e($visit->user_email); ?>">
    <?php endif; ?>

    <?php if($visit->is_bot): ?>
        <img class="visitortracker-icon"
            src="<?php echo e(asset('/vendor/visitortracker/icons/spider.png')); ?>"
            title="<?php echo e($visit->bot ?: 'Bot'); ?>">
    <?php endif; ?>

    <?php echo e($visit->ip); ?>


    <br>
<?php endif; ?>

<?php if($visit->os_family): ?>
    <?php if(file_exists(public_path('vendor/visitortracker/icons/os/'.$visit->os_family.'.png'))): ?>
        <img class="visitortracker-icon"
            src="<?php echo e(asset('/vendor/visitortracker/icons/os/'.$visit->os_family.'.png')); ?>"
            title="<?php echo e($visit->os); ?>"
            alt="<?php echo e($visit->os); ?>">
    <?php else: ?>
        <span><?php echo e($visit->os); ?></span>
    <?php endif; ?>
<?php else: ?>
    <span><?php echo e($visit->os); ?></span>
<?php endif; ?>

<?php if($visit->browser_family): ?>
    <?php if(file_exists(public_path('vendor/visitortracker/icons/browsers/'.$visit->browser_family.'.png'))): ?>
        <img class="visitortracker-icon"
            src="<?php echo e(asset('/vendor/visitortracker/icons/browsers/'.$visit->browser_family.'.png')); ?>"
            title="<?php echo e($visit->browser); ?>"
            alt="<?php echo e($visit->browser); ?>">
    <?php else: ?>
        <span><?php echo e($visit->browser); ?></span>
    <?php endif; ?>
<?php else: ?>
    <span><?php echo e($visit->browser); ?></span>
<?php endif; ?>

<?php if($visit->is_desktop): ?>
    <img class="visitortracker-icon"
        src="<?php echo e(asset('/vendor/visitortracker/icons/desktop.png')); ?>"
        title="Desktop">
<?php endif; ?>

<?php if($visit->is_mobile): ?>
    <img class="visitortracker-icon"
        src="<?php echo e(asset('/vendor/visitortracker/icons/mobile.png')); ?>"
        title="Mobile device">
<?php endif; ?>

<?php echo e($visit->browser_language ?: ''); ?>


<br>

<?php if($visit->country_code): ?>
    <?php if(file_exists(public_path('vendor/visitortracker/icons/flags/'.$visit->country_code.'.png'))): ?>
        <img class="visitortracker-icon"
            src="<?php echo e(asset('/vendor/visitortracker/icons/flags/'.$visit->country_code.'.png')); ?>"
            title="<?php echo e($visit->country); ?>">
    <?php else: ?>
        <img class="visitortracker-icon"
            src="<?php echo e(asset('/vendor/visitortracker/icons/flags/unknown.png')); ?>"
            title="Unknown">
    <?php endif; ?>
<?php endif; ?>

<?php echo e($visit->city ?: ''); ?><?php echo e($visit->city && $visit->lat && $visit->long ? ',' : ''); ?>


<?php if($visit->lat && $visit->long): ?>
    <?php echo e($visit->lat); ?>, <?php echo e($visit->long); ?>

<?php endif; ?>