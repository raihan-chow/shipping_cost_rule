<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

   <!-- sidebar: style can be found in sidebar.less -->
   <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
         <!--      <div class="pull-left image">
								<img src="{{ asset('/bower_components/admin-lte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image" />
						</div>-->
         <!--      <div class="pull-left info">
								<p>{{ Auth::user()->name }}</p>
									Status 
								<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
						</div>-->
      </div>
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
      </a>



      <!-- Sidebar Menu -->
      <ul class="sidebar-menu tree" data-widget="tree">
         <li class="active">
            <a href="{{ route('home') }}">
               <i class="fa fa-safari"></i> <span>Welcome</span>
            </a>
         </li>

         <li class="active">
            <a href="{{ route('shipping-rule.index') }}">
               <i class="fa fa-dashboard"></i> <span>Create Shipping Role</span>
            </a>
         </li>

         

         
         

      



      

      



      

      </ul><!-- /.sidebar-menu -->

      

   </section>
   <!-- /.sidebar -->
</aside>
