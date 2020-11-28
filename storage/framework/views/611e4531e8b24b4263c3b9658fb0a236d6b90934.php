<div class="col-lg-6"> 
  <div class="card card-primary">
  <div class="card-header">
     <h3 class="card-title"></h3>
    </div> 
    <div class="card-body">
       <table class="table">
         <thead>
           <tr>
             <th>Assembly Code</th>
             <th>Part No.</th>
             <th>Action</th>
           </tr>
         </thead>
         <tbody>
          <?php $__currentLoopData = $assemblyParts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assemblyPart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <tr>
             <td><?php echo e(isset($assemblyPart->assembly->name_e) ? $assemblyPart->assembly->name_e : ''); ?></td>
             <td><?php echo e($assemblyPart->part_no); ?></td>
             <td class="text-center">
               <a onclick="callAjax(this,'<?php echo e(route('admin.Master.MappingVillageAssemblyPartRemove',$assemblyPart->id)); ?>')" title="Remove" class="btn" select-triger="village_select_box" success-popup="true"><i class="fa fa-remove text-danger"></i></a>
             </td>
           </tr> 
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </tbody>
       </table>
    </div>
  </div>
</div>
<div class="col-lg-6"> 
  <div class="card card-info">
    
    <div class="card-body">
      <div class="row"> 
      <div class="col-lg-6 form-group">
        <label>Assembly</label>
        <select name="assembly" class="form-control" id="assembly_select_box" onchange="callAjax(this,'<?php echo e(route('admin.Master.MappingAssemblyWisePartNo')); ?>'+'?village_id='+$('#village_select_box').val(),'part_no_select_box')">
          <option selected disabled>Select Assembly</option> 
          <?php $__currentLoopData = $assemblys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assembly): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($assembly->id); ?>"><?php echo e($assembly->name_e); ?></option> 
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        </select> 
      </div>
      <div class="col-lg-6 form-group">
        <label>Part No.</label>
        <select name="part_no" class="form-control" id="part_no_select_box">
          <option selected disabled>Select Part</option> 
            
        </select> 
      </div>
      <div class="col-lg-12 form-group text-center">
        <input type="submit" class="btn btn-success">
      </div>
      </div> 
    </div>
  </div>
</div>
