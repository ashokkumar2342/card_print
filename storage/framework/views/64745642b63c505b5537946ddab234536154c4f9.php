<table id="part_no_datatable" class="table table-striped table-hover control-label">
<thead>
<tr> 
<th>Assembly</th>
<th>Part No.</th> 
<th>Action</th> 
</tr>
</thead>
<tbody> 
<?php $__currentLoopData = $assemblyParts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assemblyPart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>  
<td><?php echo e(isset($assemblyPart->assembly->name_e) ? $assemblyPart->assembly->name_e : ''); ?></td>
<td><?php echo e($assemblyPart->part_no); ?></td> 
<td class="text-nowrap">
<a href="<?php echo e(route('admin.Master.AssemblyPart.delete',$assemblyPart->id)); ?>" title="" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
</td>
</tr> 
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table>