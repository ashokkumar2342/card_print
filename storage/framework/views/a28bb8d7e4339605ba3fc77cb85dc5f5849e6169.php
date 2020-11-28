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
					<td style="width: 750px;background-color: #767d78;color: #fff;text-align: center;"><b>Part Wise--Voter Mapped</b></td>
				</tr>
			</tbody>
		</table>			 
	</htmlpageheader>

 <table style="width: 750px">
		<thead>
			<tr>
                 <th style="width:70">Ac Code</th>
                 <th style="width:70">Part No.</th>
                 <th style="width:110">Total Voter</th>
                 <th style="width:110">Total Mapped</th>
                 <th style="border-style:none"></th>
                 <th style="width:70">Ac Code</th>
                 <th style="width:70">Part No.</th>
                 <th style="width:110">Total Voter</th>
                 <th style="width:110">Total Mapped</th>
                  
                  
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
	        
			<td><?php echo e($voterReport->code); ?></td>
			<td><?php echo e($voterReport->part_no); ?></td> 
	        <td><?php echo e($voterReport->Total_Votes); ?></td>
	        <td><?php echo e($voterReport->Mapped_Votes); ?></td>
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
