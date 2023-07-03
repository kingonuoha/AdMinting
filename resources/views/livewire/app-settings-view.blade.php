<div>
    <div class="flex-lg-row-fluid"  >
        <!--begin:::Tabs-->
        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8" role="tablist">
            <!--begin:::Tab item-->
            <li class="nav-item" role="presentation">
                <a wire:ignore.self class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_customer_view_overview_tab" aria-selected="false" role="tab" tabindex="-1">Basic Settings</a>
            </li>
            <!--end:::Tab item-->
            <!--begin:::Tab item-->
            <li class="nav-item" role="presentation">
                <a wire:ignore.self class="nav-link text-active-primary pb-4 " data-bs-toggle="tab" href="#kt_customer_view_overview_events_and_logs_tab" aria-selected="true" role="tab">Socials</a>
            </li>
            <!--end:::Tab item-->
            <!--begin:::Tab item-->
            <li class="nav-item" role="presentation">
                <a wire:ignore.self class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#kt_customer_view_overview_statements" data-kt-initialized="1" aria-selected="false" role="tab" tabindex="-1">Others</a>
            </li>
            <!--end:::Tab item-->
           
        </ul>
        <!--end:::Tabs-->
        <!--begin:::Tab content-->
        <div class="tab-content" id="myTabContent">
            <!--begin:::Tab pane-->
            <div class="tab-pane fade active show" id="kt_customer_view_overview_tab" role="tabpanel" wire:ignore.self>
                <!--begin::Card-->
                <div class="card pt-4 mb-6 mb-xl-9">
                    <!--begin::Card header-->
                    <div class="card-header border-0">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>Basic Settings</h2>
                            {{-- first one not saving --}}
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Filter-->
                            <button type="button" class="btn btn-sm btn-flex btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_payment">Add payment</button>
                            <!--end::Filter-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                <form wire:submit.prevent="basicSettingSave">
                        <div class="card-body pt-0 pb-5">
                                
                            <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">App Name</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" aria-label="Specify an App name" data-kt-initialized="0"></i>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="Enter App Name" wire:model="app_name">
                                @error("app_name")<div class="fv-plugins-message-container invalid-feedback">{{$message}}</div> @enderror
                            </div>
                            <!--End::INput-->
                            <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">App Email</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" aria-label="Specify an App name" data-kt-initialized="0"></i>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="Enter App Email" wire:model="app_email">
                                @error("app_email")<div class="fv-plugins-message-container invalid-feedback">{{$message}}</div> @enderror
                            </div>
                            <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Upload Logo (.png)</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" aria-label="Specify an App name" data-kt-initialized="0"></i>
                                </label>
                                <!--end::Label-->
                                <div class="row">
                                   
                                    <div class="col-lg-6">
                                        <div class="me-7 mb-4">
                                            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                                <img src="{{asset('users/assets/media/avatars/300-1.jpg')}}" alt="image">
                                                <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px"></div>
                                            </div>
                                        </div>
                                        <input type="file" name="file" id="changeAuthorPictureProfile" class="d-none" onchange="this.dispatchEvent(new InputEvent('input'))">
                                        <a href="#" class="btn btn-sm btn-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_offer_a_deal" onclick="event.preventDefault();document.getElementById('changeAuthorPictureProfile').click();">Change Profile Pic</a>
                                    </div>
                                </div>
                                {{-- @error("Name")<div class="fv-plugins-message-container invalid-feedback">{{$message}}</div> @enderror --}}
                            </div>
                            <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Enter Contacts (seperated by comma ",")</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" aria-label="Specify an App name" data-kt-initialized="0"></i>
                                </label>
                                <!--end::Label-->
                                {{-- <div wire:ignore> --}}
                                    <input wire:ignore  class="form-control form-control-solid" wire:model.defer="app_phone" id="category_tagify_listing" />
                                {{-- </div> --}}
                                @error("app_phone")<div class="fv-plugins-message-container invalid-feedback">{{$message}}</div> @enderror
                            </div>
                            <button type="submit" id="app_modal_create_job_submit"  wire:loading.attr="disabled"  class="btn btn-primary">
                                <span class="indicator-label" wire:loading.remove wire:target="basicSettingSave">Submit</span>
                                <span class="indicator-progress" wire:loading wire:target="basicSettingSave">Please wait... 
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                </form>

                    <!--end::Card body-->
                </div>
                <!--end::Card-->
                
                <!--Begin::INput-->
                
            </div>
            <!--end:::Tab pane-->
            <!--begin:::Tab pane-->
            <div class="tab-pane fade " id="kt_customer_view_overview_events_and_logs_tab" role="tabpanel" wire:ignore.self>
                <!--begin::Card-->
                <div class="card pt-4 mb-6 mb-xl-9">
                    <!--begin::Card header-->
                    <div class="card-header border-0">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>App Socials</h2>
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <button type="button" class="btn btn-sm btn-light-primary">
                           Download Report</button>
                            <!--end::Button-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body py-0">
                        <form wire:submit.prevent="socialSettingSave" >
                            <div class="card-body pt-0 pb-5">
                                    
                                <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                        <span class="required">Facebook</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" aria-label="Specify an App name" data-kt-initialized="0"></i>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter Link to Facebook Page" wire:model="app_facebook">
                                    @error("app_facebook")<div class="fv-plugins-message-container invalid-feedback">{{$message}}</div> @enderror
                                </div>
                                <!--End::INput-->
                                <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                        <span class="required">Instagram</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" aria-label="Specify an App name" data-kt-initialized="0"></i>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter Link to Instagram Page" wire:model="app_instagram">
                                    @error("app_instagram")<div class="fv-plugins-message-container invalid-feedback">{{$message}}</div> @enderror
                                </div>
                                
                                <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                        <span class="required">Linked In</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" aria-label="Specify an App name" data-kt-initialized="0"></i>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter Link to Linkedin Page" wire:model="app_linkedin">
                                    @error("app_linkedin")<div class="fv-plugins-message-container invalid-feedback">{{$message}}</div> @enderror
                                </div>
                                <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                        <span class="required">Youtube</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" aria-label="Specify an App name" data-kt-initialized="0"></i>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter Link to Yotube Channel" wire:model="app_youtube">
                                    @error("app_youtube")<div class="fv-plugins-message-container invalid-feedback">{{$message}}</div> @enderror
                                </div>
                                <button type="submit" id="app_modal_create_job_submit"  wire:loading.attr="disabled"  class="btn btn-primary">
                                    <span class="indicator-label" wire:loading.remove wire:target="socialSettingSave">Submit</span>
                                    <span class="indicator-progress" wire:loading wire:target="socialSettingSave">Please wait... 
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                    </form>
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
                
            </div>
            <!--end:::Tab pane-->
            <!--begin:::Tab pane-->
            <div class="tab-pane fade" id="kt_customer_view_overview_statements" role="tabpanel" wire:ignore.self>
                <!--begin::Earnings-->
                <div class="card mb-6 mb-xl-9">
                    <!--begin::Header-->
                    <div class="card-header border-0">
                        <div class="card-title">
                            <h2>Earnings</h2>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-0">
                        <div class="fs-5 fw-semibold text-gray-500 mb-4">Last 30 day earnings calculated. Apart from arranging the order of topics.</div>
                        
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Earnings-->
              
            </div>
            <!--end:::Tab pane-->
        </div>
        <!--end:::Tab content-->
    </div>
</div>
@push('script')
        {{--  Admin Change PRofile Pic --}}
			<script>
				$('#changeAuthorPictureProfile').ijaboCropTool({
                    preview : '',
                    setRatio:1,
                    allowedExtensions: ['jpg', 'jpeg','png'],
                    buttonsText:['CROP','QUIT'],
                    buttonsColor:['#30bf7d','#ee5155', -15],
                    processUrl:'{{ route("super_admin.change_app_logo") }}',
                    withCSRF:['_token','{{ csrf_token() }}'],
                    onSuccess:function(message, element, status){
                        // alert(message);
                       Livewire.emit('updateAdminHeader');
                       success_alert(message)
                    },
                    onError:function(message, element, status){
                        error_alert('Couldnt Change Profile Picture : Error:-'+message)
                    }
                });



                var category_input = document.querySelector("#category_tagify_listing");
		//tagify
		// The DOM elements you wish to replace with Tagify
		new Tagify(category_input, {
			// whitelist: categories.category_name,
			maxTags: 6,
            // enforceWhitelist: true,
            originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(','),
			dropdown: {
				maxItems: 20,           // <- mixumum allowed rendered suggestions
				classname: "tagify__inline__suggestions", // <- custom classname for this dropdown, so it could be targeted
				enabled: 0,             // <- show suggestions on focus
				closeOnSelect: false    // <- do not hide the suggestions dropdown once an item has been selected
			}
		}).on('invalid', onInvalidTag)

        function onInvalidTag(e){
            
            toastr.options = {
                    "closeButton": true,
                    "debug": true,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toastr-top-right",
                    "preventDuplicates": false,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    };
            
            toastr.warning(e.detail.message, "Warning!");
        }
			</script>
			{{-- End Admin Change PRofile Pic --}}
    @endpush