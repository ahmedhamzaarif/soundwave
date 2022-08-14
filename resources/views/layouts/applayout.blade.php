<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SoundWave | Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('admin/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/vendors/typicons/typicons.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/vendors/simple-line-icons/css/simple-line-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/css/admin.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/js/select.dataTables.min.css') }}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('admin/css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('admin/images/logo/favicon.ico') }}">
  <!-- endinject -->
  
  <!-- bootstrap icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

  {{-- jquery --}}
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<style>
  select.form-control{background: white !important; color: #555 !important;}
  select.form-control:focus{border: 2px solid #ccc;}
  input.form-control:focus{border: 2px solid #ccc;}
</style>
<body>
  <div class="container-scroller">

  <!-- header here -->
  @include('partials.header')
  <!-- partial -->
  <div class="main-panel">
        <div class="content-wrapper">
            <!-- content goes here -->
            @yield('content')
        </div>
        <!-- content-wrapper ends -->

        <!-- footer here -->
        @include('partials.footer')
    </div>
    <!-- main-panel ends -->

  </div>
  <!-- container-scroller -->

  <!-- plugins:admin/js -->
  <script src="{{ asset('admin/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin admin/js for this page -->
  <script src="{{ asset('admin/vendors/chart.js/chart.min.js') }}"></script>
  <script src="{{ asset('admin/vendors/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('admin/vendors/progressbar.min.js') }}"></script>

  <!-- End plugin admin/js for this page -->
  <!-- inject:admin/js -->
  <script src="{{ asset('admin/js/off-canvas.js') }}"></script>
  <script src="{{ asset('admin/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('admin/js/template.js') }}"></script>
  <script src="{{ asset('admin/js/settings.js') }}"></script>
  <script src="{{ asset('admin/js/todolist.js') }}"></script>
  <!-- endinject -->
  <!-- Custom admin/js for this page-->
  <script src="{{ asset('admin/js/jquery.cookie.js') }}" type="text/javascript"></script>
  <script src="{{ asset('admin/js/dashboard.js') }}"></script>
  <script src="{{ asset('admin/js/Chart.roundedBarCharts.js') }}"></script>
  <!-- End custom admin/js for this page-->
</body>

</html>

