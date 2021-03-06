<?php $__env->startSection('body'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Add Booth </h3>
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
                            <form action="<?php echo e(route('admin.Master.boothStore')); ?>" method="post" class="add_form" no-reset="true" reset-input-text="booth_no,booth_name_english,booth_name_local" select-triger="village_select_box">
                            <?php echo e(csrf_field()); ?> 
                                    <div class="row"> 
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
                                    <select name="block" class="form-control select2" id="block_select_box" onchange="callAjax(this,'<?php echo e(route('admin.Master.BlockWiseVillage')); ?>'+'?id='+this.value+'&district_id='+$('#district_select_box').val(),'village_select_box')">
                                        <option selected disabled>Select Block MCS</option> 
                                    </select>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label for="exampleInputEmail1">Village</label>
                                        <span class="fa fa-asterisk"></span>
                                        <select name="village" class="form-control select2" id="village_select_box" select2="true" data-table="ward_datatable" onchange="callAjax(this,'<?php echo e(route('admin.Master.boothTable')); ?>','ward_table')">
                                            <option selected disabled>Select Village</option>
                                            
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputEmail1">Booth No.</label>
                                        <span class="fa fa-asterisk"></span>
                                        <input type="text" name="booth_no" id="booth_no" class="form-control" placeholder="" maxlength="5">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputEmail1">Booth Name (English)</label>
                                        <span class="fa fa-asterisk"></span>
                                        <input type="text" name="booth_name_english" id="booth_name_english" class="form-control" placeholder="" maxlength="50">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputEmail1">Booth Name (Local Language)</label>
                                        <span class="fa fa-asterisk"></span>
                                        <input type="text" name="booth_name_local" id="booth_name_local" class="form-control" placeholder="" maxlength="50">
                                    </div>
                                    <div class="col-lg-12 form-group">
                                     <input type="submit" class="form-control btn btn-primary" style="margin-top: 30px">
                                    </div>
                            </form>
                        </div> 
                    <div class="col-lg-12" id="ward_table">
                        <div class="card card-primary table-responsive"> 
                             <table id="district_table" class="table table-striped table-hover control-label">
                                 <thead>
                                     <tr>
                                         <th class="text-nowrap">States</th>
                                         <th class="text-nowrap">District</th>
                                         <th class="text-nowrap">Block</th>
                                         <th class="text-nowrap">Village</th>
                                         <th class="text-nowrap">Booth No.</th>
                                         <th class="text-nowrap">Booth Name (Eng)</th>
                                         <th class="text-nowrap">Booth Name (Local Lang)</th> 
                                     </tr>
                                 </thead>
                                 <tbody>
                                     
                                 </tbody>
                             </table>
                        </div> 
                </div>
            </div> 
        </div> 
    </section>
    <?php $__env->stopSection(); ?>
    <script type="text/javascript">
        $('#ddd').DataTable();
    </script> 


<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>