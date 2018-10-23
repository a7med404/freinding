<div class="draw_registers" id="draw_registers">
<?php if(isset($wrong_form) && !empty($wrong_form)): ?>
<p class="alert alert-danger mb-30 "> <?php echo e($wrong_form); ?></p>
<?php endif; ?>
<?php if(isset($correct_form) && !empty($correct_form)): ?>
<p class="alert alert-success mb-30 "><?php echo e($correct_form); ?></p>
<?php endif; ?>
</div>