<?php $__env->startSection('body'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Users Approval</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <button type="button" hidden id="btn_user_approval_list" onclick="callAjax(this,'<?php echo e(route('admin.user.approval.list')); ?>','user_approval_list')">dd</button>
               <div id="user_approval_list">
                    
                </div> 
             </div>
         </div>
     </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript"> 
 $('#btn_user_approval_list').click();
</script> 
<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>