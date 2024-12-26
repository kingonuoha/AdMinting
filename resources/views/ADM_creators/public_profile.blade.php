@extends('layouts.ADM_app')
@section('title')
    {{env("APP_NAME")}} | {{$user->name}} Profile
@endsection
@section('content')

<div class="d-flex flex-column flex-lg-row">
    <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
        <x-account-banner-vertical :sumFollowers="$sumFollowers"  :userId="$user->id" />
    </div>
    <div class="flex-lg-row-fluid ms-lg-15">
        <!--begin:::Tabs-->
        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8" role="tablist">
            <!--begin:::Tab item-->
            <li class="nav-item" role="presentation">
                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_user_view_overview_tab" aria-selected="true" role="tab">Social Accounts</a>
            </li>
            <!--end:::Tab item-->
            <!--begin:::Tab item-->
            <li class="nav-item" role="presentation">
                <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#kt_user_view_overview_security" data-kt-initialized="1" aria-selected="false" role="tab" tabindex="-1">Listing</a>
            </li>
            <!--end:::Tab item-->
           
            {{-- <!--begin:::Tab item-->
            <li class="nav-item ms-auto">
                <!--begin::Action menu-->
                <a href="#" class="btn btn-primary ps-7" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">Actions 
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-2 me-0">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                    </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold py-4 w-250px fs-6" data-kt-menu="true">
                    <!--begin::Menu item-->
                    <div class="menu-item px-5">
                        <div class="menu-content text-muted pb-2 px-5 fs-7 text-uppercase">Payments</div>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-5">
                        <a href="#" class="menu-link px-5">Create invoice</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-5">
                        <a href="#" class="menu-link flex-stack px-5">Create payments 
                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" aria-label="Specify a target name for future usage and reference" data-kt-initialized="1"></i></a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start">
                        <a href="#" class="menu-link px-5">
                            <span class="menu-title">Subscription</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <!--begin::Menu sub-->
                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-5">Apps</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-5">Billing</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-5">Statements</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu separator-->
                            <div class="separator my-2"></div>
                            <!--end::Menu separator-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <div class="menu-content px-3">
                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                        <input class="form-check-input w-30px h-20px" type="checkbox" value="" name="notifications" checked="checked" id="kt_user_menu_notifications">
                                        <span class="form-check-label text-muted fs-6" for="kt_user_menu_notifications">Notifications</span>
                                    </label>
                                </div>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu sub-->
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu separator-->
                    <div class="separator my-3"></div>
                    <!--end::Menu separator-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-5">
                        <div class="menu-content text-muted pb-2 px-5 fs-7 text-uppercase">Account</div>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-5">
                        <a href="#" class="menu-link px-5">Reports</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-5 my-1">
                        <a href="#" class="menu-link px-5">Account Settings</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-5">
                        <a href="#" class="menu-link text-danger px-5">Delete customer</a>
                    </div>
                    <!--end::Menu item-->
                </div>
                <!--end::Menu-->
                <!--end::Menu-->
            </li>
            <!--end:::Tab item--> --}}
        </ul>
        <!--end:::Tabs-->
        <!--begin:::Tab content-->
        <div class="tab-content" id="myTabContent">
            <!--begin:::Tab pane-->
            <div class="tab-pane fade active show" id="kt_user_view_overview_tab" role="tabpanel">
                <!--begin::Tasks-->
                <div class="card card-flush mb-6 mb-xl-9">
                    <!--begin::Card header-->
                    <div class="card-header mt-6">
                        <!--begin::Card title-->
                        <div class="card-title flex-column">
                            <h2 class="mb-1">{{$user->name}} Pages </h2>
                            <div class="fs-6 fw-semibold text-muted">Total {{count($pages)}} Pages</div>
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                      
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body d-flex flex-column max-h-600px scroll-y">
                    @foreach ($pages as $page)
                            <!--begin::Item-->
                            <div class="d-flex align-items-center position-relative mb-7">
                                <!--begin::Label-->
                                <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                <!--end::Label-->
                                <!--begin::Details-->
                                <div class="fw-semibold ms-5">
                                    <a href="{{route('social_page.overview', $page->id)}}" class="fs-5 fw-bold text-dark text-hover-primary">{{$page->page_name}}</a>
                                    <!--begin::Info-->
                                    <div class="fs-7 text-muted"><a href="#">{{$page->followers ?? "--"}}</a> followers/suscriber </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Menu-->
                                <a href="{{route('social_page.overview', $page->id)}}"  class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="currentColor"></path>
                                            <path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                <!--end::Menu-->
                            </div>
                            <!--end::Item-->
                    @endforeach
                       
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Tasks-->
            </div>
            <!--end:::Tab pane-->
            <!--begin:::Tab pane-->
            <div class="tab-pane fade" id="kt_user_view_overview_security" role="tabpanel">
                <!--begin::Card-->
                <div class="card pt-4 mb-6 mb-xl-9">
                    <!--begin::Card header-->
                    <div class="card-header border-0">
                        <!--begin::Card title-->
                        <div class="card-title flex-column">
                            <h2>Listings</h2>
                            <div class="fs-6 fw-semibold text-muted">A list of {{$user->name}} listings</div>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body row">
                        <div class="row">
                            @foreach ($listings as $listing)
                                @php
                                    $media = $listing->media ?? [];
                                    $firstMedia = $media[0] ?? null;
                                @endphp
                                <div class="col-md-4 mb-4">
                                    <div class="card listing-card" data-listing-id="{{ $loop->index }}">
                                        <div class="media-wrapper">
                                            <!-- Media Container for Lazy Loading -->
                                            @foreach ($media as $index => $item)
                                                @if ($item->type === 'image')
                                                    <img 
                                                        class="media-item lazy-media {{ $index === 0 ? 'active' : '' }}" 
                                                        data-src="{{ $item->url }}" 
                                                        alt="Listing Image" 
                                                    />
                                                @elseif ($item->type === 'video')
                                                    <video 
                                                        class="media-item lazy-media {{ $index === 0 ? 'active' : '' }}" 
                                                        data-src="{{ $item->url }}" 
                                                        muted 
                                                        playsinline 
                                                        loop>
                                                    </video>
                                                @endif
                                            @endforeach
                        
                                            <!-- Overlay Information -->
                                            <div class="overlay-info">
                                                <span class="badge bg-danger">{{ $listing->location }}</span>
                                                <h5 class="card-title text-white mt-2">{{ $listing->title }}</h5>
                                                <p class="card-text">NGN{{ $listing->deals->first()->price ?? 'No Price' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        


                        {{-- @forelse ($user->deals as $deal)
                        <div class="mb-7 col-lg-4 col-md-6 card card-custom overlay">
                            <div class="card-body p-0">
                                <div class="overlay-wrapper">
                                  <img src="https://placehold.co/800?text=No+Photo&font=roboto" alt="" class="w-100 rounded"/>
                                </div>
                                <div class="scroll-y max-h-100 overlay-layer d-flex flex-column justify-content-center align-items-center p-7">
                                  <span class="text-primary mb-3 fw-3 fw-bold">{{$deal->title}}</span>
                                  <span class="text-muted mb-3 fw-5 fw-bold">{{substr($deal->description, 0, 50)}}</span>
                                  <a class="btn btn-primary" href="#">see more</a>
                                </div>
                            </div>
                        </div>
                        @empty
                            <div class="text-danger fs-5 mt-4">No Listings yet</div>
                        @endforelse --}}
                    </div>
                    <!--end::Card body-->
                    <!--begin::Card footer-->
                    <!--end::Card footer-->
                </div>
                <!--end::Card-->
            </div>
            <!--end:::Tab pane-->
         
        </div>
        <!--end:::Tab content-->
    </div>
</div>
@endsection