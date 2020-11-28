<option selected disabled>select P.S.Ward</option>
<?php $__currentLoopData = $pswards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $psward): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <option value="<?php echo e($psward->id); ?>"><?php echo e($psward->ward_no); ?></option>	 
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>