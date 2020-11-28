<option selected disabled>Select Ward</option> 
 <?php $__currentLoopData = $WardVillages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $WardVillage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 	 <option value="<?php echo e($WardVillage->id); ?>"><?php echo e($WardVillage->ward_no); ?> <?php echo e($WardVillage->lock==1?'( Locked )':''); ?></option>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                     
  



