<?php $__env->startSection('body'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Prepare Voter List Panchayat</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">    
                        <form action="<?php echo e(route('admin.voter.GenerateVoterListAll')); ?>" method="post" no-reset="true" class="add_form">
                            <?php echo e(csrf_field()); ?>

                            <div class="card-body">
                                <div class="row">  
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputEmail1">District</label>
                                        <span class="fa fa-asterisk"></span>
                                        <select name="district" class="form-control select2" id="district_select_box" onchange="callAjax(this,'<?php echo e(route('admin.Master.DistrictWiseBlock',1)); ?>','block_select_box')">
                                            <option selected disabled>Select District</option>
                                            <?php $__currentLoopData = $Districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $District): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($District->id); ?>"><?php echo e($District->code); ?>--<?php echo e($District->name_e); ?></option>  
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                    <label for="exampleInputEmail1">Block MCS</label>
                                    <span class="fa fa-asterisk"></span>
                                    <select name="block" class="form-control select2" id="block_select_box" onchange="callAjax(this,'<?php echo e(route('admin.Master.BlockWiseVillage')); ?>'+'?id='+this.value+'&district_id='+$('#district_select_box').val(),'village_select_box')">
                                        <option selected disabled>Select Block MCS</option> 
                                    </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputEmail1">Village</label>
                                        <span class="fa fa-asterisk"></span>
                                        <select name="village" class="form-control select2" id="village_select_box" multiselect-form="true" onchange="callAjax(this,'<?php echo e(route('admin.voter.VillageWiseWardMultiple')); ?>','value_div_id')">
                                            <option selected disabled>Select Village</option>
                                        </select>
                                    </div> 
                                    <div class="col-lg-12 form-group text-center">
                                      <input type="hidden" name="ward" value="0">   
                                    </div>
                                    <input type="hidden" name="proses_by" id="proses_by" value="0">
                                    <div class="col-lg-6 form-group">
                                       <input type="submit" class="btn btn-success form-control" value="Process And Lock" onclick="$('#proses_by').val(1)">
                                   </div>
                                   <div class="col-lg-6 form-group">
                                       <input type="submit" class="btn btn-danger form-control" value="Unlock" onclick="$('#proses_by').val(2)">
                                   </div> 
                                    </div>
                                </div> 
                        </form>
                    </div> 
                </div>
            </div>
      </div>
  </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
 
<?php $__env->stopPush(); ?>
 


<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>