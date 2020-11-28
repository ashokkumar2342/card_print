<?php
	$counter = 0;
?>
<table id="headertable" style="border: 0px text-align: center;" width="100%">
	<tr>
		<td style="align-content: center; text-align: center;font-size: 14px; font-weight: bold;">
			Annexure-A
		</td>
	</tr>
	<tr>
		<td style="align-content: center; text-align: center; font-size: 14px; font-weight: bold;">
			मुख्य पृष्ठ
		</td>
	</tr>
</table>
		<?php $__currentLoopData = $mainpagedetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mainpagedetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<table id="detailtable" style="border: 1px solid black;" width="100%">
		<tbody>
		<tr>	
		<td style="height: 40px;">
			<table width="100%">
				<tr>
					<td style="border: 1px solid black;" ><?php echo e($mainpagedetail->year); ?> में प्रकाशित <?php echo e($mainpagedetail->election_type); ?> मतदाता सूचि सम्बन्धित विधानसभा क्षेत्र का नाम : <?php echo e($mainpagedetail->district); ?>

					</td>
				</tr>
			</table>
		</td>
		</tr>
		
		<tr>
			<td>
				<table width="100%" >
					<tr>			
						<?php
						if ($main_page_type==2) {
							$colspan='100%';	 
		 				}else{
		  					$colspan='40%';	
		 				}	
						?>
						<td style="height: 150px;word-spacing:4px;padding-left: 20px;border: 1px solid black; font-size: 14px; font-weight: bold;" width="<?php echo e($colspan); ?>">जिला का नाम : <?php echo e($mainpagedetail->district); ?></td> 
        				<?php if($main_page_type!=2): ?> 
						<td style="height: 150px;word-spacing:4px;padding-left: 2px;border: 1px solid black;" width="60%">
							<table width="100%">
							<thead>
								<?php
									$part_no='';
									$time=0;
									$counter=0;
								?>
								<?php $__currentLoopData = $voterssrnodetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voterssrnodetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($part_no!=$voterssrnodetail->partno): ?>
										<?php
										$part_no=$voterssrnodetail->partno;
										$time=0;
										$counter++;
										$counter++; 
										?>
					     				<tr>
					     					<th colspan ="6">भाग संख्या  : <?php echo e($part_no); ?></th>
					     				</tr> 	
										<tr>
											<th width = "17%" style="text-align:center;">क्र०से</th>
											<th width = "17%" style="text-align:center;">क्र तक</th>
											<th width = "17%" style="text-align:center;">क्र०से</th>
											<th width = "17%" style="text-align:center;">क्र तक</th>
											<th width = "16%" style="text-align:center;">क्र०से</th>
											<th width = "16%" style="text-align:center;">क्र तक</th>
										</tr>
									<?php endif; ?>

									<?php if($time==0): ?>
									<?php
									$counter++;
									?>
	       							<tr>
	       							<?php endif; ?> 
	         							<td style="text-align:center"> <?php echo $voterssrnodetail->fromsrno; ?></td>
	         							<td style="text-align:center"> <?php echo $voterssrnodetail->tosrno; ?> </td>
	       							<?php if($time ==2): ?>
	         							</tr>
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

								
							</thead>
							</table>
						</td>
						<?php endif; ?>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td width = "100%">
				<table width = "100%">
					<tr>
		 			<?php if($main_page_type==1): ?> 
						<td style="border: 1px solid black;height: 120px;word-spacing: 4px" width="100%"> 1. (क) ग्राम पंचायत का नाम व वार्ड संख्या : <b><?php echo e($mainpagedetail->village); ?> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo e($mainpagedetail->ward); ?></b>
						<br>
						<br>
						(ख) खंड का नाम  : <b><?php echo e($mainpagedetail->block); ?></b>
						<br>
						<br>
						(ग) पंचायत समिति का नाम व वार्ड संख्या : <b><?php echo e($mainpagedetail->block); ?> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  <?php echo e($mainpagedetail->ps_ward); ?></b> 
						<br> 
						<br> 
						(घ) जिला परिषद व वार्ड संख्या: <b><?php echo e($mainpagedetail->district); ?>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<?php echo e($mainpagedetail->zp_ward); ?></b>   
						</td> 
		 			<?php elseif($main_page_type==2): ?>
		 				<td style="border: 1px solid black;height: 120px;word-spacing: 4px" width="100%"> <?php echo e($mainpagedetail->election_type); ?> का नाम व वार्ड संख्या : <b><?php echo e($mainpagedetail->village); ?> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo e($mainpagedetail->ward); ?></b>
						<br>
						<br>
						</td>
		 			<?php else: ?>
		 				<td style="border: 1px solid black;height: 120px;word-spacing: 4px" width="100%"> <?php echo e($mainpagedetail->election_type); ?> का नाम व वार्ड संख्या : <b><?php echo e($mainpagedetail->village); ?> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo e($mainpagedetail->ward); ?></b>
						<br>
						<br>
						मतदान केन्द्र संख्या : <b><?php echo e($mainpagedetail->booth_no); ?> </b>
						<br>
						<br>
						मतदान केन्द्र का नाम : <b><?php echo e($mainpagedetail->booth_name); ?> </b>
						</td>
		 			<?php endif; ?> 
					</tr>	
				</table>
			</td>
		</tr>
		<tr>
			<td width="100%">
				<table width = "100%">
					<tr>
						<td style="border: 1px solid black;" width="100%">2- पुनरीक्षण  का विवरण
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<table width = "100%">
					<tr style="border: 1px solid black;">
						<td style="border: 1px solid black;height: 120px;word-spacing: 4px" width="50%">	
							पुनरीक्षण का वर्ष : <b><?php echo e($mainpagedetail->year); ?></b>
							<br><br>
							पुनरीक्षण की तिथि  : <b><?php echo e($mainpagedetail->date); ?></b>
							<br><br>
							पुनरीक्षण का स्वरूप  : <b><?php echo e($mainpagedetail->list_type); ?>  <?php echo e($mainpagedetail->year); ?></b> 
							<br><br>
							प्रकाशन की तिथि : <b><?php echo e($mainpagedetail->publication_date); ?></b>  
						</td>
						<td style="border: 1px solid black;height: 120px;word-spacing: 4px;padding-left: 5px;text-align: justify-all;" width="50%">
							नामावली  पहचान  : 
							<br>
							नये परिसमिति निर्वाचन क्षेत्रो के विस्तारानुसार सभी अनुपूरकों सहित एकीकृत व  वर्ष <b><?php echo e($mainpagedetail->year); ?></b> की पुनरीक्षित मूल निर्वाचक नामावली 
						</td>
					</tr>			
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<table width = "100%">
					<tr>
						<td style="border: 1px solid black;" width="100%">मतदाताओं की संख्या</td>
					</tr>
				</table> 
			</td>
		</tr>
		<tr>
			<td>
				<table width="100%">
					<tr style="border: 1px solid black;">
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px" width="17%">आरंभिक क्रम संख्या </td>
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px" width="17%">अंतिम  क्रम संख्या </td>
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px" width="17%">पुरुष</td>
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px" width="17%">महिला</td>
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px" width="17%">अन्य</td>
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px" width="15%">कुल</td>
					</tr>
					<tr style="border: 1px solid black;">
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px"><?php echo e($mainpagedetail->from_sr_no); ?></td>
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px"><?php echo e($mainpagedetail->total); ?></td>
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px"><?php echo e($mainpagedetail->male); ?></td>
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px"><?php echo e($mainpagedetail->female); ?></td>
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px"><?php echo e($mainpagedetail->transgender); ?></td>
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px"><?php echo e($mainpagedetail->total); ?></td>
					</tr>			
				</table>
			</td>
		</tr>
		</tbody>
		</table>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		<?php
			$counter = 21-$counter;
			if ($counter>14){
				$counter=14;
			}
			$margintop = $counter*20;
			// $margintop = 0;
		?>

	
	<?php $__env->startPush('scripts'); ?>
	<script type="text/javascript">findtablesheight();</script>
	<?php $__env->stopPush(); ?>
	
	<table width="100%" style='margin-top:<?php echo e($margintop); ?>px;'>
		<tr>
			<td width="48%" style="text-align: left;font-size: 11px;word-spacing: 4px"><b>*</b> <?php echo e($mainpagedetails[0]->year); ?> को अंतिम प्रकाशित विधानसभा मतदाता सूचि का क्रo/भाग  नo आयु <?php echo e($mainpagedetails[0]->date); ?> के अनुसार संशोधित</td> 
			<td width="52%" align="right" style="text-align: right;font-size: 12px;word-spacing: 4px"> कुल <?php echo e($totalpage); ?> पृष्ठों का पृष्ठ 1</td>
				        
		</tr>
	</table>
	<pagebreak>	

	