 
  <nav class="main-header navbar navbar-expand navbar-info navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      @includeIf('admin.include.hot_menu_top')      
    </ul> 
    <marquee width="100%" direction="left" height="100%" onmouseover="this.stop()" onmouseout="this.start()" style="background-color: #ab183d;color: yellow;font-size: 20px">
     <b>अब आप आधार कार्ड (AADHAAR CARD) और पैन कार्ड (PAN CARD) भी प्रिंट कर सकते हैं|</b>
     {{-- <b><i class="fa fa-flag text-primary"></i> SPECIAL REPUBLIC DAY OFFER! RECHARGE 1000₹ GET 1100₹ <i class="fa fa-flag text-primary"></i></b> --}} 
    </marquee>

    <ul class="navbar-nav ml-auto"> 
    <li class="nav-item dropdown" id="cart_view">
       
    </li>    
      <li class="nav-item">

        <a title="Sign Out" href="{{ route('admin.logout.get') }}" class="nav-link">
          <i class="fa fa-sign-out"></i>
           
        </a>
        <form id="logout-form" action="{{ route('admin.logout.get') }}" method="POST" style="display: none;">
           {{ csrf_field() }}
        </form>

      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
