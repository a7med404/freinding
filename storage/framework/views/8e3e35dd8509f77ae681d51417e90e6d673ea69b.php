<div class="profile-settings-responsive">
    <a href="#" class="js-profile-settings-open profile-settings-open">
        <i class="fa fa-angle-right" aria-hidden="true"></i>
        <i class="fa fa-angle-left" aria-hidden="true"></i>
    </a>
    <div class="mCustomScrollbar" data-mcs-theme="dark">
        <div class="ui-block">
            <?php echo $__env->make('usersite::listmenu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
</div>