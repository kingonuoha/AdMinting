<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
    @php
        $user = \App\Models\User::find(auth()->user()->id);
        $links = (new \App\Http\Livewire\SideBar())->links();
        $colors = [
    "prmary",
    'info',
    'warning',
    'success',
    'danger',
];

    @endphp
    <!--begin::Header-->
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5" kt-hidden-height="40"
        style="">
        <h3 class="font-weight-bold m-0">
            User Profile
            <small class="text-muted font-size-sm ml-2">{{ $user->unreadNotifications()->count() }} notifications</small>
        </h3>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>
    <!--end::Header-->

    <!--begin::Content-->
    <div class="offcanvas-content pr-5 mr-n5 scroll ps ps--active-y" style="height: 694px; overflow: hidden;">
        <!--begin::Header-->
        <div class="d-flex align-items-center mt-5">
            <div class="symbol symbol-100 mr-5">
                <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" />
                <i class="symbol-badge bg-success"></i>
            </div>
            <div class="d-flex flex-column">
                <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">
                    {{ $user->name }}
                </a>
                <div class="text-muted mt-1">
                    {{ $user->role }}
                </div>
                <div class="navi mt-2">
                    <a href="#" class="navi-item">
                        <span class="navi-link p-0 pb-2">
                            <span class="navi-icon mr-1">
                                <span
                                    class="svg-icon svg-icon-lg svg-icon-primary"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Mail-notification.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path
                                                d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z"
                                                fill="#000000"></path>
                                            <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5">
                                            </circle>
                                        </g>
                                    </svg><!--end::Svg Icon--></span> </span>
                            <span class="navi-text text-muted text-hover-primary"> {{ $user->email }}</span>
                        </span>
                    </a>

                      <!-- Authentication -->
                      <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <div class="menu-item px-5">
                            <button class="btn btn-primary" type="submit">
                                {{ __('Log Out') }}
                            </button>
                        </div>

                    </form>
                   
                </div>
            </div>
        </div>
        <!--end::Header-->

        <!--begin::Separator-->
        <div class="separator separator-dashed mt-8 mb-5"></div>
        <!--end::Separator-->

        <!--begin::Nav-->
        <div class="navi navi-spacer-x-0 p-0">
            @foreach ($links as $key)
            @foreach ($key['category'] as $item => $value)
                <!--begin:Nav item-->
                {{-- <li class="nav-item mx-lg-1">
            <a class="nav-link py-3 py-lg-6 {{ $setFirstActive }} text-active-primary"
                href="#" data-bs-toggle="tab"
                data-bs-target="#kt_app_header_menu_pages_{{ \Illuminate\Support\Str::slug($item) }}">{{ $item }}</a>
        </li> --}}
                @if ($item == "Account")
                @foreach ($value as $link)
                <a href="{{$link['url']}}" class="navi-item">
                    <div class="navi-link">
                        <div class="symbol symbol-40 bg-light mr-3">
                            <div class="symbol-label">
                                <span
                                    class="svg-icon svg-icon-md svg-icon-{{$colors[rand(0, (count($colors) - 1))]}}">{!! getIcon($link['icon']) !!}</span>
                            </div>
                        </div>
                        <div class="navi-text">
                            <div class="font-weight-bold">
                               {{$link['title']}}
                            </div>
                            <div class="text-muted">
                                <span class="label label-light-danger label-inline font-weight-bold">new</span>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
                @endif
            @endforeach
        @endforeach
            <!--begin::Item-->
           
            <!--end:Item-->
        </div>
        <!--end::Nav-->

        <!--begin::Separator-->
        <div class="separator separator-dashed my-7"></div>
        <!--end::Separator-->

        <!--begin::Notifications-->
        <div>
            <!--begin:Heading-->
            <h5 class="mb-5">
                Recent Notifications
            </h5>
            <!--end:Heading-->
            
        @foreach ($user->notifications as $item)
        <div class="d-flex align-items-center bg-light-{{ $item->data['type'] }} rounded p-5 gutter-b">
            <span class="svg-icon svg-icon-lg svg-icon-{{ $item->data['type'] }} mr-5">
                 {!! $item->data['icon'] !!}
                </span> 
            <div class="d-flex flex-column flex-grow-1 mr-2">
                <a href="#"
                    class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">{{ $item->data['title'] }}</a>
                <span class="text-muted font-size-sm">{{ substr($item->data['message'], 0, 20) }}...</span>
            </div>

            <span class="font-weight-bolder text-{{ $item->data['type'] }} py-1 font-size-lg">{{ time_Ago($item->created_at) }}</span>
        </div>
        <!--end::Item-->
        @if ($loop->iteration > 4)
            @break
        @endif
    @endforeach
        </div>
        <!--end::Notifications-->
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; height: 694px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 300px;"></div>
        </div>
    </div>
    <!--end::Content-->
</div>
