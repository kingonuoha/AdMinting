@extends('layouts.ADM-guest')
@section('title')
    {{ ucwords(appSetting('app_name')) }} | Privacy Policy
@endsection
@section('meta_tags')
    <meta name='title' content=" {{ ucwords(appSetting('app_name')) }} | Privacy Policy">
    <meta property='og:title' content=" {{ ucwords(appSetting('app_name')) }} | Privacy Policy">
    <meta property='og:image' content="{{ asset('guest/assets/img/logo-blue.png') }}">
    <meta property='og:title' itemprop="name" name="twitter:title"
        content=" {{ ucwords(appSetting('app_name')) }} | Privacy Policy">
@endsection
@push('style')
@endpush


@section('content')
    <!-- Page Section - Start
            ================================================== -->
    <section class="page_banner text-center">
        <div class="container decoration_wrap">
            <h1 class="page_title">Terms & Conditions</h1>
            <ul class="breadcrumb_nav unordered_list_center">
                <li><a href="{{route('guest.home')}}">Home</a></li>
                <li>Terms & Conditions</li>
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

    <!-- Terms Conditions Section - Start
              ================================================== -->
    <section class="terms_conditions_section section_space_lg">
        <div class="container">
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
                    </ul>
                </div>
                <div class="col col-lg-9">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab_privacy_policy" role="tabpanel">
                            <div class="terms_conditions_content">
                                <h3 class="warpper_title">Privacy Policy Agreement</h3>
                                <p>
                                    Welcome to {{ env('APP_NAME') }}, a creative digital agency that connects digital
                                    marketers and brand ambassadors with brands. We are committed to protecting your privacy
                                    and ensuring the security of your personal information.
                                </p>
                                <p>
                                    This Privacy Policy outlines how we collect, use, disclose, and safeguard your
                                    information when you use our services.
                                </p>
                                <h4 class="info_title">Information We Collect</h4>
                                <ul class="icon_list unordered_list_block">
                                    <li>
                                        <span class="list_item_icon">
                                            <i class="fas fa-circle"></i>
                                        </span>
                                        <span class="list_item_text"><b>Personal Information:</b> When you register with
                                            {{ env('APP_NAME') }}, we may collect personal information such as your name,
                                            email address, and contact details.</span>
                                    </li>
                                    <li>
                                        <span class="list_item_icon">
                                            <i class="fas fa-circle"></i>
                                        </span>
                                        <span class="list_item_text"><b>Job-Related Information: </b>To connect you with job
                                            listings, we may collect information related to your skills, experience, and
                                            preferences.</span>
                                    </li>
                                    <li>
                                        <span class="list_item_icon">
                                            <i class="fas fa-circle"></i>
                                        </span>
                                        <span class="list_item_text"><b>Transaction Data:</b> We collect information about
                                            completed tasks, earnings, and payment details for our payment processing and
                                            reporting.</span>
                                    </li>
                                    {{-- <li>
                            <span class="list_item_icon">
                              <i class="fas fa-circle"></i>
                            </span>
                            <span class="list_item_text">Let's take a look at each of these reasons in more depth.</span>
                          </li> --}}
                                </ul>

                                <h4 class="info_title"> How We Use Your Information</h4>
                                <p>
                                    We use your information for the following purposes:
                                </p>
                                <ul class="icon_list unordered_list_block">
                                    <li>
                                        <span class="list_item_icon">
                                            <i class="fas fa-circle"></i>
                                        </span>
                                        <span class="list_item_text"><b>User Registration:</b> To create and manage your
                                            {{ env('APP_NAME') }} account.</span>
                                    </li>


                                    <li>
                                        <span class="list_item_icon">
                                            <i class="fas fa-circle"></i>
                                        </span>
                                        <span class="list_item_text"><b>Job Matching:</b> To connect you with suitable job
                                            listings.</span>
                                    </li>


                                    <li>
                                        <span class="list_item_icon">
                                            <i class="fas fa-circle"></i>
                                        </span>
                                        <span class="list_item_text"><b>Payment Processing:</b> To facilitate payments for
                                            completed tasks.</span>
                                    </li>
                                </ul>

                                <h4 class="info_title">Information Sharing</h4>
                                <p class="mb-1">
                                    We do not sell, trade, or rent your personal information to third parties. However, we
                                    may share your information with:
                                </p>
                                <ul class="icon_list unordered_list_block">

                                    <li>
                                        <span class="list_item_icon">
                                            <i class="fas fa-circle"></i>
                                        </span>
                                        <span class="list_item_text"><b>Brands:</b> We share your job-related information
                                            with brands to facilitate job listings and task assignments.</span>
                                    </li>

                                    <li>
                                        <span class="list_item_icon">
                                            <i class="fas fa-circle"></i>
                                        </span>
                                        <span class="list_item_text"><b>Service Providers:</b> We engage trusted third-party
                                            service providers to assist with various aspects of our operations.</span>
                                    </li>
                                </ul>

                                <h4 class="info_title">Data Security</h4>
                                <p>
                                    We implement industry-standard security measures to protect your personal information
                                    from unauthorized access, disclosure, alteration, and destruction. However, please be
                                    aware that no method of data transmission over the internet is entirely secure.
                                </p>




                                <h4 class="info_title"> Your Choices</h4>
                                <ul class="icon_list unordered_list_block">


                                    <li>
                                        <span class="list_item_icon">
                                            <i class="fas fa-circle"></i>
                                        </span>
                                        <span class="list_item_text"><b>Access and Correction:</b> You can access and update
                                            your personal information in your {{ env('APP_NAME') }} account
                                            settings.</span>
                                    </li>
                                    <li>
                                        <span class="list_item_icon">
                                            <i class="fas fa-circle"></i>
                                        </span>
                                        <span class="list_item_text"><b>Opt-Out:</b> You can opt-out of marketing
                                            communications by following the instructions in our emails.</span>
                                    </li>
                                    <li>
                                        <span class="list_item_icon">
                                            <i class="fas fa-circle"></i>
                                        </span>
                                        <span class="list_item_text"><b>Data Deletion:</b> You can request the deletion of
                                            your account and associated data.</span>
                                    </li>
                                </ul>


                                <h4 class="info_title"> Children's Privacy</h4>
                                <p class="mb-1">
                                    {{ env('APP_NAME') }} is not intended for use by individuals under the age of 18. We do
                                    not knowingly collect personal information from children.
                                </p>

                                <h4 class="info_title"> Changes to this Privacy Policy</h4>
                                <p class="mb-1">
                                    We may update this Privacy Policy to reflect changes in our practices or for other
                                    operational, legal, or regulatory reasons. We will notify you of any material changes
                                    through the email address associated with your account.
                                </p>

                                <h4 class="info_title"> Contact Us</h4>
                                <p class="mb-1">
                                    If you have questions, concerns, or requests regarding this Privacy Policy or your
                                    personal information, please contact us at {{ appSetting('app_email') }}.
                                </p>

                                <p class="mb-1">
                                    Thank you for choosing {{ env('APP_NAME') }}.
                                </p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab_terms_conditions" role="tabpanel">
                            <div class="terms_conditions_content">
                                <h3 class="warpper_title">Terms and Conditions Agreement</h3>
                                <p>
                                    By accessing or using the Adcre8 website and our services, you agree to comply with and
                                    be bound by these Terms and Conditions. If you do not agree with these Terms and
                                    Conditions, please do not use our Website or Services.
                                </p>
                                <h4 class="info_title"> User Accounts:</h4>
                                <ul class="icon_list unordered_list_block">

                                    <li>
                                        <span class="list_item_icon">
                                            <i class="fas fa-circle"></i>
                                        </span>
                                        <span class="list_item_text">
                                            You must be at least 18 years old to create an Adcre8 account.
                                        </span>
                                    </li>
                                    <li>
                                        <span class="list_item_icon">
                                            <i class="fas fa-circle"></i>
                                        </span>
                                        <span class="list_item_text">
                                            You are responsible for maintaining the security of your account login
                                            information.
                                        </span>
                                    </li>
                                    <li>
                                        <span class="list_item_icon">
                                            <i class="fas fa-circle"></i>
                                        </span>
                                        <span class="list_item_text">
                                            You agree to provide accurate, current, and complete information during the
                                            registration process.
                                        </span>
                                    </li>
                                </ul>
                                
                                <h4 class="info_title">  Job Listings and Task Assignments:</h4>
                                <ul class="icon_list unordered_list_block">
                                    

                                    <li>
                                        <span class="list_item_icon">
                                            <i class="fas fa-circle"></i>
                                        </span>
                                        <span class="list_item_text">
                                            Adcre8 connects digital marketers and brand ambassadors with brands for job
                                            listings and task assignments.
                                        </span>
                                    </li>


                                    <li>
                                        <span class="list_item_icon">
                                            <i class="fas fa-circle"></i>
                                        </span>
                                        <span class="list_item_text">
                                            Job listings and task assignments may be subject to additional terms and
                                            conditions specified by the brand.
                                        </span>
                                    </li>





                                </ul>


                                <h4 class="info_title"> Payments:</h4>
                                <ul class="icon_list unordered_list_block">

                                    <li>
                                        <span class="list_item_icon">
                                            <i class="fas fa-circle"></i>
                                        </span>
                                        <span class="list_item_text">
                                            Adcre8 connects digital marketers and brand ambassadors with brands for job
                                            listings and task assignments.
                                        </span>
                                    </li>


                                    <li>
                                        <span class="list_item_icon">
                                            <i class="fas fa-circle"></i>
                                        </span>
                                        <span class="list_item_text">
                                            Job listings and task assignments may be subject to additional terms and
                                            conditions specified by the brand.
                                        </span>
                                    </li>


                                    <li>
                                        <span class="list_item_icon">
                                            <i class="fas fa-circle"></i>
                                        </span>
                                        <span class="list_item_text">
                                            Adcre8 facilitates payments for completed tasks. Payment terms will be outlined
                                            in individual task assignments.
                                        </span>
                                    </li>


                                    <li>
                                        <span class="list_item_icon">
                                            <i class="fas fa-circle"></i>
                                        </span>
                                        <span class="list_item_text">
                                            Users are responsible for any taxes related to earnings from Adcre8.
                                        </span>
                                    </li>




                                </ul>


                                <h4 class="info_title"> Privacy:</h4>
                                <ul class="icon_list unordered_list_block">

                                    <li>
                                        <span class="list_item_icon">
                                            <i class="fas fa-circle"></i>
                                        </span>
                                        <span class="list_item_text">
                                            Adcre8 connects digital marketers and brand ambassadors with brands for job
                                            listings and task assignments.
                                        </span>
                                    </li>


                                    <li>
                                        <span class="list_item_icon">
                                            <i class="fas fa-circle"></i>
                                        </span>
                                        <span class="list_item_text">
                                            Job listings and task assignments may be subject to additional terms and
                                            conditions specified by the brand.
                                        </span>
                                    </li>


                                    <li>
                                        <span class="list_item_icon">
                                            <i class="fas fa-circle"></i>
                                        </span>
                                        <span class="list_item_text">
                                            Adcre8 facilitates payments for completed tasks. Payment terms will be outlined
                                            in individual task assignments.
                                        </span>
                                    </li>


                                    <li>
                                        <span class="list_item_icon">
                                            <i class="fas fa-circle"></i>
                                        </span>
                                        <span class="list_item_text">
                                            Users are responsible for any taxes related to earnings from Adcre8.
                                        </span>
                                    </li>


                                    <li>
                                        <span class="list_item_icon">
                                            <i class="fas fa-circle"></i>
                                        </span>
                                        <span class="list_item_text">
                                            Use of personal information is governed by our Privacy Policy, which is
                                            incorporated by reference into these Terms and Conditions.
                                        </span>
                                    </li>

                                </ul>

                                <h4 class="info_title">Prohibited Activities</h4>

                                <li>
                                    <span class="list_item_icon">
                                        <i class="fas fa-circle"></i>
                                    </span>
                                    <span class="list_item_text">Violate any applicable laws or regulations.</span>
                                </li>

                                <li>
                                    <span class="list_item_icon">
                                        <i class="fas fa-circle"></i>
                                    </span>
                                    <span class="list_item_text">Use the Website or Services for any unlawful
                                        purpose.</span>
                                </li>

                                <li>
                                    <span class="list_item_icon">
                                        <i class="fas fa-circle"></i>
                                    </span>
                                    <span class="list_item_text">Share your account login information with others.</span>
                                </li>

                                <li>
                                    <span class="list_item_icon">
                                        <i class="fas fa-circle"></i>
                                    </span>
                                    <span class="list_item_text">Impersonate any person or entity.</span>
                                </li>

                                <li>
                                    <span class="list_item_icon">
                                        <i class="fas fa-circle"></i>
                                    </span>
                                    <span class="list_item_text">Engage in any activity that may disrupt the Website or
                                        Services.</span>
                                </li>



                                <h4 class="info_title"> Termination</h4>
                                <p>
                                    Adcre8 may suspend or terminate your account at its sole discretion, with or without
                                    cause and with or without notice.
                                </p>




                                <h4 class="info_title"> Disclaimers</h4>

                                <li>
                                    <span class="list_item_icon">
                                        <i class="fas fa-circle"></i>
                                    </span>
                                    <span class="list_item_text">Adcre8 does not endorse or guarantee the accuracy of any
                                        job listings or task assignments.</span>
                                </li>

                                <li>
                                    <span class="list_item_icon">
                                        <i class="fas fa-circle"></i>
                                    </span>
                                    <span class="list_item_text">We are not responsible for the actions or conduct of
                                        brands, digital marketers, or brand ambassadors.</span>
                                </li>

                                <h4 class="info_title"> Changes to this Terms of service</h4>
                                <p class="mb-1">
                                    To the extent permitted by law, Adcre8 shall not be liable for any direct, indirect,
                                    incidental, consequential, or punitive damages arising out of or in connection with the
                                    use of our Website or Services.
                                </p>


                                <h4 class="info_title"> Changes to this Privacy Policy</h4>
                                <p class="mb-1">
                                    Adcre8 reserves the right to modify or update these Terms and Conditions at any time.
                                    You are responsible for regularly reviewing the Terms and Conditions.
                                </p>
                                <h4 class="info_title">Governing Law</h4>
                                <p class="mb-1">
                                    These Terms and Conditions are governed by and construed in accordance with the laws of
                                    Imo state, Nigeria.
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Terms Conditions Section - End
              ================================================== -->
@endsection
