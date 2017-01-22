<!DOCTYPE html>
<html>
  <head>
    @include('admin.head')
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
            <div class="pull-left">
              <button class="button-menu-mobile open-left">
                <i class="fa fa-bars"></i>
              </button>
              <span class="clearfix"></span>
            </div>
              <ul class="nav navbar-nav navbar-right pull-right">
                <li class="dropdown">
                  <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true">
                    @if(isset(Auth::guard('admin')->user()->logo) && (Auth::guard('admin')->user()->logo) != "")
                      <img src="{{ asset('images/' . Auth::guard('admin')->user()->logo) }}" alt="" class="img-circle">
                    @else
                      <img src="{{ asset('images/default-ava.png') }}"alt="" class="img-circle">
                    @endif
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="{{ url('admin/logout') }}"><i class="md md-settings-power"></i> Logout</a></li>
                  </ul>
                </li>
              </ul>
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
              @if(isset(Auth::guard('admin')->user()->logo) && (Auth::guard('admin')->user()->logo) != "")
                <img src="{{ asset('images/' . Auth::guard('admin')->user()->logo) }}" alt="" class="thumb-md img-circle">
              @else
                <img src="{{ asset('images/default-ava.png') }}" alt="" class="thumb-md img-circle">
              @endif
            </div>
            <div class="user-info">
              <div class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  {{ Auth::guard('admin')->user()->nama }}
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="{{url('admin/logout')}}"><i class="md md-settings-power"></i> Logout</a></li>
                </ul>
              </div>
              <p class="text-muted m-0">
                <?php
                  $level = Auth::guard('admin')->user()->level;
                  if ($level =='0') {
                    echo 'Super Admin';
                  }

                  else if($level =='1') {
                    echo 'Admin Toko';
                  }

                  else {
                    echo 'Admin Penjualan';
                  }
                ?>
              </p>
            </div>
          </div>

          <!--- Divider -->
          <div id="sidebar-menu">
            <ul>
              <li>
                @if (!empty($halaman) && $halaman == 'dashboard')
                  <a href="{{ url('admin/dashboard') }}" class="waves-effect active"><i class="fa fa-home"></i><span> Dashboard </span></a>
                @else
                  <a href="{{ url('admin/dashboard') }}" class="waves-effect"><i class="fa fa-home"></i><span> Dashboard </span></a>
                @endif
              </li>

              <li class="has_sub">
                @if (!empty($halaman) && $halaman == 'penjualan')
                  <a href="#" class="waves-effect active"><i class="fa fa-archive"></i><span> Penjualan </span><span class="pull-right"><i class="md md-add"></i></span></a>
                @else
                  <a href="#" class="waves-effect"><i class="fa fa-archive"></i><span> Penjualan </span><span class="pull-right"><i class="md md-add"></i></span></a>
                @endif
                  <ul class="list-unstyled">
                    <li><a href="{{ url('admin/produk') }}">Produk</a></li>
                    <li><a href="{{ url('admin/kategori') }}">Kategori</a></li>
                    <li><a href="{{ url('admin/brand') }}">Brand</a></li>
                  </ul>
                </li>

                <li class="has_sub">
                  @if (!empty($halaman) && $halaman == 'promosi')
                    <a href="#" class="waves-effect active"><i class="fa fa-shopping-bag"></i><span> Promosi </span><span class="pull-right"><i class="md md-add"></i></span></a>
                  @else
                    <a href="#" class="waves-effect"><i class="fa fa-shopping-bag"></i><span> Promosi </span><span class="pull-right"><i class="md md-add"></i></span></a>
                  @endif
                    <ul class="list-unstyled">
                      <li><a href="{{ url('admin/voucher') }}">Voucher</a></li>
                      <li><a href="{{ url('admin/slider') }}">Slider</a></li>
                    </ul>
                  </li>

                <li>
                  @if (!empty($halaman) && $halaman == 'order')
                    <a href="#" class="waves-effect active"><i class="fa fa-shopping-cart"></i><span> Pemesanan </span></a>
                  @else
                    <a href="{{ url('admin/order') }}" class="waves-effect"><i class="fa fa-shopping-cart"></i><span> Pemesanan </span></a>
                  @endif
                </li>

                <li>
                  @if (!empty($halaman) && $halaman == 'pengembalian')
                    <a href="#" class="waves-effect active"><i class="fa fa-undo"></i><span> Pengembalian </span></a>
                  @else
                    <a href="{{ url('admin/pengembalian') }}" class="waves-effect"><i class="fa fa-undo"></i><span> Pengembalian </span></a>
                  @endif
                </li>

                <li class="has_sub">
                  @if (!empty($halaman) && $halaman == 'pengembalian')
                    <a href="#" class="waves-effect active"><i class="fa fa-users"></i><span> Pengguna </span><span class="pull-right"><i class="md md-add"></i></span></a>
                  @else
                    <a href="#" class="waves-effect"><i class="fa fa-users"></i><span> Pengguna </span><span class="pull-right"><i class="md md-add"></i></span></a>
                  @endif
                    <ul class="list-unstyled">
                      <li><a href="{{ url('admin/admin') }}">Admin</a></li>
                      <li><a href="#">Pembeli</a></li>
                    </ul>
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
            </div>
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
            2016 © CiriKhas.
        </footer>
      </div>
      <!-- ============================================================== -->
      <!-- End Right content here -->
      <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    @include('admin.script')
  </body>
</html>
