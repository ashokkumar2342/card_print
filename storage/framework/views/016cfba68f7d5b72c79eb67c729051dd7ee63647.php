<option selected disabled>Select Booth</option>
<?php $__currentLoopData = $booths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booth): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 	<option value="<?php echo e($booth->id); ?>"><?php echo e($booth->booth_no); ?></option> 
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 