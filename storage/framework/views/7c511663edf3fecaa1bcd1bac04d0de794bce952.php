<div class="card card-primary table-responsive"> 
                             <table id="district_table" class="table table-striped table-hover control-label">
                                 <thead>
                                     <tr>
                                          
                                         <th>Sr.No.</th>
                                         <th>Name</th>
                                         <th>F/H Name</th>
                                         <th>Ward</th>
                                         
                                          
                                     </tr>
                                 </thead>
                                 <tbody>
                                    <?php $__currentLoopData = $voters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voters): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <tr href="">
                                          
                                         
                                         <td><?php echo e($voters->sr_no); ?></td>
                                         <td><?php echo e($voters->name_e); ?></td>
                                         <td><?php echo e($voters->father_name); ?></td>
                                         <td><?php echo e($voters->ward_id); ?></td>
                                          
                                     </tr> 
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </tbody>
                             </table>
                        </div> 