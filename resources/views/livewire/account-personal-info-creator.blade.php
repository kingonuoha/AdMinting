<div>
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
           <!--begin::Card title-->
           <div class="card-title m-0">
              <h3 class="fw-bold m-0">Proffession Details</h3>
           </div>
           <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Content-->
        <div id="kt_account_settings_profile_details" class="collapse show">
           <!--begin::Form-->
           <form class="form fv-plugins-bootstrap5 fv-plugins-framework" wire:submit.prevent="personal_info_creator_update">
              <!--begin::Card body-->
              <div class="card-body border-top p-9">
                 <!--begin::Input group-->
                <div class="row mb-8">
                    <label for="" class="col-lg-4 col-form-label fw-semibold fs-6">Locality</label>
                   <div class="col-lg-8">
                    <div class="row ">
                        <div class="col-lg-6 mb-10">
                            <label  class="required form-label">Date of Birth <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="This is been used by us to celebrate you on your special day!"></i></h2></label>
                            <input  wire:model="dob" class="form-control" placeholder="Pick a date" id="kt_datepicker_1"/>
                            @error('dob') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                       <div class="col-lg-6 mb-10">
                           <label  class="required form-label">Name</label>
                           <select class="form-select" wire:model="userState">
                               <option value="">CHOOSE STATE</option>
                               @foreach (DB::table('states')->get() as $ustate)
                               <option value="{{$ustate->state}}" {{$userState == $ustate->state? "selected" : ''}}>{{$ustate->state}}</option>
                                   
                               @endforeach
                           </select>
                           {{-- {{$userState}} --}}
                           @error('userState') <span class="text-danger">{{ $message }}</span> @enderror
                       </div>
                        <div class="col-lg-6 mb-10">
                            <label  class="required form-label">Religion <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="This is been used by us to celebrate you on your special day!"></i></h2></label>
                                            <select  class="form-select" wire:model="religion">
                                                <option value="">Choose Religion</option>
                                                @foreach (\App\Models\AdvertiserInfo::$religion as $religion)
                                                <option value="{{$religion}}" {{$Ireligion == $religion ? "selected" :''}}>{{$religion}}</option>
                                                    
                                                @endforeach
                                            </select>
                                            @error('religion') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                       
                   </div>
                   </div>
                </div>

                 <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Bio</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                       <!--begin::Row-->
                       <div class="row">
                          <!--begin::Col-->
                          <div class="col fv-row fv-plugins-icon-container">
                             <textarea type="text" wire:model="bio" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Bio" > </textarea>
                          @error('bio') <div class="fv-plugins-message-container invalid-feedback">{{$message}}</div> @enderror
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
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Select Your Category</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                        <div wire:ignore>
                            <input  class="form-control form-control-solid" wire:model.lazy="selected_category" id="category_tagify" placeholder="Choose Your Category"/>
                        </div>
                        <div class="fv-plugins-message-container invalid-feedback">@error('selected_category')
                            {{$message}}
                        @enderror</div>
                        <div class="text-muted">NB. new Job Listings notification will be sent to you based on your selected Category</div>
                 </div>
                    <!--end::Col-->
                 </div>
                 <!--end::Input group-->
                 <!--begin::Input group-->
                 <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                       <span class="required">Phone_number</span>
                       <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Phone number must be active" data-kt-initialized="1"></i>
                    </label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                       <input type="tel"  wire:model="phone_number" class="mb-5 form-control form-control-lg form-control-solid" placeholder="Enter Phone Number" >
                       @error('phone_number') <div class="fv-plugins-message-container invalid-feedback">{{$message}}</div> @enderror
                      <div class="row d-flex justify-content-end">
                        <button type="button" class="btn btn-primary w-100px" wire:click="addNumber">Add</button>
                      </div>
                   @if (!is_null($user->advertiserInfos->phone_number))
                          <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                             <!--begin::Icon-->
                             <!--begin::Svg Icon | path: icons/duotune/art/art006.svg-->
                             <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                   <path opacity="0.3" d="M22 19V17C22 16.4 21.6 16 21 16H8V3C8 2.4 7.6 2 7 2H5C4.4 2 4 2.4 4 3V19C4 19.6 4.4 20 5 20H21C21.6 20 22 19.6 22 19Z" fill="currentColor"></path>
                                   <path d="M20 5V21C20 21.6 19.6 22 19 22H17C16.4 22 16 21.6 16 21V8H8V4H19C19.6 4 20 4.4 20 5ZM3 8H4V4H3C2.4 4 2 4.4 2 5V7C2 7.6 2.4 8 3 8Z" fill="currentColor"></path>
                                </svg>
                             </span>
                             <!--end::Svg Icon-->
                             <!--end::Icon-->
                             <!--begin::Wrapper-->
                             <div class="d-flex flex-stack flex-grow-1">
                                <!--begin::Content-->
                                <div class="fw-semibold">
                                   <div class="fs-6 text-gray-700">
                                    <ul>
                                    @foreach ($user->advertiserInfos->phone_number as $item)
                                        <li class="text-warning fw-bold">{{$item['number']}}</li>
                                    @endforeach
                                </ul>
                                   </div>
                                </div>
                                <!--end::Content-->
                             </div>
                             <!--end::Wrapper-->
                          </div>
                   @endif
                 </div>
                    <!--end::Col-->
                 </div>
                 <!--end::Input group-->
                 <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Portfolio Link</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                       <!--begin::Row-->
                       <div class="row">
                          <!--begin::Col-->
                          <div class="col fv-row fv-plugins-icon-container">
                             <textarea type="text" wire:model="portfolio" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Enter portfolio link" > </textarea>
                          @error('portfolio') <div class="fv-plugins-message-container invalid-feedback">{{$message}}</div> @enderror
                          </div>
                          <!--end::Col-->
                       </div>
                       <!--end::Row-->
                    </div>
                    <!--end::Col-->
                 </div>
              </div>
              <!--end::Card body-->
              <!--begin::Actions-->
              <div class="card-footer d-flex justify-content-end py-6 px-9">
                 <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                 <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
              </div>
              <!--end::Actions-->
           <input type="hidden"><div></div></form>
           <!--end::Form-->
        </div>
        <!--end::Content-->
     </div>
</div>

@push('script')
    <script>

$("#kt_datepicker_1").flatpickr({
				dateFormat: "d-m-Y",
				disable: [
					{
						from: "today",
						to: new Date().fp_incr(10000000) // 10000000 days from now
					}
				]
			});

            
         //    $(document).ready(()=>{
            let categories = @js($category);
        var category_input = document.querySelector("#category_tagify");
		//tagify
		// The DOM elements you wish to replace with Tagify
		new Tagify(category_input, {
			whitelist: categories.category_name,
			maxTags: 4,
            enforceWhitelist: true,
            originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(','),
			dropdown: {
				maxItems: 20,           // <- mixumum allowed rendered suggestions
				classname: "tagify__inline__suggestions", // <- custom classname for this dropdown, so it could be targeted
				enabled: 0,             // <- show suggestions on focus
				closeOnSelect: false    // <- do not hide the suggestions dropdown once an item has been selected
			}
		}).on('invalid', onInvalidTag)


		$(category_input).on('change', ()=>{
            let data = category_input.value;
			console.log(category_input.value);
            @this.set('selected_category', data);

		});

        
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
@endpush