@extends('layouts.ADM-auth')
@section('title')
    {{env("app_name")}} | Login
@endsection
@section('content')
<!--begin::Body-->
<div class="d-flex flex-center w-lg-50 p-10">
    <!--begin::Card-->
    <div class="card rounded-3 w-md-550px">
        <!--begin::Card body-->
        <div class="card-body p-10 p-lg-20">
            <!--begin::Form-->
            <form class="form w-100" method="POST" action="{{ route('login') }}">
                @csrf
                <!--begin::Heading-->
                <div class="text-center mb-11">
                    <!--begin::Title-->
                    <h1 class="text-dark fw-bolder mb-3">Sign In</h1>
                    <!--end::Title-->
                    <!--begin::Subtitle-->
                    <div class="text-gray-500 fw-semibold fs-6">Your Social Campaigns</div>
                    <!--end::Subtitle=-->
                </div>
                <!--begin::Heading-->
                <!--begin::Login options-->
                <div class="row g-3 mb-9">
                    <!--begin::Col-->
                    <div class="col-md-6">
                        <!--begin::Google link=-->
                        <a href="{{ route('google.redirect', ['is_authenticating' => true]) }}" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                        <img alt="Logo" src="{{asset('users/assets/media/svg/brand-logos/google-icon.svg')}}" class="h-15px me-3" />Sign in with Google</a>
                        <!--end::Google link=-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6">
                        <!--begin::Google link=-->
                        <a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                        <img alt="Logo" src="{{asset('users/assets/media/svg/brand-logos/apple-black.svg')}}" class="theme-light-show h-15px me-3" />
                        <img alt="Logo" src="{{asset('users/assets/media/svg/brand-logos/apple-black-dark.svg')}}" class="theme-dark-show h-15px me-3" />Sign in with Apple</a>
                        <!--end::Google link=-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Login options-->
                <!--begin::Separator-->
                <div class="separator separator-content my-14">
                    <span class="w-125px text-gray-500 fw-semibold fs-7">Or with email</span>
                </div>
                @if (session('status'))
                <div class="mb-4 font-medium text-sm text-success">
                    {{ session('status') }}
                </div>
            @endif
                <!--end::Separator-->
                <!--begin::Input group=-->
                <div class="fv-row mb-8">
                    <!--begin::Email-->
                    <input type="text" placeholder="Email" name="email" :value="old('email')" required autofocus autocomplete="username" class="form-control bg-transparent" />
                    <!--end::Email-->
                </div>
                <!--end::Input group=-->
                <div class="fv-row mb-3">
                    <!--begin::Password-->
                    <input type="password" placeholder="Password" name="password" required autocomplete="current-password" class="form-control bg-transparent" />
                    <!--end::Password-->
                </div>
              
                <x-validation-errors class="mb-4" />
                <!--end::Input group=-->
                <!--begin::Wrapper-->
                <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="link-primary">{{ __('Remember me') }}</span>
                    </label>
                    <!--begin::Link-->
                    @if (Route::has('password.request'))
                    <a class="link-primary" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                    <!--end::Link-->
                </div>
                <!--end::Wrapper-->
                <!--begin::Submit button-->
                <div class="d-grid mb-10">
                    <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                        <!--begin::Indicator label-->
                        <span class="indicator-label">Sign In</span>
                        <!--end::Indicator label-->
                        <!--begin::Indicator progress-->
                        <span class="indicator-progress">Please wait... 
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        <!--end::Indicator progress-->
                    </button>
                </div>
                <!--end::Submit button-->
                <!--begin::Sign up-->
                <div class="text-gray-500 text-center fw-semibold fs-6">Not a Member yet? 
                <a href="{{route('register')}}" class="link-primary">Register</a></div>
                <!--end::Sign up-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
</div>
<!--end::Body-->
@endsection

