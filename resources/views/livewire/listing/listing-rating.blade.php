<div>
    @if (!is_null($listing_ratings) && $listing_ratings->count() > 0)
    <div class="row g-4">
        <div class="col-lg-6">
            <!--begin::Card-->
            <div class="card mb-5 mb-xl-8">
                <!--begin::Card body-->
                <div class="card-body">
                    <!--begin::Summary-->
                    <!--begin::User Info-->
                    <div class="d-flex flex-center flex-column py-5">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-100px symbol-circle mb-7" data-bs-toggle="tooltip" title="{{$applicant->name}}">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                {{-- {{dd($this->user->profile_photo_url)}} --}}
                                            <img  src="{{ $applicant->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    @else
                                    
                                            <span class="symbol-label bg-warning text-inverse-warning fw-bold">{{strtoupper(substr($applicant->name, 0, 1))}}</span>
                                    @endif
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Name-->
                        <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3">{{ucwords($applicant->name)}}</a>
                        <!--end::Name-->
                        <!--begin::Position-->
                        <div class="mb-9">
                            <!--begin::Badge-->
                            <div class="badge badge-lg badge-light-primary d-inline">{{ucwords($applicant->role)}}</div>
                            <!--begin::Badge-->
                        </div>
                        <!--end::Position-->
                        <!--begin::Info-->
                        <!--begin::Info heading-->
                        <div class="fw-bold mb-3">Brand Rated User:
                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="Number of support tickets assigned, closed and pending this week." data-kt-initialized="1"></i></div>
                        <!--end::Info heading-->
                        <div class="rating">
                            @for ($i = 1; $i < 6; $i++)
                                @if ($i <= $listing_ratings->applicant_rating)
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star fs-1"></i>
                                </div>
                                @else
                                <div class="rating-label me-2">
                                    <i class="bi bi-star fs-1"></i>
                                </div>
                                @endif
                            @endfor
                            
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::User Info-->
                    <!--end::Summary-->
                    <!--begin::Details toggle-->
                    <div class="d-flex flex-stack fs-4 py-3">
                        <div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details" role="button" aria-expanded="false" aria-controls="kt_user_view_details">Details 
                        <span class="ms-2 rotate-180">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span></div>
                    </div>
                    <!--end::Details toggle-->
                    <div class="separator"></div>
                    <!--begin::Details content-->
                    <div id="kt_user_view_details" class="collapse show">
                        <div class="pb-5 fs-6">
                            <!--begin::Details item-->
                            {{-- <div class="fw-bold mt-5">Account ID</div>
                            <div class="text-gray-600">ID-45453423</div> --}}
                            <!--begin::Details item-->
                            <!--begin::Details item-->
                            <div class="fw-bold mt-5">Email</div>
                            <div class="text-gray-600">
                                <a href="#" class="text-gray-600 text-hover-primary">{{$applicant->email}}</a>
                            </div>
                            <!--begin::Details item-->
                            <!--begin::Details item-->
                            <div class="fw-bold mt-5">Bio</div>
                            <div class="text-gray-600">{!! $applicant->advertiserInfos->bio!!}</div>
                            <!--begin::Details item-->
                            <!--begin::Details item-->
                            <div class="fw-bold mt-5">Portfolio</div>
                            <div class="text-gray-600"><a class="fs-6 text-primary" href="{{$applicant->advertiserInfos->portfolio_url}}">Link to Portfolio</a></div>
                            <!--begin::Details item-->
                            <!--begin::Details item-->
                            <div class="fw-bold mt-5">Last Seen</div>
                            <div class="text-gray-600">{{get_last_seen($applicant->id)}}</div>
                            <!--begin::Details item-->
                        </div>
                    </div>
                    <!--end::Details content-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
           
        </div>

         <!--begin::Connected Accounts-->
    <div class="col-lg-6">
         <div class="card mb-5 mb-xl-8">
            <!--begin::Card header-->
            <div class="card-header border-0">
                <div class="card-title">
                    <h3 class="fw-bold m-0">Brand Rating</h3>
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-2">
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
                            <div class="fs-6 text-gray-700">Please note that ratings are subjective and based on individual experiences. They may not reflect the opinions of everyone. We encourage you to consider multiple factors and make an informed decision. Remember that ratings are personal opinions and may not represent the actual quality or performance of a product/service. Use them as a reference, but always conduct your own research and assessment.
                            <a href="#" class="me-1">privacy policy</a>and 
                            <a href="#">terms of use</a>.</div>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Notice-->
              
                <div class="d-flex align-items-center position-relative mb-7">
                    <!--begin::Label-->
                    <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                    <!--end::Label-->
                    <!--begin::Details-->
                    <div class="fw-semibold ms-5">
                        <a href="#" class="fs-5 fw-bold text-dark text-hover-primary">Experience Rating</a>
                        <!--begin::Info-->
                        <div class="fs-7 text-muted">{{$brand->name}} for -<a href="#">{{$brand->brandInfos->brand_name}}</a></div>
                        <div class="rating">
                            @for ($i = 1; $i < 6; $i++)
                                @if ($i <= $listing_ratings->experience_rating)
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star fs-1"></i>
                                </div>
                                @else
                                <div class="rating-label me-2">
                                    <i class="bi bi-star fs-1"></i>
                                </div>
                                @endif
                            @endfor
                            
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Details-->
                    <!--begin::Menu-->
                    <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                        <span class="svg-icon svg-icon-3">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="currentColor"></path>
                                <path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </button>
                   
                    <!--end::Menu-->
                </div>

                <div class="d-flex align-items-center position-relative mb-7">
                    <!--begin::Label-->
                    <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                    <!--end::Label-->
                    <!--begin::Details-->
                    <div class="fw-semibold ms-5">
                        <a href="#" class="fs-5 fw-bold text-dark text-hover-primary">Comment</a>
                        <!--begin::Info-->
                        <div class="fs-7 text-muted">{{$brand->name}} for -<a href="#">{{$brand->brandInfos->brand_name}}</a></div>
                       <div class="text-muted">
                        {{$listing_ratings->comments}}
                       </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Details-->
                </div>
            </div>
            <!--end::Card body-->
            <!--begin::Card footer-->
            {{-- <div class="card-footer border-0 d-flex justify-content-center pt-0">
                <button class="btn btn-sm btn-light-primary">Save Changes</button>
            </div> --}}
            <!--end::Card footer-->
        </div>
    </div>
</div>

        <!--end::Connected Accounts-->
    @else
    <div class="card">
        <!--begin::Card body-->
        <div class="card-body p-0">
            <!--begin::Wrapper-->
            <div class="card-px text-center py-20 my-10">
                <!--begin::Title-->
                <h2 class="fs-2x fw-bold mb-10">Rate Listing</h2>
                <!--end::Title-->
                <!--begin::Description-->
                <p class="text-gray-400 fs-4 fw-semibold mb-10">There are no customers added yet.
                <br>Kickstart your CRM by adding a your first customer</p>
                <!--end::Description-->
                <!--begin::Action-->
                <a href="#" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#kt_modal_scrollable_2" >Rate Experience</a>
                <!--end::Action-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Illustration-->
            <div class="text-center px-4">
                <img class="mw-100 mh-300px" alt="" src="{{asset('users/assets/media/illustrations/sketchy-1/2.png')}}">
            </div>
            <!--end::Illustration-->
        </div>
        <!--end::Card body-->
    </div>
    @endif
   

    
    <div class="modal fade" tabindex="-1" id="kt_modal_scrollable_2" wire:ignore.self>
        <form wire:sumbit.prevent="submitRating">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Rate Your Experience</h5>
    
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>
    
                <div class="modal-body">


                    <div class="mb-10 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="required form-label">Experience</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <div class="rating">
                            <!--begin::Reset rating-->
                            <label class="btn btn-light fw-bold btn-sm rating-label me-3" for="kt_rating_input_zero">
                                Reset
                            </label>
                            <input class="rating-input" name="exp_rating" value="0" checked type="radio" id="kt_rating_input_zero"/>
                            <!--end::Reset rating-->
                            @for ($i = 1; $i < 6; $i++)
                                
                            <!--begin::Star 1-->
                            <label class="rating-label mx-1" for="kt_rating_input_{{$i}}">
                                <i class="bi bi-star fs-1"></i>
                            </label>
                            <input class="rating-input" wire:model="experience_rating" name="exp_rating" value="{{$i}}" type="radio" id="kt_rating_input_{{$i}}"/>
                            <!--end::Star 1-->
                            @endfor
                        
                        
                      
                        </div>
                        <!--end::Input-->
                        <!--begin::Description-->
                        <div class="text-muted fs-7">Leave a comment about your experience so far</div>
                        <!--end::Description-->
                    @error('experience_rating')
                    <div class="fv-plugins-message-container invalid-feedback">{{$message}}</div>
                    @enderror</div>

                    
                    <div class="mb-10 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="required form-label">Rate Applicant ({{$this->applicant->name}})</label>
                        <!--end::Label-->
                        <div class="rating">
                            <!--begin::Reset rating-->
                            <label class="btn btn-light fw-bold btn-sm rating-label me-3" for="kt_rating_applicant_zero">
                                Reset
                            </label>
                            <input class="rating-input"  wire:model="applicant_rating" name="rating" value="0" checked type="radio" id="kt_rating_applicant_zero"/>
                            <!--end::Reset rating-->
                            @for ($i = 1; $i < 6; $i++)
                                
                            <!--begin::Star 1-->
                            <label class="rating-label mx-1" for="kt_rating_applicant_{{$i}}">
                                <i class="bi bi-star fs-1"></i>
                            </label>
                            <input class="rating-input" wire:model="applicant_rating" name="rating" value="{{$i}}" type="radio" id="kt_rating_applicant_{{$i}}"/>
                            <!--end::Star 1-->
                            @endfor
                        </div>
                        <!--begin::Description-->
                        <div class="text-muted fs-7">Leave a comment about your experience so far</div>
                        <!--end::Description-->
                        @error('applicant_rating')
                        <div class="fv-plugins-message-container invalid-feedback">{{$message}}</div>
                        @enderror</div>
                    <div class="mb-10 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="required form-label">Comment</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <textarea class="form-control" wire:model="comment" cols="30" rows="10" placeholder="Enter comment..."></textarea>
                        <!--end::Input-->
                        <!--begin::Description-->
                        <div class="text-muted fs-7">Leave a comment about your experience so far</div>
                        <!--end::Description-->
                        @error('comment')
                        <div class="fv-plugins-message-container invalid-feedback">{{$message}}</div>
                        @enderror</div>
                </div>
    
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button wire:click.prevent="submitRating"  class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>
@push('script')
    <script>
        window.addEventListener('rate_modal:close', (e)=>{
            $('#kt_modal_scrollable_2').modal('hide');
            // Emit an event to the Livewire component
            Livewire.emit('refresh');
        })
    </script>
@endpush
