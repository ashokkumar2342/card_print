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
                         <tr style="<?php echo e($paymentOption->status==1?'background-color: #48a40d':'#6064600d'); ?>">
                             <td><?php echo e(isset($paymentOption->paymentMode->name) ? $paymentOption->paymentMode->name : ''); ?></td>
                             <td><?php echo e($paymentOption->account_no); ?></td>
                             <td><?php echo e($paymentOption->ifsc_code); ?></td>
                             <td><?php echo e($paymentOption->account_name); ?></td>
                             
                         </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </tbody>
                 </table> 