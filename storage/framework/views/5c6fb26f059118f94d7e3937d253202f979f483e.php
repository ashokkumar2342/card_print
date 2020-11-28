<option selected disabled>Select Assembly</option>
<?php $__currentLoopData = $assemblys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assembly): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($assembly->id); ?>"><?php echo e($assembly->code); ?>--<?php echo e($assembly->name_e); ?></option>	 
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>