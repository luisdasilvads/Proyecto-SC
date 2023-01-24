<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    @yield('title')
    <title>RedSoc</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{url('DashboardAssets/images/favicon.jpg')}}">
    <!-- Plugins css -->
    <link href="{{url('DashboardAssets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Jquery Toast css -->
    <link href="{{url('DashboardAssets/libs/jquery-toast/jquery.toast.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- third party css -->
    <link href="{{url('DashboardAssets/libs/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet"
        type="text/css" />
    <link href="{{url('DashboardAssets/libs/datatables/responsive.bootstrap4.css')}}" rel="stylesheet"
        type="text/css" />
    <link href="{{url('DashboardAssets/libs/datatables/buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('DashboardAssets/libs/datatables/select.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
    <!-- third party css end -->
    <!-- App css -->
    <link href="{{url('DashboardAssets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('DashboardAssets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('DashboardAssets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Importacion de css modulos-->
    @yield('link')

</head>

<body>
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Topbar Start -->
        <div class="navbar-custom navbar-custom-light">
            <ul class="list-unstyled topnav-menu float-right mb-0">
                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{url('DashboardAssets/images/users/user.png')}}" alt="user-image"
                            class="rounded-circle">
                        <span class="pro-user-name ml-1">
                            {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Bienvenid@!</h6>
                        </div>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-user"></i>
                            <span>Mi Cuenta</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <!-- item-->
                        <a class="dropdown-item notify-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fe-log-out"></i>
                            <span>Cerrar Sesión</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <!--<a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-log-out"></i>
                                <span>Cerrar Sesión</span>
                            </a>-->
                    </div>
                </li>
            </ul>
            <!-- LOGO -->
            <div class="logo-box">
                <a href="{{url('/home')}}" class="logo text-center">
                    <span class="logo-lg">
                        <img src="{{url('DashboardAssets/images/redsoc.jpg')}}" alt="" height="50">
                    </span>
                </a>
            </div>
        </div>
        <!-- end Topbar -->
        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">
            <div class="slimscroll-menu">
                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <ul class="metismenu" id="side-menu">
                        <li class="menu-title">Navegación</li>
                        <li>
                            <a href="javascript: void(0);">
                                <i class="mdi mdi-domain"></i>
                                <span class="menu-arrow"></span>
                                <span> Beneficiarios </span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a class="mdi mdi-playlist-check" href=" {{url('beneficiario')}} "> Listar</a>
                                </li>
                                <li>
                                    <a class="mdi mdi-playlist-plus" href="{{url('beneficiario/create')}}"> Agregar</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);">
                                <i class="mdi mdi-link"></i>
                                <span class="menu-arrow"></span>
                                <span> Vínculos </span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a class="mdi mdi-transit-connection-variant" href=" {{url('vinculo')}} ">
                                        Listar</a>
                                </li>
                                <li>
                                    <a class="mdi mdi-link-plus" href="{{url('vinculo/create')}}"> Agregar</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- End Sidebar -->
                <div class="clearfix"></div>
            </div>
            <!-- Sidebar -left -->
        </div>
        <!-- Left Sidebar End -->
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <!-- Begin Page Content -->
        <div class="content-page">
            <div class="content">
                <!-- Start Content-->
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        @yield('breadcrumb')
                                    </ol>
                                </div>
                                @yield('page-title')
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        {{Session::get('message')}}
                    </div>
                    @endif
                    @if(Session::has('error'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        {{Session::get('error')}}
                    </div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <div class="text-md-center d-none d-sm-block">
                            Creado por
                            <a href="https://github.com/luisdasilvads">Luis Da Silva</a>
                            <i class="mdi mdi-18px mdi-github-circle"></i>
                        </div>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->
    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
    <!-- Vendor js -->
    <script src="{{url('DashboardAssets/js/vendor.min.js')}}"></script>
    <!-- Dashboar 1 init js-->
    <script src="{{url('DashboardAssets/js/pages/dashboard-1.init.js')}}"></script>
    
    <!--<script src="{url('DashboardAssets/js/vendor.min.js')}}"></script>-->
    <!-- Tost-->
    <script src="{{url('DashboardAssets/libs/jquery-toast/jquery.toast.min.js')}}"></script>
    <!-- toastr init js-->
    <script src="{{url('DashboardAassets/js/pages/toastr.init.js')}}"></script>
    <!-- third party js -->
    <script src="{{url('DashboardAssets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{url('DashboardAssets/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('DashboardAssets/libs/datatables/dataTables.bootstrap4.js')}}"></script>
    <script src="{{url('DashboardAssets/libs/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{url('DashboardAssets/libs/datatables/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{url('DashboardAssets/libs/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{url('DashboardAssets/libs/datatables/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{url('DashboardAssets/libs/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{url('DashboardAssets/libs/datatables/buttons.flash.min.js')}}"></script>
    <script src="{{url('DashboardAssets/libs/datatables/buttons.print.min.js')}}"></script>
    <script src="{{url('DashboardAssets/libs/datatables/dataTables.keyTable.min.js')}}"></script>
    <script src="{{url('DashboardAssets/libs/datatables/dataTables.select.min.js')}}"></script>
    <script src="{{url('DashboardAssets/libs/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{url('DashboardAssets/libs/pdfmake/vfs_fonts.js')}}"></script>
    <!-- third party js ends -->
    <!-- Datatables init -->
    <script src="{{url('DashboardAssets/js/pages/datatables.init.js')}}"></script>
    @yield('scripts')
    <!-- App js-->
    <script src="{{url('DashboardAssets/js/app.min.js')}}"></script>

</body>
</html>
