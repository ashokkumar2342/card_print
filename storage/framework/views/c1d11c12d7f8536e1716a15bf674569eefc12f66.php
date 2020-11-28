<?php $__env->startSection('body'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Voter List Download</h3>
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
                            <div class="card-body"> 
                                <div class="row">
                                <div class="col-lg-3 form-group">
                                <label for="exampleInputEmail1">Voter List Master</label>
                                <span class="fa fa-asterisk"></span>
                                <select name="voter_list_master_id" id="voter_list_master_id" class="form-control select2"> 
                                <?php $__currentLoopData = $voterListMasters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voterListMaster): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($voterListMaster->id); ?>"><?php echo e($voterListMaster->id); ?></option>  
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                </div>
                                <div class="col-lg-3 form-group">
                                    <label for="exampleInputEmail1">States</label>
                                    <span class="fa fa-asterisk"></span>
                                    <select name="states" id="state_id" class="form-control select2" onchange="callAjax(this,'<?php echo e(route('admin.Master.stateWiseDistrict')); ?>','district_select_box')">
                                        <option selected disabled>Select States</option>
                                        <?php $__currentLoopData = $States; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $State): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($State->id); ?>"><?php echo e($State->code); ?>--<?php echo e($State->name_e); ?></option>  
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-lg-3 form-group">
                                    <label for="exampleInputEmail1">District</label>
                                    <span class="fa fa-asterisk"></span>
                                    <select name="district" class="form-control select2" id="district_select_box" onchange="callAjax(this,'<?php echo e(route('admin.Master.DistrictWiseBlock')); ?>','block_select_box')">
                                        <option selected disabled>Select District</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 form-group">
                                    <label for="exampleInputEmail1">Block MCS</label>
                                    <span class="fa fa-asterisk"></span>
                                    <select name="block" class="form-control select2" id="block_select_box" onchange="callAjax(this,'<?php echo e(route('admin.voter.BlockWiseDownloadTable')); ?>'+'?block_id='+this.value+'&state_id='+$('#state_id').val()+'&district_id='+$('#district_select_box').val()+'&voter_list_master_id='+$('#voter_list_master_id').val(),'download_table')">
                                        <option selected disabled>Select Block MCS</option> 
                                    </select>
                                </div> 
                                </div>
                                <div id="download_table">
                                     
                                </div> 
                        </div>
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