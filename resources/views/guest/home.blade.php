@extends('layouts.ADM-guest')
@section('title')
    {{ ucwords(appSetting('app_name')) }} | Home
@endsection
@section('meta_tags')
    <meta name='title' content=" {{ ucwords(appSetting('app_name')) }} | Home">
    <meta property='og:title' content=" {{ ucwords(appSetting('app_name')) }} | Home">
    <meta property='og:image' content="{{ asset('user/assets/img/logo-blue.png') }}">
    <meta property='og:title' itemprop="name" name="twitter:title" content=" {{ ucwords(appSetting('app_name')) }} | Home">
@endsection



@section('content')
    <!-- Hero Banner Section - Start
                ================================================== -->
    <section class="hero_banner_section style_4 bg_light_3 decoration_wrap">
        <div class="banner_bg_4" data-background="{{ asset('guest/assets/images/banner/shape_banner_1.svg') }}"></div>
        <div class="banner_bg_sm d-lg-none">
            <div class="banner_bg_shape">
                <img src="{{ asset('guest/assets/images/shapes/shape_10.svg') }}" alt="shape_banner_10" />
            </div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col col-lg-6 order-last">
                    <div class="hero_banner_image decoration_wrap">
                        <div class="rocket_image wow fadeInUp" data-wow-delay=".2s">
                            <img src="{{ asset('guest/assets/images/banner/hero_banner_image_8.png') }}"
                                alt="Paradox Illustration Image" />
                        </div>
                        <div class="deco_item shape_1">
                            <img class="wow zoomIn" data-wow-delay=".4s"
                                src="{{ asset('guest/assets/images/shapes/shape_circle_2.svg') }}"
                                alt="Paradox Illustration Image" />
                        </div>
                        <div class="deco_item shape_2" data-parallax='{"y" : 200, "smoothness": 10}'>
                            <img class="wow zoomIn" data-wow-delay=".2s"
                                src="{{ asset('guest/assets/images/shapes/shape_triangle_1.svg') }}"
                                alt="Paradox Illustration Image" />
                        </div>
                        <div class="deco_item shape_3" data-parallax='{"y" : -200, "smoothness": 10}'>
                            <img class="wow zoomIn" data-wow-delay=".2s"
                                src="{{ asset('guest/assets/images/shapes/shape_triangle_2.svg') }}"
                                alt="Paradox Illustration Image" />
                        </div>
                        <ul class="deco_item shape_4 unordered_list_block">
                            <li>
                                <img class="wow fadeInUp" data-wow-delay=".2s"
                                    src="{{ asset('guest/assets/images/banner/banner_avatar_img_1.png') }}"
                                    alt="Paradox Illustration Image" />
                            </li>
                            <li>
                                <img class="wow fadeInUp" data-wow-delay=".4s"
                                    src="{{ asset('guest/assets/images/banner/banner_avatar_img_2.png') }}"
                                    alt="Paradox Illustration Image" />
                            </li>
                            <li>
                                <img class="wow fadeInUp" data-wow-delay=".6s"
                                    src="{{ asset('guest/assets/images/banner/banner_avatar_img_3.png') }}"
                                    alt="Paradox Illustration Image" />
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col col-xl-6 col-lg-6">
                    <div class="banner_content_4">
                        <h1 class="hero_banner_heading">
                            <span class="focus_text">{{ ucwords(appSetting('app_name')) }}:</span>
                            The No.1 market place for Creators & Influencers
                        </h1>
                        <p>
                            Welcome to {{ ucwords(appSetting('app_name')) }} – Where Creativity Meets Earnings! Join us, apply for exciting job listings,
                            complete tasks, and start earning today. Your journey to success begins here.
                        </p>
                        <div class="form-group m-0 subscribe_form">
                            <label for="input_email_1" class="form-label">
                                <i class="fas fa-envelope"></i>
                            </label>
                            <input id="input_email_1" class="form-control" type="email" name="email"
                                placeholder="Enter your Email Address" />
                            <button type="submit" class="bd-btn-link btn_primary">
                                <span class="bd-button-content-wrapper">
                                    <span class="bd-button-icon">
                                        <i class="fa-light fa-arrow-right-long"></i>
                                    </span>
                                    <span class="pd-animation-flip">
                                        <span class="bd-btn-anim-wrapp">
                                            <span class="bd-button-text">Work with Us</span>
                                            <span class="bd-button-text">Work with Us</span>
                                        </span>
                                    </span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="deco_item shape_5">
            <img class="wow fadeInUp" data-wow-delay=".4s"
                src="{{ asset('guest/assets/images/shapes/shape_circle_2.svg') }}" alt="Paradox Illustration Image" />
        </div>
        <div class="deco_item shape_6">
            <img class="wow fadeInUp" data-wow-delay=".4s" src="{{ asset('guest/assets/images/shapes/shape_hand.png') }}"
                alt="Paradox Illustration Image" />
        </div>
    </section>
    <!-- Hero Banner Section - End
        ================================================== -->

    <x-ADM_top-creators />
    <x-ADM_services />
    <x-ADM_why_us />
    <x-ADM_newsletter />
    <x-ADM_testimonials />
@endsection
