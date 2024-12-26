<div>
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Enter Bank Details</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Content-->
        {{-- if users have not already inputed their bank details alerady show below  --}}
        @if (is_null($user_bank_details))
            
      
        <div id="kt_account_settings_profile_details" class="collapse show">
            <!--begin::Form-->
            <form class="form fv-plugins-bootstrap5 fv-plugins-framework" wire:submit.prevent="saveBankDetails">
                <!--begin::Card body-->
                <div class="card-body border-top p-9">
                    <!--begin::Input group-->



                    <div class="mb-2">
                        <label for="" class="form-label">Choose Bank</label>
                        <div class="input-group input-group-solid flex-nowrap">
                            <span class="input-group-text"><span class="text-info">{!! getIcon('bank') !!}</span></span>

                            <div class="overflow-hidden flex-grow-1">
                                <select class="form-select form-select-solid rounded-0 border-start border-end"
                                    wire:model="selected_bank" data-control="select2" data-placeholder="Choose A Bank"
                                    id="bankSelect">
                                    <option></option>
                                    {{-- Check if the server responded with the banks --}}
                                    @if (isset($supported_banks['status']) && $supported_banks['status'])
                                        {{-- looping through the banks --}}
                                        @php
                                            $banks = $supported_banks['data'];
                                        @endphp
                                        @foreach ($banks as $key => $bank)
                                            {{-- checking if specified bank is actualy active  --}}
                                            @if ($bank['active'])
                                                {{-- displaying bank details  --}}
                                                <option value="{{ $bank['code'] }}"> {{ $bank['name'] }}</option>
                                            @endif
                                        @endforeach
                                    @endif

                                </select>
                            </div>
                            <span class="input-group-text">NGN</span>
                        </div>
                        <div class="text-muted mt-5">Is your bank not listed here? Don't worry; we only support these
                            banks! </div>
                        <div class="text-info bg-light-info px-2 py-1" id="selected_bank"></div>
                    </div>
                    {{-- only show if bank has been selected --}}
                    @if (!is_null($selected_bank))
                        <div class="mb-2">
                            <label for="" class="form-label">Account Number</label>
                            <div class="input-group input-group-solid flex-nowrap">
                                <span class="input-group-text"><span
                                        class="text-info">{!! getIcon('bank') !!}</span></span>

                                <input type="text" class="form-control" wire:model.lazy="account_number">
                            </div>

                            {{-- @if (!is_null($account_name)) --}}

                            <div class="text-info bg-light-info px-2 py-1 fw-bold">
                                {{ !is_null($account_name) ? 'ACCOUNT NAME: ' . $account_name : '' }} </div>
                            {{-- @endif --}}
                            @error('error_name')
                                <div class="text-danger bg-light-danger mt-2 px-2 py-1">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- only show input when the account name is not given, to avoid hacking into the input fields --}}
                        @if (is_null($account_name))
                            <div class="mb-2">
                                <label for="" class="form-label">Account Name</label>
                                <div class="input-group input-group-solid flex-nowrap">
                                    <span class="input-group-text"><span
                                            class="text-info">{!! getIcon('bank') !!}</span></span>

                                    <input type="text" class="form-control" wire:model.lazy="account_name"
                                        @if ($account_name) disable readonly @endif>
                                </div>

                                {{-- @if (!is_null($account_name)) --}}

                                {{-- <div class="text-info bg-light-info px-2 py-1 fw-bold">{{(!is_null($account_name))? "ACCOUNT NAME: ". $account_name : '' }} <span wire:loading wire:target="updatedAccountNumber" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></div> --}}
                                {{-- @endif --}}
                                @error('error_name')
                                    <div class="text-danger bg-light-danger mt-2 px-2 py-1">{{ $message }}</div>
                                @enderror
                            </div>
                        @endif
                    @endif
                    <div wire:loading class="text-info fw-bold fs-4"><span class="spinner-border spinner-border-sm"
                            role="status" aria-hidden="true"></span> Loading...</div>
                    <!--end::Both add-ons in solid style-->
                    <!--end::Input group-->

                    <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6 ">
                        <!--begin::Icon-->
                        <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                        <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                           {!! getIcon('warning') !!}
                        </span>
                        <!--end::Svg Icon-->
                        <!--end::Icon-->
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-grow-1">
                            <!--begin::Content-->
                            <div class="fw-semibold">
                                <h4 class="text-warning fw-bold">Note!</h4>
                                <div class="fs-6 text-gray-700">Note that You cannot Update Your account information after adding it, so make sure your details are correct before submiting, if you notice anything wrong, pls refresh the page and try again.</div>
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                </div>
               
                <!--end::Card body-->
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                    <x-button loading="saveBankDetails">Save Changes</x-button>
                </div>
                <!--end::Actions-->
                <input type="hidden">
                <div></div>
            </form>
            <!--end::Form-->
        </div>
        @else
        {{-- if user have inputed thier details already show below  --}}
        <div class="row gx-9 gy-6 mx-5 mb-5">
            <!--begin::Col-->
            <div class="col-xl-6">
                <!--begin::Card-->
                <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                    <!--begin::Info-->
                    <div class="d-flex flex-column py-2">
                        <!--begin::Owner-->
                        <div class="d-flex align-items-center fs-4 fw-bold mb-5">{{$user_bank_details['name']}}
                        <span class="badge badge-light-success fs-7 ms-2">Primary</span></div>
                        <!--end::Owner-->
                        <!--begin::Wrapper-->
                        <div class="d-flex align-items-center">
                            <!--begin::Icon-->
                            <div class="w-150px h-150px d-flex justify-content-center align-items-center symbol symbol-150px bg-light-success me-4">
                                <span class="svg-icon svg-icon-5x text-success ">
                                    {!! getIcon('bank') !!}
                                </span>
                            </div>
                            <!--end::Icon-->
                            <!--begin::Details-->
                            <div>
                                <div class="fs-4 fw-bold">{{$user_bank_details['details']['bank_name']}} **** {{substr($user_bank_details['details']['account_number'], -4)}}</div>
                                <div class="fs-6 fw-semibold text-gray-400">Created at {{date_formatter($user_bank_details['createdAt'])}}</div>
                            </div>
                            <!--end::Details-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Info-->
                    <!--begin::Actions-->
                    <div class="d-flex align-items-center py-2">
                        <x-button loading="deleteDetails" wire:click.prevent="deleteDetails" class="btn btn-sm btn-light btn-active-light-primary me-3">Delete</x-button>
                        <x-button loading="editDetails" wire:click.prevent="editDetails" class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">Edit</x-button>
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Col-->
        </div>
        @endif

        <!--end::Content-->
    </div>
    @push('script')
        <script>
            // $('#bankSelect').on('select2:close', (e) => {
            //     @this.emit('bankSelected', $('#bankSelect').select2('val'));
            //     $("#selected_bank").text($('#bankSelect').select2('text'))
            //     // $('#bankSelect').select2();
            // });
            $('#bankSelect').on('change', function(e) {
                var data = $('#bankSelect').select2("val");
                // $("#selected_bank").text(data)
                @this.emit('bankSelected', data);
            });
            $('#bankSelect').val(@this.get('selected_bank'));
        </script>
    @endpush
</div>
