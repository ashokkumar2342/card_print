@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Reset Password</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <form name="usser_change_password" id="usser_change_password" toast-msg="true" action="{{ route('admin.user.reset.password.store') }}"   class="add_form" method="post" autocomplete="off" >
                    {{ csrf_field()}}
                    <div class="form-body overflow-hide">
                        <div class="form-group">
                            <label class="control-label mb-10">Users</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="icon-lock"></i></div>
                                <select name="user_id" class="form-control select2">
                                    <option selected disabled>Select User</option>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->user_name }}--{{ $user->email }}</option> 
                                    @endforeach 
                                </select>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="control-label mb-10" for="exampleInputpwd_01">New Password</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="icon-lock"></i></div>
                                <input type="text" name="password" class="form-control" id="password" placeholder="Enter new password"  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required min="6" maxlength="15">
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="control-label mb-10" for="exampleInputpwd_01">Confirm password</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="icon-lock"></i></div>
                                <input type="text" name="passwordconfirmation" class="form-control" id="passwordconfirmation" placeholder="Enter new password"  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" oninput="check(this)" required min="6" maxlength="15">
                            </div>
                        </div>
                    </div>
                    <div class="form-actions mt-10">            
                        <button type="submit" class="btn btn-primary form-control mr-10 mb-30">Reset Password</button>
                    </div>              
                </form>
                
            </div> 
        </div><!-- /.container-fluid -->
    </section>
    @endsection 

