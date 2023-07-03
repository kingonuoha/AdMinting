@extends('layouts.ADM-auth')
@section('title')
AdMinting | {{ (isset($type) && $type == 'brand') ? "Brand" : "Creator" }} Create Account
@endsection
@section('content')
    <!--begin::Body-->
    <div class="d-flex flex-center w-lg-50 p-10">
        <!--begin::Card-->
        <div class="card rounded-3 w-md-550px">
            <!--begin::Card body-->
            <div class="card-body p-10 p-lg-20">
                <!--begin::Form-->
                <form class="form w-100" method="POST" action="{{ (isset($type) && $type == 'brand') ? route('register', ['type' => $type]) : route('register') }}">
                    @csrf
                    <!--begin::Heading-->
                    <div class="text-center mb-11">
                        <!--begin::Title-->
                        <h1 class="text-dark fw-bolder mb-3">Sign Up</h1>
                        <!--end::Title-->
                        <!--begin::Subtitle-->
                        <div class="text-gray-500 fw-semibold fs-6">{{ (isset($type) && $type == 'brand') ? "As an Brand" : "As a Creator" }}</div>
                        <!--end::Subtitle=-->
                    </div>
                    <!--begin::Heading-->
                    <!--begin::Login options-->
                    <div class="row g-3 mb-9">
                        <!--begin::Col-->
                        <div class="col-md-6">
                            <!--begin::Google link=-->
                            <a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                            <img alt="Logo" src="{{asset('users/assets/media/svg/brand-logos/google-icon.svg')}}" class="h-15px me-3" />Sign in with Google</a>
                            <!--end::Google link=-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6">
                            <!--begin::Google link=-->
                            <a href="{{route('google.callback.auth',['type' =>'brand'])}}" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
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
                    <!--end::Separator-->
        <x-validation-errors class="mb-4" />

                    <!--begin::Input group=-->
                    <div class="fv-row mb-8">
                        <!--begin::Email-->
                        <input type="text" placeholder="Name" name="name" value="{{old('name')}}" required class="form-control bg-transparent" autofocus autocomplete="name" />
                        <!--end::Email-->
                    </div>
                    <div class="fv-row mb-8">
                        <!--begin::Email-->
                        <input type="text" placeholder="Email" type="email" name="email" value="{{old('email')}}" required class="form-control bg-transparent" autocomplete="username" />
                        <!--end::Email-->
                    </div>
                    <!--begin::Input group-->
                    <div class="fv-row mb-8" data-kt-password-meter="true">
                        <!--begin::Wrapper-->
                        <div class="mb-1">
                            <!--begin::Input wrapper-->
                            <div class="position-relative mb-3">
                                <input class="form-control bg-transparent" type="password" placeholder="Password" name="password" required autocomplete="new-password" />
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                    <i class="bi bi-eye-slash fs-2"></i>
                                    <i class="bi bi-eye fs-2 d-none"></i>
                                </span>
                            </div>
                            <!--end::Input wrapper-->
                            <!--begin::Meter-->
                            <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                            </div>
                            <!--end::Meter-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Hint-->
                        <div class="text-muted">Use 8 or more characters with a mix of letters, numbers & symbols <span class="text-success">(esp. !,$,#,%,@,.,&)</span>.</div>
                        <!--end::Hint-->
                    </div>
                    <!--end::Input group=-->
                    <!--end::Input group=-->
                    <div class="fv-row mb-8">
                        <!--begin::Repeat Password-->
                        <input placeholder="Repeat Password"  class="form-control bg-transparent" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <!--end::Repeat Password-->
                    </div>
                    <!--end::Input group=-->
                    <!--begin::Accept-->
                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mb-4">
                        <x-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" required />
    
                                <div class="ml-2 ">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" class="link-primary fs-bold" href="'.route('terms.show').'" >'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" class="link-primary fs-bold" href="'.route('policy.show').'" >'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                @endif
                    <!--end::Accept-->
                    <!--begin::Submit button-->
                    <div class="d-grid mb-10">
                        <button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
                            <!--begin::Indicator label-->
                            <span class="indicator-label">Sign up</span>
                            <!--end::Indicator label-->
                            <!--begin::Indicator progress-->
                            <span class="indicator-progress">Please wait... 
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            <!--end::Indicator progress-->
                        </button>
                    </div>
                    <!--end::Submit button-->
                    <!--begin::Sign up-->
                    <div class="text-gray-500 text-center fw-semibold fs-6">Already have an Account? 
                    <a href="{{route('login')}}" class="link-primary fw-semibold">Sign in</a></div>
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