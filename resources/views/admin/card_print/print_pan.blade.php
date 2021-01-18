<!DOCTYPE html>
<html>
<head>
	<title>Card Print</title>
</head>
<style type="text/css">
	@page{margin:0;}

	@page first{
		background-image: url('{{ $bg_file_front }}');
       	background-repeat:no-repeat;
       	margin-top:0px;
       	margin-bottom:0px;
       	background-image-resize: 6;
   	}
	@page second{
		background-image: url('{{ $bg_file_back }}');
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
table, tr, td{
	vertical-align: top;
	text-align: left;
	margin: 0px;
	padding: 0px;
	border-spacing: 0px;
}

</style>
<body>
	<div class="first"> 
		@if ($cardtype==1)
			<table width = "323px">
				<tr>
					<td width = "65%">
						<table style="width: 100%;">
							<tr>
								<td style="width: 100%;">
									<table style="width: 100%;">
										<tr>
											<td style="width: 40%; padding-top: 49px; padding-left: 10px">
												<img src="{{ $photo_path }}" alt="" width = "54px" height="58px" style="border: 1px  solid black;">
											</td>
											<td style="width: 60%; padding-top: 78px; text-align: right; padding-right: 10px">
												<h4>{{ $pan_data[0]->pan_no }}</h4>
											</td>
										</tr>
									</table>	
								</td>
							</tr>
							<tr>
								<td style="padding-top: 14px;padding-left: 12px">
									<h6>{{ $cardname }}&nbsp;</h6>
									{{-- <h6>{{ $pan_data[0]->name_e }}</h6> --}}
								</td>
							</tr>
							<tr>
								<td style="padding-top: 14px;padding-left: 12px">
									<h6>{{ $pan_data[0]->father_name_e }}&nbsp;</h6>
								</td>
							</tr>
							<tr>
								<td style="width: 100%;">
									<table style="width: 100%;">
										<tr>
											<td style="width: 50%; padding-top: 21px; padding-left: 12px">
												<h6>{{ $pan_data[0]->dob }}&nbsp;</h6>
											</td>
											<td style="width: 50%; padding-top: 6px;text-align: right;">
												<img src="{{ $sign_path }}" alt="" width = "86px" height="20px">
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
					<td width="35%" style="padding-top: 59px;padding-left:6px">
						<img src="{{ $qr_path }}" alt="" width = "90px" height="90px">
					</td>
				</tr>
			</table>
		@elseif ($cardtype==2)
			<table width = "323px">
				<tr>
					<td width = "65%">
						<table style="width: 100%;">
							<tr>
								<td style="width: 100%;">
									<table style="width: 100%;">
										<tr>
											<td style="width: 40%; padding-top: 42px; padding-left: 9px">
												<img src="{{ $photo_path }}" alt="" width = "50px" height="54px" style="border: 1px  solid black;">
											</td>
											<td style="width: 60%; padding-top: 70px; text-align: right; padding-right: 0px">
												<h4>{{ $pan_data[0]->pan_no }}</h4>
											</td>
										</tr>
									</table>	
								</td>
							</tr>
							<tr>
								<td style="padding-top: 19px;padding-left: 12px">
									<h6>{{ $pan_data[0]->name_e }}</h6>
								</td>
							</tr>
							<tr>
								<td style="padding-top: 14px;padding-left: 12px">
									&nbsp;
								</td>
							</tr>
							<tr>
								<td style="width: 100%;">
									<table style="width: 100%;">
										<tr>
											<td style="width: 50%; padding-top: 5px; padding-left: 12px">
												<h6>{{ $pan_data[0]->dob }}</h6>
											</td>
											<td style="width: 50%; padding-top: 16px;text-align: right; padding-right: 20px">
												<img src="{{ $sign_path }}" alt="" width = "86px" height="20px">
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
					<td width="35%" style="padding-top: 95px;padding-left:3px">
						<img src="{{ $qr_path }}" alt="" width = "104px" height="104px">
					</td>
				</tr>
			</table>
		@elseif ($cardtype==3)
			<table width = "323px">
				<tr>
					<td width = "65%">
						<table style="width: 100%;">
							<tr>
								<td style="width: 100%;">
									<table style="width: 100%;">
										<tr>
											<td style="width: 40%; padding-top: 49px; padding-left: 10px">
												<img src="{{ $photo_path }}" alt="" width = "54px" height="58px" style="border: 1px  solid black;">
											</td>
											<td style="width: 60%; padding-top: 78px; text-align: right; padding-right: 10px">
												<h4>{{ $pan_data[0]->pan_no }}</h4>
											</td>
										</tr>
									</table>	
								</td>
							</tr>
							<tr>
								<td style="padding-top: 14px;padding-left: 12px">
									<h6>{{ $pan_data[0]->name_e }}</h6>
								</td>
							</tr>
							<tr>
								<td style="padding-top: 14px;padding-left: 12px">
									<h6>{{ $pan_data[0]->father_name_e }}</h6>
								</td>
							</tr>
							<tr>
								<td style="width: 100%;">
									<table style="width: 100%;">
										<tr>
											<td style="width: 50%; padding-top: 21px; padding-left: 12px">
												<h6>{{ $pan_data[0]->dob }}</h6>
											</td>
											<td style="width: 50%; padding-top: 6px;">
												<img src="{{ $sign_path }}" alt="" width = "86px" height="20px">
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
					<td width="35%" style="padding-top: 57px;padding-left:10px">
						<img src="{{ $qr_path }}" alt="" width = "90px" height="90px">
					</td>
				</tr>
			</table>
		@elseif ($cardtype==4)
			<table width = "323px">
				<tr>
					<td width = "65%">
						<table style="width: 100%;">
							<tr>
								<td style="width: 100%;">
									<table style="width: 100%;">
										<tr>
											<td style="width: 40%; padding-top: 55px; padding-left: 13px">
												<img src="{{ $photo_path }}" alt="" width = "55px" height="55px" style="border: 1px  solid black;">
											</td>
											<td style="width: 60%; padding-top: 80px; text-align: right; padding-right: 10px">
												<h4>{{ $pan_data[0]->pan_no }}</h4>
											</td>
										</tr>
									</table>	
								</td>
							</tr>
							<tr>
								<td style="padding-top: 14px;padding-left: 12px">
									<h6>{{ $pan_data[0]->name_e }}</h6>
								</td>
							</tr>
							<tr>
								<td style="padding-top: 14px;padding-left: 12px">
									<h6>{{ $pan_data[0]->father_name_e }}</h6>
								</td>
							</tr>
							<tr>
								<td style="width: 100%;">
									<table style="width: 100%;">
										<tr>
											<td style="width: 50%; padding-top: 19px; padding-left: 12px">
												<h6>{{ $pan_data[0]->dob }}</h6>
											</td>
											<td style="width: 50%; padding-top: 0px;padding-left: 3px">
												<img src="{{ $sign_path }}" alt="" width = "70px" height="18px">
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
					<td width="35%" style="padding-top: 57px;padding-left:10px">
						<img src="{{ $qr_path }}" alt="" width = "90px" height="90px">
					</td>
				</tr>
			</table>
		@endif
		
	</div>
	
	@if($opt_print_background == 1)
		<div class="second">	
			<table width="100%">
				<tr>
					<td>&nbsp;</td>
				</tr> 
			</table>
		</div>
	@endif
</body>
</html>