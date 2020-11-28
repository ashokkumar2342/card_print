<?php $__env->startSection('body'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Mapping Village Assembly Part</h3>
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
                        <div class="card card-primary"> 
                            <form action="<?php echo e(route('admin.Master.MappingVillageAssemblyPartStore')); ?>" method="post" class="add_form" content-refresh="district_table" no-reset="true" select-triger="village_select_box,assembly_select_box">
                                <?php echo e(csrf_field()); ?>

                                <div class="card-body">
                                    <div class="row"> 
                                    <div class="col-lg-3 form-group">
                                        <label for="exampleInputEmail1">States</label>
                                        <span class="fa fa-asterisk"></span>
                                        <select name="states" class="form-control" onchange="callAjax(this,'<?php echo e(route('admin.Master.stateWiseDistrict')); ?>','district_select_box')">
                                            <option selected disabled>Select States</option>
                                            <?php $__currentLoopData = $States; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $State): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($State->id); ?>"><?php echo e($State->code); ?>--<?php echo e($State->name_e); ?></option>  
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label for="exampleInputEmail1">District</label>
                                        <span class="fa fa-asterisk"></span>
                                        <select name="district" class="form-control" id="district_select_box" onchange="callAjax(this,'<?php echo e(route('admin.Master.DistrictWiseBlock')); ?>','block_select_box')">
                                            <option selected disabled>Select District</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label for="exampleInputEmail1">Block MCS</label>
                                        <span class="fa fa-asterisk"></span>
                                        <select name="block_mcs" class="form-control" id="block_select_box" onchange="callAjax(this,'<?php echo e(route('admin.Master.BlockWiseVillage')); ?>'+'?district_id='+$('#district_select_box').val(),'village_select_box')">
                                            <option selected disabled>Select Block MCS</option>
                                             
                                        </select>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label for="exampleInputEmail1">Village</label>
                                        <span class="fa fa-asterisk"></span>
                                        <select name="village" class="form-control" id="village_select_box" onchange="callAjax(this,'<?php echo e(route('admin.Master.MappingVillageAssemblyPartFilter')); ?>'+'?district_id='+$('#district_select_box').val(),'value_div_id')">
                                            <option selected disabled>Select Village</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="row" id="value_div_id">
                                      
                                </div> 
                            </form>
                        </div> 
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