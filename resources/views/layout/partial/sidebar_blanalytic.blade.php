<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- search form -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ request()->is('vxlabanalytic/dashboard') ? 'active' : '' }}">
                <a href="{{url('/home')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="{{ request()->is('vxlabanalytic/manage_survey*') ? 'active menu-open' : '' }}">
                <a href="{{url('vxlabanalytic/manage_survey/surveys')}}">
                    <i class="fa fa-dashboard"></i> <span>Manage Survey</span>
                </a>
            </li>
            <li class="{{ request()->is('vxlabanalytic/survey_report*') ? 'active' : '' }}">
                <a href="{{url('/vxlabanalytic/survey_report/index')}}">
                    <i class="fa fa-folder-open"></i> <span>Survey Report</span>
                </a>
            </li>
            <li class="{{ request()->is('vxlabanalytic/target_groups*') ? 'active' : '' }}">
                <a href="{{url('/vxlabanalytic/target_groups')}}">
                    <i class="fa fa-folder-open"></i> <span>Target Group</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>