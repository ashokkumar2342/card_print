<?php $__env->startSection('body'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Payment Option</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <form action="<?php echo e(route('admin.wallet.payment.option.store')); ?>" method="post" class="add_form">
                <?php echo e(csrf_field()); ?>

                <div class="row"> 
                    <div class="col-lg-12 form-group">
                        <label>Payment Mode</label>
                        <select name="payment_mode" class="form-control" onchange="callAjax(this,'<?php echo e(route('admin.wallet.payment.option.change')); ?>','payment_option_form')">
                            <option selected disabled>Select Payment Mode</option>
                            <?php $__currentLoopData = $paymentModes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paymentMode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <option value="<?php echo e($paymentMode->id); ?>"><?php echo e($paymentMode->name); ?></option>  
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </select> 
                    </div>
                </div>
                <div  id="payment_option_form">
                     
                </div> 
                </form>
                <table class="table table-striped table-bordered">
                     <thead>
                         <tr>
                             <th>Payment Mode</th>
                             <th>Account No.</th>
                             <th>Ifsc Code</th>
                             <th>Account Name</th> 
                             <th>Action</th> 
                         </tr>
                     </thead>
                     <tbody>
                        <?php $__currentLoopData = $paymentOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paymentOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                         <tr>
                             <td><?php echo e(isset($paymentOption->paymentMode->name) ? $paymentOption->paymentMode->name : ''); ?></td>
                             <td><?php echo e($paymentOption->account_no); ?></td>
                             <td><?php echo e($paymentOption->ifsc_code); ?></td>
                             <td><?php echo e($paymentOption->account_name); ?></td>
                             <td>
                                 <a href="" title="" class="btn btn-xs btn-primary">Active</a>
                             </td>
                         </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </tbody>
                 </table> 
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