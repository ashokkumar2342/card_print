<?php $__env->startSection('body'); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3>Block Assign</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right"> 
        </ol>
      </div>
    </div> 
    <div class="card card-info"> 
      <div class="card-body">
        <form action="<?php echo e(route('admin.Master.DistrictBlockAssignStore')); ?>" no-reset="true" method="post" class="add_form" select-triger="user_id">
          <?php echo e(csrf_field()); ?> 
          <div class="row"> 
            <div class="col-md-12"> 
              <?php echo e(Form::label('User','Users',['class'=>' control-label'])); ?>

              <select class="form-control select2"  duallistbox="true" data-table-all-record="class_section_list" name="user" id="user_id"  onchange="callAjax(this,'<?php echo e(route('admin.account.DistrictBlockAssign')); ?>'+'?id='+this.value,'state_select_box')" > 
                <option value="" disabled selected>Select User</option>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 
                <option value="<?php echo e($user->id); ?>"><?php echo e($user->email); ?> &nbsp;&nbsp;&nbsp;&nbsp;( <?php echo e($user->first_name); ?> )</option>
               
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
              </select> 
              <p class="text-danger"><?php echo e($errors->first('user')); ?></p>
            </div> 
            <div class="col-lg-12" id="state_select_box"> 
            </div> 
          </form>           
        </div> 
      </div>
    </div>
  </section>
  <?php $__env->stopSection(); ?> 


<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>