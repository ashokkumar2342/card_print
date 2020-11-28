<div class="row"> 
<div class="col-lg-12 table-responsive"> 
    <table class="table table-striped" id="village_sample_table">
		<thead>
		   <tr>
		       <th>state_name</th>
		       <th>state_Id</th>
		       <th>district_name</th>
		       <th>district_id</th>
		       <th>block_name</th>
		       <th>block_id</th>
		       <th>village_code</th>
		       <th>village_name_eng</th>
		       <th>village_name_hindi</th>
		       <th>total_wards</th>
		   </tr>
		</thead>
		<tbody>
		<?php $__currentLoopData = $villages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $villages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
		   <tr>
		       <td><?php echo e($villages->state_name); ?></td>
		       <td><?php echo e($villages->state_id); ?></td>
		       <td><?php echo e($villages->district_name); ?></td>
		       <td><?php echo e($villages->district_id); ?></td>
		       <td><?php echo e($villages->block_name); ?></td>
		       <td><?php echo e($villages->block_id); ?></td>
		       <td></td>
		       <td></td>
		       <td></td>
		       <td></td>
		   </tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
</div>
</div> 