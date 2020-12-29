<table class="table table-striped table-bordered">
<thead>
    <tr>
        <th>District</th>
        <th>User Name</th>
        <th>Email</th>
        <th>Mobile No.</th>
        <th>User Type</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->Name_E }}</td>
        <td>{{ $user->user_name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->mobile }}</td>
        <td>{{ $user->r_name }}</td>
        <td>
            <a style="color:#fff" onclick="callPopupLarge(this,'{{ route('admin.user.approval.form',$user->id) }}')" title="" class="btn btn-xs btn-primary">Approval</a>
        </td>
    </tr> 
    @endforeach
</tbody>
</table>