<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <meta content="" name="description">
        <meta content="" name="keywords">
      
        <!-- Favicons -->
        <link href="/frontend/assets/img/favicon.png" rel="icon">
        <link href="/frontend/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
      
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
      
        <!-- Vendor CSS Files -->
        <link href="/frontend/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
        <link href="/frontend/assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="/frontend/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="/frontend/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="/frontend/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="/frontend/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
      
        <!-- Template Main CSS File -->
        <link href="/frontend/assets/css/style.css" rel="stylesheet">
        <style>
          .offcanvas-end{
              width: 300px;
          }
        </style>

    </head>
    
<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+855 xxxxxxxxxxx</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="{{ url('/') }}">Flattern</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="/frontend/assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <!-- Authentication Links -->
          @guest
              @if (Route::has('register'))
                  <li>
                      <button class="btn btn-default" type="button" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                      <a href="{{ route('register') }}">{{ __('Register New User') }}</a>
                      </button>
                  </li>
              @endif
              @if (Route::has('login'))
                  <button class="btn btn-default" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">{{ __('Login') }}</button>
                  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                      <div class="offcanvas-header" style="background-color: #f8f6f5;">
                          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                      </div>
                      <div class="offcanvas-body">
                          <div class="text-md-center">
                              <h2>{{ __('Login') }}</h2>
                          </div>

                          <div class="card-body">
                              <form method="POST" action="{{ route('login') }}">
                                  @csrf
                                  <div class="row">
                                      <div class="col my-2">
                                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          
                                          @error('email')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
          
                                  <div class="row">
                                      <div class="col my-2">
                                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
          
                                          @error('password')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
          
                                  <div class="row">
                                      <div class="col my-2">
                                          <div class="form-check">
                                              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
          
                                              <label class="form-check-label" for="remember">
                                                  {{ __('Remember Me') }}
                                              </label>
                                          </div>
                                      </div>
                                  </div>
          
                                  <div class="row">
                                      <div class="col text-md-center">
                                          <button type="submit" class="btn btn-primary">
                                              {{ __('Login') }}
                                          </button>
          
                                          @if (Route::has('password.request'))
                                              <a class="btn btn-link" href="{{ route('password.request') }}">
                                                  {{ __('Forgot Your Password?') }}
                                              </a>
                                          @endif
                                      </div>
                                  </div>
                              </form>
                          </div>
                          
                      </div>
                  </div>
                  {{-- <li>
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li> --}}
              @endif
          @else
              <li><a href="{{ url('/home') }}">Home</a></li>
              <li><a href="{{ url('/projects') }}">Project</a></li>
              <li><a href="{{ url('/products') }}">Product</a></li>
              <li><a href="{{ url('/staffs') }}">Staff</a></li>
              <li class="dropdown"><a href="#"><span>Profile</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                  <li class="nav-item dropdown">
                      <a>
                          {{ Auth::user()->name }}
                      </a>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </li>
              </ul>
              </li>
          @endguest
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      @guest
        <div>
          <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">MENU</button>

          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
              <div class="offcanvas-header">
                  <h5 id="offcanvasRightLabel">Offcanvas right</h5>
                  <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
                  <li><a href="{{ url('/products') }}">Product</a></li>
                  <li><a href="{{ url('/staffs') }}">Staff</a></li>
              </div>
          </div>
        </div>
      @else
        <div>
          <ul>
              <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">MENU</button>

              <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                  <div class="offcanvas-header">
                      <h5 id="offcanvasRightLabel">Offcanvas right</h5>
                      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>
                  <div class="offcanvas-body">
                      <li><a href="{{ url('/products/lists') }}">Search Product</a></li>
                      <li><a href="{{ url('/staffs') }}">Search Staff</a></li>
                  </div>
              </div>
          </ul>
        </div>
      @endguest
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->
  
    <!-- ======= Hero Section ======= -->
    <main class="py-4">
        @yield('content')
    </main>
  
    <!-- ======= Footer ======= -->
    <footer id="footer">
  
      <div class="footer-top">
        <div class="container">
          <div class="row">
  
            <div class="col-lg-3 col-md-6 footer-contact">
              <h3>Flattern</h3>
              <p>
                A108 Adam Street <br>
                New York, NY 535022<br>
                United States <br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
            </div>
  
            <div class="col-lg-2 col-md-6 footer-links">
              <h4>Useful Links</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
              </ul>
            </div>
  
            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Our Services</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
              </ul>
            </div>
  
            <div class="col-lg-4 col-md-6 footer-newsletter">
              <h4>Join Our Newsletter</h4>
              <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
              <form action="" method="post">
                <input type="email" name="email"><input type="submit" value="Subscribe">
              </form>
            </div>
  
          </div>
        </div>
      </div>
  
      <div class="container d-md-flex py-4">
  
        <div class="me-md-auto text-center text-md-start">
          <div class="copyright">
            &copy; Copyright <strong><span>Flattern</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flattern-multipurpose-bootstrap-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>
    </footer><!-- End Footer -->
  
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
    <!-- Vendor JS Files -->
    <script src="/frontend/assets/vendor/aos/aos.js"></script>
    <script src="/frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/frontend/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/frontend/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/frontend/assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="/frontend/assets/vendor/php-email-form/validate.js"></script>
  
    <!-- Template Main JS File -->
    <script src="/frontend/assets/js/main.js"></script>
  
  </body>
</html>
