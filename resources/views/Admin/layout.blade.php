<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Design App</title>




  <link rel="stylesheet" href=" {{ asset('admin/css/bootstrap.min.css') }}  ">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href=" {{ asset('admin/css/fontawesome.all.css') }}  ">
  <!-- Theme style -->
  <link rel="stylesheet" href=" {{ asset('admin/css/adminlte.css') }} ">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  {{-- ionicons css --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"
    integrity="sha512-JApjWRnfonFeGBY7t4yq8SWr1A6xVYEJgO/UMIYONxaR3C9GETKUg0LharbJncEzJF5Nmiv+Pr5QNulr81LjGQ=="
    crossorigin="anonymous" />

  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.css"
    integrity="sha512-2e0Kl/wKgOUm/I722SOPMtmphkIjECJFpJrTRRyL8gjJSJIP2VofmEbqyApMaMfFhU727K3voz0e5EgE3Zf2Dg=="
    crossorigin="anonymous" />


  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.min.css"
    integrity="sha512-tjNtfoH+ezX5NhKsxuzHc01N4tSBoz15yiML61yoQN/kxWU0ChLIno79qIjqhiuTrQI0h+XPpylj0eZ9pKPQ9g=="
    crossorigin="anonymous" />

  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css"
    integrity="sha512-63+XcK3ZAZFBhAVZ4irKWe9eorFG0qYsy2CaM5Z+F3kUn76ukznN0cp4SArgItSbDFD1RrrWgVMBY9C/2ZoURA=="
    crossorigin="anonymous" />

  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
    integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw=="
    crossorigin="anonymous" />




  @yield('Css')

</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper ">

    <!-- Navbar -->
    <x-navbar></x-navbar>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4  ">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="{{ asset('admin/img/logo.png') }} " alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">Design App </span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src=" {{ asset('admin/img/user-profile.jpg') }} " class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item">
              <a href="{{ url('/dashboard') }} " class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Home
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ url('/dashboard/packages') }} " class="nav-link">
                <i class="nav-icon fas fa-box-open"></i>
                <p>
                  Packages
                </p>
              </a>
            </li>


            <li class="nav-item">
              <a href="{{ url('/dashboard/cats') }} " class="nav-link">
                <i class="nav-icon fas fa-list-ol"></i>
                <p>
                  Categories
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ url('/dashboard/designs') }} " class="nav-link">
                <i class="nav-icon fas fa-brush"></i>
                <p>
                  Desgins
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ url('/dashboard/competitions') }} " class="nav-link">
                <i class="nav-icon fas fa-award"></i>
                <p>
                  Competitions
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/dashboard/orders') }} " class="nav-link">
                <i class="nav-icon fab fa-first-order"></i>
                <p>
                  Orders
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ url('/dashboard/users') }} " class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Users
                </p>
              </a>
            </li>

            @if (Auth::user()->rule->name == 'super_admin')

              <li class="nav-item">
                <a href="{{ url('/dashboard/admins') }} " class="nav-link">
                  <i class="nav-icon fas fa-user-cog"></i>
                  <p>
                    Admins
                  </p>
                </a>
              </li>
            @endif

            <li class="nav-item">
              <a href="{{ url('/dashboard/messages') }} " class="nav-link">
                <i class="nav-icon fas fa-envelope-open"></i>
                <p>
                  Messages
                </p>
              </a>
            </li>




          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"> @yield('head') </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active"> @yield('head')</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            @yield('content')
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">

      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2021 <a href="https://adminlte.io">Ahmed Salah</a>.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src=" {{ asset('admin/js/jquery.min.js') }} "></script>
  <!-- Bootstrap 4 -->
  {{-- <script src="  {{ asset('admin/js/bootstrap.min.js') }} "></script> --}}

  <script src="  {{ asset('admin/js/bootstrap.bundle.js') }} "></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('admin/js/adminlte.js') }}"></script>

  {{-- ionicons js --}}
  {{-- <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script> --}}


  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>

  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"
    integrity="sha512-GDey37RZAxFkpFeJorEUwNoIbkTwsyC736KNSYucu1WJWFK9qTdzYub8ATxktr6Dwke7nbFaioypzbDOQykoRg=="
    crossorigin="anonymous"></script>


  <script>
    $('#logout').click(function(e) {
      e.preventDefault();

      $('#logout_form').submit()

    });

  </script>



  @yield('Script')
</body>

</html>
