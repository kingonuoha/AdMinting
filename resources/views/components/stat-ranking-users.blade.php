<div {{ $attributes->merge(['class' => '']) }} >
    <!--begin::List Widget 8-->
    <div class="card card-xl-stretch mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header align-items-center border-0 mt-4">
            <h3 class="card-title align-items-start flex-column">
                <span class="fw-bold text-dark">Top Ranking Users</span>
                <span class="text-muted mt-1 fw-semibold fs-7">Gifts and more</span>
            </h3>
            <div class="card-toolbar">
                <!--begin::Menu-->
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
                    @foreach ((new \App\Http\Livewire\SideBar())->links()['Users'] as $link)
                                
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="{{$link['url']}}" class="menu-link px-3">{{$link['title']}}</a>
                    </div>
                    <!--end::Menu item-->
                    @endforeach
                   
                </div>
                <!--end::Menu 3-->
                <!--end::Menu-->
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-3">
            <!--begin::Item-->
            @foreach ($rankingUsers as $user)
            <div class="d-flex align-items-sm-center mb-7">
                <!--begin::Symbol-->
                <div class="symbol symbol-60px symbol-2by3 me-4">
                    <div class="symbol-label" style="background-image: url({{ $user->profile_photo_url }})"></div>
                </div>
                <!--end::Symbol-->
                <!--begin::Content-->
                <div class="d-flex flex-row-fluid align-items-center flex-wrap my-lg-0 me-2">
                    <!--begin::Title-->
                    <div class="flex-grow-1 my-lg-0 my-2 me-2">
                        <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">{{$user->name}}</a>
                        <span class="text-muted fw-semibold d-block pt-1">{{$user->email}}</span>
                    </div>
                    <!--end::Title-->
                    <!--begin::Section-->
                    <div class="d-flex align-items-center">
                        <div class="me-6">
                            <i class="fa fa-star-half-alt me-1 text-warning fs-5"></i>
                            <span class="text-gray-800 fw-bold">{{$user->rating}}</span>
                        </div>
                        <a href="#" class="btn btn-icon btn-light btn-sm border-0">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                            <span class="svg-icon svg-icon-2 svg-icon-primary">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor"></rect>
                                    <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                    </div>
                    <!--end::Section-->
                </div>
                <!--end::Content-->
            </div>
            @endforeach
            
            <!--end::Item-->
           
        </div>
        <!--end::Body-->
    </div>
    <!--end::List Widget 8-->
</div>