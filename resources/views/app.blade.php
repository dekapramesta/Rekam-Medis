<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>TelkoMedika</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    {{-- <link rel="shortcut icon" href="assets/images/favicon.ico" /> --}}
            <link rel="shortcut icon" href="assets/images/telko.jpg">


    <!-- jvectormap -->
    <link href="{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />

    <!-- App css -->
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
      <div class="d-flex brand">
       
         
            <img class="mt-3 ms-4" src="{{asset('assets/images/telko.jpg')}}" style="width: 70px; height: 50px ;"  alt="logo-small" class="logo-sm" />
            

          <h4 class="ms-3" style="margin-top: 13%">SIRM</h4>
          {{-- <span>
            <h4>SIRM</h4>
          </span> --}}
          {{-- <span>
            <img src="{{asset('assets/images/logo.png')}}" alt="logo-large" class="logo-lg logo-light" />
            <img src="{{asset('assets/images/logo-dark.png')}}" alt="logo-large" class="logo-lg logo-dark" />
          </span> --}}
        </a>
      </div>
      <!--end logo-->
      <div class="menu-content h-100" data-simplebar>
        <ul class="metismenu left-sidenav-menu">
          @if (Auth::user()->level == 1)
               <li class="menu-label mt-0">Main</li>
           <li class="mb-2">
            <a href="{{route('Admin')}}"><i data-feather="layers" class="align-self-center menu-icon"></i><span>Dashboard</span></a>
          </li>
            <li class="mb-2">
            <a href="{{route('DataPasien')}}"><i data-feather="layers" class="align-self-center menu-icon "></i><span>Patient Data</span></a>
          </li>
          
           <!-- <li class="mb-2">
            <a href="{{route('DataDokter.index')}}"><i data-feather="layers" class="align-self-center menu-icon"></i><span>Data Dokter</span></a>
          </li> -->
           <!-- <li class="mb-2">
            <a href="{{route('rekammedis')}}"><i data-feather="layers" class="align-self-center menu-icon"></i><span>Data Rekam Medis</span></a>
          </li> -->
          
           <!-- <li class="mb-2">
            <a href="{{route('poliklinik')}}"><i data-feather="layers" class="align-self-center menu-icon"></i><span>Data Poli</span></a>
          </li> -->
          <li class="mb-2">
            <a href="{{route('polispesifik',[1])}}"><i data-feather="layers" class="align-self-center menu-icon"></i><span>General Poly</span></a>
          </li>
          <li class="mb-2">
            <a href="{{route('polispesifik',[2])}}"><i data-feather="layers" class="align-self-center menu-icon"></i><span>Dental Poly</span></a>
          </li>
           <li class="mb-2">
            <a href="{{route('laporan')}}"><i data-feather="layers" class="align-self-center menu-icon"></i><span>Report</span></a>
          </li>
         
              
          @elseif(Auth::user()->level == 2)
                   <li class="mb-2 mt-3">
            <a href="{{route('superadmin')}}"><i data-feather="layers" class="align-self-center menu-icon"></i><span>User Data</span></a>
          </li>
            @elseif(Auth::user()->level == 3)
                   <li class="mb-2 mt-3">
            <a href="{{route('dokteruser')}}"><i data-feather="layers" class="align-self-center menu-icon"></i><span>Medical Record Data</span></a>
          </li>
          
          @endif
         
        </ul>
      </div>
    </div>
    <!-- end left-sidenav-->

    <div class="page-wrapper" >
      <!-- Top Bar Start -->
      <div class="topbar">
        <!-- Navbar -->
        <nav class="navbar-custom" style="background-color: #FDEFE0;">
          <ul class="list-unstyled topbar-nav float-end mb-0">
          

           

            <li class="dropdown">
              <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <span class="me-2 nav-user-name hidden-sm">{{Auth::user()->username}}</span>
                                <img src="@if (Auth::user()->foto== null)
                                    https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png
                                @else
                                    {{asset('/storage/fotoprofil/'.Auth::user()->foto)}}
                                @endif" alt="profile-user" class="rounded-circle thumb-xs" />

              </a>
              <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item" href="{{route('profile')}}"><i data-feather="user" class="align-self-center icon-xs icon-dual me-1"></i> Profile</a>
                {{-- <a class="dropdown-item" href="#"><i data-feather="settings" class="align-self-center icon-xs icon-dual me-1"></i> Settings</a> --}}
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