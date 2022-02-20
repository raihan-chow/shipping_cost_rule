<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- search form -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ request()->is('vxlabadmin/dashboard') ? 'active' : '' }}">
                <a href="{{url('/home')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview {{ request()->is('vxlabadmin/manage_user*') ? 'active menu-open' : '' }}">
                <a href="#">
                    <i class="fa fa-user"></i> <span>User Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ request()->is('vxlabadmin/manage_user/users*') ? 'active' : '' }}"><a href="{{url('vxlabadmin/manage_user/users')}}"><i class="fa fa-user-o"></i> Users</a></li>
                    <li class="{{ request()->is('vxlabadmin/manage_user/admins*') ? 'active' : '' }}"><a href="{{url('vxlabadmin/manage_user/admins')}}"><i class="fa fa-user-o"></i> Admins</a></li>
      <!--            <li><a href="{{url('roles')}}"><i class="fa fa-circle-o"></i> Roles</a></li>-->
                </ul>
            </li>
            <li class="{{ request()->is('vxlabadmin/manage_survey*') ? 'active' : '' }}">
                <a href="{{url('/vxlabadmin/manage_survey/surveys')}}">
                    <i class="fa fa-dashboard"></i> <span>Manage Survey</span>
                </a>
            </li>
            <li class="{{ request()->is('vxlabadmin/manage_category*') ? 'active' : '' }}">
                <a href="{{url('/vxlabadmin/manage_category/surveys')}}">
                    <i class="fa fa-eraser"></i> <span>Manage Category</span>
                </a>
            </li>
            <li class="{{ request()->is('vxlabadmin/survey_report*') ? 'active' : '' }}">
                <a href="{{url('/vxlabadmin/survey_report/index')}}">
                    <i class="fa fa-folder-open"></i> <span>Survey Report</span>
                </a>
            </li>
            <li class="{{ request()->is('vxlabadmin/customer_report') ? 'active' : '' }}">
                <a href="{{url('/vxlabadmin/customer_report')}}">
                    <i class="fa fa-folder-open"></i> <span>Customer Report</span>
                </a>
            </li>
            <li class="{{ request()->is('vxlabadmin/feedback') ? 'active' : '' }}">
                <a href="{{url('/vxlabadmin/feedback')}}">
                    <i class="fa fa-folder-open"></i> <span>View User Feedback</span>
                </a>
            </li>
            <li class="{{ request()->is('vxlabadmin/target_groups*') ? 'active' : '' }}">
                <a href="{{url('/vxlabadmin/target_groups')}}">
                    <i class="fa fa-folder-open"></i> <span>Target Group</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>