@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Process Commission</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <form action="{{ route('admin.process.commission.store') }}" method="post" class="add_form" >
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Date</label>
                            <span class="fa fa-asterisk"></span>
                             <input type="date" name="date" class="form-group form-control">
                        </div>                                
                    </div>
                    <div class="col-lg-6 form-group">
                        <input type="submit" class="btn btn-primary form-control" style="margin-top: 30px">
                         
                     </div> 
                </div> 
              </form>  <!-- /.card-body -->
            </div> 
        </div><!-- /.container-fluid -->
    </section>
    @endsection 

