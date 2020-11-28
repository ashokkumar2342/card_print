<option value="0">All</option>
<?php $__currentLoopData = $wards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ward): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($ward->id); ?>"><?php echo e($ward->ward_no); ?></option> 
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>