<div>
    <div class="mb-10 row g-6 g-xl-9">
        @forelse ($listings as $listing)
            <!--begin::Col-->
            <div class="col-md-6 col-lg-4">
                <!--begin::Card-->
                <div class="card border-hover-primary">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-9">
                        <!--begin::Card Title-->
                        <div class="card-title m-0">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-50px w-50px bg-light">
                                <img src="{{ asset('storage/' . $listing->user->brandInfos->logo_path) }}"
                                    alt="{{ $listing->user->brandInfos->brand_name }} logo" class="p-3">
                            </div>
                            <!--end::Avatar-->
                        </div>
                        <!--end::Car Title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            @if (is_null($listing->onboarded_by) && is_null($listing->completed_on))
                                <span class="badge badge-light-primary fw-bold me-auto px-4 py-3">Awaiting
                                    Onboarding</span>
                            @elseif(!is_null($listing->onboarded_by) && is_null($listing->completed_on))
                                <span class="badge badge-light-info fw-bold me-auto px-4 py-3">In Progress</span>
                            @elseif($listing->payment_status === 'pending')
                                <span class="badge badge-light-danger fw-bold me-auto px-4 py-3">Awaiting Payment</span>
                            @else
                                <span class="badge badge-light-success fw-bold me-auto px-4 py-3">Completed</span>
                            @endif
                            <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                data-kt-menu-overflow="true">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
                                <span class="svg-icon svg-icon-1 svg-icon-gray-300 me-n1">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4"
                                            fill="currentColor"></rect>
                                        <rect x="11" y="11" width="2.6" height="2.6" rx="1.3"
                                            fill="currentColor"></rect>
                                        <rect x="15" y="11" width="2.6" height="2.6" rx="1.3"
                                            fill="currentColor"></rect>
                                        <rect x="7" y="11" width="2.6" height="2.6" rx="1.3"
                                            fill="currentColor"></rect>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </button>

                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                data-kt-menu="true" style="">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <div class="separator mb-3 opacity-75"></div>
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="{{ route('listings.show', $listing->slug) }}"
                                        class="menu-link px-3">Apply</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end:: Card header-->
                    <!--begin:: Card body-->
                    <div class="card-body p-9">
                        <!--begin::Name-->
                        <a href="{{ !is_null($listing->onboarded_by) ? route('listing.dashboard', $listing->slug) : route('listings.show', $listing->slug) }}"
                            class="fs-3 fw-bold text-dark">{{ $listing->title }}</a>
                        <!--end::Name-->
                        <!--begin::Description-->
                        <p class="text-gray-400 fw-semibold fs-5 mt-1 mb-7">
                            {{ substr(strip_tags($listing->content), 0, rand(80, 95)) }}...</p>
                        <!--end::Description-->
                        <!--begin::Info-->
                        <div class="row mb-5">
                            <!--begin::Due-->
                            <div
                                class="col-12 col-md col-lg col-xl border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                                <div class="fs-6 text-gray-800 fw-bold">
                                    {{ $listing->due_date == null ? $listing->no_of_days . ' days after onboarding' : $listing->due_date }}
                                </div>
                                <div class="fw-semibold text-gray-400">Due Date</div>
                            </div>
                            <!--end::Due-->
                            <!--begin::Budget-->
                            <div
                                class="col-12 col-md col-lg col-xl border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                                <div class="fs-6 text-gray-800 fw-bold">NGN{{ formatMoney($listing->price) }}</div>
                                <div class="fw-semibold text-gray-400">Budget</div>
                            </div>
                            <!--end::Budget-->
                        </div>
                        <!--end::Info-->
                        <div class="separator mb-3 opacity-75"></div>

                        <div class="row">
                            <div class="col">
                                @if (count($listing->clicks) > 0 || $listing->onboarded_by !== null)
                                    <!--begin::Users-->
                                    <div class="symbol-group symbol-hover">
                                        <!--begin::User-->
                                        @foreach ($listing->clicks as $click)
                                            <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                                aria-label="{{ $click->user->name }}" data-kt-initialized="1">
                                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                                    {{-- {{dd($this->user->profile_photo_url)}} --}}
                                                    <img src="{{ $click->user->profile_photo_url }}"
                                                        alt="{{ $click->user->name }}" />
                                                @else
                                                    <span
                                                        class="symbol-label bg-primary text-inverse-primary fw-bold">{{ strtoupper(substr($click->user->name, 0, 1)) }}</span>
                                                @endif
                                            </div>
                                            @if ($loop->iteration === 3)
                                            @break
                                        @endif
                                    @endforeach
                                    <!--end::Users-->
                                    <a wire:click.prevent="showAppliedUsers({{ $listing->id }})" href="#"
                                        class="symbol symbol-35px symbol-circle" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_view_users">
                                        <span class="symbol-label bg-dark text-inverse-dark fs-8 fw-bold"
                                            data-bs-toggle="tooltip" data-bs-trigger="hover"
                                            data-kt-initialized="1">+{{ count($listing->clicks) - 3 < 1 ? 'More' : count($listing->clicks) - 3 }}</span>
                                    </a>
                                </div>
                            @else
                                <span class="text-info">No Applications Yet</span>
                            @endif
                        </div>
                        <div class="col">
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                                <div class="fs-6 text-gray-800 fw-bold">
                                    @if (!is_null($listing->required_social))
                                    <div class="symbol-group symbol-hover mb-3">
                                        
                                        @foreach ($listing->required_social as $social)
                                             <!--begin::User-->
                                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="{{$social}}" data-kt-initialized="1">
                                            <img alt="{{$social}}" src="{{asset('users/assets/media/svg/brand-logos/'.$social.'.svg')}}">
                                        </div>
                                        <!--end::User-->
                                        @endforeach
                                    </div>
                                    @else
                                        <span class="text-info">No Specified Socials</span>
                                    @endif
                                </div>
                                <div class="fw-semibold text-gray-400">Required Socials</div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--end:: Card body-->
            </div>
            <!--end::Card-->
        </div>
    @empty
        <span class="text-danger bg-light-danger px-5 py-2 fs-6">No Listing For now</span>
    @endforelse
</div>

</div>
