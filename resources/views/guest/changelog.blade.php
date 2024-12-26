@extends('layouts.ADM-guest')
@section('title')
    {{ ucwords(appSetting('app_name')) }} | Change Log
@endsection
@section('meta_tags')
    <meta name='title' content=" {{ ucwords(appSetting('app_name')) }} | Change Log">
    <meta property='og:title' content=" {{ ucwords(appSetting('app_name')) }} | Change Log">
    <meta property='og:image' content="{{ asset('user/assets/img/logo-blue.png') }}">
    <meta property='og:title' itemprop="name" name="twitter:title"
        content=" {{ ucwords(appSetting('app_name')) }} | Change Log">
@endsection
@push('style')
    <!-- Counter - CSS Include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/assets/css/odometer.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Heebo:300,400" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('guest/assets/changelog_stolen/main.css') }}" />
    <script src="{{ asset('guest/assets/changelog_stolen/uikit.js') }}"></script>
@endpush


@section('content')
    <!-- Page Section - Start
                    ================================================== -->
    <section class="page_banner text-center">
        <div class="container decoration_wrap">
            <h1 class="page_title">{{ env('APP_NAME') . ' ' . env('APP_VERSION') }}</h1>
            <ul class="breadcrumb_nav unordered_list_center">
                <li><a href="{{ route('guest.home') }}">Home</a></li>
                <li>ChangeLog</li>
            </ul>

            <div class="deco_item shape_1 wow fadeInUp" data-wow-delay=".1s">
                <img src="{{ asset('guest/assets/images/shapes/shape_circle_1.svg') }}"
                    data-parallax='{"y" : -140, "smoothness": 10}' alt="Paradox - Shape Image">
            </div>
            <div class="deco_item shape_2 wow rotateInDownRight" data-wow-delay=".1s">
                <img src="{{ asset('guest/assets/images/shapes/shape_circle_half_1.svg') }}"
                    data-parallax='{"y" : 200, "smoothness": 10}' alt="Paradox - Shape Image">
            </div>
            <div class="deco_item shape_3 wow fadeInDown">
                <img src="{{ asset('guest/assets/images/shapes/shape_1.svg') }}"
                    data-parallax='{"x" : -200, "smoothness": 10}' alt="Paradox - Shape Image">
            </div>
        </div>
    </section>
    <!-- Page Section - End
                              ================================================== -->

    {{-- <div class="container">
                        <div class="row">
                            <div class="col col-lg-3">
                                <ul class="nav tabs_nav_boxed unordered_list_block" role="tablist">
                                    <li role="presentation">
                                        <button data-bs-toggle="tab" data-bs-target="#tab_privacy_policy" type="button" role="tab"
                                            aria-selected="false">
                                            <i class="fas fa-circle"></i>
                                            <span>Policy & Privacy</span>
                                        </button>
                                    </li>
                                    <li role="presentation">
                                        <button class="active" data-bs-toggle="tab" data-bs-target="#tab_terms_conditions"
                                            type="button" role="tab" aria-selected="true">
                                            <i class="fas fa-circle"></i>
                                            <span>Terms & Conditions</span>
                                        </button>
                                    </li>
                                    <li role="presentation">
                                        <button class="active" data-bs-toggle="tab" data-bs-target="#tab_terms_conditions"
                                            type="button" role="tab" aria-selected="true">
                                            <i class="fas fa-circle"></i>
                                            <span>Terms & Conditions</span>
                                        </button>
                                    </li>
                                    <li role="presentation">
                                        <button class="active" data-bs-toggle="tab" data-bs-target="#tab_terms_conditions"
                                            type="button" role="tab" aria-selected="true">
                                            <i class="fas fa-circle"></i>
                                            <span>Terms & Conditions</span>
                                        </button>
                                    </li>
                                    <li role="presentation">
                                        <button class="active" data-bs-toggle="tab" data-bs-target="#tab_terms_conditions"
                                            type="button" role="tab" aria-selected="true">
                                            <i class="fas fa-circle"></i>
                                            <span>Terms & Conditions</span>
                                        </button>
                                    </li>
                                    <li role="presentation">
                                        <button class="active" data-bs-toggle="tab" data-bs-target="#tab_terms_conditions"
                                            type="button" role="tab" aria-selected="true">
                                            <i class="fas fa-circle"></i>
                                            <span>Terms & Conditions</span>
                                        </button>
                                    </li>
                                    <li role="presentation">
                                        <button class="active" data-bs-toggle="tab" data-bs-target="#tab_terms_conditions"
                                            type="button" role="tab" aria-selected="true">
                                            <i class="fas fa-circle"></i>
                                            <span>Terms & Conditions</span>
                                        </button>
                                    </li>
                                    <li role="presentation">
                                        <button class="active" data-bs-toggle="tab" data-bs-target="#tab_terms_conditions"
                                            type="button" role="tab" aria-selected="true">
                                            <i class="fas fa-circle"></i>
                                            <span>Terms & Conditions</span>
                                        </button>
                                    </li>
                                    <li role="presentation">
                                        <button class="active" data-bs-toggle="tab" data-bs-target="#tab_terms_conditions"
                                            type="button" role="tab" aria-selected="true">
                                            <i class="fas fa-circle"></i>
                                            <span>Terms & Conditions</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="col col-lg-9">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tab_privacy_policy" role="tabpanel">
                                        <div class="terms_and_conditions">
                                            yo bruh
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab_terms_conditions" role="tabpanel">
                                        <div>
                                            how far bruh
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    --}}

    <div class="container ">
        <div class="row mt-5 mb-5">
            <div class="col-lg-3 ">
                <h2 class="fw-bold text-primary px-2 py-1 mb-2">Versions</h2>
                <ul class="list-group border-primary border">
                    @foreach ($changelogs as $changelog)
                        <li class="fw-bold list-item border px-2 py-1">{{env("APP_NAME").' '. $changelog->version }}  
                        @if (strtolower($changelog->version) == strtolower(env("APP_VERSION")))
                        <span
                        class="uk-label uk-margin-small-left">Current</span>
                        @endif
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-9">
                <div class="card shadow" style="height: 800px; background-color:aliceblue;">
                    <div class="card-body overflow-auto">
                        <div class="uk-section">
                            <div class="uk-container uk-container-small">
                                <article class="uk-article">
                                    <h1 class="uk-article-title">Changelog timeline</h1>
                                    <div class="article-content link-primary">
                                        <p>🚀 Welcome to Adcre8's Change Log! Discover the Exciting Evolution of Your
                                            Creative Hub. Be the First to Experience New Features, Enhancements, and More.
                                            Your Journey Just Got Even More Thrilling!
                                        </p>
                                        <div class="tm-timeline uk-margin-large-top">
                                            @foreach ($changelogs as $changelog)
                                                <div class="tm-timeline-entry">
                                                    <div class="tm-timeline-time">
                                                        <h5>{{ date_formatter($changelog->publish_date) }}</h5>
                                                    </div>
                                                    <div class="tm-timeline-body">
                                                        <h3 class="uk-flex uk-flex-middle">{{ $changelog->version }}<span
                                                                class="uk-label uk-margin-small-left">{{ $changelog->type }}</span>
                                                        </h3>
                                                        <ul class="uk-list">
                                                            @foreach ($changelog->change_description as $change)
                                                                <li>{{ $change }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <!-- Countdown Timer - jquery include -->
    <script src="{{ asset('guest/assets/js/countdown.js') }}"></script>

    <!-- Type - jquery include -->
    <script src="{{ asset('guest/assets/js/type.js') }}"></script>

    <!-- Setting - jquery include -->
    <script src="{{ asset('guest/assets/js/setting.js') }}"></script>

    <!-- Custom - Jquery Include -->
    <script src="{{ asset('guest/assets/js/main.js') }}"></script>

    {{-- <script src="https://html-theme-docs.vercel.app/js/awesomplete.js"></script> --}}
    <script src="{{ asset('guest/assets/changelog_stolen/awesomplete.js') }}"></script>
    <script src="{{ asset('guest/assets/changelog_stolen/custom.js') }}"></script>
@endpush
