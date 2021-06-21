<!DOCTYPE html>
<html>
<head>
	<title>Family Card Print</title>
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
			<table width = "323px">
				<tr>
					<td width = "65%">
						<table style="width: 100%;">
							<tr>
								<td style="width: 100%;">
									<table style="width: 100%;">
										<tr>
											<td style="width: 40%; padding-top: 49px; padding-left: 10px">
												&nbsp;
											</td>
											<td style="width: 60%; padding-top: 78px; text-align: right; padding-right: 10px">
												<h4>{{ $family_head_data[0]->family_id }}</h4>
											</td>
										</tr>
									</table>	
								</td>
							</tr>
							<tr>
								<td style="padding-top: 14px;padding-left: 12px">
									<h6>{{ $family_head_data[0]->head_name }}&nbsp;</h6>
								</td>
							</tr>
							<tr>
								<td style="padding-top: 14px;padding-left: 12px">
									<h6>{{ $family_head_data[0]->age }}&nbsp;</h6>
								</td>
							</tr>
							<tr>
								<td style="width: 100%;">
									<table style="width: 100%;">
										<tr>
											<td style="width: 50%; padding-top: 21px; padding-left: 12px">
												<h6>{{ $family_head_data[0]->district }}&nbsp;</h6>
											</td>
											<td style="width: 50%; padding-top: 6px;text-align: right;">
												<h6>{{ $family_head_data[0]->block }}&nbsp;</h6>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
					<td width="35%" style="padding-top: 59px;padding-left:6px">
						<h6>{{ $family_head_data[0]->village }}&nbsp;</h6>
					</td>
				</tr>
			</table>
		
	</div>
	
		<div class="second">	
			<table width="100%">
				@foreach ($family_detail_data as $family_detail)
				<tr>
					<td>{{ $family_detail->m_name }}</td>
				</tr>
				@endforeach 
			</table>
		</div>
	
</body>
</html>