<!DOCTYPE html>

<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<head>
    <title>
        @if (isset($title))
            {{ $title }}
        @else
            @yield('title', ucwords(appSetting('app_name')))
        @endif
    </title>
    @yield('meta_tags')
    <meta property='og:description' itemprop="description" name="twitter:description"
        content="Welcome to {{env("app_name")}}  – Where Creativity Meets Earnings! Join us, apply for exciting job listings, complete tasks, and start earning today. Your journey to success begins here.">
    <meta property='og:description'
        content="Welcome to {{env("app_name")}}  – Where Creativity Meets Earnings! Join us, apply for exciting job listings, complete tasks, and start earning today. Your journey to success begins here.">
    <meta name="description"
        content="Welcome to {{env("app_name")}}  – Where Creativity Meets Earnings! Join us, apply for exciting job listings, complete tasks, and start earning today. Your journey to success begins here.">
    <meta rel="canonical" content="{{ Request::root() }}">
    <meta property='og:url' content="{{ Request::root() }}">
    <meta property='og:type' content="website">
    <meta property='twitter:domain' content="{{ Request::root() }}">
    <meta name="robots" content="index, follow">
    <meta property='twitter:card' content="summary">
    <meta name='author' content="Onuoha Kingsley">
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="{{ asset('guest/assets/images/logo/favourite_icon.svg') }}">

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used by this page)-->
    <link href="{{ asset('users/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('users/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    {{-- <link href="{{asset('users/assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" /> --}}
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('ijabo_crop_plugin/ijaboCropTool.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('amsify/amsify.suggestags.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('notifications/css/lobibox.css') }}" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('users/assets/css/pages/wizard/wizard-45883.css?v=7.2.9') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('users/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    {{-- <link href="{{asset('amsify/amsify.suggestags.css')}}" rel="stylesheet" type="text/css" /> --}}

    <link href="{{ asset('notifications/css/lobibox.css') }}" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    {{-- Start New Style Sheet --}}
    <link href="{{ asset('users/assets_new/plugins/global/plugins.bundle5883.css?v=7.2.9') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('users/assets_new/plugins/custom/prismjs/prismjs.bundle5883.css?v=7.2.9') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('users/assets_new/css/style.bundle5883.css?v=7.2.9') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('users/assets_new/css/themes/layout/header/base/light5883.css?v=7.2.9') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('users/assets_new/css/themes/layout/header/menu/light5883.css?v=7.2.9') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('users/assets_new/css/themes/layout/brand/dark5883.css?v=7.2.9') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('users/assets_new/css/themes/layout/aside/dark5883.css?v=7.2.9') }}" rel="stylesheet"
        type="text/css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/shepherd.js@13.0.0/dist/css/shepherd.css"/>


    {{-- <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" /> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @stack('style')

    <!--end::Global Stylesheets Bundle-->
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-TG5X2TQ');
    </script>
    <!-- End Google Tag Manager -->
    @livewireStyles
</head>

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed">
    <script>
        let defaultThemeMode = "light";
        let themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-theme-mode");
            } else {
                if (localStorage.getItem("data-theme") !== null) {
                    themeMode = localStorage.getItem("data-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-theme", themeMode);
        }
    </script>

    <!--begin::Main-->
    <x-ADM_mobile-header />
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">

            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <!--begin::Header-->
                <livewire:dash-header />
                {{-- <livewire:side-bar /> --}}

                <!--end::Header-->

                <!--begin::Content-->
                <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">


                    <!--begin::Entry-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class=" container-fluid mt-n10 ">
                            <!--begin::Dashboard-->
                            <x-ADM-admin-breadcrumb :current_page="$current_page" :action="isset($bread_action) ? $bread_action : null" />
                            @yield('content')
                            <!--end::Dashboard-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Entry-->
                </div>
                <!--end::Content-->

                <!--begin::Footer-->
                <x-ADM-footer />

                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->





    <!-- begin::User Panel-->
    @if (auth()->hasUser())
        <x-ADM_user-panel />
    @endif

    <!-- end::User Panel-->


    <script>
        var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
    </script>
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1400
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#3699FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#E4E6EF",
                        "dark": "#181C32"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1F0FF",
                        "secondary": "#EBEDF3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#3F4254",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#EBEDF3",
                    "gray-300": "#E4E6EF",
                    "gray-400": "#D1D3E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#7E8299",
                    "gray-700": "#5E6278",
                    "gray-800": "#3F4254",
                    "gray-900": "#181C32"
                }
            },
            "font-family": "Poppins"
        };
    </script>
    <!--end::Global Config-->


    <script src="http://maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM"></script><iframe id="_hjSafeContext_87643325" title="_hjSafeContext" tabindex="-1"
        aria-hidden="true" src="about:blank"
        style="display: none !important; width: 1px !important; height: 1px !important; opacity: 0 !important; pointer-events: none !important;"></iframe>
    <script src="../../../theme/html/demo1/dist/assets/plugins/custom/gmaps/gmaps5883.js?v=7.2.9"></script>
    <!--end::Page Vendors-->





    <svg id="SvgjsSvg1001" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1"
        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
        style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
        <defs id="SvgjsDefs1002"></defs>
        <polyline id="SvgjsPolyline1003" points="0,0"></polyline>
        <path id="SvgjsPath1004"
            d="M-1 200L-1 200C-1 200 88.83333333333333 200 88.83333333333333 200C88.83333333333333 200 177.66666666666666 200 177.66666666666666 200C177.66666666666666 200 266.5 200 266.5 200C266.5 200 355.3333333333333 200 355.3333333333333 200C355.3333333333333 200 444.1666666666667 200 444.1666666666667 200C444.1666666666667 200 533 200 533 200C533 200 533 200 533 200 ">
        </path>
    </svg>

    @stack('modal')

    <!--end::App-->
    <script src="{{ mix('js/app.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script src="{{ asset('users/assets/plugins/lozad.min.js') }}"></script>
    <script src="{{ asset('users/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

    {{-- <script src="{{asset('users/assets/js/scripts.bundle.js')}}"></script> --}}

    <!--begin::Global Theme Bundle(used by all pages)-->
    {{-- <script src="../../theme/html/demo1/dist/assets/plugins/global/plugins.bundle5883.js?v=7.2.9"></script>
        <script src="../../theme/html/demo1/dist/assets/plugins/custom/prismjs/prismjs.bundle5883.js?v=7.2.9"></script>
        <script src="../../theme/html/demo1/dist/assets/js/scripts.bundle5883.js?v=7.2.9"></script>
        <script src="../../../../keenthemes.com/metronic/assets/js/engage_code.html"></script> --}}
    <!--end::Global Theme Bundle-->
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used by this page)-->
    <script src="{{ asset('users/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="{{ asset('users/cdn.amcharts.com/lib/5/index.js') }}"></script>
    <script src="{{ asset('users/cdn.amcharts.com/lib/5/xy.js') }}"></script>
    <script src="{{ asset('users/cdn.amcharts.com/lib/5/percent.js') }}"></script>
    <script src="{{ asset('users/cdn.amcharts.com/lib/5/radar.js') }}"></script>
    <script src="{{ asset('users/cdn.amcharts.com/lib/5/themes/Animated.js') }}"></script>
    <script src="{{ asset('users/cdn.amcharts.com/lib/5/map.js') }}"></script>
    <script src="{{ asset('users/cdn.amcharts.com/lib/5/geodata/worldLow.js') }}"></script>
    <script src="{{ asset('users/cdn.amcharts.com/lib/5/geodata/continentsLow.js') }}"></script>
    <script src="{{ asset('users/cdn.amcharts.com/lib/5/geodata/usaLow.js') }}"></script>
    <script src="{{ asset('users/cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js') }}"></script>
    <script src="{{ asset('users/cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js') }}"></script>
    <script src="{{ asset('users/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('users/assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used by this page)-->
    <script src="{{ asset('users/assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('users/assets/js/custom/widgets.js') }}"></script>
    {{-- <script src="{{ asset('users/assets/js/custom/apps/chat/chat.js') }}"></script> --}}
    <script src="{{ asset('users/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('users/assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('users/assets/js/custom/utilities/modals/new-target.js') }}"></script>
    <script src="{{ asset('users/assets/js/custom/utilities/modals/users-search.js') }}"></script>
    <script src="{{ asset('notifications/js/lobibox.js') }}"></script>
    <script src="{{ asset('notifications/js/messageboxes.js') }}"></script>
    <script src="{{ asset('notifications/js/notification-custom-script.js') }}"></script>
    <script src="{{ asset('notifications/js/notifications.js') }}"></script>
    <script src="{{ asset('amsify/jquery.amsify.suggestags.js') }}"></script>


    <script src="{{ asset('users/assets_new/plugins/global/plugins.bundle5883.js?v=7.2.9') }}"></script>
    <script src="{{ asset('users/assets_new/plugins/custom/prismjs/prismjs.bundle5883.js?v=7.2.9') }}"></script>
    <script src="{{ asset('users/assets_new/js/scripts.bundle5883.js?v=7.2.9') }}"></script>
    <script src="{{ asset('users/assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
    {{-- <script src="{{ asset('users/assets/js/pages/custom/wizard/wizard-45883.js?v=7.2.9')}}"></script> --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="{{ asset('ijabo_crop_plugin/ijaboCropTool.min.js') }}"></script>

<script type="module" src="https://cdn.jsdelivr.net/npm/shepherd.js@13.0.0/dist/esm/shepherd.mjs" ></script>
    {{-- //Lazy Load Functionality  --}}
    <script>
        const observer = lozad(); // lazy loads elements with default selector as '.lozad'
        observer.observe();

        setInterval(() => {
            observer.observe();

        }, 2000);
    </script>
    <script>
        function toastR(message, type = "default") {
            let options = {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                position: 'top right',
                icon: true,
                msg: message,
                soundPath: "{{ asset('notifications/sounds') }}/",
                // sound:'sound2',
                soundExt: ".ogg",
                iconSource: "fontAwesome"

            };

            // //         soundPath:"notifications/sounds/",
            //         // sound:'sound2',
            //         // soundExt:".ogg"
            if (type == 'success') {
                options.sound = 'sound2';
                // options.icon = 'bx bx-check-circle';
            } else if (type == 'error') {
                options.sound = 'sound4';
                // options.icon =  'bx bx-x-circle'
            } else if (type == 'warning') {
                options.sound = 'sound5';
                // options.icon =  'bx bx-error'
            } else if (type == 'info') {
                options.sound = 'sound6';
                // options.icon =  'bx bx-info-circle'
            }


            Lobibox.notify(type, options);
        }

        // notification with Image 
        function toastR_image(message, type = "default", imgSrc = null) {
            let options = {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                position: 'top right',
                msg: message,

            };
            if (imgSrc != null) {
                // img: imgSrc, //path to image
                options.img = imgSrc
            }

            Lobibox.notify(type, options);
        }
        // toastR_image("Hello BRo This is A default Success msg", 'info', "{{ asset('user/assets/img/favicon.png') }}");
        function success_alert(message) {
            Swal.fire({
                text: message,
                title: "Successful",
                icon: "success",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });
        }

        function error_alert(message) {
            Swal.fire({
                text: message,
                title: "An Error occured",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-danger"
                }
            });
        }

        function info_alert(message) {
            Swal.fire({
                text: message,
                title: "There's An Info",
                icon: "info",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-info"
                }
            });
        }

        function warning_alert(message) {
            Swal.fire({
                text: message,
                title: "Warning",
                icon: "warning",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-warning"
                }
            });
        }



        window.addEventListener('success_alert', (e) => {
            success_alert(e.detail.message);
        })
        window.addEventListener('error_alert', (e) => {
            error_alert(e.detail.message);
        })
        window.addEventListener('info_alert', (e) => {
            info_alert(e.detail.message);
        })
        window.addEventListener('warning_alert', (e) => {
            warning_alert(e.detail.message);
        })


        window.addEventListener('showToast', (e) => {
            toastR(e.detail.message, e.detail.type);
        })
    </script>

    {{-- Nav bar Active toggle  --}}
    <script>
        $(function() {
            var current = window.location.href;
            // alert(current)
            $('a.menu-link').each(function() {
                var $this = $(this);
                // if the current path is like this link, make it active
                if ($this.attr('href') == current) {
                    console.log($this.closest('div.app-sidebar-menu div.menu-accordion')[0]);
                    $this.closest('div.app-sidebar-menu div.menu-accordion').addClass('show')
                    $this.addClass('active');
                }
            })
        })

        $(function() {
            var current = window.location.href;
            $('li.nav-item a.nav-link').each(function() {
                var $this = $(this);
                // if the current path is like this link, make it active
                if ($this.attr('href') == current) {
                    $this.addClass('active');
                }
            })
        })

        // for listing cards
        document.addEventListener("DOMContentLoaded", () => {
                const cards = document.querySelectorAll('.listing-card');

                // Lazy Load Media
                const lazyLoadMedia = (media) => {
                    media.forEach(item => {
                        const src = item.getAttribute('data-src');
                        if (src) {
                            item.setAttribute('src', src);
                            item.classList.remove('lazy-media');
                            item.load?.(); // Load videos explicitly
                        }
                    });
                };

                // Intersection Observer for Lazy Loading
                const lazyObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const media = entry.target.querySelectorAll('.media-item');
                            lazyLoadMedia(media);

                            // Play the first video in view
                            const firstVideo = Array.from(media).find(item => item
                                .tagName === 'VIDEO');
                            if (firstVideo && !firstVideo.playing) {
                                firstVideo.play();
                            }

                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.5
                });

                cards.forEach(card => lazyObserver.observe(card));

                // Handle Media Cycling on Hover
                cards.forEach(card => {
                    let mediaItems = card.querySelectorAll('.media-item');
                    let currentIndex = 0;
                    let interval;

                    const startMediaCycle = () => {
                        interval = setInterval(() => {
                            mediaItems[currentIndex].classList.remove(
                            'active'); // Hide current
                            currentIndex = (currentIndex + 1) % mediaItems
                            .length; // Increment index
                            mediaItems[currentIndex].classList.add(
                            'active'); // Show next
                        }, 5000); // Change media every 5 seconds
                    };

                    const stopMediaCycle = () => clearInterval(interval);

                    // Start cycling media on hover
                    card.addEventListener('mouseenter', () => {
                        stopOtherVideos(card); // Stop videos in other cards
                        startMediaCycle();
                        const currentVideo = mediaItems[currentIndex];
                        if (currentVideo.tagName === 'VIDEO') currentVideo.play();
                    });

                    // Stop cycling media on mouse leave
                    card.addEventListener('mouseleave', () => {
                        stopMediaCycle();
                        const currentVideo = mediaItems[currentIndex];
                        if (currentVideo.tagName === 'VIDEO') currentVideo.pause();
                    });
                });

                // Stop all videos except the one currently being hovered
                const stopOtherVideos = (currentCard) => {
                    cards.forEach(card => {
                        if (card !== currentCard) {
                            const videos = card.querySelectorAll('video');
                            videos.forEach(video => video.pause());
                        }
                    });
                };

            // Helper to detect video playing
            Object.defineProperty(HTMLMediaElement.prototype, 'playing', {
                get: function() {
                    return !!(
                        this.currentTime > 0 &&
                        !this.paused &&
                        !this.ended &&
                        this.readyState > 2
                    );
                }
            });

        });
    </script>
{{-- 
<script type="module">
    import Shepherd from 'https://cdn.jsdelivr.net/npm/shepherd.js@13.0.0/dist/esm/shepherd.mjs';
    class TourManager {
        constructor() {
            console.log(window.Shepherd);
            this.tour = null;
        }

        startTour(steps, options = {}) {
            if (this.tour) {
                console.log('Completing existing tour');
                this.tour.complete();
                this.tour = null;
            }

            console.log('Starting new tour');
            this.tour = new Shepherd.Tour({
                defaultStepOptions: {
                    classes: 'shepherd-theme-arrows',
                    scrollTo: true,
                    cancelIcon: {
                        enabled: true,
                    },
                },
                ...options,
            });

            steps.forEach((step) => {
                this.tour.addStep(step);
            });

            this.tour.start();
        }
    }


    // Attach TourManager to global scope
    window.TourManager = new TourManager();
</script> --}}


    {{-- session alert --}}
    @if (session()->has('error_alert'))
        <script>
            let message = "{{ session('error_alert') }}"
            error_alert(message);
        </script>
    @endif
    @if (session()->has('success_alert'))
        <script>
            let message = "{{ session('success_alert') }}"
            success_alert(message);
        </script>
    @endif
    @if (session()->has('info_alert'))
        <script>
            let message = "{{ session('info_alert') }}"
            info_alert(message);
        </script>
    @endif
    @if (session()->has('warning_alert'))
        <script>
            let message = "{{ session('warning_alert') }}"
            warning_alert(message);
        </script>
    @endif

    {{-- begin toast alert session --}}
    @if (session()->has('warning_toast'))
        <script>
            let message = "{{ session('warning_toast') }}"
            toastR(message, 'warning');
        </script>
    @endif

    @if (session()->has('success_toast'))
        <script>
            let message = "{{ session('success_toast') }}"
            toastR(message, 'success');
        </script>
    @endif

    @if (session()->has('info_toast'))
        <script>
            let message = "{{ session('info_toast') }}"
            toastR(message, 'info');
        </script>
    @endif

    @if (session()->has('error_toast'))
        <script>
            let message = "{{ session('error_toast') }}"
            toastR(message, 'error');
        </script>
    @endif

    {{-- end toast alert session --}}
    {{-- end session alert --}}
    {{-- Nav bar Active toggle  --}}


    @stack('script')
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
    @livewireScripts
</body>
<!--end::Body-->

</html>
