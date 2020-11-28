<!DOCTYPE html>
<html>
<head>
<style>
 table,th, td {
  border: 1px solid black;
  border-collapse:collapse;
  text-align:center;
 
}
@page  { footer: html_otherpagesfooter; 
	    header: html_otherpageheader;
	}
</style>
</head>
<body>
	<htmlpagefooter name="otherpagesfooter" style="display:none">
		<div style="text-align:right;">
			{nbpg}  {PAGENO}
		</div>
	    
	</htmlpagefooter>
	<htmlpageheader name="otherpageheader" style="display:none">
		<table>
			<tbody>
				<tr>
					<td style="width: 750px;background-color: #767d78;color: #fff;text-align: center;"><b>Assembly : <?php echo e($assembly->code); ?> , Assembly Part : <?php echo e($assemblyPart->part_no); ?></b></td>
				</tr>
			</tbody>
		</table>			 
	</htmlpageheader>
 
 <table style="width: 750px">
		<thead>
			<tr>
				<th style="width: 50px">Sr.No.</th>
                <th style="width: 120px">Name </th>
                <th style="width: 140px">Village</th>
                <th style="width: 50px">Wards</th>
                <th style="border-style:none"></th> 
                <th style="width: 50px;">Sr.No.</th>
                <th style="width: 120px">Name </th>
                <th style="width: 140px">Village</th>
                <th style="width: 50px">Ward</th>
                 
                 
                 
			</tr>
		</thead>
		<tbody>
			<?php
          $time =0;
        ?>
	       <?php $__currentLoopData = $voterReports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voterReport): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	       <?php if($time==0): ?>
	       <tr>
	       <?php endif; ?> 
	       <?php if($time==1): ?>
	       	<td style="border-style:none"></td>
	       <?php endif; ?>
	        
	        <td><?php echo e($voterReport->sr_no); ?></td>
			<td><?php echo e($voterReport->name_l); ?>&nbsp;</td>
			<td><?php echo e($voterReport->vil_name); ?>&nbsp;</td>
			<td><?php echo e($voterReport->ward_no); ?></td> 
			 
	       <?php if($time ==1): ?>

	         </tr>
	       <?php endif; ?>
	         <?php
	           $time ++;
	         ?>
	         <?php if($time==2): ?>
	          <?php
	            $time=0;
	          ?>
	         <?php endif; ?>
	        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
		</tbody>
	</table>
</body>
</html>
