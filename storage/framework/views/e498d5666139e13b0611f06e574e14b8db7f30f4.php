<option selected disabled>Select Village</option>
<?php $__currentLoopData = $Villages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Village): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($Village->id); ?>"><?php echo e($Village->code); ?>--<?php echo e($Village->name_e); ?> <?php echo e($Village->is_locked==1?'(Locked)':''); ?></option>  
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>