<?php $__currentLoopData = $booths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booth): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<tr>
		<td><?php echo e($booth->booth_no); ?></td>
		<td><?php echo e($booth->fromsrno); ?></td>
		<td><?php echo e($booth->tosrno); ?></td>
		<td>
			<a href="#" title="Edit" class="btn btn-info btn-xs" onclick="callPopupLarge(this,'<?php echo e(route('admin.Master.MappingWardBoothEdit',$booth->id)); ?>')"><i class="fa fa-edit"></i></a>
			 
		</td>
	</tr> 
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>