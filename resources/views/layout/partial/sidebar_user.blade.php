<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- search form -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ request()->is('pmexecutor/dashboard') ? 'active' : '' }}">
                <a href="{{url('/home')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="{{ request()->is('vxlabuser/current_survey') ? 'active' : '' }}">
                <a href="{{url('/vxlabuser/current_survey')}}">
                    <i class="fa fa-list"></i> <span>Current Survey</span>
                </a>
            </li> 

            <li class="{{ request()->is('vxlabuser/feedback') ? 'active' : '' }}">
                <a href="{{url('/vxlabuser/feedback')}}">
                    <i class="fa fa-list"></i> <span>Give Feedback</span>
                </a>
            </li> 
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>