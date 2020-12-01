<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('admin.dashboard') }}" class="brand-link"> 
        <span class="brand-text font-weight-light" style="margin-left: 47px"><b>Dashboard</b></span>
    </a>
    <div class="sidebar">
        @php 
        $mainMenus= App\Model\MainMenu::get();
        @endphp
        @foreach ($mainMenus as $mainMenu)
        @php
        $subMenus = App\Model\SubMenu::where('main_menu_id',$mainMenu->id)->get();
        @endphp
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"> 
                @if (App\Helper\MyFuncs::mainMenuCheck($mainMenu->id))
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link"> 
                        <p>
                            {{ $mainMenu->menu_name }}  
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @foreach ($subMenus as $subMenu)
                        @if (App\Helper\MyFuncs::subMenuCheck($mainMenu->id,$subMenu->id))
                        <li class="nav-item">
                            <a href="{{ route(''.$subMenu->link) }}" class="nav-link" style="background-color:#01050a"> 
                                <p>{{ $subMenu->sub_menu_name }}</p>
                            </a>
                        </li>
                        @endif
                        @endforeach 
                    </ul>
                </li>
                @endif
                @endforeach
                {{-- <a href="{{ route('admin.user.report.date.wise') }}" class="nav-link"> 
                        <p>
                             Report
                        </p>
                    </a> --}}
            </ul>
        </nav>
    </div>
</aside>