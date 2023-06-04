<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta id="csrf-token" name="csrf-token" content="{{ csrf_token() }}">
  <meta name="author" content="HIGH SCHOOL MANAGEMENT SYSTEM">
  <title> @yield('page_title') | {{ config('app.name') }} </title>

    {{-- link from internal folder, style to backend --}}
    @include("backends.partials.inc_top")
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> --}}

  <!-- Navbar -->
  @include('backends.partials.inc_navbar_top')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('backends.partials.inc_sidebar_left')

  <!-- Content Wrapper. Contains page content -->
  @yield('content')


  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

    // link script goes here
    @include('backends.partials.inc_bottom')
</body>
</html>
