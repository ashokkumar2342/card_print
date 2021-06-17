<!DOCTYPE html>
<html>
<head>
	<title>Card Print</title>
</head>
<style type="text/css">
	@page{margin:10;} 

	@if ($epicbackground==1)
	.test {
    width:95px;
    height:100px;
    background-image: url('{{ $bimage }}');
    background-repeat:no-repeat;background-size:95px 100px;
    border: 0px solid black;
    vertical-align: top;

	}
	@else
	.test {
    width:95px;
    height:125px;
    background-image: url('{{ $bimage }}');
    background-repeat:no-repeat;background-size:95px 125px;
    border: 0px solid black;
    vertical-align: top;

	}
	@endif
@page first{
       background-image: url('{{ $bimage1 }}');
       background-repeat:no-repeat;
       margin-top:0px;
       margin-bottom:0px;
       background-image-resize: 6;
   }
   @page second{
       background-image: url('{{ $bimage2 }}');
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
@if($card_format==0)
<body>
	<div class="first"> 
	<table>
		<tr>
			<th></th> 
		</tr>
	</table>
	@if ($epicbackground==1)
	 <table style="margin-top: 83px" width="100%">
		<tr>
			<th width="45%" style="padding-left: -4px"><barcode code="{{ $vcardno }}" height="{{ $bcheight }}" type="C128B" size = "{{ $bcsize }}" class="barcode" /></th>
			<th width="55%" style="font-size: 15px;padding-left: 9px">{{ $vcardno }}</th>
		</tr>
	</table>
	@else
	<table style="margin-top: 82px" width="100%">
		<tr>
			<th width="45%"><barcode code="{{ $vcardno }}" height="{{ $bcheight }}" type="C128B" size = "{{ $bcsize }}" class="barcode" /></th>
			<th width="55%" style="font-size: 15px;padding-left: 9px">{{ $vcardno }}</th>
		</tr>
	</table>
	@endif 
	
	@if ($epicbackground==1)
	<table style="margin-top:7px;padding-left: 5px">
		{{-- <tr>
			<td width="20%"></td>
			<td  class="test" width="60%"><img src="{{ $image }}" alt="" width = "{{ $width*1.2 }}px" height = "{{ $height*1.2 }}px"></td>
			<td width="12%"></td>
		</tr> --}}
		<tr>
			<td width="20%"></td>
			<td  class="test" width="60%"><img src="{{ $image }}" alt="" width = "108px" height = "135px"></td>
			<td width="12%"></td>
		</tr>
	</table>
	@else
	<table style="margin-top:5px;padding-left: 1px">
		{{-- <tr>
			<td width="28%"></td>
			<td  class="test" width="60%"><img src="{{ $image }}" alt="" width = "{{ $width }}px" height = "{{ $height }}px"></td>
			<td width="12%"></td>
		</tr> --}}
		<tr>
			<td width="28%"></td>
			<td  class="test" width="60%"><img src="{{ $image }}" alt="" width = "90px" height = "120px"></td>
			<td width="12%"></td>
		</tr>
	</table>
	@endif
	
	@if ($epicbackground==1)
	<table style="margin-top:20px;">
		<tr>
			<td style="width: 300px;font-size: 19px;">नाम : {{ $name_l }}&nbsp;</td> 
		</tr>
	</table>
	@else
	<table style="margin-top:20px;">
		<tr>
			<td style="width: 300px;font-size: 19px;">नाम : {{ $name_l }}&nbsp;</td> 
		</tr>
	</table>
	@endif
	<table>
		<tr>
			<td style="width: 300px;font-size: 15px;font-weight: bold;padding-top:6px">Name : {{ $name_e }}&nbsp;</td> 
		</tr>
	</table>
	<table>
		<tr>
			<td style="width: 300px;font-size: 19px;padding-top:6px">{{ $rln_l }} का नाम : {{ $rname_l }}&nbsp;</td> 
		</tr>
	</table>
	<table>
		@if (strlen($rname_e)>=17)
			<tr>
				<td style="width: 300px;font-size: 12px;font-weight: bold;padding-top:6px">{{ $rln_e }}'s Name : {{ $rname_e }}</td>
			</tr>
		@else
			<tr>
				<td style="width: 300px;font-size: 15px;font-weight: bold;padding-top:6px">{{ $rln_e }}'s Name : {{ $rname_e }}</td>
			</tr>
		@endif
	</table>
	</div>
	{{-- <pagebreak> --}}
	<div class="second">
	<table style="font-size: 7px;padding-top:10px" width="100%">
		<tr>
			<td style="width:50%"><span style ="font-size: 8.5px;">लिंग</span>/<b>Gender</b> :</td>
			<td style="width:50%"><span style ="font-size: 8.5px;">{{ $gender_l }}</span> &nbsp;/&nbsp; <b>{{ $gender_e }}</b></td>
		</tr> 
	</table>
	<table style="font-size: 7px;margin-top: -3px" width="100%">
		<tr> 
			<td style="width:50%"><span style ="font-size: 8.5px;">जन्म तिथि/आयु :</span><br><b>Data of Birth/ Age</b> :</td>
			<td style="width:50%; vertical-align: top;"><b>{{ $age_dob }}</b></td>	
		</tr> 
	</table>
	<table style="font-size: 7px;margin-top: 2px" width="100%">
		<tr> 
			<td><span style ="font-size: 8.5px;">पता: {{ $add_l }}</span><br>
			<b>Address : {{ $add_e }}</b></td>
			 
		</tr> 
	</table>
	<table width="100%" style="font-size: 7px;margin-top: -5px" >
		<tr> 
			<td style="padding-left: 100px"><img src="{{ $signimg }}" alt="" height="20px"></td> 
		</tr> 
	</table>
	<table style="font-size: 7px; margin-top: -5px" width="100%">
		<tr> 
			<td style="vertical-align: top;"><span style ="font-size: 8.5px;">तिथि</span>/<b> Date : {{ $cdate }}</b></td> 
			<td><span style ="font-size: 8.5px;">निर्वाचक रजिस्ट्रीकरण अधिकारी </span><br><b>Electoral Registration Officer</b></td> 
		</tr> 
	</table>
	<table width="100%" style="font-size: 7px;padding-top:3px">
		<tr> 
			<td><span style ="font-size: 8.5px;">विधान सभा निर्वाचन क्षेत्र संख्या व नाम : {{ $acno_name_l }}</span><br><b>Assembly Constituency No. and Name : {{ $acno_name_e }}</b></td>
		</tr> 
	</table>
	<table style="font-size: 7px;margin-top: 0px" width="100%">
		<tr> 
			<td><span style ="font-size: 8.5px;">भाग संख्या व नाम : {{ $partno_name_l }}</span><br><b>Part No. and Name :{{ $partno_name_e }}</b></td>
		</tr> 
	</table>
	{{-- <div style="position: absolute;overflow: visible;left: 50;margin-top:170px;
    margin-bottom: auto;font-size: 7px"><b>&nbsp;</b></div> --}}
</div>
</body>
@else

<body>
	<div class="first">
		<table style="border-collapse: collapse; width: 100%;" border="0">
		<tbody>
			<tr>
				<td style="width: 100%;text-align:center;font-size: 13px;"><b>भारत निर्वाचन आयोग</b></td>
			</tr>
			<tr>
				<td style="width: 100%;text-align:center;font-size: 13px"><b style="border-top: 2px solid black;">ELECTION COMMISSION OF INDIA</b></td>
			</tr>
		</tbody>
		</table> 
		
		<table style="margin-top:5px;width: 100%" >
		<tbody>
			<tr>
				<td style="width: 100%;padding-left: 10px;font-size:14"><b>{{$vcardno}}</b></td>
			</tr>
			<tr>
				<td>
					<table style="border-collapse: collapse; width: 100%;vertical-align: top;" border="0">
						<tr>
							<td style="width: 35%;"><img src="{{ $image }}" alt="" width = "110px" height = "135px"></td>
							<td style="width: 65%;font-size: 12px">
								<table style="border-collapse: collapse; width: 100%;" border="0">
									<tr><td style="width: 100%;font-size: 12px;padding-top: 0px;">नाम : <b>{{$name_l}}</b></td></tr>
									<tr><td style="font-size: 12px;padding-top: 9px;">{{$rln_l}} का नाम : <b>{{$rname_l}}</b></td></tr>
									<tr><td style="font-size: 12px;padding-top: 9px;">{{$rln_e}}'s Name : <b>{{$rname_e}}</b></td></tr>
									<tr><td style="font-size: 12px;padding-top: 9px;">लिंग</span>/Gender :<b>{{$gender_l}} / {{$gender_e}}</b></td></tr>
									<tr><td style="font-size: 12px;padding-top: 9px;">जन्म तिथि / DOB : <b>{{$age_dob}}</b></td></tr>
									<tr><td style="font-size: 12px;padding-top: 9px;">आयु / Age : <b>{{$age_dob}}</b></td></tr>
									
								</table>	
							</td>
						</tr>
					</table>
				</td>
				
			</tr>
			
		</tbody>
		</table>
	</div>
	 
	<div class="second">
	 	<table>
			<tr> 
				<td>पता: {{ $add_l }}</td> 
			</tr>
		</table>
		<table>
			<tr> 
				<td>Address : {{ $add_e }}</td>
			</tr>
		</table>
		<table style="padding-left: 50px">
			<tr> 
				<td><img src="{{ $signimg }}" alt="" height="27px" width="110px"></td>
			</tr>
		</table>
		<table style="padding-left: 50px">
			<tr> 
				<td>निर्वाचक रजिस्ट्रीकरण अधिकारी<br>
					Electoral Registration Officer<bt> 
					Download Date : {{ $cdate }}
            	</td>
			</tr>
		</table> 
	</div>
</body>

@endif
</html>