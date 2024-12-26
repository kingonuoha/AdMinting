<div class="col-xl-5" >
    <!--begin::Mixed Widget 1-->
    <div class="card card-xl-stretch mb-xl-8">
        <!--begin::Body-->
        <div class="card-body p-0">
            <!--begin::Header-->
            <div class="px-9 pt-7 card-rounded h-275px w-100 bg-primary">
                <!--begin::Heading-->
                <div class="d-flex flex-stack">
                    <h3 class="m-0 text-white fw-bold fs-3">Payroll Summary</h3>
                    <div class="ms-1">
                        <!--begin::Menu-->
                        <button type="button" class="btn btn-sm btn-icon btn-color-white btn-active-white btn-active-color-primary border-0 me-n3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
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
                            @foreach ((new \App\Http\Livewire\SideBar())->links() as $item)
                            @foreach ($item['category'] as $key => $links)
                                @foreach ($links as $link)
                                        @if ($key == 'Finance')
                                        <div class="menu-item px-3">
                                            <a href="{{$link['url']}}" class="menu-link px-3">{{$link['title']}}</a>
                                        </div>
                                        @endif
                                @endforeach
                            @endforeach
                        @endforeach
                            
                        </div>
                        <!--end::Menu 3-->
                        <!--end::Menu-->
                    </div>
                </div>
                <!--end::Heading-->
                <!--begin::Balance-->
                <div class="d-flex text-center flex-column text-white pt-8">
                    <span class="fw-semibold fs-7">Outstanding Debt</span>
                    <span class="fw-bold fs-2x pt-1">N{{$outstandingDebt}}</span>
                </div>
                <!--end::Balance-->
            </div>
            <!--end::Header-->
            <!--begin::Items-->
            <div class="bg-body shadow-sm card-rounded mx-9 mb-9 px-6 py-9 position-relative z-index-1" style="margin-top: -100px">
                <!--begin::Item-->
            @foreach ($listingSummary as $summary)
                <div class="d-flex align-items-center mb-6">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-45px w-40px me-5">
                        <span class="symbol-label bg-lighten">
                            <!--begin::Svg Icon | path: icons/duotune/maps/map004.svg-->
                            <span class="svg-icon svg-icon-1">
                                {!! getIcon($summary['icon']) !!}
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                    </div>
                    <!--end::Symbol-->
                    <!--begin::Description-->
                    <div class="d-flex align-items-center flex-wrap w-100">
                        <!--begin::Title-->
                        <div class="mb-1 pe-3 flex-grow-1">
                            <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bold">{{$summary['title']}}</a>
                            <div class="text-gray-400 fw-semibold fs-7">{{$summary['value']}}</div>
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Description-->
                </div>
            @endforeach

                <!--end::Item-->
              
            </div>
            <!--end::Items-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Mixed Widget 1-->
</div>