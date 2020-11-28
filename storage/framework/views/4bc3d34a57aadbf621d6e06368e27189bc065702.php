<?php $__env->startSection('body'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Add Assembly</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card card-primary"> 
                            <form action="<?php echo e(route('admin.Master.Assembly.store')); ?>" method="post" class="add_form" select-triger="district_select_box">
                                <?php echo e(csrf_field()); ?>

                                <div class="card-body"> 
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">District</label>
                                        <span class="fa fa-asterisk"></span>
                                        <select name="district" id="district_select_box" class="form-control" data-table="district_table" onchange="callAjax(this,'<?php echo e(route('admin.Master.AssemblyTable')); ?>','assembly_table')"> 
                                            <?php $__currentLoopData = $Districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $District): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($District->id); ?>"><?php echo e($District->code); ?>--<?php echo e($District->name_e); ?></option>  
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div> 
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Assembly Code</label>
                                        <span class="fa fa-asterisk"></span>
                                        <input type="text" name="code" class="form-control" placeholder="Enter Code" maxlength="5">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Assembly Name (English)</label>
                                        <span class="fa fa-asterisk"></span>
                                        <input type="text" name="name_english" class="form-control" placeholder="Enter Name (English)" maxlength="50">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Assembly Name (Local Language)</label>
                                        <span class="fa fa-asterisk"></span>
                                        <input type="text" name="name_local_language" class="form-control" placeholder="Enter Name (Local Language)" maxlength="50">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">How Many Part No. To Create </label>
                                        <span class="fa fa-asterisk"></span>
                                        <input type="text" name="part_no" class="form-control" placeholder="Enter Code" maxlength="5">
                                    </div> 
                                </div> 
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div> 
                    </div>
                    <div class="col-lg-8">
                        <div class="card card-primary table-responsive" id="assembly_table"> 
                             <table id="district_table" class="table table-striped table-hover control-label">
                                 <thead>
                                     <tr>
                                          
                                         <th>District</th>
                                         <th>Code</th>
                                         <th>Name (English)</th>
                                         <th>Name (Local Language)</th>
                                         <th>Total Part</th>
                                         <th>Action</th>
                                          
                                     </tr>
                                 </thead>
                                 <tbody id="assembly_table">
                                    
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
    <script>
        $('#district_select_box').trigger('change');
        $('#district_table').DataTable();
    </script>
    <?php $__env->stopPush(); ?>


<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>