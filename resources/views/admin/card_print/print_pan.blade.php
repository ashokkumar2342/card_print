<!DOCTYPE html>
<html>
<head>
	<title>Card Print</title>
</head>
<style type="text/css">
	@page{margin:0;}

	.test {
    width:251px;
    height:133px;
    background-image: url('{{ $bg_files_path."f".$pan_data[0]->upload_type.".jpg" }}');
    background-repeat:no-repeat;background-size:251px 133px;
    border: 0px solid black;
    vertical-align: top;
    background-image-resize: 6;

	}

@page first{
		@if ($opt_print_background==1)
			background-image: url('{{ $bg_files_path."f".$cardtype.".jpg" }}');
		@else
			background-image: url('{{ $bg_files_path."blank.png" }}');
		@endif
       
       background-repeat:no-repeat;
       margin-top:0px;
       margin-bottom:0px;
       background-image-resize: 6;
   }
@page second{
		@if ($opt_print_background==1)
			background-image: url('{{ $bg_files_path."b".$cardtype.".jpg" }}');
		@else
			background-image: url('{{ $bg_files_path."blank.png" }}');
		@endif
       
       background-repeat:no-repeat;
       margin-top:0px;
       margin-bottom:0px;
       background-image-resize: 6;
   	}

div.first{
	page:first;
}
div.second{
	page:second;
}

</style>
<body>
	<div class="first"> 
		@if ($cardtype==1)
			<table>
				<tr>
					<td>
						<table>
							<tr>
								<td>
									<table>
										<tr>
											<td style="padding-top: 45px">
												<img src="{{ $files_path.$files_name."-2.jpg" }}" alt="" width = "60px" height="55px">
											</td>
											<td style="padding-top: 62px;padding-left:17px;">
												<h4>{{ $pan_data[0]->pan_no }}</h4>			
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td style="padding-top: 11px;padding-left: 8px">
									<h6>{{ $pan_data[0]->name_e }}</h6>
								</td>
							</tr>
							<tr>
								<td style="padding-top: 11px;padding-left: 8px">
									<h6>{{ $pan_data[0]->father_name_e }}</h6>
								</td>
							</tr>
						</table>	
					</td>
					<td style="padding-top: 40px;padding-left:17px">
						<img src="{{ $files_path.$files_name."-4.png" }}" alt="" width = "86px" height="86px">
					</td>
				</tr>
				<tr>
					<td>
						<table>
							<tr>
								<td style="padding-top: 9px;padding-left: 8px">
									<h6>{{ $pan_data[0]->dob }}</h6>
								</td>
								<td style="padding-left: 58px;padding-top: -15px">
									<img src="{{ $files_path.$files_name."-3.png" }}" alt="" width = "70px" height="21px" style="font-weight: bold 1px">		
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		@else
			<table style="width: 100%;">
				<tr>
					<td style="vertical-align: top;width: 69%">
						<table style="width: 100%">
							<tr>
								<td style="vertical-align: top;width: 100%">
									<table style="width: 100%;">
										<tr>
											<td style="padding-top: 36px;padding-left: 1px;vertical-align: top; width: 50%;text-align: left;">
												<img src="{{ $files_path.$files_name."-2.jpg" }}" alt="" width = "55px" height="63px">
											</td>
											<td style="padding-top: 64px;width: 50%;text-align: right;vertical-align: top;font-family: Arial, Helvetica, sans-serif;">
												<h4>{{ $pan_data[0]->pan_no }}</h4>	
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td style="padding-top: 8px;padding-left: 5px;text-align: left;vertical-align: top;font-family: Arial, Helvetica, sans-serif;">
									<h6>{{ $pan_data[0]->name_e }}</h6>
								</td>
							</tr>
							<tr>
								<td style="padding-top: 30px;padding-left: 5px;text-align: left;vertical-align: top;font-family: Arial, Helvetica, sans-serif;">
									<h6>{{ $pan_data[0]->dob }}</h6>
								</td>
							</tr>
						</table>	
					</td>
					<td style="padding-top: 100px;padding-left:-5px;width: 31%;text-align: left;vertical-align: top;">
						<img src="{{ $files_path.$files_name."-3.png" }}" alt="" width = "105px" height="105px">
					</td>
				</tr>
			</table>
		@endif
		
	</div>
	
	<div class="second">
		
		<table width="100%">
			<tr>
				<td>&nbsp;</td>
			</tr> 
		</table>
		
	</div>
</body>
</html>