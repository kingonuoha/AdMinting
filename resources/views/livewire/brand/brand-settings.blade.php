<div>
    <div class="position-relative mb-17">
        <!--begin::Overlay-->
        <div class="overlay overlay-show">
            <!--begin::Image-->
            <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-250px"
                style="background-image:url('{{ asset(is_null($brand->banner_path) ? 'storage/brand_banner/' . 'default-1.jpg' : 'storage/' . $brand->banner_path) }}')">
            </div>
            <!--end::Image-->
            <!--begin::layer-->
            <div class="overlay-layer rounded bg-black" style="opacity: 0.4"></div>
            <!--end::layer-->
        </div>
        <!--end::Overlay-->
        <!--begin::Heading-->
        <div class="position-absolute text-white mb-8 ms-10 bottom-0">
            <div class="symbol symbol-50px mb-1 bg-secondary  px-2 py-1">
                @if (empty($brand->logo_path))
                    BLANK
                @else
                <img src="{{ asset('storage/' . $brand->logo_path) }}" style="object-fit:contain"
                alt="Rath, Swift and Hegmann Logo"> 
                @endif
                
            </div>

            <div>
                <!--begin::Title-->
                <h3 class="text-white fs-2qx fw-bold mb-3 m">{{ $brand->brand_name }}</h3>
                <!--end::Title-->
                <!--begin::Text-->
                <div class="fs-5 fw-semibold">{{ $brand->short_desc }}</div>
                <!--end::Text-->
            </div>
        </div>
        <!--end::Heading-->
    </div>


    <div class="card mb-5 mb-xl-10 p-lg-17 mt-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true"
            aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Brand Details</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Content-->
        <div id="kt_account_settings_profile_details" class="collapse show">
            <!--begin::Form-->
            <form class="form" wire:submit.prevent="updateBrand">
                <!--begin::Card body-->
                <div class="card-body border-top p-9">
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Brand Logo & Banner</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="file" name="banner" id="changeBrandBanner" class="d-none"
                                onchange="this.dispatchEvent(new InputEvent('input'))">
                            <input type="file" name="logo" id="changeBrandLogo" class="d-none"
                                onchange="this.dispatchEvent(new InputEvent('input'))">
                            <a href="#" class="btn btn-sm btn-primary me-2" data-bs-toggle="modal"
                                data-bs-target="#logo_update"
                                onclick="event.preventDefault();document.getElementById('changeBrandLogo').click();">Change
                                Logo</a>
                            <a href="#" class="btn btn-sm btn-primary me-2" data-bs-toggle="modal"
                                data-bs-target="#Banner_update"
                                onclick="event.preventDefault();document.getElementById('changeBrandBanner').click();">Change
                                Banner</a>
                            <div class="text-muted">NB: make it as short as possible</div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Short Description</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="text" wire:model.defer="short_desc"
                                class="form-control form-control-lg form-control-solid"
                                placeholder="Enter Short Description of your
                                @error("short_desc") brand"> <span class="text-danger px-2 py-1 bg-light-danger">{{$message}}</span> @enderror
                            <div class="text-muted">NB: make it as short as possible</div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Brand Description</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col fv-row fv-plugins-icon-container">
                                    <textarea class="form-control" wire:model.defer="description" cols="30" rows="10"></textarea>
                                    @error("description") <span class="text-danger px-2 py-1 bg-light-danger">{{$message}}</span> @enderror
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">
                            <span class="required">Phone Numbers</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                aria-label="Phone number must be active" data-kt-initialized="1"></i>
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input wire:model.defer="phone_number" id="kt_tagify_1" type="tel"
                                class="form-control form-control-lg form-control-solid"
                                placeholder="Enter Phone Number">
                                @error("phone_number") <span class="text-danger px-2 py-1 bg-light-danger">{{$message}}</span> @enderror
                            <div class="text-muted">Enter your brand contact address! user comma (,) to differenciate
                                different numbers </div>
                            {{ print_r($phone_number) }}
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">
                            <span class="required">Location Address</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                aria-label="Enter valid location" data-kt-initialized="1"></i>
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="email" wire:model.defer="location"
                                class="form-control form-control-lg form-control-solid" placeholder="Enter Location">
                            <div class="text-muted">Enter your brand locati
                                @error("location")on</div> <span class="text-danger px-2 py-1 bg-light-danger">{{$message}}</span> @enderror
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->


                </div>
                <!--end::Card body-->
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                    <x-button wire:click.prevent="updateBrand" type="submit" loading="updateBrand">Submit</x-button>
                    {{-- <button type="submit" class="btn btn-primary" wire:click.prevent="updateBrand">Submit</button> --}}
                </div>
                <!--end::Actions-->
                <input type="hidden">
                <div></div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Content-->
    </div>
    @push('script')
        {{--  Admin Change PRofile Pic --}}
        <script>
            $('#changeBrandBanner').ijaboCropTool({
                preview: '',
                setRatio: 16 / 9,
                allowedExtensions: ['jpg', 'jpeg', 'png'],
                buttonsText: ['CROP', 'QUIT'],
                buttonsColor: ['#30bf7d', '#ee5155', -15],
                processUrl: '{{ route('account.brand.banner') }}',
                withCSRF: ['_token', '{{ csrf_token() }}'],
                onSuccess: function(message, element, status) {
                    // alert(message);
                    Livewire.emit('refreshComponent');
                    success_alert(message)
                },
                onError: function(message, element, status) {
                    error_alert('Couldnt Change Profile Picture : Error:-' + message)
                }
            });



            $('#changeBrandLogo').ijaboCropTool({
                preview: '',
                setRatio: 1,
                allowedExtensions: ['jpg', 'jpeg', 'png'],
                buttonsText: ['CROP', 'QUIT'],
                buttonsColor: ['#30bf7d', '#ee5155', -15],
                processUrl: '{{ route('account.brand.logoUpdate', ['brand_id' => $brand->id]) }}',
                withCSRF: ['_token', '{{ csrf_token() }}'],
                onSuccess: function(message, element, status) {
                    // alert(message);
                    Livewire.emit('refreshComponent');
                    success_alert(message)
                },
                onError: function(message, element, status) {
                    error_alert('Couldnt Change Profile Picture : Error:-' + message)
                }
            });


            // // The DOM elements you wish to replace with Tagify
            // var input1 = document.querySelector("#kt_tagify_1");
            // // Initialize Tagify components on the above inputs
            // let tagify = new Tagify(input1, {
            //     delimiters: [','], // Set the delimiter to a comma
            // });
            // tagify.on('add', function(e) {
            //     // Handle adding phone_number here
            //     @this.phone_number = tagify.value;
            // });

            // tagify.on('remove', function(e) {
            //     // Handle removing phone_number here
            //     @this.phone_number = tagify.value;
            // });
        </script>
        {{-- End Admin Change PRofile Pic --}}
    @endpush
</div>
