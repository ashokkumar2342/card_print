<div class="row"> 
<div class="col-lg-12" style="margin-top:10px;">
   @php
       $user=App\Model\User::find($user_id);
     @endphp  
        User Name : <span style="color:#d02ee7 ;margin-bottom: 10px"><b>{{ $user->email or '' }} -- {{ $user->user_name or '' }}</b></span> 
  <table class="table table-bordered table-striped"id="user_menu_table" style="width: 100%"> 
    <thead> 
      <tr>
        <th>Sub Menu Name</th>
        <th>Main Menu Name</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($mainMenus as $mainMenu)
      <tr>
        <td></td>
        <td>{{ $mainMenu->menu_name }}</td>
        <td></td>
      </tr>
      @foreach ($subMenus as $subMenu)
         @if ($mainMenu->id==$subMenu->main_menu_id )
      <tr style="{{ in_array($subMenu->id, $usersmenus)?'background-color: #28a745':'background-color: #dc3545' }}">
        <td>{{ $subMenu->sub_menu_name }}</td>
        <td></td>
            
         <td>@if ( in_array($subMenu->id, $usersmenus)) Yes @else  No @endif  </td> 
    
      </tr>
       @endif 
       @endforeach  
       @endforeach 
    </tbody>
  </table>
</div>
</div>