<div id="kt_header" class="header  header-fixed ">
    <!--begin::Container-->
    <div class=" container-fluid  d-flex align-items-stretch justify-content-between">
        <!--begin::Header Menu Wrapper-->
        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
            <!--begin::Header Menu-->
            <div class="header-logo">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo-main class="w-100px" />
                </a>
            </div>

            <div id="kt_header_menu" class="header-menu header-menu-mobile  header-menu-layout-default ">
                <!--begin::Header Nav-->
                @if ($hasUser)
                <ul class="menu-nav ">
                    <li class="menu-item  menu-item-rel menu-item-active "><a href="{{ route('dashboard') }}"
                            class="menu-link "><span class="menu-text">Dashboard</span><i class="menu-arrow"></i></a>
                    </li>
                    <!--end::Languages-->
                  


                    @php
                        $setFirstActive = ' ';
                    @endphp
                    @foreach ($links as $key)
                        @foreach ($key['category'] as $item => $value)
                            @if (!Str::contains($item, '__'))
                                <li class="menu-item  menu-item-submenu menu-item-rel {{ $setFirstActive }} "
                                    data-menu-toggle="click" aria-haspopup="true"><a href="javascript:;"
                                        class="menu-link menu-toggle"><span
                                            class="menu-text">{{ $item }}</span><i class="menu-arrow"></i></a>

                                    <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                                        <ul class="menu-subnav">
                                            @foreach ($value as $link)
                                                <li class="menu-item " aria-haspopup="true"><a
                                                        href="{{ $link['url'] }}" class="menu-link "><span
                                                            class="svg-icon menu-icon"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Clothes/Briefcase.svg-->
                                                            {!! getIcon($link['icon']) !!}
                                                            <!--end::Svg Icon--></span><span
                                                            class="menu-text">{{ $link['title'] }}</span></a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                                <!--end:Nav item-->
                            @endif
                        @endforeach
                        @php
                            $setFirstActive = '';
                        @endphp
                    @endforeach

                    <!--begin::User-->
                    @if (env('APP_TESTING'))
                        <li class="role-switch menu-item  menu-item-rel "><x-button loading="switchRole"
                                wire:click.prevent="switchRole" class="menu-link menu-toggle btn-sm"><span
                                    class="menu-text">
                                    Switch
                                    {{ strtolower($user->getRoleNames()->first()) == 'brand' ? 'to Creator' : 'to Brand' }}</span></x-button>
                        </li>
                    @endif
                </ul>

                @else
                <ul class="menu-nav ">
                    <!--end::Languages-->
                        @foreach (guest_nav_links() as $item => $value)
                            <!--begin:Nav item-->
                            @if (!Str::contains($item, '__'))
                                <li class="menu-item  menu-item-submenu menu-item-rel "
                                    data-menu-toggle="click" aria-haspopup="true"><a href="{{(is_array($value['url']))? "javascript:;": $value['url']}}"
                                        class="menu-link menu-toggle"><span
                                            class="menu-text">{{ $value['name'] }}</span><i class="menu-arrow"></i></a>

                                            @if (is_array($value['url']))
                                                
                                    <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                                        <ul class="menu-subnav">
                                            @foreach ($value['url'] as $link)
                                                <li class="menu-item " aria-haspopup="true"><a
                                                        href="{{ $link[1] }}" class="menu-link "><span
                                                            class="svg-icon menu-icon"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Clothes/Briefcase.svg-->
                                                            {!! getIcon('flower') !!}
                                                            <!--end::Svg Icon--></span><span
                                                            class="menu-text">{{ $link[0] }}</span></a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif

                                </li>
                                <!--end:Nav item-->
                            @endif
                        @endforeach
                </ul>

                @endif
                
                <!--end::Header Nav-->
            </div>
            <!--end::Header Menu-->
        </div>
        <!--end::Header Menu Wrapper-->

        @if ($hasUser)
            
        <!--begin::Topbar-->
        <div class="topbar">
            <!--begin::Search-->
            <div class="dropdown" id="kt_quick_search_toggle">
                <!--begin::Toggle-->
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-clean btn-lg btn-dropdown mr-1">
                        <span
                            class="svg-icon svg-icon-xl svg-icon-primary"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/Search.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path
                                        d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                    <path
                                        d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                        fill="#000000" fill-rule="nonzero"></path>
                                </g>
                            </svg><!--end::Svg Icon--></span>
                    </div>
                </div>
                <!--end::Toggle-->

                <!--begin::Dropdown-->
                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                    <div class="quick-search quick-search-dropdown" id="kt_quick_search_dropdown">
                        <!--begin:Form-->
                        <form method="get" class="quick-search-form">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <span
                                            class="svg-icon svg-icon-lg"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/Search.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path
                                                        d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                    <path
                                                        d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                        fill="#000000" fill-rule="nonzero"></path>
                                                </g>
                                            </svg><!--end::Svg Icon--></span> </span>
                                </div>
                                <input type="text" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="quick-search-close ki ki-close icon-sm text-muted"></i>
                                    </span>
                                </div>
                            </div>
                        </form>
                        <!--end::Form-->

                        <!--begin::Scroll-->
                        <div class="quick-search-wrapper scroll ps" data-scroll="true" data-height="325"
                            data-mobile-height="200" style="height: 325px; overflow: hidden;">
                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                            </div>
                            <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                            </div>
                        </div>
                        <!--end::Scroll-->
                    </div>
                </div>
                <!--end::Dropdown-->
            </div>
            <!--end::Search-->

            <!--begin::Notifications-->
            <div class="dropdown">
                <!--begin::Toggle-->
                <div class="notifications-show topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 pulse pulse-primary">
                        <span class="svg-icon svg-icon-xl svg-icon-primary">{!! getIcon('notification') !!}</span> <span
                            class="pulse-ring"></span>
                    </div>
                </div>
                <!--end::Toggle-->

                <!--begin::Dropdown-->
                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                    <form>
                        <!--begin::Header-->
                        <div class="d-flex flex-column pt-12 bgi-size-cover bgi-no-repeat rounded-top"
                            style="background-image: url({{ asset('users/assets_new/media/misc/bg-1.jpg') }})">
                            <!--begin::Title-->
                            <h4 class="d-flex flex-center rounded-top">
                                <span class="text-white">User Notifications</span>
                                <span
                                    class="btn btn-text btn-success btn-sm font-weight-bold btn-font-md ml-2">{{ $user->unreadNotifications()->count() }}
                                    new</span>
                            </h4>
                            <!--end::Title-->

                            <!--begin::Tabs-->
                            <ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-line-transparent-white nav-tabs-line-active-border-success mt-3 px-8"
                                role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" data-toggle="tab"
                                        href="#topbar_notifications_notifications">Alerts</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab"
                                        href="#topbar_notifications_events">Events</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#topbar_notifications_logs">Logs</a>
                                </li>
                            </ul>
                            <!--end::Tabs-->
                        </div>
                        <!--end::Header-->

                        <!--begin::Content-->
                        <div class="tab-content">
                            <!--begin::Tabpane-->
                            <div class="tab-pane active show p-8" id="topbar_notifications_notifications"
                                role="tabpanel">
                                <!--begin::Scroll-->
                                <div class="scroll pr-7 mr-n7 ps" data-scroll="true" data-height="300"
                                    data-mobile-height="200" style="height: 300px; overflow: hidden;">
                                    <!--begin::Item-->
                                    @foreach ($user->notifications as $item)
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40 symbol-light-{{ $item->data['type'] }} mr-5">
                                                <span class="symbol-label">
                                                    <span
                                                        class="svg-icon svg-icon-lg svg-icon-{{ $item->data['type'] }}"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Home/Library.svg-->
                                                        {!! $item->data['icon'] !!}
                                                    </span>
                                                </span>
                                            </div>
                                            <!--end::Symbol-->

                                            <!--begin::Text-->
                                            <div class="d-flex flex-column font-weight-bold">
                                                <a wire:click.prevent="$event(showNotificationModal, `{{ $item->id }}`)"
                                                    href="#"
                                                    class="text-dark text-hover-primary mb-1 font-size-lg">{{ $item->data['title'] }}</a>
                                                <span class="text-muted">
                                                    {{ substr($item->data['message'], 0, 40) }}...</span>
                                            </div>
                                            <!--end::Text-->
                                            <span
                                                class="badge badge-light fs-8">{{ time_Ago($item->created_at) }}</span>
                                        </div>
                                        <!--end::Item-->
                                    @endforeach


                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                    </div>
                                    <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                    </div>
                                </div>
                                <!--end::Scroll-->

                                <!--begin::Action-->
                                <div class="d-flex flex-center pt-7"><a href="{{ route('profile.notifications') }}"
                                        class="btn btn-light-primary font-weight-bold text-center">See All</a></div>
                                <!--end::Action-->
                            </div>
                            <!--end::Tabpane-->

                            <!--begin::Tabpane-->
                            <div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
                                <!--begin::Nav-->
                                <div class="navi navi-hover scroll my-4 ps" data-scroll="true" data-height="300"
                                    data-mobile-height="200" style="height: 300px; overflow: hidden;">
                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon2-line-chart text-success"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    New report has been received
                                                </div>
                                                <div class="text-muted">
                                                    23 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon2-paper-plane text-danger"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    Finance report has been generated
                                                </div>
                                                <div class="text-muted">
                                                    25 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon2-user flaticon2-line- text-success"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    New order has been received
                                                </div>
                                                <div class="text-muted">
                                                    2 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon2-pin text-primary"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    New customer is registered
                                                </div>
                                                <div class="text-muted">
                                                    3 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon2-sms text-danger"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    Application has been approved
                                                </div>
                                                <div class="text-muted">
                                                    3 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon2-pie-chart-3 text-warning"></i>
                                            </div>
                                            <div class="navinavinavi-text">
                                                <div class="font-weight-bold">
                                                    New file has been uploaded
                                                </div>
                                                <div class="text-muted">
                                                    5 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon-pie-chart-1 text-info"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    New user feedback received
                                                </div>
                                                <div class="text-muted">
                                                    8 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon2-settings text-success"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    System reboot has been successfully completed
                                                </div>
                                                <div class="text-muted">
                                                    12 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon-safe-shield-protection text-primary"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    New order has been placed
                                                </div>
                                                <div class="text-muted">
                                                    15 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon2-notification text-primary"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    Company meeting canceled
                                                </div>
                                                <div class="text-muted">
                                                    19 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon2-fax text-success"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    New report has been received
                                                </div>
                                                <div class="text-muted">
                                                    23 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon-download-1 text-danger"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    Finance report has been generated
                                                </div>
                                                <div class="text-muted">
                                                    25 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon-security text-warning"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    New customer comment recieved
                                                </div>
                                                <div class="text-muted">
                                                    2 days ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon2-analytics-1 text-success"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    New customer is registered
                                                </div>
                                                <div class="text-muted">
                                                    3 days ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->
                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">
                                        </div>
                                    </div>
                                    <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;">
                                        </div>
                                    </div>
                                </div>
                                <!--end::Nav-->
                            </div>
                            <!--end::Tabpane-->

                            <!--begin::Tabpane-->
                            <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
                                <!--begin::Nav-->
                                {{-- <div class="d-flex flex-center text-center text-muted min-h-200px">
                                    All caught up!
                                    <br>
                                    No new notifications.
                                </div> --}}
                                <div class="scroll-y mh-325px my-5 px-1 ">
                                    @forelse (getLogs() as $log)
                                        <!--begin::Item-->
                                    <div class="d-flex flex-stack px-8 py-4 bg-light-{{$log->type}} mb-4 rounded w-100">
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center me-2">
                                            <!--begin::Code-->
                                            <span class="symbol symbol-200px bg-light-{{$log->type}} mr-2">
                                                <span class="svg-icon svg-icon-{{$log->type}} svg-icon-2x">{!! $log->icon !!}</span>
                                                
                                            </span>
                                            <!--end::Code-->
                                            <!--begin::Title-->
                                            <a href="#" class="text-gray-800 text-hover-{{$log->type}} fw-semibold">{{$log->message}}</a>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Section-->
                                        <!--begin::Label-->
                                        <span class="badge badge-light fs-8">{{time_Ago($log->created_at)}}</span>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Item-->
                                    @empty
                                        <div class="d-flex justify-content-center align-items-center">
                                            <div class="text-muted">
                                                No Log for now
                                            </div>
                                        </div>
                                    @endforelse
                                <!--end::Items-->
                                </div>
                                <!--end::Nav-->
                            </div>
                            <!--end::Tabpane-->
                        </div>
                        <!--end::Content-->
                    </form>
                </div>
                <!--end::Dropdown-->
            </div>
            <!--end::Notifications-->

            <!--begin::Languages-->
            <div class="dropdown">
                <!--begin::Toggle-->
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                        <img class="h-20px w-20px rounded-sm"
                            src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/flags/226-united-states.svg"
                            alt="">
                    </div>
                </div>
                <!--end::Toggle-->

                <!--begin::Dropdown-->
                <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                    <!--begin::Nav-->
                    <ul class="navi navi-hover py-4">
                        <!--begin::Item-->
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="symbol symbol-20 mr-3">
                                    <img src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/flags/226-united-states.svg"
                                        alt="">
                                </span>
                                <span class="navi-text">English</span>
                            </a>
                        </li>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <li class="navi-item active">
                            <a href="#" class="navi-link">
                                <span class="symbol symbol-20 mr-3">
                                    <img src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/flags/128-spain.svg"
                                        alt="">
                                </span>
                                <span class="navi-text">Spanish</span>
                            </a>
                        </li>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="symbol symbol-20 mr-3">
                                    <img src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/flags/162-germany.svg"
                                        alt="">
                                </span>
                                <span class="navi-text">German</span>
                            </a>
                        </li>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="symbol symbol-20 mr-3">
                                    <img src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/flags/063-japan.svg"
                                        alt="">
                                </span>
                                <span class="navi-text">Japanese</span>
                            </a>
                        </li>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="symbol symbol-20 mr-3">
                                    <img src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/flags/195-france.svg"
                                        alt="">
                                </span>
                                <span class="navi-text">French</span>
                            </a>
                        </li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Nav-->
                </div>
                <!--end::Dropdown-->
            </div>

            <div class="topbar-item">
                @php
                    $words = explode(' ', $user->name);
                    $firstWord = $words[0];
                @endphp
                <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2"
                    id="kt_quick_user_toggle">
                    <div>
                        <div class="d-flex align-items-center">
                            <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                            <span
                                class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ $firstWord }}</span>
                        </div>
                        <span
                            class="current-role font-weight-800 font-size-sm d-none d-md-inline mr-1 text-success">{{ $user->getRoleNames()->first() }}</span>
                    </div>
                    <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" />
                        @else
                            <span class="inline-flex rounded-md">
                                <button type="button" class="">
                                    {{ $user->name }}

                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                            </span>
                        @endif
                        {{-- <span class="symbol-label font-size-h5 font-weight-bold">S</span> --}}
                    </span>
                </div>
            </div>
            <!--end::User-->
        </div>
        <!--end::Topbar-->
        @endif
    </div>
    <!--end::Container-->
</div>
