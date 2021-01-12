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
    background-image: url('{{ $files_path.$files_name."_2.png" }}');
    background-repeat:no-repeat;background-size:251px 133px;
    border: 0px solid black;
    vertical-align: top;
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
		@if ($opt_print_background==1)
			<table>
				<tr>
					<td>
						<img src="{{ $bg_files_path."top_front.jpg" }}" alt="" width = "315px" height="30px">
					</td>
				</tr>
			</table>
		@else
			<table>
				<tr>
					<td>
						<img src="{{ $bg_files_path."blank.png" }}" alt="" width = "315px" height="30px">
					</td>
				</tr>
			</table>
		@endif
		<table>
			<tr>
				<td>
					@if ($opt_print_dates==1)
						<img src="{{ $files_path.$files_name."_1.png" }}" alt="" width = "18px" height="133px">
					@else
						<img src="{{ $bg_files_path."blank.png" }}" alt="" width = "18px" height="133px">
					@endif

				</td>
				<td class="test" width = "251px" height = "133px" style ="padding-top: 5px;padding-left: 7px">
					<table>
						<tr>
							<td>
								<img src="{{ $files_path.$files_name."_photo.jpg" }}" alt="" width = "65px" height="76px">			
							</td>
							<td style="padding-top: 27px;padding-left: 3px; font-size: 8px">
								@if ($opt_print_mobile==1)
									{{$aadharData[0]->mobile_no}}
								@endif			
							</td>
						</tr>
					</table>
					
					
	
				</td>
				
				<td>
					@if ($opt_print_dates==1)
						<img src="{{ $files_path.$files_name."_3.png" }}" alt="" width = "46px" height="133px">
					@else
					<img src="{{ $bg_files_path."blank.png" }}" alt="" width = "46px" height="133px">
					@endif
				</td> 
			</tr>
		</table>

		@if ($opt_print_background==1)
			<table width="100%" >
				<tr>
					<td>
						<img src="{{ $bg_files_path."tagline_front.jpg" }}" alt="" width = "327px" height="22px">
					</td> 
				</tr>
			</table>
		@elseif($opt_print_tagline==1)
			<table width="100%" >
				<tr>
					<td>
						<img src="{{ $bg_files_path."tagline_front1.jpg" }}" alt="" width = "327px" height="22px">
					</td> 
				</tr>
			</table>
		@endif
	</div>
	
	<div class="second">
		@if ($opt_print_background==1)
			<table width="100%">
				<tr>
					<td><img src="{{ $bg_files_path."top_back.png" }}" alt="" width = "327px" height="30px"></td>
				</tr> 
			</table>
		@else
			<table width="100%">
				<tr>
					<td><img src="{{ $bg_files_path."blank.png" }}" alt="" width = "327px" height="30px"></td>
				</tr> 
			</table>
		@endif

		<table width="100%" style="padding-top: -10px">
			<tr>
				<td><img src="{{ $files_path.$files_name."_4.png" }}" alt="" width = "327px" height="140px"></td>
			</tr> 
		</table>

		@if ($opt_print_background==1)
			<table width="100%">
				<tr>
					<td><img src="{{ $bg_files_path."tagline_back.png" }}" alt="" width = "327px" height="25px"></td>
				</tr> 
			</table>
		@endif		
	</div>
</body>
</html>