<form action="{{ route('admin.card.print.print') }}" method="post" target="blank">
{{ csrf_field() }}

<div class="row"> 
<table style="border-collapse: collapse; width: 100.609%; height: 203px;" border="1">
<tbody>
<tr>
<td style="width: 30%;">Name</td>
<td style="width: 70%;"><b>{{ $voterData[0]->name_e }}</b></td>
</tr>
<tr>
<td>F/H name</td>
<td><b>{{ $voterData[0]->f_name_e }}</b></td>
</tr>
<tr>
<td>Gender</td>
<td><b>{{ $voterData[0]->gender_e }}</b></td>
</tr>
<tr>
<td>House No.</td>
<td><b>{{ $voterData[0]->hno_e }}</b></td>
</tr>
<tr>
<td>Mobile No.</td>
<td><b>xxxxxx{{ substr($voterData[0]->mobile,-4,4) }}</b></td>
</tr>
</tbody>
</table>
<input type="hidden" maxlength="20" name="voter_card_no" class="form-control" value="{{ $voterData[0]->cardno }}"> 
<div class="col-lg-6 form-group" style="margin-top: 30px">
  <div class="card card-info"> 
    <div class="card-body bg-gray"> 
      <div class="form-group clearfix">
        <div class="icheck-primary d-inline">
          <input type="radio" id="radioPrimary1" name="pre_printed_card" checked="" value="0" class="form-control form-group">
          <label for="radioPrimary1">PVC Card
          </label>
        </div>
        <div class="icheck-primary d-inline">
          <input type="radio" id="radioPrimary2" name="pre_printed_card"value="1" class="form-control form-group">
          <label for="radioPrimary2">Colour Print
          </label>
        </div> 
      </div>
    </div>
  </div> 
</div>
<div class="col-lg-6 form-group" style="margin-top: 30px">
  <div class="card card-info"> 
    <div class="card-body bg-gray"> 
      <div class="form-group clearfix">
        <div class="icheck-success d-inline">
          <input type="radio" name="format" id="radioSuccess1" class="form-control form-group" checked="" value="0">
          <label for="radioSuccess1">Format 1
          </label>
        </div>
        <div class="icheck-success d-inline">
          <input type="radio" name="format" id="radioSuccess2" class="form-control form-group" value="1">
          <label for="radioSuccess2">Format 2
          </label>
        </div>
      </div>
    </div>
  </div> 
</div>
<div class="col-lg-12 form-group text-center">
    <button type="submit" class="btn btn-warning btn-lg"> <i class="fa fa-download text-success"></i> Download</button>
</div>
</div> 
</form> 
 