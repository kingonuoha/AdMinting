<!DOCTYPE html>
<html lang="en">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
		<title>AdMinting | Creators Onboarding</title>
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
		<!--begin::Fonts-->	<link href="{{asset('notifications/css/lobibox.css')}}" rel="stylesheet" />
		<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		
		<link href="{{asset('notifications/css/lobibox.css')}}" rel="stylesheet" />
		<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{asset('users/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('users/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		@stack('select2style')

		<!--end::Global Stylesheets Bundle-->
		<!--Begin::Google Tag Manager -->
		<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-TG5X2TQ');</script>
	<!-- End Google Tag Manager -->
		<!--End::Google Tag Manager -->
		@livewireStyles
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
		        <!-- Google Tag Manager (noscript) -->
				<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TG5X2TQ"
					height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
					<!-- End Google Tag Manager (noscript) -->
		<!--End::Google Tag Manager (noscript) -->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Authentication - Multi-steps-->
			@livewire('creators.creators-onboarding')
			
			<!--end::Authentication - Multi-steps-->
		</div>
		<!--end::Root-->
		<!--begin::Javascript-->
		{{-- <script>var hostUrl = "{{asset('users/assets/index.html";</script> --}}
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{asset('users/assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('users/assets/js/scripts.bundle.js')}}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Custom Javascript(used by this page)-->
		<script src="{{asset('notifications/js/lobibox.js')}}"></script>
		<script src="{{asset('notifications/js/messageboxes.js')}}"></script>
		<script src="{{asset('notifications/js/notification-custom-script.js')}}"></script>
		<script src="{{asset('notifications/js/notifications.js')}}"></script>
		<script src="{{asset('users/assets/js/custom/utilities/modals/create-account.js')}}"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
		<script>
			$("#kt_datepicker_1").flatpickr({
					dateFormat: "d-m-Y",
					disable: [
						{
							from: "today",
							to: new Date().fp_incr(10000000) // 10000000 days from now
						}
					]
				});
			$("#kt_datepicker_2").flatpickr({
					dateFormat: "Y",
					
				});
		</script>
	@livewireScripts

	 <script>
		
		$(document).ready(()=>{
			window.addEventListener('showNumberModal', ()=>{
				$("#addNumberModal").modal('show')
			});
			window.addEventListener('open_education_modal', (e)=>{
			$("#kt_modal_1").modal('show')
		})
		Livewire.emit('getLastStop');
			})
		//stepper
		var stepperEl = document.querySelector("#kt_advertiser_onboarding");
		var options = {startIndex: 1};
		var stepper = new KTStepper(stepperEl, options);
		
		
		function stepperGoPrevious(){
			stepper.goPrevious()
		} 
		window.addEventListener('continueFromStop', (e)=>{
			//send a welcome back notification here
			Swal.fire({
				title:"Welcome Back",
				text: "Yeah, we saved it, lets kick off where you Left!",
				icon: "info",
				buttonsStyling: !1,
				confirmButtonText: "Ok, cool!",
				customClass: {
					confirmButton: "btn btn-light",
				},
			}).then(function () {
				KTUtil.scrollTop();
			});
			stepper.goTo(e.detail.index + 1);
		})

		window.addEventListener('deleteInstitution', (e)=>{
			//send a welcome back notification here
			Swal.fire({
				title:e.detail.title,
				text: e.detail.body,
				icon: "warning",
				buttonsStyling: !1,
				confirmButtonText: "yeah, sure!",
				customClass: {
					confirmButton: "btn btn-light=danger",
				},
			}).then(function () {
				Livewire.emit('deleteInstitutionConfirmed', e.detail.id)
				// KTUtil.scrollTop();
			});
			// stepper.goTo(e.detail.index + 1);
		})
		
		window.addEventListener('nextStep', ()=>{
			
			stepper.goNext()
			//send a welcome back notification here
			toastr.options = {
                    "closeButton": true,
                    "debug": true,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toastr-top-right",
                    "preventDuplicates": false,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    };
            
            toastr.success("rogress has been saved Successfully", "Success!");
				KTUtil.scrollTop();
		})


		// socials 
		function google_redirect() {
         
         // open the page as popup //
         var page = @js(route('google.redirect'));
         var myWindow = window.open(page, "_blank", "scrollbars=yes,width=400,height=500,top=300");
         
         // focus on the popup //
         myWindow.focus();
         
         // if you want to close it after some time (like for example open the popup print the receipt and close it) //
        //  myWindow.close();
        //  setTimeout(function() {
        //    myWindow.close();
        //  }, 1000);
        
       }
    function github_redirect() {
         
         // open the page as popup //
         var page = @js(route('github.redirect'));
         var myWindow = window.open(page, "_blank", "scrollbars=yes,width=400,height=500,top=300");
         
         // focus on the popup //
         myWindow.focus();
         
         // if you want to close it after some time (like for example open the popup print the receipt and close it) //
        
        
       }
    function linkedin_redirect() {
         
         // open the page as popup //
         var page = @js(route('linkedin.redirect'));
         var myWindow = window.open(page, "_blank", "scrollbars=yes,width=400,height=500,top=300");
         
         // focus on the popup //
         myWindow.focus();
         
       
        
       }


	   
	</script> 

<script>
	function toastR(message, type = "default") {
		let options = {
			pauseDelayOnHover: true,
			continueDelayOnInactiveTab: false,
			position: 'top right',
			icon: true,
			msg: message,
			soundPath:"{{asset('notifications/sounds')}}/",
			// sound:'sound2',
			soundExt:".ogg",
			iconSource:"fontAwesome"
			
		};

// //         soundPath:"notifications/sounds/",
//         // sound:'sound2',
//         // soundExt:".ogg"
		if (type == 'success') {
			options.sound = 'sound2';
			// options.icon = 'bx bx-check-circle';
		} else if(type == 'error'){
			options.sound = 'sound4';
			// options.icon =  'bx bx-x-circle'
		} else if(type == 'warning'){
			options.sound = 'sound5';
			// options.icon =  'bx bx-error'
		} else if(type == 'info'){
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
		if(imgSrc != null) {
			// img: imgSrc, //path to image
			options.img = imgSrc
		}

		Lobibox.notify(type, options);
	}
	// toastR_image("Hello BRo This is A default Success msg", 'info', "{{asset('user/assets/img/favicon.png')}}");
   function success_alert(message){
	Swal.fire({
				text: message,
				title:"Successful",
				icon: "success",
				buttonsStyling: false,
				confirmButtonText: "Ok, got it!",
				customClass: {
					confirmButton: "btn btn-primary"
				}
			});
   }
   function error_alert(message){
	Swal.fire({
				text: message,
				title:"An Error occured",
				icon: "error",
				buttonsStyling: false,
				confirmButtonText: "Ok, got it!",
				customClass: {
					confirmButton: "btn btn-danger"
				}
			});
   }
   function info_alert(message){
	Swal.fire({
				text: message,
				title:"There's An Info",
				icon: "info",
				buttonsStyling: false,
				confirmButtonText: "Ok, got it!",
				customClass: {
					confirmButton: "btn btn-info"
				}
			});
   }
   function warning_alert(message){
	Swal.fire({
				text: message,
				title:"Warning",
				icon: "warning",
				buttonsStyling: false,
				confirmButtonText: "Ok, got it!",
				customClass: {
					confirmButton: "btn btn-warning"
				}
			});
   }

   

	window.addEventListener('success_alert', (e)=>{
		success_alert( e.detail.message);
	})
	window.addEventListener('error_alert', (e)=>{
		error_alert( e.detail.message);
	})
	window.addEventListener('info_alert', (e)=>{
		info_alert( e.detail.message);
	})
	window.addEventListener('warning_alert', (e)=>{
		warning_alert( e.detail.message);
	})
	

	window.addEventListener('showToast', (e)=>{
		toastR( e.detail.message, e.detail.type);
	})
	</script>

	{{-- Nav bar Active toggle  --}}
		<script>
		$(function(){
				var current = window.location.href;
				// alert(current)
				$('a.menu-link').each(function(){
					var $this = $(this);
					// if the current path is like this link, make it active
					if($this.attr('href') == current){
						console.log($this.closest('div.app-sidebar-menu div.menu-accordion')[0]);
						$this.closest('div.app-sidebar-menu div.menu-accordion').addClass('show')
						$this.addClass('active');
					}
				})
			})

			$(function(){
				var current = window.location.href;
				$('li.nav-item a.nav-link').each(function(){
					var $this = $(this);
					// if the current path is like this link, make it active
					if($this.attr('href') == current){
						$this.addClass('active');
					}
				})
			})
		</script>
		{{-- session alert --}}
		@if (session()->has('error_alert'))
		<script>
			let message =  "{{session('error_alert')}}"
			error_alert(message);
			</script>
		@endif
		@if (session()->has('success_alert'))
		<script>
			let message =  "{{session('success_alert')}}"
			success_alert(message);
			</script>
		@endif
		@if (session()->has('info_alert'))
		<script>
			let message =  "{{session('info_alert')}}"
			info_alert(message);
			</script>
		@endif
		@if (session()->has('warning_alert'))
		<script>
			let message =  "{{session('warning_alert')}}"
			warning_alert(message);
			</script>
		@endif

		{{-- begin toast alert session --}}
		@if (session()->has('warning_toast'))
		<script>
			let message =  "{{session('warning_toast')}}"
			toastR(message, 'warning');
			</script>
		@endif

		@if (session()->has('success_toast'))
		<script>
			let message =  "{{session('success_toast')}}"
			toastR(message, 'success');
			</script>
		@endif

		@if (session()->has('info_toast'))
		<script>
			let message =  "{{session('info_toast')}}"
			toastR(message, 'info');
			</script>
		@endif

		@if (session()->has('error_toast'))
		<script>
			let message =  "{{session('error_toast')}}"
			toastR(message, 'error');
			</script>
		@endif
@stack('select2Script')

	</body>
	<!--end::Body-->

<!-- Mirrored from preview.keenthemes.com/metronic8/demo1/authentication/extended/multi-steps-sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Aug 2022 14:58:56 GMT -->
</html>