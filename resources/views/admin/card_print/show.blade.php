<form action="{{ route('admin.card.print.print') }}" method="post" target="blank">
{{ csrf_field() }}

<div class="row"> 
<table style="border-collapse: collapse; width: 100.609%; height: 203px;" border="1">
<tbody>
<tr>
<td style="width: 33.3333%;">Name</td>
<td style="width: 33.3333%;"><b>{{ $voterData[0]->name_e }}</b></td>
<td style="width: 33.3333%;" rowspan="5"><img src="{{ $image }}" alt=""></td>
</tr>
<tr>
<td style="width: 33.3333%;">F/H name</td>
<td style="width: 33.3333%;"><b>{{ $voterData[0]->f_name_e }}</b></td>
</tr>
<tr>
<td style="width: 33.3333%;">Gender</td>
<td style="width: 33.3333%;"><b>{{ $voterData[0]->gender_e }}</b></td>
</tr>
<tr>
<td style="width: 33.3333%;">House No.</td>
<td style="width: 33.3333%;"><b>{{ $voterData[0]->hno_e }}</b></td>
</tr>
<tr>
<td style="width: 33.3333%;">Mobile No.</td>
<td style="width: 33.3333%;"><b>{{ $voterData[0]->mobile }}</b></td>
</tr>
</tbody>
</table>
<input type="hidden" maxlength="20" name="voter_card_no" class="form-control" value="{{ $voterData[0]->cardno }}"> 
<div class="col-lg-12 form-group" style="margin-top: 30px">
    <div class="form-group clearfix">
      <div class="icheck-primary d-inline">
        <input type="radio" id="radioPrimary1" name="pre_printed_card" checked="" value="0">
        <label for="radioPrimary1">PVC Card
        </label>
      </div>
      <div class="icheck-primary d-inline">
        <input type="radio" id="radioPrimary2" name="pre_printed_card"value="1">
        <label for="radioPrimary2">Colour Print
        </label>
      </div> 
    </div> 
</div>
<div class="col-lg-12 form-group">
    <input type="submit" class="btn btn-warning form-control" value="Print"> 
</div>
</div> 
</form> 
 