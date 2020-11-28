<htmlpageheader name="ph<?php echo e($mainpagedetails[0]->ward); ?>" style="display:none">
    <div style="text-align:center;"><h2><b>Annexure-A</b></h2></div>
</htmlpageheader>

<htmlpageheader name="pho<?php echo e($mainpagedetails[0]->ward); ?>" style="display:none">
    <div style="text-align:center;"><h2><b><?php echo e($mainpagedetails[0]->district); ?> <?php echo e($mainpagedetails[0]->year); ?> <?php echo e($mainpagedetails[0]->ward); ?></b></h2></div>
</htmlpageheader>

<htmlpagefooter name="pf<?php echo e($mainpagedetails[0]->ward); ?>" style="display:none">
   	<table width="100%" style="margin-top:5px;">
		<tr>
			<td width="48%" style="text-align: left;font-size: 11px;word-spacing: 4px"><b>*</b> <?php echo e($mainpagedetails[0]->year); ?> को अंतिम प्रकाशित विधानसभा मतदाता सूचि का क्रo/भाग  नo आयु <?php echo e($mainpagedetails[0]->publication_date); ?> के अनुसार संशोधित </td> 
			<td width="52%" align="right" style="text-align: right;font-size: 12px;word-spacing: 4px">{nbpg}  {PAGENO}</td>
				        
		</tr>
	</table>
</htmlpagefooter>