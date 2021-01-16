<!DOCTYPE html>
<html>
<head>
	<title>Card Print</title>
</head>
<style type="text/css">
	@page{margin:0;}

	
	
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

	td.test {
	    width:186px;
	    height:70px;
	    background-image: url('{{ $files_path."1_2.png" }}');
	    background-repeat:no-repeat;background-size:186px 70px;
	    border: 0px solid black;
	    vertical-align: top;
	    background-image-resize: 6;
	}

</style>
<body>
	<div class="first">
		@if($cardtype == 1)
			<table width = "327px">
				<tr>
					<td width = "100%">
						<table width = "100%">
							<tr>
								<td width = "100%" style="padding-top: 3px;">
									<img src="{{ $topfront }}" alt="" width = "327px" height="35px">			
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td width = "100%">
						<table width = "100%">
							<tr>
								<td width = "18px" style="text-rotate:-90;font-size: 8px; font-weight: bold; padding-left: 10px;padding-top: 15px;">
									{{$downdate}}
								</td>
								<td width = "82px" style="padding-top: 10px;">
									<img src="{{ $photopath }}" alt="" width = "80px" height="100px" style="border: 1px solid black">
								</td>
								<td width = "186px" height = "120px" style="border: 1px solid white"> &nbsp;
									<table width = "100%">
										<tr>
											<td class="test" width = "100%"></td>
										</tr>
										<tr>
											<td style="padding-top: 0px;padding-left: 7px; font-size: 10px;font-weight: bold;">
												{{$mobileno}}
											</td>
										</tr>
										<tr>
											<td style="padding-top: 10px;padding-left: 7px; font-size: 14px;font-weight: bold;">
												{{$aadharno}}
											</td>
										</tr>
										<tr>
											<td style="padding-top: -4px;padding-left: 7px; font-size: 10px;font-weight: bold;">
												VID : {{$vid}}
											</td>
										</tr>
									</table>
								</td>
								<td width = "31px" style="text-rotate:-90;font-size: 8px;font-weight: bold;padding-left: 10px;padding-top: 18px;">{{$issuedate}}
								</td>
							</tr>	
						</table>
					</td>
				</tr>
				<tr>
					<td width = "100%">
						<table width = "100%">
							<tr>
								<td width ="100%" style="padding-top: 8px">
									<img src="{{ $tagfront }}" alt="" width = "327px" height="22px">
								</td> 
							</tr>	
						</table>
					</td>
				</tr>
			</table>
		@endif
	</div>
	
	<div class="second">
		@if($cardtype == 1)
			<table width = "327px">
				<tr>
					<td width = "100%">
						<table width = "100%">
							<tr>
								<td width = "100%" style="padding-top: 3px;">
									<img src="{{ $topback }}" alt="" width = "327px" height="35px">			
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td width = "100%">
						<table width = "100%">
							<tr>
								<td width = "230px" style="padding-top: 3px;">
									<img src="{{ $files_path."2_2.png" }}" alt="" width = "230px" height="130px">			
								</td>
								<td width = "97px" style="padding-top: 20px;">
									<img src="{{ $files_path.$files_name."-1.png" }}" alt="" width = "97px" height="97px">			
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td width = "100%">
						<table width = "100%">
							<tr>
								<td width = "100%" style="padding-top: 11px;">
									<img src="{{ $bottomback }}" alt="" width = "327px" height="22px">			
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>	
		@endif
	</div>
</body>
</html>