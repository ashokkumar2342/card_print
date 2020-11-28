<?php $__env->startSection('body'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>User Permission</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <form action="<?php echo e(route('admin.user.usersPermissionStore')); ?>" method="post" class="add_form form-horizontal" accept-charset="utf-8" no-reset="true" select-triger="user_select_box"> 
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                            <label>User Name</label> 
                                <select class="form-control select2" id="user_select_box"  multiselect-form="true"  name="user"  onchange="callAjax(this,'<?php echo e(route('admin.user.usersWiseMenuTable')); ?>'+'?user_id='+this.value,'menu_table')" > 
                                    <option value="" disabled selected>Select User</option>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->mobile); ?> -- <?php echo e($user->user_name); ?> </option> 
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                </select>  
                            </div> 
                        </div>
                        <div class="col-lg-12" id="menu_table">
                             
                        </div>               
                    </div>
                </form>  
            </div> 
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?> 


<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>