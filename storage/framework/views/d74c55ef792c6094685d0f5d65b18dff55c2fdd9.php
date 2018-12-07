<thead>
    <tr>

        <th>ID</th>

        <!--<th>Name</th>-->

        <th>Dispaly Name</th>

        <!--<th>Description</th>-->

        <th>Roles</th>
        
        <th>Settings</th>

    </tr>
</thead>

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<tr>

    <td><?php echo e($role->id); ?></td>

    <!--<td><?php echo e($role->name); ?></td>-->

    <td><?php echo e($role->display_name); ?></td>
    
    <!--<td><?php echo e($role->description); ?></td>-->

    <?php if($role_edit == 1): ?>
    <td>

        <?php if(!empty($role->permissions)): ?>

        <?php $__currentLoopData = $role->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <small class="label bg-green" style="color: #000;"><?php echo e($v->display_name); ?></small>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php endif; ?>

    </td>
    <?php endif; ?>
    
    <td>
        <?php if($role_edit == 1): ?>
        <!--<a class="btn btn-info fa fa-eye-slash btn-user" href="<?php echo e(route('admin.roles.show',$role->id)); ?>"></a>-->

        <a class="btn btn-primary fa fa-edit btn-user" href="<?php echo e(route('admin.roles.edit',$role->id)); ?>"></a>
        <?php endif; ?>
        
        <?php if($role_delete == 1): ?>

        <a id="delete" data-id='<?php echo e($role->id); ?>' data-name='<?php echo e($role->name); ?>' class="btn btn-danger fa fa-trash btn-user"></a>

        <?php echo Form::open(['method' => 'DELETE','route' => ['admin.roles.destroy', $role->id],'style'=>'display:inline']); ?>


        <?php echo Form::submit('Delete', ['class' => 'hide btn btn-danger delete-btn-submit','data-delete-id' => $role->id]); ?>


        <?php echo Form::close(); ?>


        <?php endif; ?>
        
    </td>

</tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

