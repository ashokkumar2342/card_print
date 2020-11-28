<?php $__env->startSection('body'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Default Role Quick Menu</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div>
        <div class="card card-info"> 
            <div class="card-body">
                <form action="<?php echo e(route('admin.roleAccess.quick.role.menu.store')); ?>" select-triger="role_select_box" method="post" class="add_form form-horizontal" no-reset="true" >
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <?php echo e(Form::label('role','Role',['class'=>' control-label'])); ?>                         
                              <div class="form-group">  
                                     <select class="form-control" id="role_select_box"  data-table-without-pagination-disable-sorting="menu_role_table" multiselect-form="true"  name="role"  onchange="callAjax(this,'<?php echo e(route('admin.account.role.default.menu')); ?>'+'?id='+this.value,'menu_list')" > 
                                      <option value="" disabled selected>Select User</option>
                                     <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option> 
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                     </select>  
                                </div>
                            </div> 
                        </div>
                        <div class="col-lg-12" id="menu_list">
                             
                        </div>               
                    </div>
                </form>  
            </div> 
        </div>
    </div> 
</section>
<?php $__env->stopSection(); ?> 

 
         
<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>