  <header class="main-header">
    <!-- Logo -->
    <a href="{{url('/home')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>ST</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SurveyTel</b></span>
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
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">{{\Auth::user()->name?\Auth::user()->name:"Demo Profile Name"}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-footer">
                  <ul style="list-style-type: none;">
                      <li><a href="{{url('vxlabuser/my_profile')}}" class="btn"><i class="fa fa-user"></i> Profile</a></li>
                      @if(\Auth::user()->roles->slug=='user')
                      <li><a href="{{url('vxlabuser/update_profile')}}" class="btn"><i class="fa fa-user"></i>Update Profile</a></li>
                      @endif
                      <li><a href="{{url('change_password')}}" class="btn"><i class="fa fa-lock"></i> Change Password</a></li>
                      <li><a href="{{url('signout')}}" class="btn"><i class="fa fa-sign-out"></i> Sign out</a></li>
                  </ul>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>