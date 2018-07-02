<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">  
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Laravel') }} | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="{{ asset('adminlte/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="{{asset('adminlte/dist/css/line-icons/line-icons.css')}}" type="text/css">

    <!-- Theme style -->
    <link href="{{ asset('adminlte/dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{ asset('adminlte/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
  </head>
  <body class="skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="{{ url('/admin') }}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>KB</b></span>

          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>{{ config('app.name', 'Laravel') }}</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">{{Auth::user()->unreadNotifications->count()}}</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have {{ Auth::user()->unreadNotifications->count() }} Unreaded notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      @foreach(Auth::user()->unreadNotifications as $notification)
                        <li>
                          <a href="{{route('admin.notifications')}}">
                            @if($notification->type == "App\Notifications\UserConnectImpactPerson")
                              <i class="fa fa-users text-aqua"></i> {{$notification->data['massage']}}
                            @elseif($notification->type == "App\Notifications\UserApproveApplication")
                              <i class="fa fa-bullhorn text-maroon"></i> {{$notification->data['massage']}}
                            @endif

                          </a>
                        </li>
                      @endforeach

                    </ul>
                  </li>
                  <li class="footer"><a href="{{route('admin.notifications')}}">View all</a></li>
                </ul>
              </li>
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{ asset('adminlte/dist/img/avatar5.png') }}" class="user-image" alt="User Image"/>
                  <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{ asset('adminlte/dist/img/avatar5.png') }}" class="img-circle" alt="User Image" />
                    <p>
                      {{ Auth::user()->name }}
                    </p>
                  </li>
                 
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{ route('admin.logout') }}" class="btn btn-default btn-flat"
                      onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout

                        
                      </a>
                      <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                    </div>
                  </li>
                </ul>

              </li>

              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ asset('adminlte/dist/img/avatar5.png') }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>{{ Auth::user()->name }}</p>

              <a href="#"><i class="fa fa-circle text-success"></i> Admin</a>
            </div>
          </div>
          <!-- search form -->
         
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"><a href="{{ route('admin.dashboard') }}">
                <i class="fa fa-tachometer"></i> <span>Dashboard</span>
              </a></li>
            <li>
              <a href="{{ route('admin.manage') }}">
                <i class="fa fa-user-secret text-danger"></i> <span>Admins</span> <small class="label pull-right bg-green">{{app('admin_menus_count')['admin']}}</small>
              </a>
            </li>
            <li>
              <a href="{{ route('users.manage') }}">
                <i class="fa fa-user text-blue"></i> <span>Users</span> <small class="label pull-right bg-green">{{app('admin_menus_count')['user']}}</small>
              </a>
            </li>
            <li class="treeview active">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Impact Networks MGT</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu menu-open" style="display: block;">
                <li>
                  <a href="{{ route('experiance.index') }}">
                    <i class="fa fa-bar-chart text-maroon"></i> <span>Experiances</span> <small class="label pull-right bg-green">{{app('admin_menus_count')['exp']}}</small>
                  </a>
                </li>
                <li>
                  <a href="{{ route('guidance.index') }}">
                    <i class="fa fa-tasks text-maroon"></i> <span>Guidances</span> <small class="label pull-right bg-green">{{app('admin_menus_count')['gui']}}</small>
                  </a>
                </li>
                <li>
                  <a href="{{ route('impactnetwork.index') }}">
                    <i class="fa fa-users text-maroon"></i> <span>Impact Networks</span> <small class="label pull-right bg-green">{{app('admin_menus_count')['imp']}}</small>
                  </a>
                </li>

              </ul>
            </li>
            <li>
              <a href="{{ route('application.index') }}">
                <i class="fa fa-bullhorn text-aqua"></i> <span>Applications</span> <small class="label pull-right bg-green">{{app('admin_menus_count')['apps']}}</small>
              </a>
            </li>
            <li>
              <a href="{{ route('post.index') }}">
                <i class="fa fa-file-text text-red"></i> <span>Posts</span> <small class="label pull-right bg-green">{{app('admin_menus_count')['post']}}</small>
              </a>
            </li>
            <li>
              <a href="{{ route('Extramenus.manage') }}">
                <i class="fa fa-bars text-green"></i> <span>Site Menus</span> <small class="label pull-right bg-green">{{app('admin_menus_count')['menu']}}</small>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
             @yield('content-header')
          </h1>
          <ol class="breadcrumb">
          @yield('breadcrumb')
            <!--
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
          -->
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">


         @yield('content')
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> {{ env('APP_VERSION') }}
        </div>
        <strong>Copyright &copy; {{ date('Y') }} <a href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>.</strong> All rights reserved.
      </footer>
      
      <!-- Control Sidebar -->      
      <aside class="control-sidebar control-sidebar-dark">                
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class='control-sidebar-menu'>
              <li>
                <a href='javascript::;'>
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href='javascript::;'>
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href='javascript::;'>
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href='javascript::;'>
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3> 
            <ul class='control-sidebar-menu'>
              <li>
                <a href='javascript::;'>               
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>                                    
                </a>
              </li> 
              <li>
                <a href='javascript::;'>               
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-right">95%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>                                    
                </a>
              </li> 
              <li>
                <a href='javascript::;'>               
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-warning pull-right">50%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>                                    
                </a>
              </li> 
              <li>
                <a href='javascript::;'>               
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>                                    
                </a>
              </li>               
            </ul><!-- /.control-sidebar-menu -->         

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">            
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked />
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked />
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked />
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div><!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked />
                </label>                
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right" />
                </label>                
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>                
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('adminlte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset('adminlte/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('adminlte/plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="{{ asset('adminlte/plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/app.min.js') }}" type="text/javascript"></script>
    
    <!-- Demo -->
    <script src="{{ asset('adminlte/dist/js/demo.js') }}" type="text/javascript"></script>
    @yield('script')
  </body>
</html>
