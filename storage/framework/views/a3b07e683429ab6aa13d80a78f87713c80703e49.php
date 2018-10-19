<div class="login-header">
    <?php if($user_id > 0): ?>
    <div class="dropdown">
        <a class="btn-xs btn-main btn-blue" href="#" data-toggle="dropdown">
            <?php echo e($user_name); ?>

        </a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo e(route('profile.index')); ?>">Profile</a></li>
            <?php if($admin_panel > 0): ?>
            <li><a href="<?php echo e(route('admin.index')); ?>">Admin Panel</a></li>
            <?php endif; ?>
            <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo e(csrf_field()); ?>

                </form>
            </li>
            
        </ul>
    </div>
    <?php else: ?>
    <a class="btn-xs btn-main btn-blue" href="<?php echo e(route('register')); ?>">
        New Account
    </a>
    <?php endif; ?>
</div>

