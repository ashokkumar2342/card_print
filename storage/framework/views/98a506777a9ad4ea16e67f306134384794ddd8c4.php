<option value="0">All</option>
<?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($block->id); ?>"><?php echo e($block->code); ?>--<?php echo e($block->name_e); ?></option> 
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>