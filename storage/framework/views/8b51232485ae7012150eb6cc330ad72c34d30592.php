<option selected disabled>Select Part</option> 
<?php $__currentLoopData = $Parts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if(in_array($Part->id,$OldParts)): ?>
<?php else: ?>
<option value="<?php echo e($Part->id); ?>"><?php echo e($Part->part_no); ?></option>
<?php endif; ?> 
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 