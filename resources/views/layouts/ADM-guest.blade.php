<!doctype html>
<html lang="en">


<!-- Mirrored from html.bdevs.net/paradox_prev/paradox/digital_agency.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Sep 2023 21:06:12 GMT -->

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('title')</title>


    @yield('meta_tags')
    <meta property='og:description' itemprop="description" name="twitter:description"
        content="Welcome to {{env('APP_NAME')}} – Where Creativity Meets Earnings! Join us, apply for exciting job listings, complete tasks, and start earning today. Your journey to success begins here.">
    <meta property='og:description' content="Welcome to {{env('APP_NAME')}} – Where Creativity Meets Earnings! Join us, apply for exciting job listings, complete tasks, and start earning today. Your journey to success begins here.">
    <meta name="description" content="Welcome to {{env('APP_NAME')}} – Where Creativity Meets Earnings! Join us, apply for exciting job listings, complete tasks, and start earning today. Your journey to success begins here.">
    <meta rel="canonical" content="{{ Request::root() }}">
    <meta property='og:url' content="{{ Request::root() }}">
    <meta property='og:type' content="website">
    <meta property='twitter:domain' content="{{ Request::root() }}">
    <meta name="robots" content="index, follow">
    <meta property='twitter:card' content="summary">
    <meta name='author' content="Onuoha Kingsley">
    {{-- <meta name="robots" content="index, follow">
    <meta name="description" content="{{blogInfo()->blog_description}}">
    <meta name='author' content="{{blogInfo()->blog_name}}">
    <meta name='title' content="{{blogInfo()->blog_name}}">
    <link rel="canonical" content="{{ Request::root()}}">
    <meta property='og:title' content="{{blogInfo()->blog_name}}">
    <meta property='og:type' content="website">
    <meta property='og:description' content="{{blogInfo()->blog_description}}">
    <meta property='og:url' content="{{Request::root()}}">
    <meta property='og:image' content="{{asset('user/assets/img/logo-blue.png')}}">
    <meta property='twitter:domain' content="{{Request::root()}}">
    <meta property='twitter:card' content="summary">
    <meta property='og:title' itemprop="name" name="twitter:title" content="{{blogInfo()->blog_name}}">
    <meta property='og:description' itemprop="description" name="twitter:description" content="{{blogInfo()->blog_description}}"> --}}
    <link rel="shortcut icon" href="{{ asset('guest/assets/images/logo/favourite_icon.svg') }}">

    <!-- Fraimwork - CSS Include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/assets/css/bootstrap.min.css') }}">

    <!-- Icon Font - CSS Include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/assets/css/fontawesome-pro.css') }}">

    <!-- Animation - CSS Include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/assets/css/animate.css') }}">

    <!-- Meanmenu - CSS Include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/assets/css/meanmenu.min.css') }}">

    <!-- Cursor - CSS Include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/assets/css/cursor.css') }}">

    <!-- Carousel - CSS Include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/assets/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/assets/css/slick-theme.css') }}">

    <!-- Video & Image Popup - CSS Include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/assets/css/magnific-popup.css') }}">

    <!-- Select - CSS Include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/assets/css/nice-select.css') }}">

    <!-- Counter - CSS Include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/assets/css/odometer.css') }}">

    <!-- Custom - CSS Include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/assets/css/style.css') }}">
    @stack('style')
    @livewireStyles
</head>

<body>

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
                                <img src="{{ asset('guest/assets/images/logo/site_logo_white.svg') }}"
                                    alt="logo not found" />
                            </a>
                        </div>
                        <div class="offcanvas__close">
                            <svg class="menu-close-btn" xmlns="http://www.w3.org/2000/svg" width="33.666"
                                height="33.666" viewBox="0 0 33.666 33.666">
                                <path d="m1.414 1.414 30.83763383 30.83763383"></path>
                                <path d="M1.414 32.252 32.25163383 1.41436617"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mobile-menu fix mb-4"></div>
                    <div class="offcanvas__contact text-center">
                        <h4 class="offcanvas__title">Contact Info</h4>
                        <div class="offcanvas__contact-text mb-2">
                            <p>
                                <a href="https://html.bdevs.net/cdn-cgi/l/email-protection#a2d2c3d0c3c6cddae2c7dac3cfd2cec7"
                                    target="_blank"><span class="__cf_email__"
                                        data-cfemail="92e2f3e0f3f6fdead2f7eaf3ffe2fef7bcf1fdff">[email&#160;protected]</span></a>
                            </p>
                            <span><a href="tel:725214456">725 214 456</a></span>
                        </div>
                        <div class="offcanvas__contact-text">
                            <p>
                                <a target="_blank" href="https://www.google.com/maps">Folkungagatan 83, Stockholm,
                                    Sweden</a>
                            </p>
                        </div>
                    </div>
                    <div class="offcanvas__devider"></div>
                    <div class="offcanvas__social">
                        <ul>
                            <li>
                                <a target="_blank" href="https://www.facebook.com/">Facebook</a>
                            </li>
                            <li>
                                <a target="_blank" href="https://www.instagram.com/">Instagram</a>
                            </li>
                            <li>
                                <a target="_blank" href="https://www.twitter.com/">Twitter</a>
                            </li>
                            <li>
                                <a target="_blank" href="https://www.linkedin.com/">Linkedin</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas__overlay"></div>
    <div class="offcanvas__overlay-white"></div>
    <!-- Offcanvas area start -->

    <!-- Body Wrap - Start -->
    <div class="page_wrapper">
        <!-- Back to Top Button Fixed - Start -->
        <div class="backtotop position-fixed text-center">
            <a href="#" class="scroll">
                <i class="far fa-arrow-up"></i>
            </a>
        </div>
        <!-- Back to Top Button Fixed - End -->

        <x-ADM_guest-header />
        <!-- Main Body - Start
      ================================================== -->
        <main class="page_content">
            @yield('content')
        </main>
        <!-- Main Body - Start
      ================================================== -->

         <!-- Site Footer - Start
      ================================================== -->
      <footer class="site_footer style_3">
        <div class="footer_widget_area bg_dark_3">
            <div class="container">
                <div class="row justify-content-lg-between">
                    <div class="col col-lg-4 col-md-6">
                        <div class="footer_widget pe-lg-5">
                            <div class="site_logo">
                                <a class="site_link" href="index.html">
                                    <img
                                        src="{{asset('guest/assets/images/logo/site_logo_white.svg')}}"
                                        alt="Site Logo - Paradox - Agency Template"
                                    />
                                </a>
                            </div>
                            <p>
                                Our action plan is focused and planned.
                                We are result oriented organization
                            </p>
                            <div class="social_wrap d-block">
                                <h3 class="social_title mb-2">
                                    Follow Us:
                                </h3>
                                <ul
                                    class="social_icon unordered_list mb-0"
                                >
                                    <li>
                                        <a href="{{appSetting('app_facebook')}}"
                                            ><i
                                                class="fab fa-facebook-f"
                                            ></i
                                        ></a>
                                    </li>
                                    <li>
                                        <a href="{{appSetting('app_youtube')}}"
                                            ><i
                                                class="fab fa-youtube"
                                            ></i
                                        ></a>
                                    </li>
                                    <li>
                                        <a href="{{appSetting('app_instagram')}}"
                                            ><i
                                                class="fab fa-instagram"
                                            ></i
                                        ></a>
                                    </li>
                                    <li>
                                        <a href="{{appSetting('app_linkedin')}}"
                                            ><i
                                                class="fab fa-linkedin"
                                            ></i
                                        ></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-2 col-md-6">
                        <div class="footer_widget">
                            <h3 class="footer_widget_title text-white">
                                Join Us
                            </h3>
                            <ul class="page_list unordered_list_block">
                                <li>
                                    <a href="{{route('login')}}">
                                        <span class="list_item_icon">
                                            <i
                                                class="fas fa-circle"
                                            ></i>
                                        </span>
                                        <span class="list_item_text"
                                            >Login</span
                                        >
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col col-lg-2 col-md-6">
                        <div class="footer_widget">
                            <h3 class="footer_widget_title text-white">
                                About
                            </h3>
                            <ul class="page_list unordered_list_block">
                                <li>
                                    <a href="#">
                                        <span class="list_item_icon">
                                            <i
                                                class="fas fa-circle"
                                            ></i>
                                        </span>
                                        <span class="list_item_text"
                                            >About Us</span
                                        >
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col col-lg-3 col-md-6">
                        <div class="footer_widget">
                            <h3 class="footer_widget_title text-white">
                                Newsletter
                            </h3>
                            <form method="POST" action="{{route('guest.newsletter_subscription')}}">
                                @csrf
                                <div class="small_newsletter_form">
                                    <input
                                    name="email"
                                        type="email"
                                        placeholder="Email Adreess"
                                    />
                                    <button type="submit">
                                        <i
                                            class="far fa-arrow-right"
                                        ></i>
                                    </button>
                                </div>
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                <div class="form-check mb-0">
                                    <input
                                        type="checkbox"
                                        id="checkMeOut"
                                    />
                                    <label for="checkMeOut"
                                        >Check me out</label
                                    >
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom bg_dark_2">
            <div class="container">
                <div class="copyright_widget">
                    Copyright © 2023 by
                    <a
                        target="_blank"
                        href="#"
                        ><u>{{appSetting('app_name')}}</u></a
                    >
                    All Rights Reserved.
                </div>
                <ul class="page_list unordered_list">
                    <li>
                        <a href="#">
                            <span class="list_item_text"
                                >Terms & Condition</span
                            >
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="list_item_icon">
                                <i class="fas fa-circle"></i>
                            </span>
                            <span class="list_item_text"
                                >Policy & Privacy</span
                            >
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    <!-- Site Footer - End
================================================== -->
    </div>


    <!-- Fraimwork - Jquery Include -->
    <script data-cfasync="false" src="{{ asset('guest/email-decode.min.js') }}"></script>
    <script src="{{ asset('guest/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('guest/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('guest/assets/js/bootstrap-dropdown-ml-hack.js') }}"></script>

    <!-- animation - jquery include -->
    <script src="{{ asset('guest/assets/js/cursor.js') }}"></script>
    <script src="{{ asset('guest/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('guest/assets/js/tilt.min.js') }}"></script>
    <script src="{{ asset('guest/assets/js/parallax.min.js') }}"></script>
    <script src="{{ asset('guest/assets/js/parallax-scroll.js') }}"></script>

    <!-- Carousel - Jquery Include -->
    <script src="{{ asset('guest/assets/js/slick.min.js') }}"></script>

    <!-- Video & Image Popup - Jquery Include -->
    <script src="{{ asset('guest/assets/js/magnific-popup.min.js') }}"></script>

    <!-- Select - Jquery Include -->
    <script src="{{ asset('guest/assets/js/nice-select.min.js') }}"></script>

    <!-- Counter - Jquery Include -->
    <script src="{{ asset('guest/assets/js/appear.js') }}"></script>
    <script src="{{ asset('guest/assets/js/odometer.min.js') }}"></script>

    <!-- Isotope Filter - Jquery Include -->
    <script src="{{ asset('guest/assets/js/isotope.pkgd.min.js') }}"></script>

    <!-- Meanmenu Filter - Jquery Include -->
    <script src="{{ asset('guest/assets/js/meanmenu.min.js') }}"></script>

    <!-- Masonry - Jquery Include -->
    <script src="{{ asset('guest/assets/js/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('guest/assets/js/imagesloaded.pkgd.min.js') }}"></script>

    <!-- Countdown Timer - jquery include -->
    <script src="{{ asset('guest/assets/js/countdown.js') }}"></script>

    <!-- Type - jquery include -->
    <script src="{{ asset('guest/assets/js/type.js') }}"></script>

    <!-- Setting - jquery include -->
    <script src="{{ asset('guest/assets/js/setting.js') }}"></script>

    <!-- Custom - Jquery Include -->
    <script src="{{ asset('guest/assets/js/main.js') }}"></script>
    @stack('script')
    @livewireScripts
</body>

<!-- Mirrored from html.bdevs.net/paradox_prev/paradox/digital_agency.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Sep 2023 21:06:32 GMT -->

</html>
