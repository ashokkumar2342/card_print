<?php $__env->startSection('body'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Ward Bandi With Booth</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <form action="<?php echo e(route('admin.Master.WardBandiWithBoothStore')); ?>" method="post" select-triger="assembly_part_select_box,booth_select_box" no-reset="true" no-reset="true" class="add_form">
                <?php echo e(csrf_field()); ?>

                <div class="card-body">
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
                            <select name="village" class="form-control select2" id="village_select_box" select2="true" onchange="callAjax(this,'<?php echo e(route('admin.Master.VillageWiseAssemblyWard')); ?>','value_div_id')">
                                <option selected disabled>Select Village</option>

                            </select>
                        </div>
                        <div class="col-lg-12" id="value_div_id">

                        </div> 
                    </div>
                </form>

            </div> 
        </div> 
    </section>
    <?php $__env->stopSection(); ?>
    <script type="text/javascript">
        function disablewardNo() {
            document.getElementById("ward_select_box").disabled = false;
        }

    </script>

<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>