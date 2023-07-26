<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Sayuru
  </title>
  <!-- Favicon -->
  <link href="{{ asset('assets/img/logo/fav.png') }}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{ asset('assets/js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{ asset('assets/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
  <!-- SweetAlert CSS -->
  @yield('header_links')

</head>

<body class="">
  @include('sweetalert::alert')
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="">
        <img src="{{ asset('assets/img/logo/sayuru-blue.png') }}" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="{{ asset('assets/img/logo/dialog.png') }}">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="{{ route('admin.users_edit',Auth::user()->id) }}" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            
            
            
            <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="ni ni-user-run"></i>
                <span>Logout</span>
               </a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
              </form>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="index.html">
                <img src="{{ asset('assets/img/logo/sayuru-blue.png') }}">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>

        <!-- Navigation -->
        @include('layouts.sidebar')
        
        <!-- End Navigation -->

      </div>
    </div>
  </nav>
  <div class="main-content">
    <!-- Navbar -->
    @include('layouts.header')
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
            @yield('dashboard')
    </div>
    
    @yield('content')
  </div>
  <!--   Core   -->
  <script src="{{ asset('assets/js/plugins/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <!--   Optional JS   -->
  <script src="{{ asset('assets/js/plugins/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/chart.js/dist/Chart.extension.js') }}"></script>
  <!--   Argon JS   -->
  <script src="{{ asset('assets/js/argon-dashboard.min.js?v=1.1.2') }}"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js') }}"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
  @yield('scripts_links')
</body>

</html>