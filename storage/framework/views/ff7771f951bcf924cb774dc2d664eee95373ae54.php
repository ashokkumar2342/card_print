<?php $__env->startSection('body'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Mysql Data Transfer</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card">
            <div class="card-body login-card-body">
            <form action="<?php echo e(route('admin.database.conection.MysqlDataTransferStore')); ?>" method="post" class="add_form" no-reset="true">
                <div class="row">
                    <div class="col-lg-3 form-group">
                        <label>District</label>
                        <select name="district_id" class="form-control" select-triger="block_select_box" onchange="callAjax(this,'<?php echo e(route('admin.database.conection.MysqlDataTransferDistrictWiseBlock')); ?>','block_select_box')">
                            <option value="0">All</option>
                            <?php $__currentLoopData = $Districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $District): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($District->id); ?>"><?php echo e($District->code); ?>--<?php echo e($District->name_e); ?></option> 
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        </select> 
                    </div>
                    <div class="col-lg-3 form-group">
                        <label>Block</label>
                        <select name="block_id" class="form-control" select-triger="village_select_box" id="block_select_box" onchange="callAjax(this,'<?php echo e(route('admin.database.conection.MysqlDataTransferBlockWiseVillage')); ?>','village_select_box')">
                            <option value="0">All</option>
                             
                        </select> 
                    </div>
                    <div class="col-lg-3 form-group">
                        <label>Village</label>
                        <select name="village_id" class="form-control" id="village_select_box" onchange="callAjax(this,'<?php echo e(route('admin.database.conection.MysqlDataTransferVillageWiseWard')); ?>','ward_select_box')">
                            <option value="0">All</option> 
                        </select> 
                    </div>
                    <div class="col-lg-3 form-group">
                        <label>Ward No.</label>
                        <select name="ward_id" class="form-control" id="ward_select_box">
                        <option value="0">All</option> 
                        </select> 
                    </div>
                    <div class="col-lg-12 form-group">
                      <input type="submit" class="btn btn-primary form-control" style="margin-top: 20px">  
                    </div> 
                 </div> 
             </form> 
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>