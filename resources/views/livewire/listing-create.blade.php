 {{-- Begin Main Content --}}
 <div>
     @push('style')
         <script src="https://cdn.jsdeivr.net/npm/@yaireo/tagify"></script>
         <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
         <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
     @endpush
     <div class="card my-3">
         <!--begin::Card body-->
         <div class="card-body p-0">
             <!--begin::Wrapper-->
             <div class="card-px text-center py-20 my-10">
                 <!--begin::Title-->
                 <h2 class="fs-2x fw-bold mb-10">Welcome to New Job Listings Page</h2>
                 <!--end::Title-->
                 <span class="p-2 bg-light-success btn mb-3">You have a Total of <span
                         class="fw-semibold">({{ $listings->count() }})</span> Job Listings</span>
                 <!--begin::Description-->
                 @if ($listings->count() > 0)
                     <p class="text-gray-400 fs-4 fw-semibold mb-10">You currently have ({{ $listings->count() }}) job
                         listings created. Keep track of your listings for better management</p>
                     <!--end::Description-->
                 @else
                     <p class="text-gray-400 fs-4 fw-semibold mb-10">There are no Jobs added yet.
                         <br>Kickstart your CRM by adding a your first Job Listings.
                     </p>
                     <!--end::Description-->
                 @endif
                 <!--begin::Action-->
                 <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                     data-bs-target="#adm_modal_create_job">Create Job Listing</a>
                 <!--end::Action-->
             </div>
             <!--end::Wrapper-->
             <!--begin::Illustration-->
             <div class="text-center px-4">
                 <img class="mw-100 mh-300px" alt=""
                     src="{{ asset('users/assets/media/illustrations/sketchy-1/2.png') }}">
             </div>
             <!--end::Illustration-->
         </div>
         <!--end::Card body-->
     </div>

     {{-- Begin Listing --}}

     {{-- End Listing --}}

     <div class="modal fade" id="adm_modal_create_job" tabindex="-1" aria-hidden="true" wire:ignore.self>
         <!--begin::Modal dialog-->
         <div class="modal-dialog modal-dialog-centered mw-650px">
             <!--begin::Modal content-->
             <div class="modal-content">
                 <!--begin::Form-->
                 {{-- <form class="form" method="post" action="{{route('listing.store')}}" id="adm_modal_create_job_form"> --}}
                 <form class="form" wire:submit.prevent="storeListing">
                     @csrf
                     <!--begin::Modal header-->
                     <div class="modal-header" id="adm_modal_create_job_header">
                         <!--begin::Modal title-->
                         <h2 class="fw-bold">Create New Job Listing</h2>
                         {{-- @if ($errors->any())
                        <p class="text-danger fs-bold">An error occured!</p>
                        @endif --}}
                         <!--end::Modal title-->
                         <!--begin::Close-->
                         <div id="adm_modal_create_job_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
                     <!--end::Modal header-->
                     <!--begin::Modal body-->
                     <div class="modal-body py-10 px-lg-17">
                         <!--begin::Scroll-->
                         <div class="scroll-y me-n7 pe-7 d-flex flex-column" id="adm_modal_create_job_scroll"
                             data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                             data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#adm_modal_create_job_header"
                             data-kt-scroll-wrappers="#adm_modal_create_job_scroll" data-kt-scroll-offset="300px">
                             <!--begin::Input group-->
                             <div class="fw-bold fs-3 rotate collapsible mb-7 collapsed" data-bs-toggle="collapse"
                                 href="#adm_modal_create_job_basic" role="button" aria-expanded="false"
                                 aria-controls="kt_customer_view_details">Basic Information
                                 <span class="ms-2 rotate-180">
                                     <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                     <span class="svg-icon svg-icon-3">
                                         <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                             <path
                                                 d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                 fill="currentColor" />
                                         </svg>
                                     </span>
                                     <!--end::Svg Icon-->
                                 </span>
                             </div>
                             <!--end::Billing toggle-->
                             <!--begin::Billing form-->
                             <div id="adm_modal_create_job_basic" class="collapse" wire:ignore.self>
                                 <div class="fv-row mb-7">
                                     <!--begin::Label-->
                                     <label class="required fs-6 fw-semibold mb-2">Job Title</label>
                                     <!--end::Label-->
                                     <!--begin::Input-->
                                     <input type="text" class="form-control form-control-solid" placeholder=""
                                         wire:model="title" />
                                     @error('title')
                                         <span class="text-danger bg-light-danger my-1">{{ $message }}</span>
                                     @enderror
                                     <span class="text-danger error-text title_error"></span>

                                     <!--end::Input-->
                                 </div>
                                 <!--begin::Input group-->
                                 <div class="fv-row mb-5">
                                     <!--begin::Label-->
                                     <label class="fs-6 fw-semibold mb-2">Description</label>
                                     <!--end::Label-->
                                     <!--begin::Input-->
                                     <textarea type="text" class="form-control form-control-solid"
                                         placeholder="Describe what you expect from this listing, this is where you make the creator understand you more"
                                         wire:model="description"> </textarea>
                                     @error('description')
                                         <span class="text-danger bg-light-danger my-1">{{ $message }}</span>
                                     @enderror
                                     <span class="text-danger error-text description_error"></span>

                                     <!--end::Input-->
                                 </div>
                                 <!--end::Input group-->
                                 <!--end::Input group-->
                                 <!--begin::Input group-->
                                 <div class="fv-row mb-7">
                                     <label class="form-label">Work Flow<i class="fas fa-exclamation-circle ms-2 fs-7"
                                             data-bs-toggle="tooltip" title="Enter Job Location"></i></h2></label>
                                     <select class="form-select" wire:model="s_use_case"
                                         placeholder="Enter Location (eg. Remote Lagos)">
                                         @error('s_use_case')
                                             <span class="text-danger bg-light-danger my-1">{{ $message }}</span>
                                         @enderror
                                         <option value="">CHOOSE Action</option>
                                         @foreach ($use_cases as $use_case)
                                             <option value="{{ $use_case->id }}">{{ $use_case->name }}</option>
                                         @endforeach
                                     </select>
                                     <!--begin::Label-->
                                     @if (!empty($s_use_case))
                                         @php
                                             $case = App\Models\UseCase::find($s_use_case);
                                         @endphp
                                         <label
                                             class="mt-2 btn btn-outline btn-outline-dashed btn-light-primary btn-active-light-primary p-7 d-flex align-items-center mb-5"
                                             for="kt_modal_two_factor_authentication_option_1">
                                             <!--begin::Svg Icon | path: icons/duotune/coding/cod001.svg-->
                                             <span class="svg-icon svg-icon-4x me-4">
                                                 {!! getIcon('bell_box') !!}
                                             </span>
                                             <!--end::Svg Icon-->
                                             <span class="d-block fw-semibold text-start">
                                                 <span
                                                     class="text-dark fw-bold d-block fs-3">{{ $case->name }}</span>
                                                 <span
                                                     class="text-muted fw-semibold fs-6">{{ $case->description }}</span>
                                             </span>
                                         </label>
                                     @endif
                                     <span class="text-danger error-text location_error"></span>

                                     <!--end::Input-->
                                 </div>
                                 <!--end::Input group-->

                             </div>
                             <!--begin::Billing toggle-->
                             <div class="fw-bold fs-3 rotate collapsible mb-7 collapsed" data-bs-toggle="collapse"
                                 href="#adm_modal_create_job_more_info" role="button" aria-expanded="false"
                                 aria-controls="kt_customer_view_details">More Information
                                 <span class="ms-2 rotate-180">
                                     <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                     <span class="svg-icon svg-icon-3x">
                                         <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                             <path
                                                 d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                 fill="currentColor" />
                                         </svg>
                                     </span>
                                     <!--end::Svg Icon-->
                                 </span>
                             </div>
                             <!--end::Billing toggle-->
                             <!--begin::Billing form-->
                             <div id="adm_modal_create_job_more_info" class="collapse" wire:ignore.self>

                                 <!--begin::Input group-->
                                 <div class="fv-row mb-15">
                                     <!--begin::Label-->
                                     <label class="fs-6 fw-semibold mb-2">Job Category</label>
                                     <!--end::Label-->
                                     <!--begin::Input-->
                                     <div wire:ignore>
                                         <input class="form-control form-control-solid",
                                             value="{{ $selected_category }}" id="category_tagify_listing" />
                                         @error('selected_category')
                                             <span class="text-danger bg-light-danger my-1">{{ $message }}</span>
                                         @enderror
                                     </div>
                                     <span class="text-danger error-text category_error"></span>

                                     <!--end::Input-->
                                 </div>
                                 <!--end::Input group-->
                                 <!--begin::Input group-->
                                 <div class="fv-row mb-5">
                                     <!--begin::Label-->
                                     <label class="fs-6 fw-semibold mb-2 required">Required Social Handles</label>
                                     <!--end::Label-->
                                     <!--begin::Input-->
                                     <div wire:ignore>
                                         <input class="form-control form-control-solid"
                                             value="{{ $required_social }}" id="category_tagify_social" />
                                         @error('required_social')
                                             <span class="text-danger bg-light-danger my-1">{{ $message }}</span>
                                         @enderror
                                     </div>
                                     <span class="text-danger error-text category_error"></span>

                                     <!--end::Input-->
                                 </div>
                                 <div class="row mb-7">
                                     <!--end::Input group-->
                                     <div class="fv-row mb-10 fv-plugins-icon-container  col-lg-6">
                                         <!--begin::Label-->
                                         <label class="form-label required">Enter Due Date</label>
                                         <!--end::Label-->
                                         <!--begin::Input-->
                                         {{-- <input wire:model="due_date"
                                        class="form-control form-control-lg form-control-solid" id="kt_datepicker_1"
                                        placeholder="Pick a date"> --}}
                                         <input wire:model="due_date"
                                             class="form-control form-control-lg form-control-solid"
                                             placeholder="Pick a date (in Days) eg.(6)">
                                         <div class="text-muted mt-2">pls note that this time frame will take effect
                                             immediately after you've onboarded a Creator</div>
                                         <!--end::Input-->
                                         @error('due_date')
                                             <div class="fv-plugins-message-container invalid-feedback">
                                                 {{ $message }}
                                             </div>
                                         @enderror
                                     </div>
                                     <!--begin::Input group-->
                                     <div class="fv-row mb-7 col-lg-6">
                                         <label class="form-label">Location<i
                                                 class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                 title="Enter Job Location"></i></h2></label>
                                         <select class="form-select" wire:model="location"
                                             placeholder="Enter Location (eg. Remote Lagos)">
                                             @error('location')
                                                 <span class="text-danger bg-light-danger my-1">{{ $message }}</span>
                                             @enderror
                                             <option value="">CHOOSE Location</option>
                                             <option value="Remote">Remote</option>
                                             @foreach (DB::table('states')->get() as $state)
                                                 <option value="{{ $state->state }}">{{ $state->state }}</option>
                                             @endforeach
                                         </select>
                                         <!--begin::Label-->
                                         <div class="text-muted mt-2">Selecte a location to limit it to a range of
                                             creators, you can choose "remote" to cover worldwide</div>
                                         <span class="text-danger error-text location_error"></span>

                                         <!--end::Input-->
                                     </div>
                                     <!--end::Input group-->
                                 </div>
                                 <div class="mb-7">
                                    <label for="customRange1" class="form-label ">Terms of Service <span class="svg-icon-info svg-icon svg-icon-2x">{!! getIcon('briefcase') !!}</span> </label>
                                   <textarea wire:model="terms_of_service" id="" cols="10" rows="5" class="form-control form-control-solid"></textarea>
                                    <span class="text-muted fs-7">Enter Terms and conditions for Onboarding this listing</span>
                                    @error('terms_of_service')
                                        <span class="text-danger bg-light-danger my-1">{{ $message }}</span>
                                    @enderror
                                </div>
                             </div>
                             <!--end::Billing form-->

                             <!--begin::Billing toggle-->
                             <div class="fw-bold fs-3 rotate collapsible mb-7 collapsed" data-bs-toggle="collapse"
                                 href="#adm_modal_create_job_billing_info" role="button" aria-expanded="false"
                                 aria-controls="kt_customer_view_details">Documents
                                 <span class="ms-2 rotate-180">
                                     <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                     <span class="svg-icon svg-icon-3">
                                         <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                             <path
                                                 d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                 fill="currentColor" />
                                         </svg>
                                     </span>
                                     <!--end::Svg Icon-->
                                 </span>
                             </div>
                             <!--end::Billing toggle-->
                             <!--begin::Billing form-->
                             <div id="adm_modal_create_job_billing_info" class="collapse " wire:ignore.self>
                                 <div class="fv-row">

                                     <!--begin::Dropzone-->
                                     <div wire:ignore class="dropzone" id="kt_dropzonejs_example_1">
                                         <!--begin::Message-->
                                         <div class="dz-message needsclick">
                                             <span class="fs-3x text-primary">
                                                 {!! getIcon('file-up') !!}
                                             </span>
                                             <!--begin::Info-->
                                             <div class="ms-4">

                                                 <h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop files here or click
                                                     to upload.</h3>
                                                 <span class="fs-7 fw-semibold text-gray-400">Upload up to 10
                                                     files</span>
                                             </div>
                                             <!--end::Info-->
                                         </div>
                                     </div>
                                     @error('fileLinks')
                                         <span
                                             class="text-danger bg-light-danger px-2 py-1 mt-2">{{ $message }}</span>
                                     @enderror
                                     <!--end::Dropzone-->
                                 </div>
                                 <!--end::Input group-->
                             </div>
                             <!--end::Billing form-->
                             <!--begin::Billing toggle-->
                             <div class="fw-bold fs-3 rotate collapsible mb-7 collapsed" data-bs-toggle="collapse"
                                 href="#adm_modal_create_job_billing_info" role="button" aria-expanded="false"
                                 aria-controls="kt_customer_view_details">Billing
                                 <span class="ms-2 rotate-180">
                                     <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                     <span class="svg-icon svg-icon-3">
                                         <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                             <path
                                                 d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                 fill="currentColor" />
                                         </svg>
                                     </span>
                                     <!--end::Svg Icon-->
                                 </span>
                             </div>
                             <!--end::Billing toggle-->
                             <!--begin::Billing form-->
                             <div id="adm_modal_create_job_billing_info" class="collapse " wire:ignore.self>
                                 <!--begin::Input group-->
                                 <div class="row">
                                     <div class="col-lg-6">
                                         <div class="mb-7">
                                             <label for="customRange1" class="form-label">Select Price Tag</label>
                                             <input id="priceTag" class="form-control" type="text"
                                                 wire:model="amount" min="2000" max="400000000">
                                             <span class="text-muted fs-7"
                                                 id="priceTagLabel">NGN-{{ formatMoney($amount) }}</span>
                                             @error('amount')
                                                 <span class="text-danger bg-light-danger my-1">{{ $message }}</span>
                                             @enderror
                                         </div>
                                     </div>
                                     <div class="col-lg-6">
                                         <div class="d-flex flex-column mb-7 fv-row">
                                             <label class="fs-6 fw-semibold mb-2">Highlist this Post (extra
                                                 NGN{{ $highlighting_price }})</label>
                                             <label
                                                 class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6 active"
                                                 data-kt-button="true">
                                                 <!--begin::Radio-->
                                                 <span
                                                     class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                     <input class="form-check-input" type="checkbox" id="highlited"
                                                         wire:model="highlighted">
                                                     @error('highlighted')
                                                         <span
                                                             class="text-danger bg-light-danger my-1">{{ $message }}</span>
                                                     @enderror
                                                 </span>
                                                 <!--end::Radio-->
                                                 <!--begin::Info-->
                                                 <span class="ms-5">
                                                     <span class="fs-6 fw-bold text-gray-800 d-block">Highlight Job
                                                         Listing (+NGN{{ $highlighting_price }})</span>
                                                 </span>
                                                 <!--end::Info-->
                                             </label>
                                             <span class="text-danger error-text highlighted_error"></span>
                                         </div>
                                     </div>
                                 </div>
                                 <!--end::Input group-->



                                 {{-- {{$selected_category}} --}}
                             </div>
                             <!--end::Billing form-->
                         </div>
                         <!--end::Scroll-->
                         @error('*')
                             <span class="text-danger bg-light-danger px-2 py-1">An error occured, open all dropdowns to
                                 see where a mistake was made</span>
                         @enderror
                     </div>
                     <!--end::Modal body-->
                     <!--begin::Modal footer-->
                     <div class="modal-footer flex-center">
                         <!--begin::Button-->
                         <button type="reset" id="adm_modal_create_job_cancel"
                             class="btn btn-light me-3">Discard</button>
                         <!--end::Button-->
                         <!--begin::Button-->
                         <x-button loading="storeListing">Submit (NGN{{ formatMoney($amount) }})</x-button>
                         <!--end::Button-->
                     </div>
                     <!--end::Modal footer-->
                 </form>
                 <!--end::Form-->
             </div>
         </div>
     </div>
 </div>

 @push('script')
     <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"
         integrity="sha512-CryKbMe7sjSCDPl18jtJI5DR5jtkUWxPXWaLCst6QjH8wxDexfRJic2WRmRXmstr2Y8SxDDWuBO6CQC6IE4KTA=="
         crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script>
         var myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
             url: "{{ route('listing.file_upload') }}", // Set the url for your upload script location
             paramName: "file", // The name that will be used to transfer the file
             maxFiles: 10,
             maxFilesize: 50, // MB
             addRemoveLinks: true,
             dictResponseError: 'Error uploading file!',
             sending: function(file, xhr, formData) {
                 formData.append("_token", "{{ csrf_token() }}");
             },
             accept: function(file, done) {
                 if (file.name == "wow.jpg") {
                     done("Naha, you don't.");
                 } else {
                     done();
                 }
             },
             init: function() {
                 this.on("success", function(file, response) {
                     console.log(response);
                     @this.addFileLink(response.files); // Use a Livewire method to store the link
                 });
             }
         });


         let categories = @js($category);
         var social_input = document.querySelector("#category_tagify_social");
         var category_input = document.querySelector("#category_tagify_listing");
         //tagify
         // The DOM elements you wish to replace with Tagify
         new Tagify(category_input, {
             whitelist: categories.category_name,
             maxTags: 4,
             enforceWhitelist: true,
             originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(','),
             dropdown: {
                 maxItems: 20, // <- mixumum allowed rendered suggestions
                 classname: "tagify__inline__suggestions", // <- custom classname for this dropdown, so it could be targeted
                 enabled: 0, // <- show suggestions on focus
                 closeOnSelect: false // <- do not hide the suggestions dropdown once an item has been selected
             }
         }).on('invalid', onInvalidTag)


         $("#category_tagify_listing").on('change', () => {
             let data = category_input.value;
             console.log(category_input.value);
             @this.set('selected_category', data);

         });
         //tagify
         // The DOM elements you wish to replace with Tagify
         new Tagify(social_input, {
             whitelist: ['facebook', 'linked_in', 'twitter', 'tiktok', 'instagram'],
             maxTags: 4,
             enforceWhitelist: true,
             originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(','),
             dropdown: {
                 maxItems: 20, // <- mixumum allowed rendered suggestions
                 classname: "tagify__inline__suggestions", // <- custom classname for this dropdown, so it could be targeted
                 enabled: 0, // <- show suggestions on focus
                 closeOnSelect: false // <- do not hide the suggestions dropdown once an item has been selected
             }
         }).on('invalid', onInvalidTag)


         $("#category_tagify_social").on('change', () => {
             let data = social_input.value;
             console.log(social_input.value);
             @this.set('required_social', data);

         });

         function onInvalidTag(e) {

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
         // Get the current date
         var today = new Date();

         // Get the date 60 days from now
         var maxDate = new Date();
         maxDate.setDate(maxDate.getDate() + 60);

         // Define a custom function to disable dates

         //  $("#kt_datepicker_1").flatpickr({
         //      mode: "range",
         //      minDate: "today",
         //      dateFormat: "d-m-Y",
         //      //  disable: function disableDates(date) {
         //      // Return true if the date is older than today or above 60 days from now
         //      //  return (date < today || date > maxDate);
         //      //  },
         //      onChange: function(dates) {
         //          // Check if two dates are selected
         //          if (dates.length == 2) {
         //              // Get the start and end dates
         //              var start = dates[0];
         //              var end = dates[1];

         //              // Use moment.js to calculate the difference in days
         //              var diff = moment(end).diff(moment(start), "days");

         //              // Use moment.js to format the dates
         //              var startFormatted = moment(start).format("DD MMM YYYY");
         //              var endFormatted = moment(end).format("DD MMM YYYY");

         //              // Display the result using alert
         //              alert("You have selected a date range from " + startFormatted + " to " + endFormatted +
         //                  ", which is " + diff + " days.");
         //          }
         //      }
         //  });
     </script>
 @endpush
 {{-- End Main Content --}}
