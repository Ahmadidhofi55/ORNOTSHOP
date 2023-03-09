<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OrnotShop | @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="styleshe  <!-- Theme style -->et" href="/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/bower_components/select2/dist/css/select2.min.css">

    <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="{{ route('admin.home') }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>ORNOT</b>SHOP</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Ornot</b>Shop</span>
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                @php
                if (auth()->check()){
                $user = auth()->user();
                }
                @endphp
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                @if($user->img == "")
                                <img src="/admin-logo.png" class="img-circle" width="30px" alt="User Image">
                                @else
                                <img src="{{ asset($user->img) }}" class="img-circle" width="100%" alt="User Image" />
                                @endif
                                <span class="hidden-xs">{{ $user->name }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    @if($user->img == "")
                                    <img src="/admin-logo.png" class="img-circle" alt="User Image">
                                    @else
                                    <img src="{{ asset($user->img) }}" class="img-circle" alt="User Image" />
                                    @endif
                                    <p>
                                        {{ $user->name }}
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{ route('profil.edit') }}" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-default btn-flat">{{ __('Logout')
                                                }}</button>
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
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        @php
                        if (auth()->check()){
                        $user = auth()->user();
                        }
                        @endphp

                        @if($user->img == "")
                        <img src="/admin-logo.png" class="img-circle" alt="User Image" />
                        @else
                        <img src="{{ asset($user->img) }}" class="img-circle" alt="User Image" />
                        @endif
                    </div>
                    <div class="pull-left info">
                        <p>{{ $user->name }}</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active treeview menu-open">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
                        </ul>
                    </li>
                    <li class=" treeview">
                        <a href="#">
                            <i class="fa fa-user"></i> <span>User</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href=""><i class="fa fa-eye"></i> User View </a></li>
                            <li><a href=""><i class="fa fa-plus-square"></i> User Create
                                </a></li>
                        </ul>
                    </li>
                    <li class=" treeview">
                        <a href="#">
                            <i class="fa fa-archive"></i> <span>Produk</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('produk.index') }}"><i class="fa fa-eye"></i> Produk View </a></li>
                            <li><a href="{{ route('produk.create') }}"><i class="fa fa-plus-square"></i> Produk Create
                                </a></li>
                        </ul>
                    </li>
                    <li class=" treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span>Kategori</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('kategori.index') }}"><i class="fa fa-eye"></i> Kategori View </a></li>
                            <li><a href="{{ route('kategori.create') }}"><i class="fa fa-plus-square"></i> Kategori Create
                                </a></li>
                        </ul>
                    </li>
                    <li class=" treeview">
                        <a href="#">
                            <i class="fa fa-cc"></i> <span>Merek</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('merek.index') }}"><i class="fa fa-eye"></i> Merek View </a></li>
                            <li><a href="{{ route('merek.create') }}"><i class="fa fa-plus-square"></i> Merek Create
                                </a></li>
                        </ul>
                    </li>
                    <li class=" treeview">
                        <a href="#">
                            <i class="fa fa-tasks"></i> <span>Order Management</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('merek.index') }}"><i class="fa fa-external-link-square"></i> Order Masuk </a></li>
                            <li><a href="{{ route('merek.create') }}"><i class="fa fa-caret-square-o-right"></i> Order Diproses
                                </a></li>
                                <li><a href="{{ route('merek.create') }}"><i class="fa fa-paper-plane-o"></i> Order Dikirim
                                </a></li>
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    @yield('header')
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">@yield('aktif')</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Info boxes -->
                @yield('contend')
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0
            </div>
            <strong>Copyright &copy; 2023 <a href="">ORNOTDEV</a></strong> All rights
            reserved.
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

                </div>
                <!-- /.tab-pane -->

                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <form method="post">
                        <h3 class="control-sidebar-heading">General Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Report panel usage
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Some information about this general settings option
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Allow mail redirect
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Other sets of options are available
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Expose author name in posts
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Allow the user to show his name in blog posts
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <h3 class="control-sidebar-heading">Chat Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Show me as online
                                <input type="checkbox" class="pull-right" checked>
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Turn off notifications
                                <input type="checkbox" class="pull-right">
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Delete chat history
                                <a href="javascript:void(0)" class="text-red pull-right"><i
                                        class="fa fa-trash-o"></i></a>
                            </label>
                        </div>
                        <!-- /.form-group -->
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
        </aside>
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- Select2 -->
<script src="/bower_components/select2/dist/js/select2.full.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.min.js"></script>
    <!-- Sparkline -->
    <script src="/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap  -->
    <script src="/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll -->
    <script src="/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS -->
    <script src="/bower_components/chart.js/Chart.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/dist/js/pages/dashboard2.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/dist/js/demo.js"></script>
    <script>
        $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
})
    </script>
</body>

</html>
