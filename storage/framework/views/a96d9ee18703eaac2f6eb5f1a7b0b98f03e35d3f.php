<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		@page  {  
		    header: html_otherpageheader;
		    footer: html_otherpagesfooter;
		}

		@page  :first {    
		    header: html_firstpageheader;
		     
		}
	</style>
</head>
<body>
	<?php $__currentLoopData = $WardVillages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $WardVillage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php
	    $voterListMaster=App\Model\VoterListMaster::where('status',1)->first(); 
		$PrepareVoterListSave= Illuminate\Support\Facades\DB::select(DB::raw("call up_process_voterlist ('$WardVillage->id')"));  
       $mainpagedetails= Illuminate\Support\Facades\DB::select(DB::raw("Select * From `main_page_detail` where `voter_list_master_id` =$voterListMaster->id and `ward_id` =$WardVillage->id;")); 
       $voterssrnodetails = Illuminate\Support\Facades\DB::select(DB::raw("Select * From `voters_srno_detail` where `voter_list_master_id` =$voterListMaster->id and `wardid` =1;"));
      $voterReports = Illuminate\Support\Facades\DB::select(DB::raw("select `v`.`print_sr_no`, `v`.`voter_card_no`, case `source` when 'V' then concat('*', `ap`.`part_no`, '/', `v`.`sr_no`) Else 'New' End as `part_srno`, `v`.`name_l`, `r`.`relation_l` as `vrelation`, `v`.`father_name_l`, `v`.`house_no_l`, `v`.`age`, `g`.`genders_l` From `voters` `v` inner join `assembly_parts` `ap` on `ap`.`id` = `v`.`assembly_part_id` Inner Join `genders` `g` on `g`.`id` = `v`.`gender_id` Inner Join `relation` `r` on `r`.`id` = `v`.`relation` where `v`.`ward_id` =$WardVillage->id And `v`.`status` in (0,1,3) Order By `v`.`print_sr_no`;"));
	?>
	
			<htmlpageheader name="firstpageheader" style="display:none">
			    <div style="text-align:center;"><h2><b>Annexure-A</b></h2></div> 
			</htmlpageheader>

			<htmlpagefooter name="firstpagefooter" style="display:none">
			    <div style="text-align:center">{nbpg}  {PAGENO} </div>
			     
			</htmlpagefooter>

			<htmlpageheader name="otherpageheader" style="display:none">
				<table width="100%" style="border-bottom: 1px solid #000;font-weight: bold;word-spacing: 4px">
				    <tr>
				        <td width="25%" style="text-align: left;font-size: 11px"><h2>पंचायत : <?php echo e($mainpagedetails[0]->district); ?></h2></td> 
				        <td width="50%" align="right" style="text-align: right;font-size: 12px"><h2><?php echo e($mainpagedetails[0]->voter_list_type); ?> निर्वाचन नामावली <?php echo e($mainpagedetails[0]->year); ?></h2></td>
				        <td width="25%" align="right" style="text-align: right;font-size: 12px"><h2>वार्ड संख्या : <?php echo e($WardVillage->ward_no); ?></h2></td> 
				    </tr>
				</table> 
			</htmlpageheader>

			<htmlpagefooter name="otherpagesfooter" style="display:none">
				<table width="100%" style="margin-top:5px;">
				    <tr>
				        <td width="50%" style="text-align: left;font-size: 11px;word-spacing: 4px"><b>*</b> <?php echo e($mainpagedetails[0]->year); ?> को अंतिम प्रकाशित विधानसभा मतदाता सूचि का क्रo/भाग  नo आयु <?php echo e($mainpagedetails[0]->publication_date); ?> के अनुसार संशोधित </td> 
				        <td width="50%" align="right" style="text-align: right;font-size: 12px;word-spacing: 4px">{nbpg}  {PAGENO}</td>
				        
				    </tr>
				</table>
			    
			</htmlpagefooter>
		<div style="text-align:center;"><h2><b>मुख्य पृष्ठ</b></h2></div>
		<?php $__currentLoopData = $mainpagedetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mainpagedetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<table style="border: 1px solid black;">
		<tbody>
		<tr style="border: 1px solid black;">
		<td style="border: 1px solid black;height: 40px;word-spacing:4px" colspan="5">&nbsp;&nbsp;<?php echo e($mainpagedetail->year); ?> <?php echo e($mainpagedetail->list_type); ?> <?php echo e($mainpagedetail->election_type); ?> मतदाता सूचि सम्बन्धित विधानसभा क्षेत्र का नाम : <?php echo e($mainpagedetail->district); ?></td>
		</tr>
		<tr style="border: 1px solid black;">
		<td style="border: 1px solid black;height: 40px;word-spacing:4px;padding-left: 20px" colspan="5"><h3><b>जिला का नाम : <?php echo e($mainpagedetail->district); ?></b></h3></td>
		 
		</tr>
		<tr style="border: 1px solid black;">
		<td style="border: 1px solid black;height: 150px;word-spacing: 4px" colspan="5">
		<table style="word-spacing: 4px">
		<tbody>
		<tr>
		<td style="padding-left: 20px;width: 300px">1. वार्ड संख्या</td>
		<td style="width:200px;height: 40px"><b><?php echo e($WardVillage->ward_no); ?></b></td> 
		</tr> 
		</tbody>
		</table> 
		</td>
		</tr>
		<tr style="border: 1px solid black;">
		<td style="border: 1px solid black;height: 40px;word-spacing: 4px" colspan="5">&nbsp;&nbsp;2- पुनरीक्षण  का विवरण   </td>
		</tr>
		<tr style="border: 1px solid black;">
		<td style="border: 1px solid black;height: 120px;word-spacing: 4px" colspan="2">
			
		&nbsp;&nbsp;&nbsp;पुनरीक्षण का वर्ष : <b><?php echo e($mainpagedetail->year); ?></b>
		<br>
		<br>
		&nbsp;&nbsp;&nbsp;पुनरीक्षण की तिथि  : <b><?php echo e($mainpagedetail->publication_date); ?></b>
		<br>
		<br>
		&nbsp;&nbsp;&nbsp;पुनरीक्षण का स्वरूप  : <b><?php echo e($mainpagedetail->list_type); ?>  <?php echo e($mainpagedetail->year); ?></b> 
		<br> 
		<br> 
		&nbsp;&nbsp;&nbsp;प्रकाशन की तिथि : <b><?php echo e($mainpagedetail->publication_date); ?></b>  
		</td>
		<td style="border: 1px solid black;height: 120px;word-spacing: 4px;padding-left: 20px" colspan="3">
			
			नामावली  पहचान  : 
			<br>
			<br>
			नये परिसमिति निर्वाचन क्षेत्रो के विस्तारानुसार सभी अनुपूरकों सहित एकीकृत व  वर्ष <b><?php echo e($mainpagedetail->year); ?></b> की पुनरीक्षित मूल निर्वाचक नामावली 
		</td>
		</tr>
		<tr style="border: 1px solid black;">
		<td style="border: 1px solid black;height: 40px;word-spacing: 4px" colspan="5">&nbsp;&nbsp;मतदाताओं क संया </td>
		</tr>
		<tr style="border: 1px solid black;">
		<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px">आरंभिक क्रम संख्या </td>
		<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px">अंतिम  क्रम संख्या </td>
		<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px">पुरुष</td>
		<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px">महिला</td>
		<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px">कुल</td>
		</tr>
		<tr style="border: 1px solid black;">
		<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px"><?php echo e($mainpagedetail->from_sr_no); ?></td>
		<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px"><?php echo e($mainpagedetail->total); ?></td>
		<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px"><?php echo e($mainpagedetail->male); ?></td>
		<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px"><?php echo e($mainpagedetail->female); ?></td>
		<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px"><?php echo e($mainpagedetail->total); ?></td>
		</tr>
		</tbody>
		</table>
		<div style="page-break-before: always;"></div>
		<?php
		$time=0;
		$totalCount=count($voterReports);
		$i=0;
		?>
		<?php $__currentLoopData = $voterReports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voterReport): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php
		 	$i=$i+1;
		 ?> 
		<?php if($time==0): ?>
		<table style="padding:-2px">
			<tbody>
				<tr>
					<?php endif; ?>  
					<td> 
						<table style="border:1px solid black;
						font-size:11px;padding:-2px;width: 220;height: 120px">
						<tbody>
							<tr>
								<td style="border: 1px solid black;width: 40px"><?php echo e($voterReport->print_sr_no); ?></td>
								<td style="width: 100px;text-align:center"><?php echo e($voterReport->voter_card_no); ?></td>
								<td style="border: 1px solid black;">&nbsp;<?php echo e($voterReport->part_srno); ?></td>
							</tr>
							<tr>
								<td style="width: 130px" colspan="2">नाम&nbsp; &nbsp; <?php echo e($voterReport->name_l); ?></td>
								<td style="text-align:center;" rowspan="4">
									
									
								</td>
							</tr>
							<tr>
								<td style="width: 130px" colspan="2"><?php echo e($voterReport->vrelation); ?>&nbsp; &nbsp; <?php echo e($voterReport->father_name_l); ?></td>
							</tr>
							<tr>
								<td style="" colspan="2">मकान नं०&nbsp; &nbsp; &nbsp;<?php echo e($voterReport->house_no_l); ?></td>
							</tr>
							<tr>
								<td style="" colspan="2">आयु&nbsp; &nbsp; &nbsp;<?php echo e($voterReport->age); ?> &nbsp; &nbsp;लिंग&nbsp; &nbsp; &nbsp; <?php echo e($voterReport->genders_l); ?></td>
							</tr>
						</tbody>
					</table> 
				</td> 
				<?php if($time==2 || $totalCount==$i): ?>
					</tr>
				</tbody>

			</table>

		<?php endif; ?>
		<?php
		$time ++;
		?>
		<?php if($time==3): ?>
		<?php
		$time=0;
		?>
		<?php endif; ?> 
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	<pagebreak resetpagenum="1">
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	 
	
</body>
</html>