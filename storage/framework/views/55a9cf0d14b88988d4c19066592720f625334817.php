<div class="col-lg-12"> 
  <div class="card card-info"> 
    <div class="card-body">
      <div class="row"> 
      <div class="col-lg-6 form-group">
        <label>Assembly--Part</label>
        <select name="assembly_part" id="assembly_part_select_box" class="form-control select2" data-table="voter_list_table" onchange="callAjax(this,'<?php echo e(route('admin.Master.WardBandiFilterAssemblyPart')); ?>','voter_list');disablewardNo()">
          <option selected disabled>Select Assembly--Part</option>
          <?php $__currentLoopData = $assemblyParts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assemblyPart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($assemblyPart->id); ?>"><?php echo e(isset($assemblyPart->assembly->code) ? $assemblyPart->assembly->code : ''); ?>--<?php echo e($assemblyPart->part_no); ?></option> 
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        </select> 
      </div>
      <div class="col-lg-6 form-group">
        <label>Ward</label>
        <select name="ward" id="ward_select_box" disabled class="form-control select2" onchange="callAjax(this,'<?php echo e(route('admin.Master.WardBandiFilterward')); ?>','sr_no_form')">
          <option selected disabled>Select Ward</option> 
          <?php $__currentLoopData = $WardVillages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $WardVillage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($WardVillage->id); ?>"><?php echo e(isset($WardVillage->ward_no) ? $WardVillage->ward_no : ''); ?>--<?php echo e($WardVillage->name_e); ?></option> 
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        </select> 
      </div>  
      </div> 
    </div>
  </div>  
<div class="row" style="margin-top: 20px"> 
  <div class="col-lg-12" id="sr_no_form">
    
  </div>
  <div class="col-lg-12" id="voter_list">
    
  </div>
</div>
</div>
 