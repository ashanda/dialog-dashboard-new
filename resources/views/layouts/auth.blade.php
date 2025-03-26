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
</head>

<body class="bg-default">
  @include('sweetalert::alert')
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
      <div class="container px-4">
        
       
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
          <!-- Collapse header -->
          <div class="navbar-collapse-header d-md-none">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a class="navbar-brand" href="{{ asset('index.html') }}">
                  <img src="{{ asset('assets/img/logo/sayuru-blue.png') }}">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
         
        </div>
      </div>
    </nav>
    <!-- Header -->
    @if(!Route::is('live.fishers') && !Route::is('emails.insurance'))
    <div class="header bg-gradient-primary py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              
                  <a href="{{ asset('index.html') }}">
                      <img src="{{ asset('assets/img/logo/sayuru.png') }}" class="logo-center">
                  </a>
              
              
             
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    @endif
    <!-- Page content -->
    @yield('login_form')
    @yield('register_form')
    @yield('content')
  </div>
  <!--   Core   -->
  <script src="{{ asset('assets/js/plugins/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="{{ asset('assets/js/argon-dashboard.min.js?v=1.1.2') }}"></script>
>
  @yield('scripts_links')
</body>

</html>