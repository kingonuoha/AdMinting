<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
		<title>@yield('title')</title>
		<meta charset="utf-8" />
		<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Blazor, Django, Flask & Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Blazor, Django, Flask & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="@if (isset($title))
		{{$title}}
	@else
	@yield('title',  ucwords(appSetting('app_name')))
	@endif
	" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="{{asset('users/assets/media/logos/favicon.ico')}}" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<link href="{{asset('users/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('users/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TG5X2TQ');</script>
<!-- End Google Tag Manager -->
		<!--End::Google Tag Manager -->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
                <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TG5X2TQ"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
		<!--begin::Theme mode setup on page load-->
		<script>
        var defaultThemeMode = "light"; 
        var themeMode; 
        if ( document.documentElement ) { 
            if ( document.documentElement.hasAttribute("data-theme-mode")) { 
                themeMode = document.documentElement.getAttribute("data-theme-mode"); 
            } else { 
                if ( localStorage.getItem("data-theme") !== null ) {
                     themeMode = localStorage.getItem("data-theme"); 
                    } else { themeMode = defaultThemeMode; 
                    } } 
            if (themeMode === "system") { 
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; 
            } 
            document.documentElement.setAttribute("data-theme", themeMode); 
        }
        </script>
		<!--end::Theme mode setup on page load-->
		<!--Begin::Google Tag Manager (noscript) -->
		<noscript>
			<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
		</noscript>
		<!--End::Google Tag Manager (noscript) -->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Page bg image-->
			<style>body { background-image: url('{{asset("users/assets/media/auth/bg4.jpg")}}'); } [data-theme="dark"] body { background-image: url('{{asset("users/assets/media/auth/bg4-dark.jpg")}}'); }</style>
			<!--end::Page bg image-->
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-column-fluid flex-lg-row">
				<!--begin::Aside-->
				<div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
					<!--begin::Aside-->
					<div class="d-flex flex-center flex-lg-start flex-column">
						<!--begin::Logo-->
						<a href="../../../index.html" class="mb-7">
							<img alt="Logo" src="{{asset('users/assets/media/logos/custom-3.svg')}}" />
						</a>
						<!--end::Logo-->
						<!--begin::Title-->
						<h2 class="text-white fw-normal m-0">Branding tools designed for your business</h2>
						<!--end::Title-->
					</div>
					<!--begin::Aside-->
				</div>
                @yield('content')
                </div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Root-->
		<!--begin::Javascript-->
		{{-- <script>var hostUrl = "{{route('welcome')}}";</script> --}}
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{asset('users/assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('users/assets/js/scripts.bundle.js')}}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Custom Javascript(used by this page)-->
		<script src="{{asset('users/assets/js/custom/authentication/sign-in/general.js')}}"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->

<!-- Mirrored from preview.keenthemes.com/metronic8/demo1/authentication/layouts/creative/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Aug 2022 14:58:54 GMT -->
</html>