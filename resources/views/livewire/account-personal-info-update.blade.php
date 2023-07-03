<div>
   @livewire('account-banner')



   <div class="card mb-5 mb-xl-10">
      <!--begin::Card header-->
      <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
         <!--begin::Card title-->
         <div class="card-title m-0">
            <h3 class="fw-bold m-0">Profile Details</h3>
         </div>
         <!--end::Card title-->
      </div>
      <!--begin::Card header-->
      <!--begin::Content-->
      <div id="kt_account_settings_profile_details" class="collapse show">
         <!--begin::Form-->
         <form class="form fv-plugins-bootstrap5 fv-plugins-framework" wire:submit.prevent="personal_info_update">
            <!--begin::Card body-->
            <div class="card-body border-top p-9">
               <!--begin::Input group-->
               <div class="row mb-6">
                  <!--begin::Label-->
                  <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
                  <!--end::Label-->
                  <!--begin::Col-->
                  <div class="col-lg-8">
                     <!--begin::Row-->
                     <div class="row">
                        <!--begin::Col-->
                        <div class="col fv-row fv-plugins-icon-container">
                           <input type="text" wire:model="full_name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="First name" >
                        @error('full_name') <div class="fv-plugins-message-container invalid-feedback">{{$message}}</div> @enderror
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
                  <label class="col-lg-4 col-form-label required fw-semibold fs-6">Username</label>
                  <!--end::Label-->
                  <!--begin::Col-->
                  <div class="col-lg-8 fv-row fv-plugins-icon-container">
                     <input type="text"  wire:model="username" class="form-control form-control-lg form-control-solid" placeholder="username" >
                     @error('username') <div class="fv-plugins-message-container invalid-feedback">{{$message}}</div> @enderror
                  <div class="text-muted">NB: no space or special character is allowed!</div>
               </div>
                  <!--end::Col-->
               </div>
               <!--end::Input group-->
               <!--begin::Input group-->
               <div class="row mb-6">
                  <!--begin::Label-->
                  <label class="col-lg-4 col-form-label fw-semibold fs-6">
                     <span class="required">Email Address</span>
                     <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Phone number must be active" data-kt-initialized="1"></i>
                  </label>
                  <!--end::Label-->
                  <!--begin::Col-->
                  <div class="col-lg-8 fv-row fv-plugins-icon-container">
                     <input type="email"  wire:model="email" class="form-control form-control-lg form-control-solid" placeholder="Enter Email address" >
                     @error('email') <div class="fv-plugins-message-container invalid-feedback">{{$message}}</div> @enderror
                  <div class="text-muted">You might need to re-verify your account if changed!</div>
                 @if (is_null($user->email_verified_at))
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
                                 <div class="fs-6 text-gray-700">Your email address is unverified. Action Required: Please Verify Email to Access Full Features. Check Inbox Now!
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



   {{-- Begin connected accounts --}}

   <div class="card mb-5 mb-xl-10">
      <!--begin::Card header-->
      <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_connected_accounts" aria-expanded="true" aria-controls="kt_account_connected_accounts">
         <div class="card-title m-0">
            <h3 class="fw-bold m-0">Connected Accounts</h3>
         </div>
      </div>
      <!--end::Card header-->
      <!--begin::Content-->
      <div id="kt_account_settings_connected_accounts" class="collapse show">
         <!--begin::Card body-->
         <div class="card-body border-top p-9">
            <!--begin::Notice-->
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
                     <div class="fs-6 text-gray-700">Two-factor authentication adds an extra layer of security to your account. To log in, in you'll need to provide a 4 digit amazing code. 
                     <a href="#" class="fw-bold">Learn More</a></div>
                  </div>
                  <!--end::Content-->
               </div>
               <!--end::Wrapper-->
            </div>
            <!--end::Notice-->
            <!--begin::Items-->
            <div class="py-2" wire:poll>
               <!--begin::Item-->
               <div class="d-flex flex-stack" >
                   <div class="d-flex">
                       <img src="{{asset('users/assets/media/svg/brand-logos/google-icon.svg')}}" class="w-30px me-6" alt="">
                       <div class="d-flex flex-column">
                           <a href="{{route('google.redirect')}}" target="_blank" class="fs-5 text-dark text-hover-primary fw-bold">Google</a>
                           <div class="fs-6 fw-semibold text-gray-400">Plan properly your workflow</div>
                       </div>
                   </div>
                   <div class="d-flex justify-content-end">
                       @if ($user->social_google_id != null)
                       <button  disabled class="btn btn-outline btn-outline-dashed btn-outline-success btn-active-light-info">
                           Connected!
                       </button>
                       @else
                       <button  onclick="google_redirect()" class="btn btn-outline btn-outline-dashed btn-outline-info btn-active-light-info">
                           Connect
                       </button>
                        @endif
                       
                   </div>
               </div>
               <!--end::Item-->
               <div class="separator separator-dashed my-5"></div>
               <!--begin::Item-->
               <div class="d-flex flex-stack">
                   <div class="d-flex">
                       <img src="{{asset('users/assets/media/svg/brand-logos/github.svg')}}" class="w-30px me-6" alt="">
                       <div class="d-flex flex-column">
                           <a href="{{route('github.redirect')}}" target="_blank" class="fs-5 text-dark text-hover-primary fw-bold">Github</a>
                           <div class="fs-6 fw-semibold text-gray-400">Keep eye on on your Repositories</div>
                       </div>
                   </div>
                   <div class="d-flex justify-content-end">
                       @if ($user->social_github_id != null)
                       <button  disabled class="btn btn-outline btn-outline-dashed btn-outline-success btn-active-light-info">
                           Connected!
                       </button>
                       @else
                       <button  onclick="github_redirect()" class="btn btn-outline btn-outline-dashed btn-outline-info btn-active-light-info">Connect</button>
                        @endif

                   </div>
               </div>
               <!--end::Item-->
               <div class="separator separator-dashed my-5"></div>
               <!--begin::Item-->
               <div class="d-flex flex-stack">
                   <div class="d-flex">
                       <img src="{{asset('users/assets/media/svg/brand-logos/instagram-2-1.svg')}}" class="w-30px me-6" alt="">
                       <div class="d-flex flex-column">
                           <a href="#" class="fs-5 text-dark text-hover-primary fw-bold">Instagram</a>
                           <div class="fs-6 fw-semibold text-gray-400">Share Ideas</div>
                       </div>
                   </div>
                   <div class="d-flex justify-content-end">
                       
                       <a href="#" class="btn btn-outline btn-outline-dashed btn-outline-info btn-active-light-info">Connect</a>

                   </div>
               </div>
               <!--end::Item-->
               <div class="separator separator-dashed my-5"></div>
               <!--begin::Item-->
               <div class="d-flex flex-stack">
                   <div class="d-flex">
                       <img src="{{asset('users/assets/media/svg/brand-logos/facebook-4.svg')}}" class="w-30px me-6" alt="">
                       <div class="d-flex flex-column">
                           <a href="#" class="fs-5 text-dark text-hover-primary fw-bold">Facebook</a>
                           <div class="fs-6 fw-semibold text-gray-400">Connect with Friends and Clients</div>
                       </div>
                   </div>
                   <div class="d-flex justify-content-end">
                       <a href="#" class="btn btn-outline btn-outline-dashed btn-outline-info btn-active-light-info">Connect</a>

                   </div>
               </div>
               <!--end::Item-->
               <div class="separator separator-dashed my-5"></div>
               <!--begin::Item-->
               <div class="d-flex flex-stack">
                   <div class="d-flex">
                       <img src="{{asset('users/assets/media/svg/brand-logos/twitter.svg')}}" class="w-30px me-6" alt="">
                       <div class="d-flex flex-column">
                           <a href="#" class="fs-5 text-dark text-hover-primary fw-bold">Twitter</a>
                           <div class="fs-6 fw-semibold text-gray-400">Integrate Projects Discussions</div>
                       </div>
                   </div>
                   <div class="d-flex justify-content-end">
                       <a href="#" class="btn btn-outline btn-outline-dashed btn-outline-info btn-active-light-info">Connect</a>

                   </div>
               </div>
               <!--end::Item-->
               <!--end::Item-->
               <div class="separator separator-dashed my-5"></div>
               <!--begin::Item-->
               <div class="d-flex flex-stack">
                   <div class="d-flex">
                       <img src="{{asset('users/assets/media/svg/brand-logos/linkedin-1.svg')}}" class="w-30px me-6" alt="">
                       <div class="d-flex flex-column">
                           <a href="{{route('linkedin.redirect')}}" target="_blank" class="fs-5 text-dark text-hover-primary fw-bold">LinkedIn</a>
                           <div class="fs-6 fw-semibold text-gray-400">Lets Talk business</div>
                       </div>
                   </div>
                   <div class="d-flex justify-content-end">
                       @if ($user->social_linkedin_id != null)
                       <button  disabled class="btn btn-outline btn-outline-dashed btn-outline-success btn-active-light-info">
                           Connected!
                       </button>
                       @else
                       <button  onclick="linkedin_redirect()" class="btn btn-outline btn-outline-dashed btn-outline-info btn-active-light-info">Connect</button>
                        @endif

                   </div>
               </div>
               <!--end::Item-->
           </div>
           <!--end::Items-->
         </div>
         <!--end::Card body-->
         <!--begin::Card footer-->
         <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button class="btn btn-light btn-active-light-primary me-2">Discard</button>
            <button class="btn btn-primary">Save Changes</button>
         </div>
         <!--end::Card footer-->
      </div>
      <!--end::Content-->
   </div>




   {{-- Specifically for creators  --}}
   @if ($user->role == 'creator')
       @livewire('account-personal-info-creator')
   @endif
</div>
@push('script')
    <script>
      
	// socials 
	function google_redirect() {
	 
	 // open the page as popup //
	 var page = @js(route('google.redirect'));
	 var myWindow = window.open(page, "_blank", "scrollbars=yes,width=400,height=500,top=300");
	 
	 // focus on the popup //
	 myWindow.focus();
	 
	 // if you want to close it after some time (like for example open the popup print the receipt and close it) //
	//  myWindow.close();
	//  setTimeout(function() {
	//    myWindow.close();
	//  }, 1000);
	
   }
function github_redirect() {
	 
	 // open the page as popup //
	 var page = @js(route('github.redirect'));
	 var myWindow = window.open(page, "_blank", "scrollbars=yes,width=400,height=500,top=300");
	 
	 // focus on the popup //
	 myWindow.focus();
	 
	 // if you want to close it after some time (like for example open the popup print the receipt and close it) //
	
	
   }
function linkedin_redirect() {
	 
	 // open the page as popup //
	 var page = @js(route('linkedin.redirect'));
	 var myWindow = window.open(page, "_blank", "scrollbars=yes,width=400,height=500,top=300");
	 
	 // focus on the popup //
	 myWindow.focus();
	 
   
	
   }


    </script>
@endpush