{{-- <!doctype html>
<html lang="en">

  
<!-- Mirrored from html.bdevs.net/paradox_prev/paradox/comming_soon.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Sep 2023 21:08:50 GMT -->
<head>

  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  	<meta http-equiv="x-ua-compatible" content="ie=edge">

    <title> Paradox - Creative Agency HTML5 Template</title>
  	<link rel="shortcut icon" href="{{asset('guest/assets/images/logo/favourite_icon.svg')}}">

    <!-- Fraimwork - CSS Include -->
    <link rel="stylesheet" type="text/css" href="{{asset('guest/assets/css/bootstrap.min.css')}}">

    <!-- Icon Font - CSS Include -->
    <link rel="stylesheet" type="text/css" href="{{asset('guest/assets/css/fontawesome-pro.css')}}">

    <!-- Animation - CSS Include -->
    <link rel="stylesheet" type="text/css" href="{{asset('guest/assets/css/animate.css')}}">

    <!-- Meanmenu - CSS Include -->
    <link rel="stylesheet" type="text/css" href="{{asset('guest/assets/css/meanmenu.min.css')}}">

    <!-- Cursor - CSS Include -->
    <link rel="stylesheet" type="text/css" href="{{asset('guest/assets/css/cursor.css')}}">

    <!-- Carousel - CSS Include -->
    <link rel="stylesheet" type="text/css" href="{{asset('guest/assets/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('guest/assets/css/slick-theme.css')}}">

    <!-- Video & Image Popup - CSS Include -->
    <link rel="stylesheet" type="text/css" href="{{asset('guest/assets/css/magnific-popup.css')}}">

    <!-- Select - CSS Include -->
    <link rel="stylesheet" type="text/css" href="{{asset('guest/assets/css/nice-select.css')}}">

    <!-- Counter - CSS Include -->
    <link rel="stylesheet" type="text/css" href="{{asset('guest/assets/css/odometer.css')}}">

    <!-- Custom - CSS Include -->
    <link rel="stylesheet" type="text/css" href="{{asset('guest/assets/css/style.css')}}">

  </head>


  <body>

    <!-- Body Wrap - Start -->
    <div class="page_wrapper">

    <!-- Preloder start -->
    <div id="preloader">
      <div class="sk-three-bounce">
          <div class="sk-child sk-bounce1"></div>
          <div class="sk-child sk-bounce2"></div>
          <div class="sk-child sk-bounce3"></div>
      </div>
    </div>
    <!-- Preloder start -->

    <!-- Offcanvas area start -->
    <div class="fix">
        <div class="offcanvas__info">
          <div class="offcanvas__wrapper">
              <div class="offcanvas__content">
                <div class="offcanvas__top mb-4 d-flex justify-content-between align-items-center">
                    <div class="offcanvas__logo">
                      <a href="index.html">
                      <img src="{{asset('guest/assets/images/logo/site_logo_white.svg')}}" alt="logo not found">
                      </a>
                    </div>
                    <div class="offcanvas__close">
                      <svg class="menu-close-btn" xmlns="http://www.w3.org/2000/svg" width="33.666" height="33.666" viewBox="0 0 33.666 33.666"><path d="m1.414 1.414 30.83763383 30.83763383"></path><path d="M1.414 32.252 32.25163383 1.41436617"></path></svg>
                    </div>
                </div>
                <div class="mobile-menu fix mb-4"></div>
                <div class="offcanvas__contact text-center">
                    <h4 class="offcanvas__title">Contact Info</h4>
                    <div class="offcanvas__contact-text mb-2">
                      <p><a href="https://html.bdevs.net/cdn-cgi/l/email-protection#4131203320252e39012439202c312d24" target="_blank"><span class="__cf_email__" data-cfemail="4f3f2e3d2e2b20370f2a372e223f232a612c2022">[email&#160;protected]</span></a></p>
                      <span><a href="tel:725214456">725 214 456</a></span>
                    </div>
                    <div class="offcanvas__contact-text">
                      <p><a target="_blank" href="https://www.google.com/maps">Folkungagatan 83, Stockholm, Sweden</a></p>
                    </div>
                </div>
                <div class="offcanvas__devider"></div>
                <div class="offcanvas__social">
                    <ul>
                      <li><a target="_blank" href="https://www.facebook.com/">Facebook</a></li>
                      <li><a target="_blank" href="https://www.instagram.com/">Instagram</a></li>
                      <li><a target="_blank" href="https://www.twitter.com/">Twitter</a></li>
                      <li><a target="_blank" href="https://www.linkedin.com/">Linkedin</a></li>
                    </ul>
                </div>
              </div>
          </div>
        </div>
    </div>
    <div class="offcanvas__overlay"></div>
    <div class="offcanvas__overlay-white"></div>
    <!-- Offcanvas area start -->

      <!-- Main Body - Start
      ================================================== -->
      <main class="page_content"> --}}

@extends('layouts.ADM-guest')
@section('title')
    {{ ucwords(appSetting('app_name')) }} | Coming Soon
@endsection
@section('meta_tags')
    <meta name='title' content=" {{ ucwords(appSetting('app_name')) }} | Coming Soon">
    <meta property='og:title' content=" {{ ucwords(appSetting('app_name')) }} | Coming Soon">
    <meta property='og:image' content="{{ asset('user/assets/img/logo-blue.png') }}">
    <meta property='og:title' itemprop="name" name="twitter:title" content=" {{ ucwords(appSetting('app_name')) }} | Coming Soon">
@endsection
@push('style')
    <!-- Counter - CSS Include -->
    <link rel="stylesheet" type="text/css" href="{{asset('guest/assets/css/odometer.css')}}">

@endpush


@section('content')
   <livewire:coming-soon />

@endsection

@push('script')
    
    <!-- Countdown Timer - jquery include -->
    <script src="{{asset('guest/assets/js/countdown.js')}}"></script>

    <!-- Type - jquery include -->
    <script src="{{asset('guest/assets/js/type.js')}}"></script>

    <!-- Setting - jquery include -->
    <script src="{{asset('guest/assets/js/setting.js')}}"></script>

    <!-- Custom - Jquery Include -->
    <script src="{{asset('guest/assets/js/main.js')}}"></script>
@endpush
    {{-- 
      </main>
      <!-- Main Body - End
      ================================================== -->

    </div>
    <!-- Body Wrap - End -->

    <!-- Fraimwork - Jquery Include --></script><script src="{{asset('guest/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('guest/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('guest/assets/js/bootstrap-dropdown-ml-hack.js')}}"></script>

    <!-- animation - jquery include -->
    <script src="{{asset('guest/assets/js/cursor.js')}}"></script>
    <script src="{{asset('guest/assets/js/wow.min.js')}}"></script>
    <script src="{{asset('guest/assets/js/tilt.min.js')}}"></script>
    <script src="{{asset('guest/assets/js/parallax.min.js')}}"></script>
    <script src="{{asset('guest/assets/js/parallax-scroll.js')}}"></script>

    <!-- Carousel - Jquery Include -->
    <script src="{{asset('guest/assets/js/slick.min.js')}}"></script>

    <!-- Video & Image Popup - Jquery Include -->
    <script src="{{asset('guest/assets/js/magnific-popup.min.js')}}"></script>

    <!-- Select - Jquery Include -->
    <script src="{{asset('guest/assets/js/nice-select.min.js')}}"></script>
    
    <!-- Counter - Jquery Include -->
    <script src="{{asset('guest/assets/js/appear.js')}}"></script>
    <script src="{{asset('guest/assets/js/odometer.min.js')}}"></script>

    <!-- Isotope Filter - Jquery Include -->
    <script src="{{asset('guest/assets/js/isotope.pkgd.min.js')}}"></script>

    <!-- Meanmenu Filter - Jquery Include -->
    <script src="{{asset('guest/assets/js/meanmenu.min.js')}}"></script>

    <!-- Masonry - Jquery Include -->
    <script src="{{asset('guest/assets/js/masonry.pkgd.min.js')}}"></script>
    <script src="{{asset('guest/assets/js/imagesloaded.pkgd.min.js')}}"></script>

    <!-- Countdown Timer - jquery include -->
    <script src="{{asset('guest/assets/js/countdown.js')}}"></script>

    <!-- Type - jquery include -->
    <script src="{{asset('guest/assets/js/type.js')}}"></script>

    <!-- Setting - jquery include -->
    <script src="{{asset('guest/assets/js/setting.js')}}"></script>

    <!-- Custom - Jquery Include -->
    <script src="{{asset('guest/assets/js/main.js')}}"></script>

  </body>

<!-- Mirrored from html.bdevs.net/paradox_prev/paradox/comming_soon.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Sep 2023 21:08:50 GMT -->
</html> --}}