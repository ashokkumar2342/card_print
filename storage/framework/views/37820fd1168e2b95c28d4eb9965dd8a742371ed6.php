<?php $__env->startSection('body'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Add Districts</h3>
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
                            <form action="<?php echo e(route('admin.Master.districtsStore')); ?>" method="post" class="add_form"  no-reset="true" reset-input-text="code,name_english,zp_ward,name_local_language" select-triger="state_select_box">
                                <?php echo e(csrf_field()); ?>

                                <div class="card-body row">
                                    <div class="col-lg-6 form-group">
                                    <label for="exampleInputEmail1">States</label>
                                    <span class="fa fa-asterisk"></span>
                                    <select name="states" class="form-control" id="state_select_box" data-table="district_datatable" onchange="callAjax(this,'<?php echo e(route('admin.Master.DistrictsTable')); ?>','district_table')">    
                                        <option selected disabled>Select State</option>                                      
                                        <?php $__currentLoopData = $States; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $State): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($State->id); ?>"><?php echo e($State->code); ?>--<?php echo e($State->name_e); ?></option>  
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label for="exampleInputEmail1">Districts Code</label>
                                        <span class="fa fa-asterisk"></span>
                                        <input type="text" name="code" id="code" class="form-control" placeholder="Enter Code"maxlength="5">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputPassword1">Districts Name (English)</label>
                                        <span class="fa fa-asterisk"></span>
                                        <input type="text" name="name_english" id="name_english" class="form-control" placeholder="Enter Name (English)" maxlength="50">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputPassword1">Districts Name (Local Language)</label>
                                        <span class="fa fa-asterisk"></span>
                                        <input type="text" name="name_local_language" id="name_local_language" class="form-control" placeholder="Enter Name (Local Language)" maxlength="50">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputPassword1">How Many Z.P.Ward To Create</label>
                                        <span class="fa fa-asterisk"></span>
                                        <input type="text" name="zp_ward" id="zp_ward" class="form-control"maxlength="50">
                                    </div>
                                    
                                </div> 
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div> 
                    </div>
                    <div class="col-lg-12">
                        <div class="card card-primary" id="district_table"> 
                             <table id="district_datatable" class="table table-striped table-hover control-label">
                                 <thead>
                                     <tr>
                                         <th>States</th>
                                         <th>Code</th>
                                         <th>Name (English)</th>
                                         <th>Name (Local Language)</th>
                                         <th>Total Z.P.Ward</th>
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
        </div> 
    </section>
    <?php $__env->stopSection(); ?>
    <?php $__env->startPush('scripts'); ?>
    <script type="text/javascript"> 
        $('#district_datatable').DataTable();
    </script>
    <?php $__env->stopPush(); ?> 


<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>