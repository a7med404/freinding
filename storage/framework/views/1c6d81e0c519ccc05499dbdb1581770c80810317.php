<thead>
    <tr>

        <th>ID</th>
        <th>User Name</th>
        <th>Display Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Source</th>
        <?php if($user_role == 1): ?>
        <th>Roles</th>
        <?php endif; ?>
        <?php if($user_edit == 1): ?>
        <th>Status</th>
        <?php endif; ?>
        <th style="width: 105px;">Created At</th>
        <?php if($user_edit == 1 || $user_show == 1 || $user_delete == 1): ?>
        <th style="width: 200px;">Settings</th>
        <?php endif; ?>
    </tr>
</thead>

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<tr>
    <td><?php echo e($user->id); ?></td>
    <td><?php echo e($user->name); ?></td>
    <td><?php echo e($user->display_name); ?></td>
    <td><?php echo e($user->email); ?></td>
    <td><?php echo e($user->phone); ?></td>
    <td><?php echo e($user->site_register); ?></td>
    <?php if($user_role == 1): ?>
    <td>
        <?php if(!empty($user->roles)): ?>
        <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <small class="label bg-green" style="color: #000;"><?php echo e($v->display_name); ?></small>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </td>
    <?php endif; ?>
    <?php if($user_edit == 1): ?>
    <td>
        <?php if($user->is_active == 0): ?>
        <a class="poststatus fa fa-remove btn  btn-danger btn-state"  data-id='<?php echo e($user->id); ?>' data-status='1' ></a>
        <?php else: ?>
        <a class="poststatus fa fa-check btn  btn-success btn-state"  data-id='<?php echo e($user->id); ?>' data-status='0' ></a>
        <?php endif; ?>
    </td>
    <?php endif; ?>
    <td><?php echo Time_Elapsed_String('@' . strtotime($user->created_at)); ?></td>
    <?php if($user_edit == 1 || $user_show == 1 || $user_delete == 1): ?>
    <td>
        <?php if($user_show== 1): ?>
        <!--<a class="btn btn-info fa fa-eye-slash btn-user" data-toggle="tooltip" data-placement="top" data-title="Show profile" href="<?php echo e(route('admin.users.show',$user->id)); ?>"></a>-->
        <?php endif; ?>
        <?php if($user_edit == 1): ?>
        <a class="btn btn-primary fa fa-edit btn-user" data-toggle="tooltip" data-placement="top" data-title="update profile" href="<?php echo e(route('admin.users.edit',$user->id)); ?>"></a>
        <?php endif; ?>
        <?php if($user_delete == 1 && $user->id != 1 ): ?>
        <a id="delete" data-id='<?php echo e($user->id); ?>' data-name='<?php echo e($user->name); ?>' data-toggle="tooltip" data-placement="top" data-title="delete user" class="btn btn-danger fa fa-trash btn-user"></a>
        <?php echo Form::open(['method' => 'DELETE','route' => ['admin.users.destroy', $user->id],'style'=>'display:inline']); ?>

        <?php echo Form::submit('Delete', ['class' => 'hide btn btn-danger delete-btn-submit','data-delete-id' => $user->id]); ?>

        <?php echo Form::close(); ?>

        <?php endif; ?>
    </td>
    <?php endif; ?>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

