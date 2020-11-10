<div class="row"> 
    <div class="col-md-4">
        <label for="exampleInputEmail1">Menu</label></br>
        <select class="selectpicker multiselect" multiple data-live-search="true" name="sub_menu[]">
            @foreach ($mainMenus as $mainMenu) 
            <optgroup label="{{ $mainMenu->menu_name }}"> 
                @foreach ($subMenus as $subMenu)
                @if ($mainMenu->id==$subMenu->main_menu_id )
                <option value="{{ $subMenu->id }}" {{ in_array($subMenu->id, $usersmenus)?'selected':'' }} >{{ $subMenu->sub_menu_name }}</option> 
                @endif 
                @endforeach 
            </optgroup>
            @endforeach                                     
        </select> 
    </div>
    <div class="col-md-4" style="margin-top: 30px"> 
        <button type="submit"  class="btn btn-primary form-control">Save</button>  
    </div>  
    <div class="col-md-4" style="margin-top: 30px"> 
        <a href="" class="btn btn-warning form-control" target="blank" title="">Report</a> 
    </div>
</div> 
@include('admin.UserManagement.permission_table') 



