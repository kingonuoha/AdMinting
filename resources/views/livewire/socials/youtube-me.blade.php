<div>
    <div class="row g-5 g-xl-8">
        <!--begin::Col-->
        @forelse ($channels as $channel)
        <div class="col-xl-6">
            <div class="card mb-5 mb-xl-8">
                <!--begin::Body-->
                <div class="card-body pt-15 px-0">
                    <!--begin::Member-->
                    <div class="d-flex flex-column text-center mb-9 px-9">
                        <!--begin::Photo-->
                        <div class="symbol symbol-80px symbol-lg-150px mb-4">
                            <img src="{{$channel->data->snippet->thumbnails->high->url}}" class="" alt="">
                        </div>
                        <!--end::Photo-->
                        <!--begin::Info-->
                        <div class="text-center">
                            <!--begin::Name-->
                            <a href="../user-profile/overview.html" class="text-gray-800 fw-bold text-hover-primary fs-4">{{$channel->channelName}} </a>
                            <!--end::Name-->
                            <!--begin::Position-->
                            <span class="text-muted d-block fw-semibold">{{substr($channel->data->snippet->description, 0, 50)}}...</span>
                            <!--end::Position-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Member-->
                    <!--begin::Row-->
                    <div class="row px-9 mb-4">
                        <!--begin::Col-->
                        <div class="col-md-4 text-center">
                            <div class="text-gray-800 fw-bold fs-3">
                                <span class="m-0 counted" data-kt-countup="true" data-kt-countup-value="642" data-kt-initialized="1">{{$channel->videoCount}}</span>
                            </div>
                            <span class="text-gray-500 fs-8 d-block fw-bold">VIDEOS</span>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-4 text-center">
                            <div class="text-gray-800 fw-bold fs-3">
                            <span class="m-0 counted" data-kt-countup="true" data-kt-countup-value="24" data-kt-initialized="1">{{$channel->subscriberCount}}</span></div>
                            <span class="text-gray-500 fs-8 d-block fw-bold">SUBSCRIBERS</span>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-4 text-center">
                            <div class="text-gray-800 fw-bold fs-3">
                            <span class="m-0 counted" data-kt-countup="true" data-kt-countup-value="12" data-kt-initialized="1">{{$channel->viewCount}}</span></div>
                            <span class="text-gray-500 fs-8 d-block fw-bold">TOTAL VIEWS</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Navbar-->
                    <div class="m-0">
                        <!--begin::Navs-->
                        <ul class="nav nav-pills nav-pills-custom flex-column border-transparent fs-5 fw-bold">
                            <!--begin::Nav item-->
                            <li class="nav-item mt-5">
                                <a class="nav-link text-muted text-active-primary ms-0 py-0 me-10 ps-9 border-0" href="feeds.html">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen010.svg-->
                                <span class="svg-icon svg-icon-3 svg-icon-muted me-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M2 21V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V21C22 21.6 21.6 22 21 22H3C2.4 22 2 21.6 2 21Z" fill="currentColor"></path>
                                        <path d="M2 10V3C2 2.4 2.4 2 3 2H21C21.6 2 22 2.4 22 3V10C22 10.6 21.6 11 21 11H3C2.4 11 2 10.6 2 10Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->Feeds 
                                <!--begin::Bullet-->
                                <span class="bullet-custom position-absolute start-0 top-0 w-3px h-100 bg-primary rounded-end"></span>
                                <!--end::Bullet--></a>
                            </li>
                            <!--end::Nav item-->
                            <!--begin::Nav item-->
                            <li class="nav-item mt-5">
                                <a class="nav-link text-muted text-active-primary ms-0 py-0 me-10 ps-9 border-0" href="activity.html">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr070.svg-->
                                <span class="svg-icon svg-icon-3 svg-icon-muted me-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="8" y="9" width="3" height="10" rx="1.5" fill="currentColor"></rect>
                                        <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="currentColor"></rect>
                                        <rect x="18" y="11" width="3" height="8" rx="1.5" fill="currentColor"></rect>
                                        <rect x="3" y="13" width="3" height="6" rx="1.5" fill="currentColor"></rect>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->Activity 
                                <!--begin::Bullet-->
                                <span class="bullet-custom position-absolute start-0 top-0 w-3px h-100 bg-primary rounded-end"></span>
                                <!--end::Bullet--></a>
                            </li>
                            <!--end::Nav item-->
                            <!--begin::Nav item-->
                            <li class="nav-item mt-5">
                                <a class="nav-link text-muted text-active-primary ms-0 py-0 me-10 ps-9 border-0" href="followers.html">
                                <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                <span class="svg-icon svg-icon-3 svg-icon-muted me-3">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z" fill="currentColor"></path>
                                        <path d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z" fill="currentColor"></path>
                                        <rect x="7" y="6" width="4" height="4" rx="2" fill="currentColor"></rect>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->Followers 
                                <!--begin::Bullet-->
                                <span class="bullet-custom position-absolute start-0 top-0 w-3px h-100 bg-primary rounded-end"></span>
                                <!--end::Bullet--></a>
                            </li>
                            <!--end::Nav item-->
                            <!--begin::Nav item-->
                            <li class="nav-item mt-5">
                                <a class="nav-link text-muted text-active-primary ms-0 py-0 me-10 ps-9 border-0 active" href="settings.html">
                                <!--begin::Svg Icon | path: icons/duotune/coding/cod001.svg-->
                                <span class="svg-icon svg-icon-3 svg-icon-muted me-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z" fill="currentColor"></path>
                                        <path d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->Settings 
                                <!--begin::Bullet-->
                                <span class="bullet-custom position-absolute start-0 top-0 w-3px h-100 bg-primary rounded-end"></span>
                                <!--end::Bullet--></a>
                            </li>
                            <!--end::Nav item-->
                        </ul>
                        <!--begin::Navs-->
                    </div>
                    <!--end::Navbar-->
                </div>
                <!--end::Body-->
            </div>
            <!--begin::Feeds widget 4, 5 load more-->
            <button class="btn btn-primary w-100 text-center" id="kt_widget_5_load_more_btn">
                <span class="indicator-label">More Feeds</span>
                <span class="indicator-progress">Loading... 
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
            <!--end::Feeds widget 4, 5 load more-->
        </div>
            
        @empty
            <div>
                No Account Attached!
            </div>
        @endforelse
        {{-- \u003ciframe width=\"640\" height=\"360\" src=\"\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen\u003e\u003c/iframe\u003e --}}
        <iframe src="http://www.youtube.com/embed/videoseries?list=PL9t_TybRFI-KTlAHwFECldl-Ty9fncipT" frameborder="0"></iframe>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-6">
            <!--begin::Feeds Widget 5-->
            <div class="card mb-5 mb-xl-8">
                <!--begin::Body-->
                <div class="card-body pb-0">
                    <!--begin::Header-->
                    <div class="d-flex align-items-center mb-5">
                        <!--begin::User-->
                        <div class="d-flex align-items-center flex-grow-1">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-45px me-5">
                                <img src="../assets/media/avatars/300-25.jpg" alt="">
                            </div>
                            <!--end::Avatar-->
                            <!--begin::Info-->
                            <div class="d-flex flex-column">
                                <a href="#" class="text-gray-900 text-hover-primary fs-6 fw-bold">Sam Logan</a>
                                <span class="text-gray-400 fw-bold">Mango, Java, Python</span>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::User-->
                        <!--begin::Menu-->
                        <div class="my-0">
                            <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="5" y="5" width="5" height="5" rx="1" fill="currentColor"></rect>
                                            <rect x="14" y="5" width="5" height="5" rx="1" fill="currentColor" opacity="0.3"></rect>
                                            <rect x="5" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3"></rect>
                                            <rect x="14" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3"></rect>
                                        </g>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </button>
                            <!--begin::Menu 2-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <div class="separator mb-3 opacity-75"></div>
                                <!--end::Menu separator-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">New Ticket</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">New Customer</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                                    <!--begin::Menu item-->
                                    <a href="#" class="menu-link px-3">
                                        <span class="menu-title">New Group</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <!--end::Menu item-->
                                    <!--begin::Menu sub-->
                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Admin Group</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Staff Group</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Member Group</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu sub-->
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">New Contact</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <div class="separator mt-3 opacity-75"></div>
                                <!--end::Menu separator-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content px-3 py-3">
                                        <a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
                                    </div>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu 2-->
                        </div>
                        <!--end::Menu-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Post-->
                    <div class="mb-5">
                        <!--begin::Image-->
                        <div class="bgi-no-repeat bgi-size-cover rounded min-h-250px mb-5" style="background-image:url('../assets/media/stock/900x600/20.jpg');"></div>
                        <!--end::Image-->
                        <!--begin::Text-->
                        <div class="text-gray-800 mb-5">Outlines keep you honest. They stop you from indulging in poorly thought-out metaphors about driving and keep you focused on the overall structure of your post</div>
                        <!--end::Text-->
                        <!--begin::Toolbar-->
                        <div class="d-flex align-items-center mb-5">
                            <a href="#" class="btn btn-sm btn-light btn-color-muted btn-active-light-success px-4 py-2 me-4">
                            <!--begin::Svg Icon | path: icons/duotune/communication/com012.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z" fill="currentColor"></path>
                                    <rect x="6" y="12" width="7" height="2" rx="1" fill="currentColor"></rect>
                                    <rect x="6" y="7" width="12" height="2" rx="1" fill="currentColor"></rect>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->89</a>
                            <a href="#" class="btn btn-sm btn-light btn-color-muted btn-active-light-danger px-4 py-2">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen030.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.3721 4.65439C17.6415 4.23815 16.8052 4 15.9142 4C14.3444 4 12.9339 4.73924 12.003 5.89633C11.0657 4.73913 9.66 4 8.08626 4C7.19611 4 6.35789 4.23746 5.62804 4.65439C4.06148 5.54462 3 7.26056 3 9.24232C3 9.81001 3.08941 10.3491 3.25153 10.8593C4.12155 14.9013 9.69287 20 12.0034 20C14.2502 20 19.875 14.9013 20.7488 10.8593C20.9109 10.3491 21 9.81001 21 9.24232C21.0007 7.26056 19.9383 5.54462 18.3721 4.65439Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->29</a>
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Post-->
                    <!--begin::Separator-->
                    <div class="separator mb-4"></div>
                    <!--end::Separator-->
                    <!--begin::Reply input-->
                    <form class="position-relative mb-6">
                        <textarea class="form-control border-0 p-0 pe-10 resize-none min-h-25px" data-kt-autosize="true" rows="1" placeholder="Reply.." data-kt-initialized="1" style="overflow: hidden; overflow-wrap: break-word; height: 25px;"></textarea>
                        <div class="position-absolute top-0 end-0 me-n5">
                            <span class="btn btn-icon btn-sm btn-active-color-primary pe-0 me-2">
                                <!--begin::Svg Icon | path: icons/duotune/communication/com008.svg-->
                                <span class="svg-icon svg-icon-3 mb-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M4.425 20.525C2.525 18.625 2.525 15.525 4.425 13.525L14.825 3.125C16.325 1.625 18.825 1.625 20.425 3.125C20.825 3.525 20.825 4.12502 20.425 4.52502C20.025 4.92502 19.425 4.92502 19.025 4.52502C18.225 3.72502 17.025 3.72502 16.225 4.52502L5.82499 14.925C4.62499 16.125 4.62499 17.925 5.82499 19.125C7.02499 20.325 8.82501 20.325 10.025 19.125L18.425 10.725C18.825 10.325 19.425 10.325 19.825 10.725C20.225 11.125 20.225 11.725 19.825 12.125L11.425 20.525C9.525 22.425 6.425 22.425 4.425 20.525Z" fill="currentColor"></path>
                                        <path d="M9.32499 15.625C8.12499 14.425 8.12499 12.625 9.32499 11.425L14.225 6.52498C14.625 6.12498 15.225 6.12498 15.625 6.52498C16.025 6.92498 16.025 7.525 15.625 7.925L10.725 12.8249C10.325 13.2249 10.325 13.8249 10.725 14.2249C11.125 14.6249 11.725 14.6249 12.125 14.2249L19.125 7.22493C19.525 6.82493 19.725 6.425 19.725 5.925C19.725 5.325 19.525 4.825 19.125 4.425C18.725 4.025 18.725 3.42498 19.125 3.02498C19.525 2.62498 20.125 2.62498 20.525 3.02498C21.325 3.82498 21.725 4.825 21.725 5.925C21.725 6.925 21.325 7.82498 20.525 8.52498L13.525 15.525C12.325 16.725 10.525 16.725 9.32499 15.625Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="btn btn-icon btn-sm btn-active-color-primary ps-0">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                <span class="svg-icon svg-icon-2 mb-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="currentColor"></path>
                                        <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                        </div>
                    </form>
                    <!--edit::Reply input-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Feeds Widget 5-->
            <!--begin::Forms Widget 6-->
            <div class="card mb-5 mb-xl-8">
                <!--begin::Body-->
                <div class="card-body pb-0">
                    <!--begin::Header-->
                    <div class="d-flex align-items-center mb-5">
                        <!--begin::User-->
                        <div class="d-flex align-items-center flex-grow-1">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-45px me-5">
                                <img src="../assets/media/avatars/300-13.jpg" alt="">
                            </div>
                            <!--end::Avatar-->
                            <!--begin::Info-->
                            <div class="d-flex flex-column">
                                <a href="#" class="text-gray-900 text-hover-primary fs-6 fw-bold">Mat Dillon</a>
                                <span class="text-gray-400 fw-bold">Last month</span>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::User-->
                        <!--begin::Menu-->
                        <div class="my-0">
                            <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="5" y="5" width="5" height="5" rx="1" fill="currentColor"></rect>
                                            <rect x="14" y="5" width="5" height="5" rx="1" fill="currentColor" opacity="0.3"></rect>
                                            <rect x="5" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3"></rect>
                                            <rect x="14" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3"></rect>
                                        </g>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </button>
                            <!--begin::Menu 3-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true" style="">
                                <!--begin::Heading-->
                                <div class="menu-item px-3">
                                    <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
                                </div>
                                <!--end::Heading-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Create Invoice</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link flex-stack px-3">Create Payment 
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" aria-label="Specify a target name for future usage and reference" data-kt-initialized="1"></i></a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Generate Bill</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
                                    <a href="#" class="menu-link px-3">
                                        <span class="menu-title">Subscription</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <!--begin::Menu sub-->
                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Plans</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Billing</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Statements</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu separator-->
                                        <div class="separator my-2"></div>
                                        <!--end::Menu separator-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content px-3">
                                                <!--begin::Switch-->
                                                <label class="form-check form-switch form-check-custom form-check-solid">
                                                    <!--begin::Input-->
                                                    <input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications">
                                                    <!--end::Input-->
                                                    <!--end::Label-->
                                                    <span class="form-check-label text-muted fs-6">Recuring</span>
                                                    <!--end::Label-->
                                                </label>
                                                <!--end::Switch-->
                                            </div>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu sub-->
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 my-1">
                                    <a href="#" class="menu-link px-3">Settings</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu 3-->
                        </div>
                        <!--end::Menu-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Post-->
                    <div class="mb-6">
                        <!--begin::Text-->
                        <div class="text-gray-800 fs-6 fw-normal mb-5">Outlines keep you honest. They stop you from indulging in poorly thought-out metaphors</div>
                        <!--end::Text-->
                        <!--begin::Video-->
                        <div class="mb-5">
                            <iframe class="embed-responsive-item rounded h-300px w-100" src="https://www.youtube.com/embed/qIHXpnASPAA" allowfullscreen="allowfullscreen"></iframe>
                        </div>
                        <!--end::Video-->
                        <!--begin::Toolbar-->
                        <div class="d-flex align-items-center mb-5">
                            <a href="#" class="btn btn-sm btn-light btn-color-muted btn-active-light-success px-4 py-2 me-4">
                            <!--begin::Svg Icon | path: icons/duotune/communication/com012.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z" fill="currentColor"></path>
                                    <rect x="6" y="12" width="7" height="2" rx="1" fill="currentColor"></rect>
                                    <rect x="6" y="7" width="12" height="2" rx="1" fill="currentColor"></rect>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->189</a>
                            <a href="#" class="btn btn-sm btn-light btn-color-muted btn-active-light-danger px-4 py-2">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen030.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.3721 4.65439C17.6415 4.23815 16.8052 4 15.9142 4C14.3444 4 12.9339 4.73924 12.003 5.89633C11.0657 4.73913 9.66 4 8.08626 4C7.19611 4 6.35789 4.23746 5.62804 4.65439C4.06148 5.54462 3 7.26056 3 9.24232C3 9.81001 3.08941 10.3491 3.25153 10.8593C4.12155 14.9013 9.69287 20 12.0034 20C14.2502 20 19.875 14.9013 20.7488 10.8593C20.9109 10.3491 21 9.81001 21 9.24232C21.0007 7.26056 19.9383 5.54462 18.3721 4.65439Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->229</a>
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Bottom-->
                    <!--begin::Separator-->
                    <div class="separator mb-4"></div>
                    <!--end::Separator-->
                    <!--begin::Reply input-->
                    <form class="position-relative mb-6">
                        <textarea class="form-control border-0 p-0 pe-10 resize-none min-h-25px" data-kt-autosize="true" rows="1" placeholder="Reply.." data-kt-initialized="1" style="overflow: hidden; overflow-wrap: break-word; height: 25px;"></textarea>
                        <div class="position-absolute top-0 end-0 me-n5">
                            <span class="btn btn-icon btn-sm btn-active-color-primary pe-0 me-2">
                                <!--begin::Svg Icon | path: icons/duotune/communication/com008.svg-->
                                <span class="svg-icon svg-icon-3 mb-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M4.425 20.525C2.525 18.625 2.525 15.525 4.425 13.525L14.825 3.125C16.325 1.625 18.825 1.625 20.425 3.125C20.825 3.525 20.825 4.12502 20.425 4.52502C20.025 4.92502 19.425 4.92502 19.025 4.52502C18.225 3.72502 17.025 3.72502 16.225 4.52502L5.82499 14.925C4.62499 16.125 4.62499 17.925 5.82499 19.125C7.02499 20.325 8.82501 20.325 10.025 19.125L18.425 10.725C18.825 10.325 19.425 10.325 19.825 10.725C20.225 11.125 20.225 11.725 19.825 12.125L11.425 20.525C9.525 22.425 6.425 22.425 4.425 20.525Z" fill="currentColor"></path>
                                        <path d="M9.32499 15.625C8.12499 14.425 8.12499 12.625 9.32499 11.425L14.225 6.52498C14.625 6.12498 15.225 6.12498 15.625 6.52498C16.025 6.92498 16.025 7.525 15.625 7.925L10.725 12.8249C10.325 13.2249 10.325 13.8249 10.725 14.2249C11.125 14.6249 11.725 14.6249 12.125 14.2249L19.125 7.22493C19.525 6.82493 19.725 6.425 19.725 5.925C19.725 5.325 19.525 4.825 19.125 4.425C18.725 4.025 18.725 3.42498 19.125 3.02498C19.525 2.62498 20.125 2.62498 20.525 3.02498C21.325 3.82498 21.725 4.825 21.725 5.925C21.725 6.925 21.325 7.82498 20.525 8.52498L13.525 15.525C12.325 16.725 10.525 16.725 9.32499 15.625Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="btn btn-icon btn-sm btn-active-color-primary ps-0">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                <span class="svg-icon svg-icon-2 mb-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="currentColor"></path>
                                        <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                        </div>
                    </form>
                    <!--edit::Reply input-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Forms Widget 6-->
        </div>
        <!--end::Col-->
    </div>
</div>
