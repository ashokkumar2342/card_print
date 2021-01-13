@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>PAN Card Print Purchase</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">

                </ol>
            </div>
        </div> 
        <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body row">
          <div class="col-5 text-center d-flex align-items-center justify-content-center bg-warning">
            <div class="">
              <h2><strong>PAN Card Print Purchase</strong></h2>
              <p class="lead mb-5">
                 PAN कार्ड PDF पैकेज़  शुल्क 1500 रु० (एक बार) है.<br>
                 प्रतिदिन पहले 10 कार्ड शुल्क 1 रु० (प्रति PAN) है.<br>
                 प्रतिदिन अगले 11 से 20 कार्ड शुल्क 2 रु० (प्रति PAN) है.<br>
                 20 से अधिक 10 रु० (प्रति PAN) है.
              </p>
            </div>
          </div> 
          <div class="col-7">
            <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  ₹1500.00
                </h2>
                <h4 class="mt-0">
                  <small>Total Amount : ₹1500.00 </small>
                </h4>
              </div>
            <form action="{{ route('admin.card.pancard.print.purchase.store') }}" method="post" onsubmit="return confirm('Are You Sure You Want To Purchase This item?');">
            {{csrf_field()}} 
            <div class="form-group" style="padding-top: 40px">
               <div class="icheck-primary d-inline">
                    <input type="checkbox" id="checkboxPrimary1" name="I_Want_To_Purchase">
                    <label for="checkboxPrimary1">I Want To Purchase</label> 
                </div> 
            </div>
            <p class="text-danger">{{ $errors->first('I_Want_To_Purchase') }}</p>
            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Purchase">
            </div>
          </div>
      </form>
        </div>
      </div>

    </section> 
    </div> 
</section>
@endsection
@push('scripts')
<script>
 
</script>
@endpush

