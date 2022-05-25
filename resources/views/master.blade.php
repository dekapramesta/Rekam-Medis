<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Dastone - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />

    <!-- jvectormap -->
    <link href="{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />

    <!-- App css -->
    <link href="{{ asset('assets') }}plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets') }}plugins/huebee/huebee.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets') }}plugins/timepicker/bootstrap-material-datetimepicker.css" rel="stylesheet">
        <link href="{{ asset('assets') }}plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/metisMenu.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/datatables/dataTables.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/datatables/buttons.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/timepicker/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/huebee/huebee.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />



    <!-- Responsive datatable examples -->
    
    <link href="{{asset('assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
  </head>

  <body class="">
    <!-- Left Sidenav -->
    <div class="left-sidenav">
      <!-- LOGO -->
      <div class="brand">
        <a href="index.html" class="logo">
          <span>
            <img src="{{asset('assets/images/logo-sm.png')}}" alt="logo-small" class="logo-sm" />
          </span>
          <span>
            <img src="{{asset('assets/images/logo.png')}}" alt="logo-large" class="logo-lg logo-light" />
            <img src="{{asset('assets/images/logo-dark.png')}}" alt="logo-large" class="logo-lg logo-dark" />
          </span>
        </a>
      </div>
      <!--end logo-->
      <div class="menu-content h-100" data-simplebar>
        <ul class="metismenu left-sidenav-menu">
          <li class="menu-label mt-0">Main</li>
           <li class="mb-2">
            <a href="widgets.html"><i data-feather="layers" class="align-self-center menu-icon"></i><span>Dashboard</span></a>
          </li>
            <li class="mb-2">
            <a href="widgets.html"><i data-feather="layers" class="align-self-center menu-icon "></i><span>Data Pasien</span></a>
          </li>
           <li class="mb-2">
            <a href="widgets.html"><i data-feather="layers" class="align-self-center menu-icon"></i><span>Data Obat</span></a>
          </li>
           <li class="mb-2">
            <a href="widgets.html"><i data-feather="layers" class="align-self-center menu-icon"></i><span>Data Dokter</span></a>
          </li>
           <li class="mb-2">
            <a href="widgets.html"><i data-feather="layers" class="align-self-center menu-icon"></i><span>Data Rekam Medis</span></a>
          </li>
          
           <li class="mb-2">
            <a href="widgets.html"><i data-feather="layers" class="align-self-center menu-icon"></i><span>Data Poliknlik</span></a>
          </li>
           <li class="mb-2">
            <a href="widgets.html"><i data-feather="layers" class="align-self-center menu-icon"></i><span>Data Laporan</span></a>
          </li>
        </ul>
      </div>
    </div>
    <!-- end left-sidenav-->

    <div class="page-wrapper">
      <!-- Top Bar Start -->
      <div class="topbar">
        <!-- Navbar -->
        <nav class="navbar-custom">
          <ul class="list-unstyled topbar-nav float-end mb-0">
            <li class="dropdown hide-phone">
              <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i data-feather="search" class="topbar-icon"></i>
              </a>

              <div class="dropdown-menu dropdown-menu-end dropdown-lg p-0">
                <!-- Top Search Bar -->
                <div class="app-search-topbar">
                  <form action="#" method="get">
                    <input type="search" name="search" class="from-control top-search mb-0" placeholder="Type text..." />
                    <button type="submit"><i class="ti-search"></i></button>
                  </form>
                </div>
              </div>
            </li>

            <li class="dropdown notification-list">
              <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i data-feather="bell" class="align-self-center topbar-icon"></i>
                <span class="badge bg-danger rounded-pill noti-icon-badge">2</span>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-lg pt-0">
                <h6 class="dropdown-item-text font-15 m-0 py-3 border-bottom d-flex justify-content-between align-items-center">Notifications <span class="badge bg-primary rounded-pill">2</span></h6>
                <div class="notification-menu" data-simplebar>
                  <!-- item-->
                  <a href="#" class="dropdown-item py-3">
                    <small class="float-end text-muted ps-2">2 min ago</small>
                    <div class="media">
                      <div class="avatar-md bg-soft-primary">
                        <i data-feather="shopping-cart" class="align-self-center icon-xs"></i>
                      </div>
                      <div class="media-body align-self-center ms-2 text-truncate">
                        <h6 class="my-0 fw-normal text-dark">Your order is placed</h6>
                        <small class="text-muted mb-0">Dummy text of the printing and industry.</small>
                      </div>
                      <!--end media-body-->
                    </div>
                    <!--end media--> </a
                  ><!--end-item-->
                  <!-- item-->
                  <a href="#" class="dropdown-item py-3">
                    <small class="float-end text-muted ps-2">10 min ago</small>
                    <div class="media">
                      <div class="avatar-md bg-soft-primary">
                        <img src="assets/images/users/user-4.jpg" alt="" class="thumb-sm rounded-circle" />
                      </div>
                      <div class="media-body align-self-center ms-2 text-truncate">
                        <h6 class="my-0 fw-normal text-dark">Meeting with designers</h6>
                        <small class="text-muted mb-0">It is a long established fact that a reader.</small>
                      </div>
                      <!--end media-body-->
                    </div>
                    <!--end media--> </a
                  ><!--end-item-->
                  <!-- item-->
                  <a href="#" class="dropdown-item py-3">
                    <small class="float-end text-muted ps-2">40 min ago</small>
                    <div class="media">
                      <div class="avatar-md bg-soft-primary">
                        <i data-feather="users" class="align-self-center icon-xs"></i>
                      </div>
                      <div class="media-body align-self-center ms-2 text-truncate">
                        <h6 class="my-0 fw-normal text-dark">UX 3 Task complete.</h6>
                        <small class="text-muted mb-0">Dummy text of the printing.</small>
                      </div>
                      <!--end media-body-->
                    </div>
                    <!--end media--> </a
                  ><!--end-item-->
                  <!-- item-->
                  <a href="#" class="dropdown-item py-3">
                    <small class="float-end text-muted ps-2">1 hr ago</small>
                    <div class="media">
                      <div class="avatar-md bg-soft-primary">
                        <img src="assets/images/users/user-5.jpg" alt="" class="thumb-sm rounded-circle" />
                      </div>
                      <div class="media-body align-self-center ms-2 text-truncate">
                        <h6 class="my-0 fw-normal text-dark">Your order is placed</h6>
                        <small class="text-muted mb-0">It is a long established fact that a reader.</small>
                      </div>
                      <!--end media-body-->
                    </div>
                    <!--end media--> </a
                  ><!--end-item-->
                  <!-- item-->
                  <a href="#" class="dropdown-item py-3">
                    <small class="float-end text-muted ps-2">2 hrs ago</small>
                    <div class="media">
                      <div class="avatar-md bg-soft-primary">
                        <i data-feather="check-circle" class="align-self-center icon-xs"></i>
                      </div>
                      <div class="media-body align-self-center ms-2 text-truncate">
                        <h6 class="my-0 fw-normal text-dark">Payment Successfull</h6>
                        <small class="text-muted mb-0">Dummy text of the printing.</small>
                      </div>
                      <!--end media-body-->
                    </div>
                    <!--end media--> </a
                  ><!--end-item-->
                </div>
                <!-- All-->
                <a href="javascript:void(0);" class="dropdown-item text-center text-primary"> View all <i class="fi-arrow-right"></i> </a>
              </div>
            </li>

            <li class="dropdown">
              <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <span class="ms-1 nav-user-name hidden-sm">{{Auth::user()->username}}</span>
                <img src="assets/images/users/user-5.jpg" alt="profile-user" class="rounded-circle thumb-xs" />
              </a>
              <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item" href="#"><i data-feather="user" class="align-self-center icon-xs icon-dual me-1"></i> Profile</a>
                <a class="dropdown-item" href="#"><i data-feather="settings" class="align-self-center icon-xs icon-dual me-1"></i> Settings</a>
                <div class="dropdown-divider mb-0"></div>
                <a class="dropdown-item" href="{{route('Logout')}}"><i data-feather="power" class="align-self-center icon-xs icon-dual me-1"></i> Logout</a>
              </div>
            </li>
          </ul>
          <!--end topbar-nav-->

          <ul class="list-unstyled topbar-nav mb-0">
            <li>
              <button class="nav-link button-menu-mobile">
                <i data-feather="menu" class="align-self-center topbar-icon"></i>
              </button>
            </li>
            <li class="creat-btn">
              <div class="nav-link">
                <a class="btn btn-sm btn-soft-primary" href="#" role="button"><i class="fas fa-plus me-2"></i>New Task</a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- end navbar-->
      </div>
      <div>
              @yield('content')
      </div>
      <!-- Top Bar End -->
          <footer class="footer text-center text-sm-start">
          &copy;
          <script>
            document.write(new Date().getFullYear());
          </script>
          Dastone <span class="text-muted d-none d-sm-inline-block float-end">Crafted with <i class="mdi mdi-heart text-danger"></i> by Mannatthemes</span>
        </footer>
        <!--end footer-->
      </div>
      <!-- end page content -->
    </div>
    <!-- end page-wrapper -->

    <!-- jQuery  -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/metismenu.min.js')}}"></script>
    <script src="{{asset('assets/js/waves.js')}}"></script>
    <script src="{{asset('assets/js/feather.min.js')}}"></script>
    <script src="{{asset('assets/js/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/js/moment.js')}}"></script>
    <script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>

    <script src="{{asset('assets/plugins/apex-charts/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jvectormap/jquery-jvectormap-us-aea-en.js')}}"></script>
    <script src="{{asset('assets/pages/jquery.analytics_dashboard.init.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/dataTables.bootstrap5.min.js')}}"></script>
    {{-- <script src="{{asset('assets/plugins/timepicker/bootstrap-material-datetimepicker.js')}}"></script> --}}
      <script src="{{asset('assets/plugins/select2/select2.min.js')}}"></script>
        <script src="{{asset('assets/plugins/huebee/huebee.pkgd.min.js')}}"></script>
        <script src="{{asset('assets/plugins/timepicker/bootstrap-material-datetimepicker.js')}}"></script>
        <script src="{{asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
        <script src="{{asset('assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js')}}"></script>


    <!-- Buttons examples -->
    <script src="{{asset('assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/buttons.bootstrap5.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/jszip.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/buttons.colVis.min.js')}}"></script>
    <!-- Responsive examples -->
    <script src="{{asset('assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/pages/jquery.datatable.init.js')}}"></script>
    <script src="{{asset('assets/pages/jquery.forms-advanced.js')}}"></script>


    <!-- App js -->
    <script src="{{asset('assets/js/app.js')}}"></script>
  </body>
</html>