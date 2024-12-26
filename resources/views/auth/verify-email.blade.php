{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button type="submit">
                        {{ __('Resend Verification Email') }}
                    </x-button>
                </div>
            </form>

            <div>
                <a
                    href="{{ route('profile.show') }}"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    {{ __('Edit Profile') }}</a>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf

                    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-2">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout> --}}
<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	
<!-- Mirrored from preview.keenthemes.com/metronic8/demo1/authentication/general/verify-email.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Aug 2022 14:58:58 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
		<title>{{env("app_name")}}  | {{Auth::user()->name}} Verify Email</title>
		<meta charset="utf-8" />
		<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Blazor, Django, Flask & Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Blazor, Django, Flask & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic | Bootstrap HTML, VueJS, React, Angular, Asp.Net Core, Blazor, Django, Flask & Laravel Admin Dashboard Theme" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="{{asset('users/assets/media/logos/favicon.ico')}}" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{asset('users/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('users/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		<!--Begin::Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src= '../../../../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-5FS8GGP');</script>
		<!--End::Google Tag Manager -->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
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
		
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Page bg image-->
			<style>body { background-image: url('{{asset('users/assets/media/auth/bg5.jpg')}}'); } [data-theme="dark"] body { background-image: url('{{asset('users/assets/media/auth/bg5-dark.jpg')}}'); }</style>
			<!--end::Page bg image-->
			<!--begin::Authentication - Signup Welcome Message -->
			<div class="d-flex flex-column flex-center flex-column-fluid">
				<!--begin::Content-->
				<div class="d-flex flex-column flex-center text-center p-10">
					<!--begin::Wrapper-->
					<div class="card card-flush w-lg-650px py-5 px-5">
						<div class="card-body py-15 py-lg-20">
							<!--begin::Logo-->
							<div class="mb-14">
								<a href="../../index.html" class="">
									<img alt="Logo" src="{{asset('users/assets/media/logos/custom-2.svg')}}" class="h-40px" />
								</a>
							</div>
							<!--end::Logo-->
							<!--begin::Title-->
							<h1 class="fw-bolder text-gray-900 mb-5">Verify your email</h1>
							<!--end::Title-->
							<!--begin::Action-->
							<div class="fs-6 mb-8 mx-10 my-5">
								<span class="fw-semibold text-gray">
                                    {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.' ) }} 
                                </span>
                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf
                    
                                    <div>
                                       <button class="btn-info btn btn-sm"> {{ __('Resend Verification Email') }}</button>
                                    </div>
                                </form>
								{{-- <a href="../layouts/corporate/sign-up.html" class="link-primary fw-bold">Try Again</a> --}}
							</div>
							<!--end::Action-->
							<!--begin::Link-->
							<div class="row d-flex-justify-content-center align-items-center mb-11">
                                <a
                                href="{{ route('profile.show') }}"
                                class="text-sm link-primary my-3"
                            >
                                {{ __('Edit Profile') }}</a>
            
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
            
                                <button type="submit" class="btn btn-sm btn-primary">
                                    {{ __('Log Out') }}
                                </button>
							</div>
                            @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 font-medium text-sm text-success">
                                {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
                            </div>
                        @endif
							<!--end::Link-->
							<!--begin::Illustration-->
							<div class="mb-0">
								<img src="{{asset('users/assets/media/auth/please-verify-your-email.png')}}" class="mw-100 mh-300px theme-light-show" alt="" />
								<img src="{{asset('users/assets/media/auth/please-verify-your-email-dark.png')}}" class="mw-100 mh-300px theme-dark-show" alt="" />
							</div>
							<!--end::Illustration-->
						</div>
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Authentication - Signup Welcome Message-->
		</div>
		<!--end::Root-->
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{asset('users/assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('users/assets/js/scripts.bundle.js')}}"></script>
		<!--end::Global Javascript Bundle-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->

<!-- Mirrored from preview.keenthemes.com/metronic8/demo1/authentication/general/verify-email.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Aug 2022 14:58:59 GMT -->
</html>