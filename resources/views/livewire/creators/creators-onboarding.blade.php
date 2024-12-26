<div>
    @push('select2style')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.0/nouislider.css"
            integrity="sha512-MKxcSu/LDtbIYHBNAWUQwfB3iVoG9xeMCm32QV5hZ/9lFaQZJVaXfz9aFa0IZExWzCpm7OWvp9zq9gVip/nLMg=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endpush
    <div class="d-flex flex-column flex-lg-row flex-column-fluid stepper stepper-pills stepper-column stepper-multistep"
        id="kt_advertiser_onboarding">
        <!--begin::Aside-->
        <div wire:ignore.self class="d-flex flex-column flex-lg-row-auto w-lg-350px w-xl-500px">
            <div wire:ignore
                class="d-flex flex-column position-lg-fixed top-0 bottom-0 w-lg-350px w-xl-500px scroll-y bgi-size-cover bgi-position-center"
                style="background-image: url({{ asset('users/assets/media/misc/auth-bg.png') }})">
                <!--begin::Header-->
                <div class="d-flex flex-center py-10 py-lg-20 mt-lg-20">
                    <!--begin::Logo-->
                    <a href="index.html">
                        <x-application-logo-main class="h-70px" />
                    </a>
                    <!--end::Logo-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="d-flex flex-row-fluid justify-content-center p-10">
                    <!--begin::Nav-->
                    <div class="stepper-nav">
                        <!--begin::Step 1-->
                        <div class="stepper-item current" data-kt-stepper-element="nav">
                            <!--begin::Wrapper-->
                            <div class="stepper-wrapper">
                                <!--begin::Icon-->
                                <div class="stepper-icon rounded-3">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">1</span>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title fs-2">Personal Info</h3>
                                    <div class="stepper-desc fw-normal">Tell us a little more about yourself</div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Line-->
                            <div class="stepper-line h-40px"></div>
                            <!--end::Line-->
                        </div>
                        <!--end::Step 1-->
                        <!--begin::Step 2-->
                        <div class="stepper-item" data-kt-stepper-element="nav">
                            <!--begin::Wrapper-->
                            <div class="stepper-wrapper">
                                <!--begin::Icon-->
                                <div class="stepper-icon rounded-3">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">2</span>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title fs-2">Professional Info</h3>
                                    <div class="stepper-desc fw-normal">Set up informations about your profession</div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Line-->
                            <div class="stepper-line h-40px"></div>
                            <!--end::Line-->
                        </div>
                        <!--end::Step 2-->
                        <!--begin::Step 3-->
                        <div class="stepper-item" data-kt-stepper-element="nav">
                            <!--begin::Wrapper-->
                            <div class="stepper-wrapper">
                                <!--begin::Icon-->
                                <div class="stepper-icon">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">3</span>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title fs-2">Linked Accounts</h3>
                                    <div class="stepper-desc fw-normal">link up your social Accounts</div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Line-->
                            <div class="stepper-line h-40px"></div>
                            <!--end::Line-->
                        </div>
                        <!--end::Step 3-->
                        <!--begin::Step 4-->
                        <div class="stepper-item" data-kt-stepper-element="nav">
                            <!--begin::Wrapper-->
                            <div class="stepper-wrapper">
                                <!--begin::Icon-->
                                <div class="stepper-icon">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">4</span>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title">Contacts</h3>
                                    <div class="stepper-desc fw-normal">Set Up You contacts</div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->
                            <!--end::Wrapper-->
                            <!--begin::Line-->
                            <div class="stepper-line h-40px"></div>
                            <!--end::Line-->
                        </div>
                        <!--end::Step 4-->
                        <!--begin::Step 5-->
                        <div class="stepper-item" data-kt-stepper-element="nav">
                            <!--begin::Wrapper-->
                            <div class="stepper-wrapper">
                                <!--begin::Icon-->
                                <div class="stepper-icon">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">5</span>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title">Completed</h3>
                                    <div class="stepper-desc fw-normal">Your account is created</div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Step 5-->
                    </div>
                    <!--end::Nav-->
                </div>
                <!--end::Body-->
                <!--begin::Footer-->
                <div class="d-flex flex-center flex-wrap px-5 py-10">
                    <!--begin::Links-->
                    <div class="d-flex fw-normal">
                        <a href="{{route('guest.privacy_policy')}}" class="text-success px-5" target="_blank">Terms</a>
                        <a href="#" class="text-success px-5" target="_blank">Contact Us</a>
                    </div>
                    <!--end::Links-->
                </div>
                <!--end::Footer-->
            </div>
        </div>
        <!--begin::Aside-->
        <!--begin::Body-->
        <div class="d-flex flex-column flex-lg-row-fluid py-10">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid">
                <!--begin::Wrapper-->
                <div class="w-lg-650px w-xl-700px p-10 p-lg-15 mx-auto">
                    <!--begin::Form-->
                    {{-- <form class="my-auto pb-5" novalidate="novalidate" id="kt_create_account_form" data-kt-redirect-url="account/overview.html"> --}}
                    <!--begin::Step 1-->
                    <div wire:ignore.self class="current" data-kt-stepper-element="content">
                        <!--begin::Wrapper-->
                        <div class="w-100">
                            <h1>We need a little more informaton about you</h1>

                            <div class="border-gray-300 border-bottom border-bottom-dashed mb-8"></div>

                            <!--begin::Heading-->
                            <div class="pb-10 pb-lg-15">
                                <!--begin::Title-->
                                <h2 class="fw-bold d-flex align-items-center text-dark">Personal Info
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                        title="This section is important as your prospective client gets to see it to make certain descisions"></i>
                                </h2>
                                <!--end::Title-->
                                <!--begin::Notice-->
                                <div class="text-muted fw-semibold fs-6">If you need more info, please check out
                                    <a href="#" class="link-primary fw-bold">Help Page</a>.
                                </div>
                                <!--end::Notice-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Input group-->
                            <form wire:submit.prevent="stepOne">
                                <div class="fv-row">
                                    <!--begin::Row-->
                                    <div class="row ">
                                        <div class="col-lg-6 mb-10">
                                            <label class="required form-label">Name</label>
                                            <input wire:model="name" type="text" class="form-control"
                                                placeholder="Example input" />
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 mb-10">
                                            <label class="required form-label">Date of Birth <i
                                                    class="fas fa-exclamation-circle ms-2 fs-7"
                                                    data-bs-toggle="tooltip"
                                                    title="This is been used by us to celebrate you on your special day!"></i>
                                                </h2></label>
                                            <input wire:model="dob" class="form-control" placeholder="Pick a date"
                                                id="kt_datepicker_1" />
                                            @error('dob')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <div class="row ">
                                        <div class="col-lg-6">
                                            <div class="mb-5">
                                                <label class="form-label">State of Residence<i
                                                        class="fas fa-exclamation-circle ms-2 fs-7"
                                                        data-bs-toggle="tooltip"
                                                        title="this is a space where you can really describe yourself, your personality, work done and experience!"></i>
                                                    </h2></label>
                                                <select class="form-select" wire:model="userState">
                                                    <option value="">CHOOSE STATE</option>
                                                    @foreach ($states as $state)
                                                        <option value="{{ $state->id }}">{{ $state->state }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                {{-- {{$userState}} --}}
                                                @error('userState')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">

                                            <div class="mb-5">
                                                <label class="form-label">Religion <i
                                                        class="fas fa-exclamation-circle ms-2 fs-7"
                                                        data-bs-toggle="tooltip"
                                                        title="this is a space where you can really describe yourself, your personality, work done and experience!"></i>
                                                    </h2></label>
                                                <select class="form-select" wire:model="religion">
                                                    <option value="">Choose Religion</option>
                                                    @foreach (\App\Models\AdvertiserInfo::$religion as $religion)
                                                        <option value="{{ $religion }}">{{ $religion }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('religion')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Row-->
                                    <div class="row ">
                                        <div class="mb-5">
                                            <label class="form-label">Bio <i
                                                    class="fas fa-exclamation-circle ms-2 fs-7"
                                                    data-bs-toggle="tooltip"
                                                    title="this is a space where you can really describe yourself, your personality, work done and experience!"></i>
                                                </h2></label>
                                            <textarea wire:model.lazy="bio" rows="6" class="form-control" placeholder="Enter Bio..."></textarea>
                                            @error('bio')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                </div>

                                <div class="d-flex flex-stack pt-15">
                                    <div class="mr-2">

                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-lg btn-primary"
                                            data-kt-stepper-action="submit">
                                            <span class="indicator-label">Submit
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg')}}-->
                                                <span class="svg-icon svg-icon-4 ms-2">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="18" y="13" width="13"
                                                            height="2" rx="1"
                                                            transform="rotate(-180 18 13)" fill="currentColor" />
                                                        <path
                                                            d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon--></span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <x-button loading="stepOne">
                                            Continue
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg')}}-->
                                            <span class="svg-icon svg-icon-4 ms-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="18" y="13" width="13" height="2"
                                                        rx="1" transform="rotate(-180 18 13)"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </x-button>
                                    </div>
                                </div>
                            </form>
                            <!--end::Input group-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Step 1-->
                    <!--begin::Step 2-->
                    <div wire:ignore.self class="" data-kt-stepper-element="content">
                        <!--begin::Wrapper-->
                        <form wire:submit.prevent="stepTwo">

                            <div class="w-100">
                                <!--begin::Heading-->
                                <div class="pb-10 pb-lg-15">
                                    <!--begin::Title-->
                                    <h2 class="fw-bold text-dark">Professional Info</h2>
                                    <!--end::Title-->
                                    <!--begin::Notice-->
                                    <div class="text-muted fw-semibold fs-6">If you need more info, please check out
                                        <a href="#" class="link-primary fw-bold">Help Page</a>.
                                    </div>
                                    <!--end::Notice-->
                                </div>
                                <!--end::Heading-->

                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-5 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center form-label mb-5">Select Category
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                            title="Gigs and Jobs will be shown to you based on the category selected"></i></label>
                                    <!--end::Label-->
                                    <!--begin::Options-->
                                    {{-- {{ $selected_category}} --}}
                                    <div wire:ignore>
                                        <input class="form-control form-control-solid"
                                            wire:model.lazy="selected_category" id="category_tagify" />
                                    </div>
                                    <div class="fv-plugins-message-container invalid-feedback">
                                        @error('selected_category')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <!--begin::Input group-->
                                <div class="mb-5 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center form-label mb-5">Portfolio Link</label>
                                    <!--end::Label-->
                                    <input wire:model="portfolio_url" type="url"
                                        placeholder="Enter Portfolio link" class="form-control">
                                    <div class="fv-plugins-message-container invalid-feedback">
                                        @error('portfolio_url')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <!--end::Input group-->

                                <div class="d-flex flex-stack pt-15">
                                    <div class="mr-2">
                                        <button type="button" class="btn btn-lg btn-light-primary me-3"
                                            onclick="stepperGoPrevious()">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg')}}-->
                                            <span class="svg-icon svg-icon-4 me-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="6" y="11" width="13" height="2"
                                                        rx="1" fill="currentColor" />
                                                    <path
                                                        d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Previous</button>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-lg btn-primary"
                                            data-kt-stepper-action="submit">
                                            <span class="indicator-label">Submit
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg')}}-->
                                                <span class="svg-icon svg-icon-4 ms-2">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="18" y="13" width="13"
                                                            height="2" rx="1"
                                                            transform="rotate(-180 18 13)" fill="currentColor" />
                                                        <path
                                                            d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon--></span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <x-button loading="stepTwo">
                                            Continue
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg')}}-->
                                            <span class="svg-icon svg-icon-4 ms-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="18" y="13" width="13" height="2"
                                                        rx="1" transform="rotate(-180 18 13)"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                        fill="currentColor" />
                                                </svg>
                                        </x-button>
                                    </div>
                                </div>
                            </div>
                            <!--end::Wrapper-->
                        </form>

                    </div>
                    <!--end::Step 2-->
                    <!--begin::Step 3-->
                    <div class="" data-kt-stepper-element="content" wire:ignore.self>
                        <!--begin::Wrapper-->
                        <div class="w-100">
                            <div class="card mb-5 mb-xl-10">
                                <!--begin::Card header-->
                                <div class="card-header border-0 cursor-pointer" role="button"
                                    data-bs-toggle="collapse" data-bs-target="#kt_account_connected_accounts"
                                    aria-expanded="true" aria-controls="kt_account_connected_accounts">
                                    <div class="card-title m-0">
                                        <h3 class="fw-bold m-0">Connect Accounts</h3>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Content-->
                                <div id="kt_account_settings_connected_accounts" class="collapse show">
                                   <x-_connect-social-account :socials="$socials" :user-social-accounts="$userSocialAccounts" />

                                </div>
                                <!--end::Content-->
                            </div>
                            <div class="d-flex flex-stack pt-15">
                                <div class="mr-2">
                                    <button type="button" class="btn btn-lg btn-light-primary me-3"
                                        onclick="stepperGoPrevious()">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg')}}-->
                                        <span class="svg-icon svg-icon-4 me-1">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="6" y="11" width="13" height="2"
                                                    rx="1" fill="currentColor" />
                                                <path
                                                    d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->Previous</button>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-lg btn-primary"
                                        data-kt-stepper-action="submit">
                                        <span class="indicator-label">Submit
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg')}}-->
                                            <span class="svg-icon svg-icon-4 ms-2">
                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="18" y="13" width="13" height="2"
                                                        rx="1" transform="rotate(-180 18 13)"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon--></span>
                                        <span class="indicator-progress">Please wait...
                                            <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                    <x-button loading="stepThree" wire:click="stepThree">Continue
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg')}}-->
                                        <span class="svg-icon svg-icon-4 ms-1">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="18" y="13" width="13" height="2"
                                                    rx="1" transform="rotate(-180 18 13)"
                                                    fill="currentColor" />
                                                <path
                                                    d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon--></x-button>
                                </div>
                            </div>
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Step 3-->
                    <!--begin::Step 4-->
                    <div class="" data-kt-stepper-element="content" wire:ignore.self>
                        <!--begin::Wrapper-->
                        <div class="w-100">
                            <div class="card mb-5 mb-xl-10">
                                <!--begin::Card header-->
                                <div class="card-header border-0 cursor-pointer" role="button"
                                    data-bs-toggle="collapse" data-bs-target="#kt_account_connected_accounts"
                                    aria-expanded="true" aria-controls="kt_account_connected_accounts">
                                    <div class="card-title m-0">
                                        <h3 class="fw-bold m-0">Extra Security</h3>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Content-->
                                <div id="kt_account_settings_connected_accounts" class="collapse show">
                                    <!--begin::Card body-->
                                    <div class="card-body border-top p-9">
                                        <!--begin::Notice-->
                                        <div
                                            class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                                            <!--begin::Icon-->
                                            <!--begin::Svg Icon | path: icons/duotune/art/art006.svg-->
                                            <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3"
                                                        d="M22 19V17C22 16.4 21.6 16 21 16H8V3C8 2.4 7.6 2 7 2H5C4.4 2 4 2.4 4 3V19C4 19.6 4.4 20 5 20H21C21.6 20 22 19.6 22 19Z"
                                                        fill="currentColor"></path>
                                                    <path
                                                        d="M20 5V21C20 21.6 19.6 22 19 22H17C16.4 22 16 21.6 16 21V8H8V4H19C19.6 4 20 4.4 20 5ZM3 8H4V4H3C2.4 4 2 4.4 2 5V7C2 7.6 2.4 8 3 8Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <!--end::Icon-->
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-stack flex-grow-1">
                                                <!--begin::Content-->
                                                <div class="fw-semibold">
                                                    <div class="fs-6 text-gray-700">Let’s stay in touch! Add your contact details below so we can keep you updated with the latest buzz, exciting opportunities, and exclusive goodies. Don’t worry, no spam—just pure awesomeness!
                                                        <a href="#" class="fw-bold">Learn More</a>
                                                    </div>
                                                </div>
                                                <!--end::Content-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Notice-->
                                        <!--begin::Items-->
                                        <div class="py-2">
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack">
                                                <div class="d-flex">
                                                    {{-- <img src="{{asset('users/assets/media/svg/brand-logos/google-icon.svg')}}" class="w-30px me-6" alt=""> --}}
                                                    <div class="d-flex flex-column">
                                                        <a href="#"
                                                            class="fs-5 text-dark text-hover-primary fw-bold">Email</a>
                                                        <div class="fs-6 fw-semibold text-gray-400">Get News letter and
                                                            instant Updates</div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    @if (auth()->user()->email_verified_at == null)
                                                        <a href="#"
                                                            class="btn btn-outline btn-outline-dashed btn-outline-info btn-active-light-info">Connect</a>
                                                    @else
                                                        <a href="#"
                                                            class="btn btn-outline btn-outline-dashed btn-outline-success btn-active-light-info">Verified</a>
                                                    @endif
                                                </div>
                                            </div>
                                            <!--end::Item-->
                                            <div class="separator separator-dashed my-5"></div>
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack">
                                                <div class="d-flex">
                                                    {{-- <img src="{{asset('users/assets/media/svg/brand-logos/github.svg')}}" class="w-30px me-6" alt=""> --}}
                                                    <div class="d-flex flex-column">
                                                        <a href="#"
                                                            class="fs-5 text-dark text-hover-primary fw-bold">Phone
                                                            Number</a>
                                                        <div class="fs-6 fw-semibold text-gray-400">Lets Keep in touch
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end flex-column">
                                                    <button type="button"
                                                        class="mb-1 btn btn-outline btn-outline-dashed btn-outline-info btn-active-light-info"
                                                        wire:click="showAddNumber()">Add new</button>
                                                    @error('phone_numbers')
                                                        <span class="text-danger mb-5">{{ $message }}</span>
                                                    @enderror
                                                    @if (!is_null($phone_numbers))
                                                        @forelse ($phone_numbers as $item)
                                                            <p class="text-success text-md fs-bold">
                                                                {{ $item }}</p>

                                                        @empty
                                                            <div class="text-info">No phone Number Added Yet!</div>
                                                        @endforelse
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                        <!--end::Items-->
                                        <div class="d-flex flex-stack pt-15">
                                            <div class="mr-2">
                                                <button type="button" class="btn btn-lg btn-light-primary me-3"
                                                    onclick="stepperGoPrevious()">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg')}}-->
                                                    <span class="svg-icon svg-icon-4 me-1">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.5" x="6" y="11" width="13"
                                                                height="2" rx="1" fill="currentColor" />
                                                            <path
                                                                d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->Previous</button>
                                            </div>
                                            <div>
                                                {{-- <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="submit">
                                                        <span class="indicator-label">Submit 
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg')}}-->
                                                        <span class="svg-icon svg-icon-4 ms-2">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                                                                <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon--></span>
                                                        <span class="indicator-progress">Please wait... 
                                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    </button> --}}
                                                <x-button loading="stepFour" wire:click="stepFour">Continue
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg')}}-->
                                                    <span class="svg-icon svg-icon-4 ms-1">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.5" x="18" y="13" width="13"
                                                                height="2" rx="1"
                                                                transform="rotate(-180 18 13)" fill="currentColor" />
                                                            <path
                                                                d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon--></x-button>

                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Card body-->

                                </div>
                                <!--end::Content-->
                            </div>
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Step 4-->
                    <!--begin::Step 5-->
                    <div class="" data-kt-stepper-element="content" wire:ignore.self>
                        <!--begin::Wrapper-->
                        <div class="w-100">
                            <!--begin::Heading-->
                            <div class="pb-8 pb-lg-10">
                                <div class="card card-flush h-md-100">
                                    <!--begin::Body-->
                                    <div class="card-body d-flex flex-column justify-content-between mt-9 bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0"
                                        style="background-position: 100% 50%; background-image:url('{{ asset('user/assets/media/stock/900x600/42.png') }}')">
                                        <!--begin::Wrapper-->
                                        <div class="mb-10">
                                            <!--begin::Title-->
                                            <div class="fs-2hx fw-bold text-gray-800 text-center mb-13">
                                                <span class="me-2">Your Are Done! You can now head on to Your
                                                    <br>
                                                    <span class="position-relative d-inline-block text-danger">
                                                        <a href="{{ route('dashboard') }}"
                                                            class="text-danger opacity-75-hover">Dashboard</a>
                                                        <!--begin::Separator-->
                                                        <span
                                                            class="position-absolute opacity-15 bottom-0 start-0 border-4 border-danger border-bottom w-100"></span>
                                                        <!--end::Separator-->
                                                    </span></span>To get full experience!
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Action-->
                                            <div class="text-center">
                                                <a href="{{ route('dashboard') }}"
                                                    class="btn btn-sm btn-dark fw-bold">Go To Dash</a>
                                            </div>
                                            <!--begin::Action-->
                                        </div>
                                        <!--begin::Wrapper-->
                                        <!--begin::Illustration-->
                                        <img class="mx-auto h-200px h-lg-300px "
                                            src="{{ asset('users/assets/media/illustrations/sketchy-1/17.png') }}"
                                            alt="">
                                        <!--end::Illustration-->
                                    </div>
                                    <!--end::Body-->
                                </div>

                            </div>
                            <!--end::Heading-->
                            <!--begin::Body-->

                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Step 5-->
                    <!--begin::Actions-->
                    {{-- <div class="d-flex flex-stack pt-15">
                            <div class="mr-2">
                                <button type="button" class="btn btn-lg btn-light-primary me-3" onclick="stepperGoPrevious()">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg')}}-->
                                <span class="svg-icon svg-icon-4 me-1">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="currentColor" />
                                        <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->Previous</button>
                            </div>
                            <div>
                                <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="submit">
                                    <span class="indicator-label">Submit 
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg')}}-->
                                    <span class="svg-icon svg-icon-4 ms-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                                            <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon--></span>
                                    <span class="indicator-progress">Please wait... 
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Continue 
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg')}}-->
                                <span class="svg-icon svg-icon-4 ms-1">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                                        <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon--></button>
                            </div>
                        </div> --}}
                    <!--end::Actions-->
                    {{-- </form> --}}
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Body-->


        <div wire:ignore.self class="modal fade" tabindex="-1" id="addNumberModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Add Phone Number</h3>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                        <!--end::Close-->
                    </div>

                    <form wire:submit.prevent="savePhoneNumber" id="institutionForm">
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col-12 mb-3">
                                    <!--begin::Label-->
                                    <label class="form-label mb-3">Enter phone Number</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->

                                    <input class="form-control" placeholder="EG(+234 1234 567 89011)" type="tel"
                                        wire:model="phone_number">
                                    <span class="text-danger">
                                        @error('phone_number')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                    <!--end::Input-->
                                </div>

                            </div>
                            @if (session()->has('success'))
                                <span class="text-success">{{ session('success') }}</span>
                            @endif
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <x-button loading="savePhoneNumber">Add</x-button>
                            {{-- <button type="submit"   class="ml-3 hover-rotate-end btn btn-active-success  ">Add</button> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
       
        <div wire:ignore.self class="modal fade" tabindex="-1" id="connectedAccountModal">
            @if (!is_null($seeSocialAccounts))
                
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Connected {{ ucfirst($seeSocialAccounts['platform']) }} Account</h3>
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" wire:click="closeConectedAccountModal">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                        <!--end::Close-->
                    </div>

                        <div class="modal-body">
                            <div class="row mb-3 max-h-300px scroll-y">
                                <div class="col-12 mb-3" wire:ignore>
                                    <!--begin::Label-->
                                    <label class="form-label mb-3">List of your connected {{ ucfirst($seeSocialAccounts['platform']) }} Accounts</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    @foreach ($seeSocialAccounts['accounts'] as $social_account)
                                    @php
                                        // Convert $social_account to an object if it's an array
                                        $social_account = is_array($social_account) ? (object) $social_account : $social_account;
                                    @endphp
                                    <div class="d-flex flex-stack">
                                        <div class="d-flex">
                                            <img src="{{ empty($social_account->profile) ? 'https://placehold.co/400?text=No+Photo&font=roboto' : $social_account->profile }}"
                                                 class="w-50px me-6" alt="">
                                            <div class="d-flex flex-column">
                                                <a href="#"
                                                   class="fs-2 text-dark text-hover-primary fw-bold">{{ $social_account->name }}</a>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <x-button disabled type="button"
                                                      class="btn btn-outline btn-outline-dashed btn-outline-info btn-active-light-info">
                                                {{ count($social_account->socialPages ?? []) }} Pages
                                            </x-button>
                                        </div>
                                    </div>

                                    <div class="separator separator-dashed my-5"></div>
                                @endforeach
                                </div>

                            </div>
                        </div>

                        <div class="modal-footer">
                            <x-button type="button" class="btn btn-light" loading="closeConectedAccountModal" wire:click.prevent="closeConectedAccountModal">Close</x-button>
                        </div>
                </div>
            </div>

            @endif

        </div>
    </div>
    @push('select2Script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.0/nouislider.min.js"
            integrity="sha512-UOJe4paV6hYWBnS0c9GnIRH8PLm2nFK22uhfAvsTIqd3uwnWsVri1OPn5fJYdLtGY3wB11LGHJ4yPU1WFJeBYQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            // submiting instittution form
            $('#submitInstitution').click(() => {
                $("form#institutionForm").submit();
            })
            $('#university-select').select2();
            $('#university-select').on('change', function(e) {
                var data = $('#university-select').select2("val");
                @this.set('institution', data);
                // alert('hi');
            });


            let categories = @js($category);
            var category_input = document.querySelector("#category_tagify");
            //tagify
            // The DOM elements you wish to replace with Tagify
            new Tagify(category_input, {
                whitelist: categories.category_name,
                maxTags: 4,
                enforceWhitelist: true,
                originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(','),
                dropdown: {
                    maxItems: 20, // <- mixumum allowed rendered suggestions
                    classname: "tagify__inline__suggestions", // <- custom classname for this dropdown, so it could be targeted
                    enabled: 0, // <- show suggestions on focus
                    closeOnSelect: false // <- do not hide the suggestions dropdown once an item has been selected
                }
            }).on('invalid', onInvalidTag)


            $(category_input).on('change', () => {
                let data = category_input.value;
                console.log(category_input.value);
                @this.set('selected_category', data);

            });

            function onInvalidTag(e) {

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

                toastr.warning(e.detail.message, "Warning!");
            }
            //    })




            window.addEventListener('social:open-connected', () => {
                $("#connectedAccountModal").modal('show')
            });
            window.addEventListener('social:Instagram', () => {
                $("#InstagramModal").modal('show')
            });
            window.addEventListener('social:Facebook', () => {
                $("#FacebookModal").modal('show')
            });
            window.addEventListener('social:Twitter', () => {
                $("#TwitterModal").modal('show')
            });
            window.addEventListener('social:Linkedin', () => {
                $("#LinkedinModal").modal('show')
            });

            //  close modals 
            window.addEventListener('social:close-connected', () => {
                $("#connectedAccountModal").modal('hide')
            });
            window.addEventListener('social:InstagramClose', () => {
                $("#InstagramModal").modal('hide')
            });
            window.addEventListener('social:FacebookClose', () => {
                $("#FacebookModal").modal('hide')
            });
            window.addEventListener('social:TwitterClose', () => {
                $("#TwitterModal").modal('hide')
            });
            window.addEventListener('social:LinkedinClose', () => {
                $("#LinkedinModal").modal('hide')
            });
        </script>
    @endpush

</div>
