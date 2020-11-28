<option selected disabled>Select District</option>
<?php $__currentLoopData = $Districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $District): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($District->id); ?>"><?php echo e($District->code); ?>--<?php echo e($District->name_e); ?></option>  
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>