<?php $__env->startSection('body'); ?>
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h3>Mapping Village To P.S.Ward</h3>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right"> 
				</ol>
			</div>
		</div> 
		<div class="card card-info"> 
			<div class="card-body"> 
				<form action="<?php echo e(route('admin.Master.MappingVillageToPSWardStore')); ?>" method="post" class="add_form" no-reset="true">
					<?php echo e(csrf_field()); ?>

					<div class="card-body row">
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
                        <select name="block" class="form-control select2" id="block_select_box" onchange="callAjax(this,'<?php echo e(route('admin.Master.blockwisePsWard')); ?>','ps_select_box')">
                            <option selected disabled>Select Block MCS</option> 
                        </select>
                        </div>
						<div class="col-lg-3 form-group">
							<label for="exampleInputEmail1">P.S.Ward</label>
							<span class="fa fa-asterisk"></span>
							<select name="ps_ward" duallistbox="true" class="form-control" id="ps_select_box" onchange="callAjax(this,'<?php echo e(route('admin.Master.BlockOrPSwardWiseVillage')); ?>'+'?block_id='+$('#block_select_box').val(),'village_ward_table')">
								<option selected disabled>Select P.S.Ward</option>
							</select>
						</div>
						<div class="col-lg-12" id="village_ward_table">
						 	
						 </div> 
					</div> 
					<div class="card-footer text-center">
						<button type="submit" class="btn btn-primary form-control">Submit</button>
					</div>
				</form> 
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