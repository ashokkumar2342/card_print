<div class="card card-primary table-responsive"> 
     <table id="ward_datatable" class="table table-striped table-hover control-label">
         <thead>
             <tr>
                 <th class="text-nowrap">States</th>
                 <th class="text-nowrap">District</th>
                 <th class="text-nowrap">Block MCS</th>
                 <th class="text-nowrap">Village MCS</th>
                 <th class="text-nowrap">Booth No.</th>
                 <th class="text-nowrap">Booth Name (Eng)</th>
                 <th class="text-nowrap">Booth Name (Local Lang)</th>
                 <th class="text-nowrap">Action</th>
                  
                  
             </tr>
         </thead>
         <tbody>
            <?php $__currentLoopData = $booths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booth): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <tr>
                 <td><?php echo e(isset($booth->states->name_e) ? $booth->states->name_e : ''); ?></td>
                 <td><?php echo e(isset($booth->district->name_e) ? $booth->district->name_e : ''); ?></td>
                 <td><?php echo e(isset($booth->blockMCS->name_e) ? $booth->blockMCS->name_e : ''); ?></td>
                 <td><?php echo e(isset($booth->village->name_e) ? $booth->village->name_e : ''); ?></td>
                 <td><?php echo e($booth->booth_no); ?></td>
                 <td><?php echo e($booth->name_e); ?></td>
                 <td><?php echo e($booth->name_l); ?></td>
                 <td>
                     <a href="#" class="btn btn-xs btn-info" onclick="callPopupLarge(this,'<?php echo e(route('admin.Master.boothEdit',$booth->id)); ?>')"><i class="fa fa-edit"></i></a>
                     <a href="#" class="btn btn-xs btn-danger" select-triger="village_select_box" success-popup="true" onclick="callAjax(this,'<?php echo e(route('admin.Master.boothDelete',$booth->id)); ?>')"><i class="fa fa-trash"></i></a>
                 </td>
                 
             </tr> 
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </tbody>
     </table>
</div> 