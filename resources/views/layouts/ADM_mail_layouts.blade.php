<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic | Bootstrap HTML, VueJS, React, Angular, Asp.Net Core, Blazor, Django, Flask & Laravel Admin Dashboard Theme 
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	
<!-- Mirrored from preview.keenthemes.com/metronic8/demo1/authentication/email/welcome-message.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Aug 2022 14:59:04 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
		<title>@yield('title')</title>
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
		
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="app-blank app-blank">
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
			<!--begin::Wrapper-->
			<div class="d-flex flex-column flex-column-fluid">
				
				<!--begin::Body-->
				<div class="scroll-y flex-column-fluid px-10 py-10" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_header_nav" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true" style="background-color:#F7F2EF; --kt-scrollbar-color: #d9d0cc; --kt-scrollbar-hover-color: #d9d0cc">
					<!--begin::Email template-->
					<style>html,body { padding:0; margin:0; font-family: Inter, Helvetica, "sans-serif"; } a:hover { color: #009ef7; }</style>
					<div id="#kt_app_body_content" style="background-color:#F7F2EF; font-family:Arial,Helvetica,sans-serif; line-height: 1.5; min-height: 100%; font-weight: normal; font-size: 15px; color: #2F3044; margin:0; padding:0; width:100%;">
						<div style="background-color:#ffffff; padding: 45px 0 34px 0; border-radius: 24px; margin:40px auto; max-width: 600px;">
							<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" height="auto" style="border-collapse:collapse">
								<tbody>
									<tr>
										<td align="center" valign="center" style="text-align:center; padding-bottom: 10px">
											<!--begin:Email content-->
											<div style="text-align:center; margin:0 15px 34px 15px">
												<!--begin:Logo-->
												<div style="margin-bottom: 10px">
													<a href="https://keenthemes.com/" rel="noopener" target="_blank">
														<img alt="Logo" src="{{ asset('guest/assets/images/logo/site_logo_dark.svg') }}" style="height: 35px" />
													</a>
												</div>
												<!--end:Logo-->
												@yield('mail_body')
											</div>
											<!--end:Email content-->
										</td>
									</tr>
                                    @yield('mail_subBody')

									<tr>
										<td align="center" valign="center" style="font-size: 13px; text-align:center; padding: 0 10px 10px 10px; font-weight: 500; color: #A1A5B7; font-family:Arial,Helvetica,sans-serif">
											<p style="color:#181C32; font-size: 16px; font-weight: 600; margin-bottom:9px">It’s all about customers!</p>
											<p style="margin-bottom:2px">Call our customer care number: +31 6 3344 55 56</p>
											<p style="margin-bottom:4px">You may reach us at 
											<a href="https://keenthemes.com/" rel="noopener" target="_blank" style="font-weight: 600">{{appSetting('app_email')}}</a>.</p>
											<p>We serve Mon-Fri, 9AM-18AM</p>
										</td>
									</tr>
									<tr>
										<td align="center" valign="center" style="text-align:center; padding-bottom: 20px;">
											<a href="#" style="margin-right:10px">
												<img alt="Logo" src="{{asset('users/assets/media/email/icon-linkedin.svg')}}" />
											</a>
											<a href="#" style="margin-right:10px">
												<img alt="Logo" src="{{asset('users/assets/media/email/icon-dribbble.svg')}}" />
											</a>
											<a href="#" style="margin-right:10px">
												<img alt="Logo" src="{{asset('users/assets/media/email/icon-facebook.svg')}}" />
											</a>
											<a href="#">
												<img alt="Logo" src="{{asset('users/assets/media/email/icon-twitter.svg')}}" />
											</a>
										</td>
									</tr>
									<tr>
										<td align="center" valign="center" style="font-size: 13px; padding:0 15px; text-align:center; font-weight: 500; color: #A1A5B7;font-family:Arial,Helvetica,sans-serif">
											<p>&copy; Copyright {{ucwords(appSetting('app_name'))}}. 
											<a href="https://keenthemes.com/" rel="noopener" target="_blank" style="font-weight: 600;font-family:Arial,Helvetica,sans-serif">Unsubscribe</a>&nbsp; from newsletter.</p>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<!--end::Email template-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Root-->
		<!--begin::Javascript-->
		<script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{asset('users/assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('users/assets/js/scripts.bundle.js')}}"></script>
		<!--end::Global Javascript Bundle-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->

<!-- Mirrored from preview.keenthemes.com/metronic8/demo1/authentication/email/welcome-message.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Aug 2022 14:59:06 GMT -->
</html>