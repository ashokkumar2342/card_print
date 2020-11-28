<table id="district_table" class="table table-striped table-hover control-label">
<thead>
<tr> 
<th>District</th>
<th>Code</th>
<th>Name (English)</th>
<th>Name (Local Language)</th>
<th>Total Part</th>
<th>Action</th>

</tr>
</thead>
<tbody> 
<?php $__currentLoopData = $assemblys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assembly): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
$part_no=App\Model\AssemblyPart::where('assembly_id',$assembly->id)->count('part_no'); 
?>
<tr>

<td><?php echo e(isset($assembly->district->name_e) ? $assembly->district->name_e : ''); ?></td>
<td><?php echo e($assembly->code); ?></td>
<td><?php echo e($assembly->name_e); ?></td>
<td><?php echo e($assembly->name_l); ?></td>
<td><?php echo e($part_no); ?></td>
<td class="text-nowrap">
<a onclick="callPopupLarge(this,'<?php echo e(route('admin.Master.AssemblyPart.edit',$assembly->id)); ?>')" title="" class="btn btn-primary btn-xs" style="color: #fff">Add Part</a>
<a onclick="callPopupLarge(this,'<?php echo e(route('admin.Master.Assembly.edit',$assembly->id)); ?>')" title="" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>
<a href="<?php echo e(route('admin.Master.Assembly.delete',$assembly->id)); ?>" title="Delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
</td>
</tr> 
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table>