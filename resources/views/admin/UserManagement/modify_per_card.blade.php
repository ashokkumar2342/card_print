@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Modify Per Card Charge</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <form action="{{ route('admin.user.modify.per.card.store') }}" method="post" class="add_form" >
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Users</label>
                            <span class="fa fa-asterisk"></span>
                            <select name="user_id" class="form-control">
                                <option selected disabled>Select User</option> 
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->email }}-{{ $user->mobile }}</option> 
                                @endforeach
                            </select>
                        </div>                                
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Charge Per Card (Rs.)</label>
                            <span class="fa fa-asterisk"></span> 
                            <div class="input-group"> 
                                <input type="text" Name="charge_card" class="form-control" maxlength="2" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Enter Charge Card">
                            </div> 
                        </div>
                    </div> 
                </div> 
                <div class="box-footer text-center" style="margin-top: 30px">
                    <button type="submit" class="btn btn-primary form-control">Submit</button>
                </div> 
              </form>   
            </div> 
        </div>
    </div> 
    </section>
    @endsection 

