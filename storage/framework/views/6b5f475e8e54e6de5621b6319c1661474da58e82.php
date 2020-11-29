<?php if($payment_mode_id==1): ?>
<table class="table table-striped table-bordered">
     <thead>
         <tr>
             <th>Payment Mode</th>
             <th>Account No.</th>
             <th>Ifsc Code</th>
             <th>Account Name</th> 
             
         </tr>
     </thead>
     <tbody>
        <?php $__currentLoopData = $paymentOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paymentOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
         <tr >
             <td><?php echo e(isset($paymentOption->paymentMode->name) ? $paymentOption->paymentMode->name : ''); ?></td>
             <td><?php echo e($paymentOption->account_no); ?></td>
             <td><?php echo e($paymentOption->ifsc_code); ?></td>
             <td><?php echo e($paymentOption->account_name); ?></td>
             
         </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     </tbody>
 </table> 
 <?php else: ?>
 <table class="table table-striped table-bordered">
     <thead>
         <tr>  
             <th>Account Name</th> 
             <th>QR Code</th> 
             
         </tr>
     </thead>
     <tbody>
        <?php $__currentLoopData = $paymentOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paymentOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
         <tr> 
             <td><?php echo e($paymentOption->account_name); ?></td>
             <td><img src="<?php echo e(route('admin.wallet.qrcode.show',Crypt::encrypt($paymentOption->qr_code))); ?>"  alt="" title="" /></td>
             
         </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     </tbody>
 </table> 
<?php endif; ?>
