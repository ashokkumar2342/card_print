@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Mapping District Distributer</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <form action="{{ route('admin.user.mapping.district.user.store') }}" method="post" class="add_form" select-triger="district_select_box" no-reset="true">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">District</label>
                            <span class="fa fa-asterisk"></span>
                            <select name="district"  id="district_select_box" class="form-control" onchange="callAjax(this,'{{ route('admin.user.mapping.district.wise.list') }}','mapped_list')">
                                <option selected disabled>Select District</option>
                                @foreach ($districts as $district)
                                <option value="{{ $district->d_id }}">{{ $district->Name_E }}</option> 
                                @endforeach 
                            </select>
                        </div>                                
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Distributer</label>
                            <span class="fa fa-asterisk"></span>
                            <select name="distributer" class="form-control">
                                <option selected disabled>Select Distributer</option>
                                @foreach ($users as $users)
                                <option value="{{ $users->id }}">{{ $users->user_name }}-{{ $users->email }}-{{ $users->mobile }}</option> 
                                @endforeach 
                            </select>
                        </div>                                
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="box-footer text-center" style="margin-top: 30px">
                                <button type="submit" class="btn btn-primary form-control">Submit</button>
                            </div> 
                        </div>                                
                    </div>
                </div> 
              </form>
              <div id="mapped_list">
                    
                </div>  
            </div> 
        </div> 
    </section>
    @endsection 

