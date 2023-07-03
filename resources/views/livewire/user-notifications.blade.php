<div>

    @livewire('account-banner')
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header card-header-stretch pb-0">
            <!--begin::Title-->
            <div class="card-title">
                <h3 class="m-0">Total New Notifications ({{$user->unreadNotifications()->count()}})</h3>
            </div>
            <!--end::Title-->
            <!--begin::Toolbar-->
            <div class="card-toolbar m-0">
                <!--begin::Tab nav-->
                <ul class="nav nav-stretch nav-line-tabs border-transparent" role="tablist">
                    <!--begin::Tab item-->
                    <li class="nav-item" role="presentation">
                        <a id="kt_billing_creditcard_tab" class="nav-link fs-5 fw-bold me-5 active" data-bs-toggle="tab" role="tab" href="#kt_billing_creditcard" aria-selected="true">Notifications</a>
                    </li>
                    <!--end::Tab item-->
                    <!--begin::Tab item-->
                    <li class="nav-item" role="presentation">
                        <a id="kt_billing_paypal_tab" class="nav-link fs-5 fw-bold" data-bs-toggle="tab" role="tab" href="#kt_billing_paypal" aria-selected="false" tabindex="-1">Logs</a>
                    </li>
                    <!--end::Tab item-->
                </ul>
                <!--end::Tab nav-->
            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Tab content-->
        <div id="kt_billing_payment_tab_content" class="card-body tab-content">
            <div class="row g-2 my-5">
                <div class="col-lg-5">
                    <input type="text" class="form-control form-solid" placeholder="search notification" wire:model='search'>
                </div>
                <div class="col-lg-7 d-flex flex-end ">
                    <button class="btn btn-light-success mx-1" wire:click='markAllAsRead'>
                        {!! getIcon('check-square') !!}
                        Mark as Read</button>
                    <button class="btn btn-light-danger mx-1" wire:click='deleteAllNotifications'>
                        {!! getIcon('bin') !!}
                        Delete All</button>
                </div>
            </div>
            <!--begin::Tab panel-->
            <div id="kt_billing_creditcard" class="tab-pane fade show active" role="tabpanel" aria-labelledby="#kt_billing_creditcard_tab">
            @forelse ($notifications as $notification)
                <!--begin::Title-->
                <!--end::Title-->
                <div class="notice d-flex bg-light-{{$notification->data['type']}} rounded border-{{$notification->data['type']}} border border-dashed p-6">
                    <!--begin::Icon-->
                    <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                    <span class="svg-icon svg-icon-2tx svg-icon-{{$notification->data['type']}} me-4">
                    {!! $notification->data['icon'] !!}
                    </span>
                    <!--end::Svg Icon-->
                    <!--end::Icon-->
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                        <!--begin::Content-->
                        <div class="mb-3 mb-md-0 fw-semibold">
                            <h4 class="text-gray-900 fw-bold">{{$notification->data['title']}}</h4>
                            <div class="fs-6 text-gray-700 pe-7">{{$notification->data['message']}}</div>
                            <span class="text-muted my-2">{{time_Ago($notification->created_at)}}</span>
                        </div>
                        <!--end::Content-->
                        <!--begin::Action-->
                        <a href="#" wire:click.prevent="deleteNotification('{{ $notification->id }}')" class="btn btn-{{$notification->data['type']}} px-6 align-self-center text-nowrap" >Delete</a>
                        <!--end::Action-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <div class="border-gray-300 border-bottom border-bottom-dashed my-5"></div>
            @empty
                
            @endforelse
            <div class="d-block mt-5">
                {{ $notifications->links('livewire::bootstrap')}}
            </div>
            </div>
            <!--end::Tab panel-->
            <!--begin::Tab panel-->
            <div id="kt_billing_paypal" class="tab-pane fade" role="tabpanel" aria-labelledby="kt_billing_paypal_tab">
                <!--begin::Title-->
                <h3 class="mb-5">My Paypal</h3>
                <!--end::Title-->
                <!--begin::Description-->
                <div class="text-gray-600 fs-6 fw-semibold mb-5">To use PayPal as your payment method, you will need to make pre-payments each month before your bill is due.</div>
                <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                    <!--begin::Icon-->
                 <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-06-05-142852/core/html/src/media/icons/duotune/ecommerce/ecm010.svg-->
                <span class="svg-icon svg-icon-2tx svg-icon-warning me-4"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.3" d="M3 6C2.4 6 2 5.6 2 5V3C2 2.4 2.4 2 3 2H5C5.6 2 6 2.4 6 3C6 3.6 5.6 4 5 4H4V5C4 5.6 3.6 6 3 6ZM22 5V3C22 2.4 21.6 2 21 2H19C18.4 2 18 2.4 18 3C18 3.6 18.4 4 19 4H20V5C20 5.6 20.4 6 21 6C21.6 6 22 5.6 22 5ZM6 21C6 20.4 5.6 20 5 20H4V19C4 18.4 3.6 18 3 18C2.4 18 2 18.4 2 19V21C2 21.6 2.4 22 3 22H5C5.6 22 6 21.6 6 21ZM22 21V19C22 18.4 21.6 18 21 18C20.4 18 20 18.4 20 19V20H19C18.4 20 18 20.4 18 21C18 21.6 18.4 22 19 22H21C21.6 22 22 21.6 22 21Z" fill="currentColor"/>
                    <path d="M3 16C2.4 16 2 15.6 2 15V9C2 8.4 2.4 8 3 8C3.6 8 4 8.4 4 9V15C4 15.6 3.6 16 3 16ZM13 15V9C13 8.4 12.6 8 12 8C11.4 8 11 8.4 11 9V15C11 15.6 11.4 16 12 16C12.6 16 13 15.6 13 15ZM17 15V9C17 8.4 16.6 8 16 8C15.4 8 15 8.4 15 9V15C15 15.6 15.4 16 16 16C16.6 16 17 15.6 17 15ZM9 15V9C9 8.4 8.6 8 8 8H7C6.4 8 6 8.4 6 9V15C6 15.6 6.4 16 7 16H8C8.6 16 9 15.6 9 15ZM22 15V9C22 8.4 21.6 8 21 8H20C19.4 8 19 8.4 19 9V15C19 15.6 19.4 16 20 16H21C21.6 16 22 15.6 22 15Z" fill="currentColor"/>
                    </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <!--end::Icon-->
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                        <!--begin::Content-->
                        <div class="mb-3 mb-md-0 fw-semibold">
                            <h4 class="text-gray-900 fw-bold">Not Available</h4>
                            <div class="fs-6 text-gray-700 pe-7">Sorry for the inconvenience. At the moment, the PayPal payment gateway is unavailable. We recommend selecting an alternative payment method for your transaction. Thank you for your understanding.</div>
                        </div>
                        <!--end::Content-->
                        <!--begin::Action-->
                        <button disabled href="#" class="btn btn-warning px-6 align-self-center text-nowrap" >Enable</button>
                        <!--end::Action-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Description-->
                <!--begin::Form-->
                <form class="form">
                    <!--begin::Input group-->
                    <div class="mb-7 mw-350px">
                        <select name="timezone" data-control="select2" data-placeholder="Select an option" data-hide-search="true" class="form-select form-select-solid form-select-lg fw-semibold fs-6 text-gray-700 select2-hidden-accessible" data-select2-id="select2-data-10-psxw" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                            <option data-select2-id="select2-data-12-iolc">Select an option</option>
                            <option value="25">US $25.00</option>
                            <option value="50">US $50.00</option>
                            <option value="100">US $100.00</option>
                            <option value="125">US $125.00</option>
                            <option value="150">US $150.00</option>
                        </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-11-lj45" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-lg fw-semibold fs-6 text-gray-700" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-timezone-y0-container" aria-controls="select2-timezone-y0-container"><span class="select2-selection__rendered" id="select2-timezone-y0-container" role="textbox" aria-readonly="true" title="Select an option">Select an option</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                    </div>
                    <!--end::Input group-->
                    <button type="submit" class="btn btn-primary" disabled>Pay with Paypal</button>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Tab panel-->
        </div>
        <!--end::Tab content-->
    </div>
    @push('script')
    <script>
        window.addEventListener('notificationDelete:confirm', (e)=>{
            Swal.fire({
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
            }).then((result)=>{
                if (result.isConfirmed) {
                    toastR('Processing Action...', 'info')
                    livewire.emit('notificationDeleteConfirmed');
                    }else{

                    }
                })
        });
        </script>
@endpush
</div>
