<!DOCTYPE html>
<html>
<head>
	<title>Card Print</title>
</head>
<style type="text/css">
	@page{margin:10;} 


	.test {
    width:95px;
    height:125px;
    background-image: url('<?php echo e($bimage); ?>');
    background-repeat:no-repeat;background-size:95px 125px;
    border: 1px solid black;
    vertical-align: top;
}
</style>
<body>
	<table>
		<tr>
			<th></th> 
		</tr>
	</table> 
	<table style="margin-top: 75px" width="100%">
		<tr>
			<th width="45%"><barcode code="<?php echo e($vcardno); ?>" height="<?php echo e($bcheight); ?>" type="C128B" size = "<?php echo e($bcsize); ?>" class="barcode" /></th>
			<th width="55%" style="font-size: 15px;padding-left: 9px"><?php echo e($vcardno); ?></th>
		</tr>
	</table>
	<?php  
		// list($width, $height, $type, $attr) = getimagesize($image);
		
	?>
	<table style="margin-top:3px;padding-left: 5px">
		<tr>
			<td width="28%"></td>
			<td  class="test" width="60%"><img src="<?php echo e($image); ?>" alt="" width = "<?php echo e($width); ?>px" height = "<?php echo e($height); ?>px"></td>
			<td width="12%"></td>
		</tr>
	</table>
	<table>
		<tr>
			<td style="width: 300px;font-size: 19px;">नाम : <?php echo e($name_l); ?></td> 
		</tr>
	</table>
	<table>
		<tr>
			<td style="width: 300px;font-size: 15px;font-weight: bold;padding-top:6px">Name : <?php echo e($name_e); ?></td> 
		</tr>
	</table>
	<table>
		<tr>
			<td style="width: 300px;font-size: 19px;padding-top:6px"><?php echo e($rln_l); ?> का नाम : <?php echo e($rname_l); ?></td> 
		</tr>
	</table>
	<table>
		<tr>
			<td style="width: 300px;font-size: 15px;font-weight: bold;padding-top:6px"><?php echo e($rln_e); ?>'s Name : <?php echo e($rname_e); ?></td>
		</tr>
	</table>
	<pagebreak>
	<table style="font-size: 7px" width="100%">
		<tr>
			<td style="width:50%"><span style ="font-size: 8.5px;">लिंग</span>/<b>Gender</b> :</td>
			<td style="width:50%"><span style ="font-size: 8.5px;"><?php echo e($gender_l); ?></span> &nbsp;/&nbsp; <b><?php echo e($gender_e); ?></b></td>
		</tr> 
	</table>
	<table style="font-size: 7px;margin-top: -3px" width="100%">
		<tr> 
			<td style="width:50%"><span style ="font-size: 8.5px;">जन्म तिथि/आयु :</span><br><b>Data of Birth/ Age</b> :</td>
			<td style="width:50%; vertical-align: top;"><b><?php echo e($age_dob); ?></b></td>	
		</tr> 
	</table>
	<table style="font-size: 7px;margin-top: -3px" width="100%">
		<tr> 
			<td><span style ="font-size: 8.5px;">पता: <?php echo e($add_l); ?></span><br>
			<b>Address : <?php echo e($add_e); ?></b></td>
			 
		</tr> 
	</table>
	<table width="100%" style="font-size: 7px;margin-top: -5px" >
		<tr> 
			<td style="padding-left: 100px"><img src="<?php echo e($signimg); ?>" alt="" height="20px"></td> 
		</tr> 
	</table>
	<table style="font-size: 7px; margin-top: -5px" width="100%">
		<tr> 
			<td style="vertical-align: top;"><span style ="font-size: 8.5px;">तिथि</span>/<b> Date : <?php echo e($cdate); ?></b></td> 
			<td><span style ="font-size: 8.5px;">निर्वाचक रजिस्ट्रीकरण अधिकारी </span><br><b>Electoral Ragistration Officer</b></td> 
		</tr> 
	</table>
	<table width="100%" style="font-size: 7px">
		<tr> 
			<td><span style ="font-size: 8.5px;">विधान सभा निर्वाचन क्षेत्र संख्या व नाम : <?php echo e($acno_name_l); ?></span><br><b>Assembly Constituency No. and Name : <?php echo e($acno_name_e); ?></b></td>
		</tr> 
	</table>
	<table style="font-size: 7px;margin-top: -4px" width="100%">
		<tr> 
			<td><span style ="font-size: 8.5px;">भाग संख्या व नाम : <?php echo e($partno_name_l); ?></span><br><b>Part No. and Name :<?php echo e($partno_name_e); ?></b></td>
		</tr> 
	</table>
	<div style="position: absolute;overflow: visible;left: 50;margin-top:170px;
    margin-bottom: auto;font-size: 7px"><b>&nbsp;</b></div>
</body>
</html>