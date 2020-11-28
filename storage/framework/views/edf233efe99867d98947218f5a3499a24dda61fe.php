<div class="col-12">
<div class="form-group">
  <label>Booth</label>
  <select class="duallistbox" multiple="multiple" name="booth[]">
    <?php $__currentLoopData = $booths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booth): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <option value="<?php echo e($booth->id); ?>"<?php echo e(in_array($booth->id,$booth_id)?'selected':''); ?>><?php echo e($booth->booth_name); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
  </select>
</div>
<!-- /.form-group -->
</div>