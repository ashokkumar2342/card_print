 
  <nav class="main-header navbar navbar-expand navbar-info navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      @includeIf('admin.include.hot_menu_top')      
    </ul> 
    <span><b>अब आप आधार और पैन कार्ड भी प्रिंट कर सकते हैं| 20-01-2021 तक डेमो फ्री हैं|</b></span> 
    <ul class="navbar-nav ml-auto">       
      <li class="nav-item">

        <a class="btn btn-lg" title="Sign Out" href="{{ route('admin.logout.get') }}"
                        >
          <i class="fa fa-sign-out"></i>
        </a>
        <form id="logout-form" action="{{ route('admin.logout.get') }}" method="POST" style="display: none;">
           {{ csrf_field() }}
        </form>

      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
