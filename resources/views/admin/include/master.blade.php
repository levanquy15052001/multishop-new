
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76"  href="{{asset('admin/assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png"  href="{{asset('admin/assets/img/favicon.png')}}">
  <title>
   MultiShop
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{asset('admin/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link  href="{{asset('admin/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle"  href="{{asset('admin/assets/css/material-dashboard.css?v=3.1.0')}}" rel="stylesheet" />
  <link id="pagestyle"  href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
</head>
<body class="g-sidenav-show  bg-gray-200">
    <!-- Menu -->
        @include('admin.include.menu')
    <!--End Menu -->

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
        @include('admin.include.navbar')
    <!-- End Navbar -->
    <div class="container-fluid py-4">

        @yield('admin_dashboard')    
      
    </div>
      
      <!--Footer -->
        @include('admin.include.footer')
       <!-- End Footer -->

    </div>
  </main>

    <!--fixed -->
    @include('admin.include.fixed')
  <!-- End fixed -->

  <!--   Core JS Files   -->
  <script src="{{asset('admin/assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('admin/assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('admin/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('admin/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script src="{{asset('admin/assets/js/plugins/chartjs.min.js')}}"></script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('admin/assets/js/material-dashboard.min.js?v=3.1.0')}}"></script>
</body>

</html>