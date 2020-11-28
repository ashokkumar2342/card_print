<option selected disabled>Select Block MCS</option>
<?php $__currentLoopData = $BlocksMcs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $BlocksMc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($BlocksMc->id); ?>"><?php echo e($BlocksMc->code); ?>--<?php echo e($BlocksMc->name_e); ?></option>  
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>