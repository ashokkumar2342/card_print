<option value="0">All</option>
<?php $__currentLoopData = $villages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $village): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($village->id); ?>"><?php echo e($village->code); ?>--<?php echo e($village->name_e); ?></option> 
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>