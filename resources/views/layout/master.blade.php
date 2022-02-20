<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
   <link rel="icon" href="{{ asset('/asset/img/Banglalink_logo.png') }}" type="image/x-icon"/>
    <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('asset/all_css/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('asset/all_css/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('asset/all_css/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('asset/all_css/dist/css/AdminLTE.min.css')}}">
  <!-- iCheck -->
  {{-- <link rel="stylesheet" href="{{asset('asset/all_css/dist/css/skins/_all-skins.min.css')}}"> --}}
  {{-- <link rel="stylesheet" href="{{asset('asset/all_css/dist/css/skins/skin-yellow.min.css')}}"> --}}
   <link href="{{asset('asset/fonts/Roboto/roboto.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('asset/all_css/dist/css/custom_skins.css')}}">
  <link rel="stylesheet" href="{{asset('asset/all_css/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <!--<link rel="stylesheet" href="{{asset('asset/all_css/plugins/Tree-View-Plugin-With-jQuery-almightree/almightree.css')}}">-->
  <link rel="stylesheet" href="{{asset('asset/all_css/tree-view/tree.css')}}">
  <link rel="stylesheet" href="{{asset('asset/all_css/bower_components/select2/dist/css/select2.css')}}">

  {{-- Fonts --}}
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   


   @yield('style')
   <!-- Styles -->
   <link href="{{ asset('asset/css/app.css') }}" rel="stylesheet">

   

   <style>
      .navbar-nav>.user-menu>.dropdown-menu {
         width: 200px;
      }

      .treeview .hitarea {
         background:url("{{ asset('asset/treeview-default.gif') }}") -64px -25px no-repeat;
      }
      .treeview li { background: url("{{ asset('asset/treeview-default-line.gif') }}") 0 0 no-repeat; }
      .treeview li.lastCollapsable, .treeview li.lastExpandable { background-image: url("{{ asset('asset/treeview-default.gif') }}"); }
      .treeview-red li { background-image: url("{{ asset('asset/treeview-red-line.gif') }}"); }
      .treeview-red .hitarea, .treeview-red li.lastCollapsable, .treeview-red li.lastExpandable { background-image: url("{{ asset('asset/treeview-red.gif') }}"); }

      .treeview-black .hitarea, .treeview-black li.lastCollapsable, .treeview-black li.lastExpandable { background-image: url("{{ asset('asset/treeview-black.gif') }}"); }

      .treeview-gray .hitarea, .treeview-gray li.lastCollapsable, .treeview-gray li.lastExpandable { background-image: url("{{ asset('asset/treeview-gray.gif') }}"); }
      .treeview-famfamfam .hitarea, .treeview-famfamfam li.lastCollapsable, .treeview-famfamfam li.lastExpandable { background-image: url("{{ asset('asset/treeview-famfamfam.gif') }}"); }

      .filetree span.folder { background: url("{{ asset('asset/folder.gif') }}") 0 0 no-repeat; }
      .filetree li.expandable span.folder { background: url("{{ asset('asset/folder-closed.gif') }}") 0 0 no-repeat; }
      .filetree span.file { background: url("{{ asset('asset/file.gif') }}") 0 0 no-repeat; }
   </style>

   @stack('style_inline')
   
  </head>
  <body class="skin-blue sidebar-mini @stack('body_class')">
    <div class="wrapper">

      <!-- Header -->
      @include('layout.header')

      <!-- Sidebar -->
      @include('layout.sidebar')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      

        <!-- Main content -->
        <section class="content">          
          <!-- Your Page Content Here -->
          @yield('content')
        </section>
      </div>

      <!-- Footer -->
      @include('layout.partial.footer_content')
     
      @include('layout.partial.footer_script_base')
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    @stack('script_inline')

  </body>
</html>