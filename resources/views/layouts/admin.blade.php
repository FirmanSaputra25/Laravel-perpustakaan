<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Firman Library</title>

  <!-- Google Font: Source Sans Pro -->
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset ('asset/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('asset/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset ('asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  @yield('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{ asset ('asset/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60"
        width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        <li class="nav-item">
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{asset('asset/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Firman Saputra</a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-4">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            {{-- <li class="nav-item">
              <a href="{{url ('home')}}" class="nav-link {{request ()->is('home')? 'active' : ""}}">
                <ion-icon name="home-outline"></ion-icon>
                <p>
                  Home

                </p>
              </a>
            </li> --}}
            <li class="nav-item">
              <a href="{{url ('dashboard')}}" class="nav-link {{request ()->is('dashboard')? 'active' : ""}}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard

                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url ('catalogs')}}" class="nav-link {{request ()->is('catalogs')? 'active' : ""}}">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Catalog

                </p>

              </a>
            </li>
            <li class="nav-item">
              <a href="{{url ('publishers')}}" class="nav-link {{request ()->is('publishers')? 'active' : ""}}">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Publisher

                </p>

              </a>
            </li>
            <li class="nav-item">
              <a href="{{url ('authors')}}" class="nav-link {{request ()->is('authors')? 'active' : ""}}">
                <i class="nav-icon fas fa-bookmark"></i>
                <p>
                  Author

                </p>

              </a>
            </li>
            <li class="nav-item">
              <a href="{{url ('books')}}" class="nav-link {{request ()->is('books')? 'active' : ""}}">
                <i class="nav-icon fas fa-book-open"></i>
                <p>
                  Book

                </p>

              </a>
            </li>
            <li class="nav-item">
              <a href="{{url ('members')}}" class="nav-link {{request ()->is('members')? 'active' : ""}}">
                <i class="nav-icon fas fa-clipboard"></i>
                <p>
                  Member

                </p>

              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('peminjaman') }}" class="nav-link {{ request()->is('peminjaman') ? 'active' : '' }}">
                <i class="nav-icon fas fa-clipboard"></i>
                <p>
                  Peminjaman
                </p>
              </a>
            </li>
            {{-- <li class="nav-item">
              <a href="{{ url('transcactions') }}"
                class="nav-link {{ request()->is('transcactions*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-clipboard"></i>
                <p>
                  Transcation
                </p>
              </a>
            </li> --}}
          </ul>
        </nav>

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">

      <!-- Content Header (Page header) -->
      <h1 class="m-0"> @yield('header')</h1>
      <div class="content-header"> @yield('content')
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">

            </div>
          </div>
        </div>
      </div>


      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->


    <!-- jQuery -->
    <script src="{{asset('asset/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('asset/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

    <!-- Bootstrap 4 -->
    <script src="{{ asset('asset/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('asset/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset ('asset/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset ('asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset ('asset/dist/js/adminlte.js')}}"></script>
    <script src="https://unpkg.com/vue@3"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Menggunakan jQuery dan Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @yield('js')
</body>

</html>