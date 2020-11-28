	 	 
<?php $__currentLoopData = $partnos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
	$totalImport=App\Model\Voter::where('assembly_id',$partno->assembly_id)->where('assembly_part_id',$partno->id)->count();
?>
<tr>
<td>
<div class="icheck-primary d-inline">
<input type="checkbox" name="part_no[]" value="<?php echo e($partno->part_no); ?>" id="<?php echo e($partno->part_no); ?><?php echo e($partno->assembly_id); ?>"  class="checkbox">
<label for="<?php echo e($partno->part_no); ?><?php echo e($partno->assembly_id); ?>" class="checkbox"></label>
</div> 
</td> 
<td><?php echo e($partno->part_no); ?></td>
<td><?php echo e($totalImport); ?></td> 
<td>
	<?php if($totalImport!=0): ?> 
	 <a href="<?php echo e(route('admin.database.conection.processDelete',[$partno->assembly_id,$partno->id])); ?>" title="Delete Records" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
	<?php endif; ?>
</td> 
</tr> 
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
 