<!-- Main Header -->

<header class="main-header">
  <!-- Logo -->
  <a href="{{route('home')}}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>ECOM</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Ecommerce</b> Portal</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        
        
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset("asset/all_css/dist/img/user_avatar.png") }}" class="user-image" alt="User Image">
            <span class="hidden-xs">{{ Auth::user()->name }}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li id="{{ Auth::user()->id }}" class="user-header">
              <img src="{{ asset("asset/all_css/dist/img/user_avatar.png") }}" class="img-circle" alt="User Image">

              <p class="m_bottom_5">
                 {{ Auth::user()->name }} 
                 <small style="margin-bottom: 5px;font-size: 14px;">{{ !empty(Auth::user()->designation) ? Auth::user()->designation : "" }}</small>
                {{-- <small>Member since {{ date('F, Y', strtotime(Auth::user()->created_at)) }}</small> --}}
                <small>{{ !empty(Auth::user()->department) ? Auth::user()->department : "" }}</small>
              </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
              {{-- <div class="row">
                <div class="col-xs-4 text-center">
                  <a href="#">Followers</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Sales</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Friends</a>
                </div>
              </div> --}}
              <!-- /.row -->
            </li>
            <!-- Menu Footer-->
            @if (Auth::check())
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                {{-- <a href="#" class="btn btn-default btn-flat">Sign out</a> --}}
                <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                </form>
              </div>
            </li>
            @endif
          </ul>
        </li>
        <li>
         <div class="top_navbar_right_img">
            <img class="user-image img-responsive" src="{{ asset("/asset/img/banglalink_logo.svg") }}" alt="User Image">
         </div>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li class="right_sidebar_icon">
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>



