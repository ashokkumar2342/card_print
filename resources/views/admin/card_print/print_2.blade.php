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
<body>
	<div class="first">
		<table>
			<tr>
				<th></th> 
			</tr>
		</table> 
		<table style="margin-top: 20px;width: 100%" >
			<tbody>
				<tr>
					<td style="width: 50%;padding-left: 10px;font-size:15" colspan="2"><b>TRU1255579</b></td>
				</tr>
				<tr>
					<td style="width: 35%;" rowspan="7"><img src="{{ $image }}" alt="" width = "130px" height = "155px"></td>
					<td style="width: 65%;font-size: 12px">नाम : <b>संगीता</b> </td>
				</tr>
				<tr>
					<td style="width: 65%;font-size: 12px">Name : <b>Sangeeta</b></td>
				</tr>
				<tr>
					<td style="width: 65%;font-size: 12px">पित का नाम : <b>नरसह</b></td>
				</tr>
				<tr>
					<td style="width: 65%;font-size: 12px"> Husband's Name : <b>Narender Singh</b></td>
				</tr>
				<tr>
					<td style="width: 65%;font-size: 12px">लग / Gender : <b>मिहला / Female</b></td>
				</tr>
				<tr>
					<td style="width: 65%;font-size: 12px">ज म ितिथ / DOB : <b>18­-07-­1995</b></td>
				</tr>
				<tr>
					<td style="width: 65%;font-size: 12px">आयु / Age : <b>25</b></td>
				</tr>
			</tbody>
		</table>
	</div>
	 
	<div class="second">
	 	<table>
			<tr> 
				<td>पता: 149, विल्बरली खुर्द, रेवाड़ी, रेवाड़ी</td> 
			</tr>
		</table>
		<table>
			<tr> 
				<td>Address : 149, Vill­Berli Khurd, Rewari, Rewari</td>
			</tr>
		</table>
		<table style="margin-top: 70px;padding-left: 70px">
			<tr> 
				<td><img src="{{ $signimg }}" alt="" height="20px"></td>
			</tr>
		</table>
		<table style="padding-left: 50px">
			<tr> 
				<td>निर्वाचक रजिस्ट्रीकरण अधिकारी<br>
					Electoral Registration Officer<bt> 
					Download Date : 31/01/2021
            	</td>
			</tr>
		</table> 
	</div>
</body>
</html>