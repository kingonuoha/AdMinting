<div>
    @livewire('account-banner')
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Sign-in Method</h3>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Content-->
        <div id="kt_account_settings_signin_method" class="collapse show">
            <!--begin::Card body-->
            <div class="card-body border-top p-9">
                <!--begin::Email Address-->
                
                <!--end::Email Address-->
                <!--begin::Separator-->
                <!--end::Separator-->
                <!--begin::Password-->
                <div class="d-flex flex-wrap align-items-center mb-10">
                    <!--begin::Label-->
                    <div id="kt_signin_password">
                        <div class="fs-6 fw-bold mb-1">Password</div>
                        <div class="fw-semibold text-gray-600">************</div>
                    </div>
                    <!--end::Label-->
                    <!--begin::Edit-->
                    <div id="kt_signin_password_edit" class="flex-row-fluid d-none">
                        <!--begin::Form-->
                        <form id="kt_signin_change_password" class="form" wire:submit.prevent="updatePassword">
                            <div class="row mb-1">
                                <div class="col-lg-4">
                                    <div class="fv-row mb-0">
                                        <label for="currentpassword" class="form-label fs-6 fw-bold mb-3">Current Password</label>
                                        <input type="password" class="form-control form-control-lg form-control-solid" wire:model.defer="state.current_password" id="currentpassword" />
                                        <x-input-error for="current_password" class="text-danger" />

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="fv-row mb-0">
                                        <label for="newpassword" class="form-label fs-6 fw-bold mb-3">New Password</label>
                                        <input type="password" class="form-control form-control-lg form-control-solid" wire:model.defer="state.password" id="newpassword" />
                                        <x-input-error for="password" class="text-danger" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="fv-row mb-0">
                                        <label for="confirmpassword" class="form-label fs-6 fw-bold mb-3">Confirm New Password</label>
                                        <input type="password" class="form-control form-control-lg form-control-solid" wire:model.defer="state.password_confirmation" id="confirmpassword" />
                                        <x-input-error for="password_confirmation" class="text-danger" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-text mb-5">Password must be at least 8 character and contain symbols</div>
                            <div class="d-flex">
                                <button id="kt_password_submit" type="submit" class="btn btn-primary me-2 px-6">Update Password</button>
                                <button id="kt_password_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Edit-->
                    <!--begin::Action-->
                    <div id="kt_signin_password_button" class="ms-auto">
                        <button class="btn btn-light btn-active-light-primary">Reset Password</button>
                    </div>
                    <!--end::Action-->
                </div>
                <!--end::Password-->
                <!--begin::Notice-->
                <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                    <!--begin::Icon-->
                    <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                    <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor" />
                            <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <!--end::Icon-->
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                        <!--begin::Content-->
                        <div class="mb-3 mb-md-0 fw-semibold">
                            <h4 class="text-gray-900 fw-bold">Secure Your Account</h4>
                            <div class="fs-6 text-gray-700 pe-7">Two-factor authentication adds an extra layer of security to your account. To log in, in addition you'll need to provide a 6 digit code</div>
                        </div>
                        <!--end::Content-->
                        <!--begin::Action-->
                        <a href="#" class="btn btn-warning px-6 align-self-center text-nowrap" data-bs-toggle="modal" data-bs-target="#kt_modal_two_factor_authentication">Enable</a>
                        <!--end::Action-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Notice-->
                <div class="separator separator-dashed my-6"></div>

                <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6 mb-10">
                    <!--begin::Icon-->
                    <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                    <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor" />
                            <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <!--end::Icon-->
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                        <!--begin::Content-->
                        <div class="mb-3 mb-md-0 fw-semibold">
                            <h4 class="text-gray-900 fw-bold">Browser Sessions</h4>
                            <div class="fs-6 text-gray-700 pe-7">If necessary, you may log out of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.</div>
                        </div>
                        <!--end::Content-->
                        <!--begin::Action-->
                        {{-- <a href="#" class="btn btn-primary px-6 align-self-center text-nowrap" data-bs-toggle="modal" data-bs-target="#kt_modal_two_factor_authentication">Enable</a> --}}
                        <!--end::Action-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Notice-->
               <div class="row">
                <div class="col-lg-7">
                    <h4 class="text-gray-900 fw-bold">All Browser sessions</h4>
                </div>
               <div class="col-lg-5 ">
                        @if (count($this->sessions) > 0)
                        <div class="mt-5 space-y-6">
                            <!-- Other Browser Sessions -->
                            @foreach ($this->sessions as $session)
                                <div class="d-flex items-center">
                                    <div>
                                        @if ($session->agent->isDesktop())
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-50px h-50px text-gray-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-50px h-50px text-gray-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                                            </svg>
                                        @endif
                                    </div>
            
                                    <div class="ml-3">
                                        <div class="text-sm text-gray-600">
                                            {{ $session->agent->platform() ? $session->agent->platform() : __('Unknown') }} - {{ $session->agent->browser() ? $session->agent->browser() : __('Unknown') }}
                                        </div>
            
                                        <div>
                                            <div class="text-xs text-gray-500">
                                                {{ $session->ip_address }},
            
                                                @if ($session->is_current_device)
                                                    <span class="text-success fw-semibold">{{ __('This device') }}</span>
                                                @else
                                                    {{ __('Last active') }} {{ $session->last_active }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                <x-button wire:click="confirmLogout" wire:loading.attr="disabled" class="btn btn-primary mt-3">
                    {{ __('Log Out Other Browser Sessions') }}
                </x-button>
               </div>
               </div>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Content-->
    </div>

    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header card-header-stretch pb-0">
            <!--begin::Title-->
            <div class="card-title">
                <h3 class="m-0">Payment Methods</h3>
            </div>
            <!--end::Title-->
            <!--begin::Toolbar-->
            <div class="card-toolbar m-0">
                <!--begin::Tab nav-->
                <ul class="nav nav-stretch nav-line-tabs border-transparent" role="tablist">
                    <!--begin::Tab item-->
                    <li class="nav-item" role="presentation">
                        <a id="kt_billing_creditcard_tab" class="nav-link fs-5 fw-bold me-5 active" data-bs-toggle="tab" role="tab" href="#kt_billing_creditcard" aria-selected="true">Credit / Debit Card</a>
                    </li>
                    <!--end::Tab item-->
                    <!--begin::Tab item-->
                    <li class="nav-item" role="presentation">
                        <a id="kt_billing_paypal_tab" class="nav-link fs-5 fw-bold" data-bs-toggle="tab" role="tab" href="#kt_billing_paypal" aria-selected="false" tabindex="-1">Paypal</a>
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
            <!--begin::Tab panel-->
            <div id="kt_billing_creditcard" class="tab-pane fade show active" role="tabpanel" aria-labelledby="#kt_billing_creditcard_tab">
                <!--begin::Title-->
                <h3 class="mb-5">My Cards</h3>
                <!--end::Title-->
                <!--begin::Row-->
                <div class="row gx-9 gy-6">
                    <!--begin::Col-->
                    <!--begin::Card-->
                    @forelse (getCardList() as $card)
                    <div class="col-xl-6">
                        <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                            <!--begin::Info-->
                            <div class="d-flex flex-column py-2">
                                <!--begin::Owner-->
                                <div class="d-flex align-items-center fs-4 fw-bold mb-5">{{(is_null($card->authorization->account_name)? auth()->user()->name : $card->authorization->account_name)}} 
                                <span class="badge badge-light-success fs-7 ms-2">Primary</span></div>
                                <!--end::Owner-->
                                <!--begin::Wrapper-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Icon-->
                                    <img src="{{asset('users/assets/media/svg/card-logos/'.strtolower($card->authorization->brand).'.svg')}}" alt="" class="me-4">
                                    <!--end::Icon-->
                                    <!--begin::Details-->
                                    <div>
                                        <div class="fs-4 fw-bold">{{$card->authorization->card_type}} **** {{$card->authorization->last4}}</div>
                                        <div class="fs-6 fw-semibold text-gray-400">Card expires at {{$card->authorization->exp_month}}/{{$card->authorization->exp_year}}</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Info-->
                            <!--begin::Actions-->
                            <div class="d-flex align-items-center py-2">
                                <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-3" wire:click="deleteCard({{$card->id}})">Delete</button>
                                {{-- <button class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">Edit</button> --}}
                            </div>
                            <!--end::Actions-->
                        </div>
                    </div>
                        @empty
                        <!--end::Card-->
                            
                        @endforelse
                        
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-6">
                        <!--begin::Notice-->
                        <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed h-lg-100 p-6">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                <!--begin::Content-->
                                <div class="mb-3 mb-md-0 fw-semibold">
                                    <h4 class="text-gray-900 fw-bold">Important Note!</h4>
                                    <div class="fs-6 text-gray-700 pe-7">Please carefully read 
                                    <a href="#" class="fw-bold me-1">Product Terms</a>adding your new payment card</div>
                                </div>
                                <!--end::Content-->
                                <!--begin::Action-->
                                <a href="#" class="btn btn-primary px-6 align-self-center text-nowrap">Add Card</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Notice-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
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

    
    <div class="modal fade" id="adm_modal_confirm_password" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Form-->
                    <!--begin::Modal header-->
                    <div class="modal-header" id="adm_modal_confrim_password_header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bold">Confirm Password</h2>
                        @if($errors->any())
                        <p class="text-danger fs-bold">An error occured!</p>
                        @endif
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div id="adm_modal_confrim_password_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body py-10 px-lg-17">
                        <!--begin::Scroll-->
                        <div class="scroll-y me-n7 pe-7" id="adm_modal_confrim_password_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#adm_modal_confrim_password_header" data-kt-scroll-wrappers="#adm_modal_confrim_password_scroll" data-kt-scroll-offset="300px">
                           <div class="text-muted">Please enter your password to confirm you would like to log out of your other browser sessions across all of your devices.</div>
                           <input class="form-control my-3 form-control-solid" type="password" placeholder="{{ __('Password') }}"
                           wire:model.defer="password"
                           wire:keydown.enter="logoutOtherBrowserSessions">
                        <x-input-error for="password" class="mt-2 text-danger" />

                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Modal body-->
                   
            </div>
        </div>
    </div>
</div>

@push('script')
		{{-- <script src="{{asset('users/assets/js/custom/account/settings/signin-methods.js')}}"></script> --}}
        <script>
            window.addEventListener("confirming-logout-other-browser-sessions", ()=>{
             $('#adm_modal_confirm_password').modal('show')
            })
            window.addEventListener("security:delete_card", (e)=>{
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
                }).then((result)=>{
                    if (result.isConfirmed) {
                        toastR('Processing Action...', 'info')
                        livewire.emit('deleteCardConfirmed', e.detail.card_id);
                        }else{
                            toastR('Card not Deleted, Action was canceled by User!', 'warning')
                        }
                    })
            })
            window.addEventListener("closing-confirming-logout-other-browser-sessions", ()=>{
             $('#adm_modal_confirm_password').modal('hide')
            })
                var n = document.getElementById("kt_signin_password"),
                    o = document.getElementById("kt_signin_password_edit"),
                    r = document.getElementById("kt_signin_password_button"),
                    a = document.getElementById("kt_password_cancel");
              
                   
                    r
                        .querySelector("button")
                        .addEventListener("click", function () {
                            d();
                        }),
                    a.addEventListener("click", function () {
                        d();
                    });
                var l = function () {
                            i.classList.toggle("d-none"),
                            e.classList.toggle("d-none");
                    },
                    d = function () {
                        n.classList.toggle("d-none"),
                            r.classList.toggle("d-none"),
                            o.classList.toggle("d-none");
                    };
        </script>
    
@endpush
