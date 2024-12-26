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
                           @if (!$listing->is_active)
                           <div class="svg-icon svg-icon-danger svg-icon-2x">
                            {!! getIcon("warning") !!}
                        </div>
                           @endif
                        </div>
                        <!--end::Car Title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                        @if ($listing->payment_status === 'pending')
                            <span class="badge badge-light-danger fw-bold me-auto px-4 py-3">Awaiting Payment</span>
                        @elseif (is_null($listing->onboarded_by) && is_null($listing->completed_on))
                                <span class="badge badge-light-primary fw-bold me-auto px-4 py-3">Awaiting
                                    Onboarding</span>
                            @elseif(!is_null($listing->onboarded_by) && is_null($listing->completed_on))
                                <span class="badge badge-light-info fw-bold me-auto px-4 py-3">In Progress</span>
                            @else
                                <span class="badge badge-light-success fw-bold me-auto px-4 py-3">Completed</span>
                            @endif

                            <div class="dropdown dropdown-inline" data-toggle="tooltip" title=""
                                data-placement="left" data-original-title="Quick actions"
                                aria-describedby="tooltip511904">
                                <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ki ki-bold-more-hor"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right" style="">
                                    <!--begin::Navigation-->
                                    <ul class="navi navi-hover py-5">
                                        <!--end::Menu separator-->
                                        @if (!is_null($listing->onboarded_by) && is_null($listing->completed_on))
                                            <li class="navi-item">
                                                <a href="{{ route('listing.dashboard', $listing->slug) }}"
                                                    class="navi-link">
                                                    <span class="navi-icon"><i class="flaticon2-drop"></i></span>
                                                    <span class="navi-text">See
                                                        Progress</span>
                                                </a>
                                            </li>
                                        @else
                                            <!--begin::Menu item-->
                                            <div class="navi-item">
                                                @if ($listing->is_active)
                                                    <a wire:click.prevent="confirmDiableListing({{ $listing->id }})"
                                                        href="" class="navi-link bg-light-danger text-danger">
                                                        <span class="navi-icon"><i class="flaticon2-drop"></i></span>
                                                        <span class="navi-text"> Disable
                                                            Listing</span>
                                                    </a>
                                                @else
                                                    <a wire:click.prevent="confirmEnableListing({{ $listing->id }})"
                                                        class="navi-link bg-light-success text-success">
                                                        <span class="navi-icon"><i class="flaticon2-drop"></i></span>
                                                        <span class="navi-text"> Enable
                                                            Listing</span></a>
                                                @endif

                                            </div>
                                            <!--end::Menu item-->
                                            @if ($listing->payment_status != 'paid')
                                                <!--begin::Menu item-->
                                                <div class="navi-item px-3">
                                                    <x-button type="button"
                                                        wire:click.prevent="rePayAlert({{ $listing->id }}, {{ $listing->price }})"
                                                        class="navi-link px-3 w-100 text-primary bg-light-primary btn-sm"
                                                        loading="rePay">
                                                        <span class="navi-icon"><i class="flaticon2-drop"></i></span>
                                                        <span class="navi-text"> Pay (NGN
                                                            {{ formatMoney($listing->price) }})</span>
                                                    </x-button>
                                                </div>
                                                <!--end::Menu item-->
                                            @endif

                                            <!--begin::Menu item-->
                                            <div class="navi-item px-3">
                                                <a wire:click.prevent="confirmDeleteListing({{ $listing->id }})"
                                                    href="#" class="navi-link px-3">
                                                    <span class="navi-icon"><i class="flaticon2-drop"></i></span>
                                                    <span class="navi-text"> Delete</span>
                                                </a>
                                            </div>
                                            <!--end::navi item-->
                                            <!--begin::navi item-->
                                            <div class="navi-item px-3">
                                                <a wire:click.prevent="showAppliedUsers({{ $listing->id }})"
                                                    href="#" class="navi-link px-3"
                                                    data-ecommerce-product-filter="delete_row">
                                                    <span class="navi-icon"><i class="flaticon2-drop"></i></span>
                                                    <span class="navi-text"> View Applications</span>
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                        @endif
                                    </ul>
                                    <!--end::Navigation-->
                                </div>
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
                        <div class="d-flex mb-5">
                            <!--begin::Due-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                                <div class="fs-6 text-gray-800 fw-bold">
                                    {{ $listing->due_date == null ? $listing->no_of_days . ' days after onboarding' : $listing->due_date }}
                                </div>
                                <div class="fw-semibold text-gray-400">Due Date</div>
                            </div>
                            <!--end::Due-->
                            <!--begin::Budget-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                                <div class="fs-6 text-gray-800 fw-bold">NGN{{ formatMoney($listing->price) }}</div>
                                <div class="fw-semibold text-gray-400">Budget</div>
                            </div>
                            <!--end::Budget-->
                        </div>
                        <!--end::Info-->
                        <div class="notice d-flex bg-light-info rounded border-info border border-dash p-3 mb-5">

                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                            <span class="svg-icon svg-icon-2tx svg-icon-info me-4">
                                {!! getIcon('spanner') !!}
                            </span>
                            <!--end::Svg Icon-->
                            <!--end::Icon-->
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                <!--begin::Content-->
                                <div class="mb-3 mb-md-0 fw-semibold">
                                    <h4 class="text-gray-900 fw-bold">Listing workflow</h4>
                                    <div class="fs-6 text-gray-700 pe-3">{{ $listing->useCase->name }}</div>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--begin::Progress-->
                        @if ($listing->onboarded_by !== null)
                            <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip"
                                aria-label="This project 50% completed" data-initialized="1">
                                <div class="bg-primary rounded h-4px" role="progressbar" style="width: 50%"
                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        @endif
                        <!--end::Progress-->
                        @if (count($listing->clicks) > 0 || $listing->onboarded_by !== null)
                            <!--begin::Users-->
                            <div class="symbol-group symbol-hover">
                                <!--begin::User-->
                                @foreach ($listing->clicks as $click)
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                        aria-label="{{ $click->user->name }}" data-initialized="1">
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
                                    data-initialized="1">+{{ count($listing->clicks) - 3 < 1 ? 'More' : count($listing->clicks) - 3 }}</span>
                            </a>
                        </div>
                    @else
                        <span class="text-info">No Applications Yet</span>
                    @endif
                </div>
                <!--end:: Card body-->
            </div>
            <!--end::Card-->
        </div>
    @empty
        <x-_empty-card title="No listing yet" desc="you can stat by creating a new listing, head over to new listing on the job listing tab" />
    @endforelse
</div>
<div class="modal fade" id="kt_modal_view_users" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                <!--begin::Heading-->

                @if (!is_null($_selected_listing))
                    @livewire('listing-user-applied-list', ['listing_id' => $_selected_listing])
                @endif
                <!--end::Users-->
                <!--begin::Notice-->
                {{-- <div class="d-flex justify-content-between">
                            <!--begin::Label-->
                            <div class="fw-semibold">
                                <label class="fs-6">Adding Users by Team Members</label>
                                <div class="fs-7 text-muted">If you need more info, please check budget planning</div>
                            </div>
                            <!--end::Label-->
                            <!--begin::Switch-->
                            <label class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="" checked="checked" />
                                <span class="form-check-label fw-semibold text-muted">Allowed</span>
                            </label>
                            <!--end::Switch-->
                        </div> --}}
                <!--end::Notice-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
</div>









@push('script')
<script>
    window.addEventListener('swal:confirm', (e) => {
        Swal.fire({
            title: e.detail.title,
            text: e.detail.message,
            icon: e.detail.type,
            showCancelButton: true,
            confirmButtonText: "Yeah sure!",
            cancelButtonText: "Cancel",
            // customClass: {
            //     confirmButton: e.detail.confirmButtonClass,
            //     cancelButton: e.detail.cancelButtonClass
            //     },
            // buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                livewire.emit('disableListingConfirmed', e.detail.id);
            } else {

            }
        })

    })
    window.addEventListener('swal:confirm_enable', (e) => {
        Swal.fire({
            title: e.detail.title,
            text: e.detail.message,
            icon: e.detail.type,
            showCancelButton: true,
            confirmButtonText: "Yeah Enable!",
            cancelButtonText: "Cancel",
            // customClass: {
            //     confirmButton: e.detail.confirmButtonClass,
            //     cancelButton: e.detail.cancelButtonClass
            //     },
            // buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                toastR('Processing Action...', 'info')
                livewire.emit('enableListingConfirmed', e.detail.id);
            } else {

            }
        })

    })
    window.addEventListener('showAppliedUsers', (e) => {
        $('#kt_modal_view_users').modal('show')
    })
    window.addEventListener('swal:confirm_Delete', (e) => {
        Swal.fire({
            html: e.detail.message,
            title: e.detail.title,
            text: e.detail.message,
            icon: e.detail.type,
            showCancelButton: true,
            confirmButtonText: "Yeah Delete!",
            cancelButtonText: "Cancel",
            // customClass: {
            //     confirmButton: e.detail.confirmButtonClass,
            //     cancelButton: e.detail.cancelButtonClass
            //     },
            // buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                toastR('Processing Action...', 'info')
                livewire.emit('deleteListingConfirmed', e.detail.id);
            } else {
                toastR('Listing not Deleted, Action was canceled by User!', 'warning')
            }
        })

    })

    // for pplied user livewire instance
    window.addEventListener('listing:onboarded_success', (e) => {
        Swal.fire({
            html: e.detail.message,
            title: e.detail.title,
            text: e.detail.message,
            icon: 'success',
            showCancelButton: true,
            confirmButtonText: "Chat Now!",
            cancelButtonText: "Later",
            // customClass: {
            //     confirmButton: e.detail.confirmButtonClass,
            //     cancelButton: e.detail.cancelButtonClass
            //     },
            // buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                livewire.emit('redirect_to_user_inbox', e.detail.user_id)
            } else {
                toastR('anytime you want to chat, go to the listing dashboard and click on -chat!',
                    'info')
            }
        })
    });
    // for pplied user livewire instance
    window.addEventListener('listing:repayAlert', (e) => {
        Swal.fire({
            html: e.detail.message,
            title: "Info!",
            text: e.detail.message,
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: "Ok, Proceed!",
            cancelButtonText: "Later",
            // customClass: {
            //     confirmButton: e.detail.confirmButtonClass,
            //     cancelButton: e.detail.cancelButtonClass
            //     },
            // buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                toastR('Redirecting....', 'info')
                livewire.emit('rePay', e.detail.listing_id, e.detail.listing_price)
            } else {
                toastR('User Canceled Payment, note that unpaid Listings will be deleted after 10 days of creation!',
                    'warning')
            }
        })
    });
    // for pplied user livewire instance
    window.addEventListener('listing:selectUserConfirmation', (e) => {
        Swal.fire({
            html: e.detail.message,
            title: e.detail.title,
            text: e.detail.message,
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: "yeah, sure!",
            cancelButtonText: "nah! i change my mind",
            // customClass: {
            //     confirmButton: e.detail.confirmButtonClass,
            //     cancelButton: e.detail.cancelButtonClass
            //     },
            // buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                toastR('please wait, it might take a few seconds....', 'info')
                livewire.emit('selectUserForListingConfirmed', e.detail.user_id, e.detail.listing_id)
            } else {
                toastR('Onboarding cancelled!')
            }
        })
    });
</script>
@endpush
