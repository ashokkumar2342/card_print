<?php $__env->startSection('body'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Add Block MCS</h3>
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
                            <form action="<?php echo e(route('admin.Master.BlockMCSStore')); ?>" method="post" class="add_form" no-reset="true" select-triger="district_select_box" reset-input-text="code,name_english,name_local_language,block_mc_type,ps_ward">
                                <?php echo e(csrf_field()); ?> 
                                    <div class="row"> 
                                    <div class="col-lg-6 form-group">
                                        <label for="exampleInputEmail1">States</label>
                                        <span class="fa fa-asterisk"></span>
                                        <select name="states" class="form-control"  onchange="callAjax(this,'<?php echo e(route('admin.Master.stateWiseDistrict')); ?>','district_select_box');callAjax(this,'<?php echo e(route('admin.Master.BlockMCSTable')); ?>'+'?district_id='+$('#district_select_box').val(),'block_table')">
                                            <option selected disabled>Select States</option>
                                            <?php $__currentLoopData = $States; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $State): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($State->id); ?>"><?php echo e($State->code); ?>--<?php echo e($State->name_e); ?></option>  
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label for="exampleInputEmail1">District</label>
                                        <span class="fa fa-asterisk"></span>
                                        <select name="district" class="form-control" id="district_select_box" data-table="block_datatable" onchange="callAjax(this,'<?php echo e(route('admin.Master.BlockMCSTable')); ?>'+'?district_id='+$('#district_select_box').val(),'block_table')">
                                            <option selected disabled>Select District</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label for="exampleInputEmail1">Block Code</label>
                                        <span class="fa fa-asterisk"></span>
                                        <input type="text" name="code" id="code" class="form-control" placeholder="Enter Code" maxlength="5">
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label for="exampleInputPassword1">Block Name(English)</label>
                                        <span class="fa fa-asterisk"></span>
                                        <input type="text" name="name_english" id="name_english" class="form-control" placeholder="Enter Name (English)" maxlength="50">
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label for="exampleInputPassword1">Block Name(Local Lang)</label>
                                        <span class="fa fa-asterisk"></span>
                                        <input type="text" name="name_local_language" id="name_local_language" class="form-control" placeholder="Enter Name (Local Language)" maxlength="50">
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label for="exampleInputPassword1">Block MSC Type</label>
                                        <span class="fa fa-asterisk"></span>
                                        <select name="block_mc_type_id" id="block_mc_type" class="form-control">
                                            <option selected disabled>Select Block MSC Type</option>
                                            <?php $__currentLoopData = $BlockMCTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $BlockMCType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($BlockMCType->id); ?>"><?php echo e($BlockMCType->block_mc_type_e); ?></option>  
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputPassword1">stamp_l1</label>
                                         
                                        <input type="text" name="stamp_l1" id="stamp_l1" class="form-control" maxlength="100">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputPassword1">stamp_l2</label>
                                         
                                        <input type="text" name="stamp_l2" id="stamp_l2" class="form-control" maxlength="100">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputPassword1">How Many P.S.Ward To Create</label>
                                         
                                        <input type="text" name="ps_ward" id="ps_ward" class="form-control" maxlength="50">
                                    </div>
                                    
                                </div> 
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form> 
                    </div>
                    <div class="col-lg-12">
                        <div class="card card-primary table-responsive" id="block_table"> 
                             <table id="district_table" class="table table-striped table-hover control-label">
                                 <thead>
                                     <tr>
                                         <th>States</th>
                                         <th>District</th>
                                         <th>Code</th>
                                         <th>Name (English)</th>
                                         <th>Name (Local Language)</th>
                                         <th>Block MSC Type</th>
                                         <th>Total P.S.Ward</th>
                                         <th>Action</th>
                                          
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
    <?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        $('#btn_click_by_form').click();
        $('#district_table').DataTable();
    </script>
    <?php $__env->stopPush(); ?> 


<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>