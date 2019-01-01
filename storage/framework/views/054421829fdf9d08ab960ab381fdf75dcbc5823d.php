
<?php if($message_success = Session::get('success')): ?>
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i><?php echo e($message_success); ?></h4>
    
</div>
<?php endif; ?>

<?php if($message_info = Session::get('info')): ?>
<div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-info"></i><?php echo e($message_info); ?></h4>
    
</div>
<?php endif; ?>

<?php if($message_warning = Session::get('warning')): ?>
<div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-warning"></i><?php echo e($message_warning); ?></h4>
    
</div>
<?php endif; ?>        

<?php if($message_error = Session::get('error')): ?>
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-ban"></i><?php echo e($message_error); ?></h4>
</div>
<?php endif; ?>

