<!-- Content Header (Page header) -->
<section class="content-header">
    <!--section starts-->
    <!--<h1>User List</h1>-->
    <ol class="breadcrumb">
        <li>
            <a href="<?php echo e(route('admin.index')); ?>">
                <i class="livicon" data-name="home" data-size="14" data-loop="true"></i> Dashboard
            </a>
        </li>
        <?php if(Auth::user()->can('access-all', 'user-all','user-list')): ?>
        <li>
            <a class="active" href="<?php echo e(route('admin.users.index')); ?>">User List</a>
        </li>
        <!--<a class="btn btn-info fa fa-search" data-toggle="tooltip" data-placement="top" data-title="Users Search" href="<?php echo e(route('admin.users.search')); ?>"></a>-->
        <?php endif; ?>
    </ol>
</section>