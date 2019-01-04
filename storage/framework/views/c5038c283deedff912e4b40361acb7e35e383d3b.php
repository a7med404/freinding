<thead>
    <tr>
        <th>#</th>
        <th>CITY </th>
        <th>TOTAL</th>
    </tr>
</thead>

<?php $__currentLoopData = $data_city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if(!empty($data->address)): ?>
<tr>
    <td><?php echo e(++$key); ?></td>
    <td><?php echo e($data->address); ?></td>
    <td><?php echo e($data->total); ?></td>
</tr>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>