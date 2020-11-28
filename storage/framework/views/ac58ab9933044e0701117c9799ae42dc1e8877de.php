<option selected disabled>Select Booth No.</option> 
<?php $__currentLoopData = $selectbooths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selectbooth): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($selectbooth->id); ?>"><?php echo e($selectbooth->booth_name); ?></option> 
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
 