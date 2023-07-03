<title>{{ config('chatify.name') }}</title>

{{-- Meta tags --}}
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="id" content="{{ $id }}">
<meta name="messenger-color" content="{{ $messengerColor }}">
<meta name="messenger-theme" content="{{ $dark_mode }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="url" content="{{ url('').'/'.config('chatify.routes.prefix') }}" data-user="{{ Auth::user()->id }}">

{{-- scripts --}}
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/chatify/font.awesome.min.js') }}"></script>
<script src="{{ asset('js/chatify/autosize.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src='https://unpkg.com/nprogress@0.2.0/nprogress.js'></script>

{{-- styles --}}
<link rel='stylesheet' href='https://unpkg.com/nprogress@0.2.0/nprogress.css'/>
<link href="{{ asset('css/chatify/style.css') }}" rel="stylesheet" />
<link href="{{ asset('css/chatify/'.$dark_mode.'.mode.css') }}" rel="stylesheet" />
<link href="{{ asset('css/app.css') }}" rel="stylesheet" />


<!--begin::Vendor Stylesheets(used by this page)-->
<link href="{{asset('users/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('users/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('users/assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />
<!--end::Vendor Stylesheets-->
<!--begin::Global Stylesheets Bundle(used by all pages)-->
<link href="{{asset('ijabo_crop_plugin/ijaboCropTool.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('amsify/amsify.suggestags.css')}}" rel="stylesheet" type="text/css" />

<link href="{{asset('notifications/css/lobibox.css')}}" rel="stylesheet" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<!--begin::Global Stylesheets Bundle(used by all pages)-->
<link href="{{asset('users/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
{{-- <link href="{{asset('ijabo_crop_plugin/ijaboCropTool.min.css')}}" rel="stylesheet" type="text/css" /> --}}
<link href="{{asset('users/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
{{-- <link href="{{asset('amsify/amsify.suggestags.css')}}" rel="stylesheet" type="text/css" /> --}}

<link href="{{asset('notifications/css/lobibox.css')}}" rel="stylesheet" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<!--end::Global Stylesheets Bundle-->
<!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-TG5X2TQ');</script>
        



        <!--end::App-->
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
    <script src="{{asset('users/assets/plugins/lozad.min.js')}}"></script>
    <script src="{{asset('users/assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('users/assets/js/scripts.bundle.js')}}"></script>


{{-- Setting messenger primary color to css --}}
<style>
    :root {
        --primary-color: {{ $messengerColor }};
    }
</style>
