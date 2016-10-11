<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="{{ asset('admin/images/favicon_1.ico') }}">

        <title>Admin</title>

        <!-- Base Css Files -->
        <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="{{ asset('admin/assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('admin/assets/ionicon/css/ionicons.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('admin/css/material-design-iconic-font.min.css') }}" rel="stylesheet">

        <!-- animate css -->
        <link href="{{ asset('admin/css/animate.css') }}" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="{{ asset('admin/css/waves-effect.css') }}" rel="stylesheet">

        <!-- sweet alerts -->
        <link href="{{ asset('admin/assets/sweet-alert/sweet-alert.min.css') }}" rel="stylesheet">

        <!-- Custom Files -->
        <link href="{{ asset('admin/css/helper.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="{{ asset('admin/https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}"></script>
        <script src="{{ asset('admin/https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js') }}"></script>
        <![endif]-->

        <script src="{{ asset('admin/js/modernizr.min.js') }}"></script>

    </head>

    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.html" class="logo"><i class="md md-person"></i> <span>Admin </span></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div>
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="{{ asset('admin/images/users/sudom.jpg') }}" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">John Doe <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-settings-power"></i> Logout</a></li>
                                </ul>
                            </div>

                            <p class="text-muted m-0">Administrator</p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="#" class="waves-effect"><i class="fa fa-home"></i><span> Dashboard </span></a>
                            </li>

                            <li class="has_sub">
                              @if (!empty($halaman) && $halaman == 'penjualan')
                                <a href="#" class="waves-effect active"><i class="fa fa-archive"></i><span> Penjualan </span><span class="pull-right"><i class="md md-add"></i></span></a>
                              @else
                                <a href="#" class="waves-effect"><i class="fa fa-archive"></i><span> Penjualan </span><span class="pull-right"><i class="md md-add"></i></span></a>
                              @endif
                                <ul class="list-unstyled">
                                    <li><a href="#">Produk</a></li>
                                    <li><a href="#">Kategori</a></li>
                                    <li><a href="{{ url('admin/brand') }}">Brand</a></li>
                                    <li><a href="#">Voucher</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="#" class="waves-effect"><i class="fa fa-shopping-cart"></i><span> Pemesanan </span></a>
                            </li>

                            <li>
                                <a href="#" class="waves-effect"><i class="fa fa-undo"></i><span> Pengembalian </span></a>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-users"></i><span> Pengguna </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="#">Admin Toko</a></li>
                                    <li><a href="#">Admin Transaksi</a></li>
                                    <li><a href="#">Pembeli</a></li>
                                </ul
                            </li>

                            <li class=has_sub>
                              @if (!empty($halaman) && $halaman == 'pengiriman')
                                <a href="#" class="waves-effect active"><i class="fa fa-truck"></i><span> Pengiriman </span><span class="pull-right"><i class="md md-add"></i></span></a>
                              @else
                                <a href="#" class="waves-effect"><i class="fa fa-truck"></i><span> Pengiriman </span><span class="pull-right"><i class="md md-add"></i></span></a>
                              @endif
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('admin/bank') }}">Bank</a></li>
                                    <li><a href="{{ url('admin/ekspedisi') }}">Ekspedisi</a></li>
                                    <li><a href="{{ url('admin/paket') }}">Paket</a></li>
                                </ul>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        @yield('main')

                    </div> <!-- container -->
                </div> <!-- content -->

                <footer class="footer text-right">
                    2015 © Moltran.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
        <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('admin/js/waves.js') }}"></script>
        <script src="{{ asset('admin/js/wow.min.js') }}"></script>
        <script src="{{ asset('admin/js/jquery.nicescroll.js" type="text/javascript') }}"></script>
        <script src="{{ asset('admin/js/jquery.scrollTo.min.js') }}"></script>
        <script src="{{ asset('admin/assets/chat/moment-2.2.1.js') }}"></script>
        <script src="{{ asset('admin/assets/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('admin/assets/jquery-detectmobile/detect.js') }}"></script>
        <script src="{{ asset('admin/assets/fastclick/fastclick.js') }}"></script>
        <script src="{{ asset('admin/assets/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('admin/assets/jquery-blockui/jquery.blockUI.js') }}"></script>

        <!-- sweet alerts -->
        <script src="{{ asset('admin/assets/sweet-alert/sweet-alert.min.js') }}"></script>
        <script src="{{ asset('admin/assets/sweet-alert/sweet-alert.init.js') }}"></script>

        <!-- flot Chart -->
        <script src="{{ asset('admin/assets/flot-chart/jquery.flot.js') }}"></script>
        <script src="{{ asset('admin/assets/flot-chart/jquery.flot.time.js') }}"></script>
        <script src="{{ asset('admin/assets/flot-chart/jquery.flot.tooltip.min.js') }}"></script>
        <script src="{{ asset('admin/assets/flot-chart/jquery.flot.resize.js') }}"></script>
        <script src="{{ asset('admin/assets/flot-chart/jquery.flot.pie.js') }}"></script>
        <script src="{{ asset('admin/assets/flot-chart/jquery.flot.selection.js') }}"></script>
        <script src="{{ asset('admin/assets/flot-chart/jquery.flot.stack.js') }}"></script>
        <script src="{{ asset('admin/assets/flot-chart/jquery.flot.crosshair.js') }}"></script>

        <!-- Counter-up -->
        <script src="{{ asset('admin/assets/counterup/waypoints.min.js" type="text/javascript') }}"></script>
        <script src="{{ asset('admin/assets/counterup/jquery.counterup.min.js" type="text/javascript') }}"></script>

        <!-- CUSTOM JS -->
        <script src="{{ asset('admin/js/jquery.app.js') }}"></script>

        <!-- Dashboard -->
        <script src="{{ asset('admin/js/jquery.dashboard.js') }}"></script>

        <!-- Chat -->
        <script src="{{ asset('admin/js/jquery.chat.js') }}"></script>

        <!-- Todo -->
        <script src="{{ asset('admin/js/jquery.todo.js') }}"></script>

        <!-- Flash Message -->
        <script src="{{ asset('admin/js/flash_message.js') }}"></script>

        <script type="text/javascript">
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>

    </body>
</html>
