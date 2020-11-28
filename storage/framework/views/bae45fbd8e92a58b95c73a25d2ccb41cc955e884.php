<?php $__env->startSection('body'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Recharge Wallet</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <form action="<?php echo e(route('admin.wallet.cashbook.store')); ?>" method="post" class="add_form">
                <?php echo e(csrf_field()); ?>

                <div class="row"> 
                    <div class="col-lg-3 form-group">
                        <label>Payment Mode</label>
                        <select name="payment_mode" class="form-control" onchange="callAjax(this,'<?php echo e(route('admin.wallet.payment.option.show')); ?>','payment_option_show')">
                            <option selected disabled>Select Payment Mode</option>
                            <?php $__currentLoopData = $paymentModes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paymentMode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <option value="<?php echo e($paymentMode->id); ?>"><?php echo e($paymentMode->name); ?></option>  
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </select> 
                    </div> 
                    <div class="col-lg-3 form-group">
                        <label>Transaction Date</label>
                        <input type="date" name="transaction_date" class="form-control"> 
                    </div>
                    <div class="col-lg-3 form-group">
                        <label>Amount</label>
                        <input type="text" name="amount" class="form-control"> 
                    </div>
                    <div class="col-lg-3 form-group">
                        <label>Transaction No</label>
                        <input type="text" name="transaction_no" class="form-control"> 
                    </div>
                    
                    <div class="col-lg-12 form-group"> 
                        <input type="submit" class="form-control btn btn-primary">
                    </div>
                </div> 
                </form> 
             </div>
             <div id="payment_option_show">
                 
             </div>
         </div>
     </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript"> 
 
</script> 
<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>