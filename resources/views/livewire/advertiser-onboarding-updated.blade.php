<div >
    <div class="d-flex flex-column flex-lg-row flex-column-fluid stepper stepper-pills stepper-column stepper-multistep" id="kt_advertiser_onboarding">
        <!--begin::Aside-->
        <div  wire:ignore class="d-flex flex-column flex-lg-row-auto w-lg-350px w-xl-500px">
            <div class="d-flex flex-column position-lg-fixed top-0 bottom-0 w-lg-350px w-xl-500px scroll-y bgi-size-cover bgi-position-center" style="background-image: url({{asset('users/assets/media/misc/auth-bg.png')}})">
                <!--begin::Header-->
                <div class="d-flex flex-center py-10 py-lg-20 mt-lg-20">
                    <!--begin::Logo-->
                    <a href="index.html">
                        <img alt="Logo" src="{{asset('users/assets/media/logos/custom-1.png')}}" class="h-70px" />
                    </a>
                    <!--end::Logo-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="d-flex flex-row-fluid justify-content-center p-10">
                    <!--begin::Nav-->
                    <div class="stepper-nav">
                        <!--begin::Step 1-->
                        <div class="stepper-item current" data-kt-stepper-element="nav">
                            <!--begin::Wrapper-->
                            <div class="stepper-wrapper">
                                <!--begin::Icon-->
                                <div class="stepper-icon rounded-3">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">1</span>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title fs-2">Personal Info</h3>
                                    <div class="stepper-desc fw-normal">Tell us a little more about yourself</div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Line-->
                            <div class="stepper-line h-40px"></div>
                            <!--end::Line-->
                        </div>
                        <!--end::Step 1-->
                        <!--begin::Step 2-->
                        <div class="stepper-item" data-kt-stepper-element="nav">
                            <!--begin::Wrapper-->
                            <div class="stepper-wrapper">
                                <!--begin::Icon-->
                                <div class="stepper-icon rounded-3">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">2</span>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title fs-2">Professional Info</h3>
                                    <div class="stepper-desc fw-normal">Set up informations about your profession</div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Line-->
                            <div class="stepper-line h-40px"></div>
                            <!--end::Line-->
                        </div>
                        <!--end::Step 2-->
                        <!--begin::Step 3-->
                        <div class="stepper-item" data-kt-stepper-element="nav">
                            <!--begin::Wrapper-->
                            <div class="stepper-wrapper">
                                <!--begin::Icon-->
                                <div class="stepper-icon">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">3</span>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title fs-2">Linked Accounts</h3>
                                    <div class="stepper-desc fw-normal">link up your social Accounts</div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Line-->
                            <div class="stepper-line h-40px"></div>
                            <!--end::Line-->
                        </div>
                        <!--end::Step 3-->
                        <!--begin::Step 4-->
                        <div class="stepper-item" data-kt-stepper-element="nav">
                            <!--begin::Wrapper-->
                            <div class="stepper-wrapper">
                                <!--begin::Icon-->
                                <div class="stepper-icon">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">4</span>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title">Completed</h3>
                                    <div class="stepper-desc fw-normal">Your account is created</div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Step 4-->
                    </div>
                    <!--end::Nav-->
                </div>
                <!--end::Body-->
                <!--begin::Footer-->
                <div class="d-flex flex-center flex-wrap px-5 py-10">
                    <!--begin::Links-->
                    <div class="d-flex fw-normal">
                        <a href="https://keenthemes.com/" class="text-success px-5" target="_blank">Terms</a>
                        <a href="https://devs.keenthemes.com/" class="text-success px-5" target="_blank">Plans</a>
                        <a href="https://1.envato.market/EA4JP" class="text-success px-5" target="_blank">Contact Us</a>
                    </div>
                    <!--end::Links-->
                </div>
                <!--end::Footer-->
            </div>
        </div>
        <!--begin::Aside-->
        <!--begin::Body-->
        <div class="d-flex flex-column flex-lg-row-fluid py-10">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid">
                <!--begin::Wrapper-->
                <div  class="w-lg-650px w-xl-700px p-10 p-lg-15 mx-auto">
                    <!--begin::Form-->
                    {{-- <form class="my-auto pb-5" novalidate="novalidate" id="kt_create_account_form" data-kt-redirect-url="account/overview.html"> --}}
                        <!--begin::Step 1-->
                        <div  wire:ignore.self class="current" data-kt-stepper-element="content">
                            <!--begin::Wrapper-->
                            <div class="w-100">
                                <h1>We need a little more informaton about you</h1>
                                
                                <div class="border-gray-300 border-bottom border-bottom-dashed mb-8"></div>
                                
                                <!--begin::Heading-->
                                <div class="pb-10 pb-lg-15">
                                    <!--begin::Title-->
                                    <h2 class="fw-bold d-flex align-items-center text-dark">Personal Info 
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="This section is important as your prospective client gets to see it to make certain descisions"></i></h2>
                                    <!--end::Title-->
                                    <!--begin::Notice-->
                                    <div class="text-muted fw-semibold fs-6">If you need more info, please check out 
                                    <a href="#" class="link-primary fw-bold">Help Page</a>.</div>
                                    <!--end::Notice-->
                                </div>
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <form wire:submit.prevent="stepOne">
                                    <div class="fv-row">
                                        <!--begin::Row-->
                                        <div class="row ">
                                            <div class="col-lg-6 mb-10">
                                                <label  class="required form-label">Name</label>
                                                <input  wire:model="name" type="text" class="form-control" placeholder="Example input"/>
                                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="col-lg-6 mb-10">
                                                <label  class="required form-label">Date of Birth <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="This is been used by us to celebrate you on your special day!"></i></h2></label>
                                                <input  wire:model="dob" class="form-control" placeholder="Pick a date" id="kt_datepicker_1"/>
                                                @error('dob') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <!--end::Row-->
    
                                        <!--begin::Row-->
                                        <div class="row ">
                                           <div class="col-lg-6">
                                            <div class="mb-5">
                                                <label  class="form-label">State of Residence<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="this is a space where you can really describe yourself, your personality, work done and experience!"></i></h2></label>
                                                <select class="form-select" wire:model="userState">
                                                    <option value="">CHOOSE STATE</option>
                                                    @foreach ($states as $state)
                                                    <option value="{{$state->id}}">{{$state->state}}</option>
                                                        
                                                    @endforeach
                                                </select>
                                                {{-- {{$userState}} --}}
                                                @error('userState') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                           </div>
                                           <div class="col-lg-6">
                                           
                                           <div class="mb-5">
                                            <label  class="form-label">LGA <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="this is a space where you can really describe yourself, your personality, work done and experience!"></i></h2></label>
                                            <select  class="form-select" wire:model="religion">
                                                <option value="">Choose Religion</option>
                                                @foreach (\App\Models\AdvertiserInfo::$religion as $religion)
                                                <option value="{{$religion}}">{{$religion}}</option>
                                                    
                                                @endforeach
                                            </select>
                                            @error('religion') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                           </div>
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Row-->
                                        <div class="row ">
                                            <div class="mb-5">
                                                <label  class="form-label">Bio <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="this is a space where you can really describe yourself, your personality, work done and experience!"></i></h2></label>
                                                <textarea wire:model="bio" rows="6" class="form-control" placeholder="Enter Bio...">{{$bio}}</textarea>
                                                @error('bio') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <!--end::Row-->
                                    </div>

                                    <div class="d-flex flex-stack pt-15">
                                        <div class="mr-2">
                                           
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="submit">
                                                <span class="indicator-label">Submit 
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg')}}-->
                                                <span class="svg-icon svg-icon-4 ms-2">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                                                        <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon--></span>
                                                <span class="indicator-progress">Please wait... 
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                            <button type="submit" class="btn btn-lg btn-primary" >Continue 
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg')}}-->
                                            <span class="svg-icon svg-icon-4 ms-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                                                    <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon--></button>
                                        </div>
                                    </div>
                                </form>
                                <!--end::Input group-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Step 1-->
                        <!--begin::Step 2-->
                        <div wire:ignore.self class="" data-kt-stepper-element="content" >
                            <!--begin::Wrapper-->
                            <form wire:submit.prevent="stepTwo">

                            <div class="w-100">
                                <!--begin::Heading-->
                                <div class="pb-10 pb-lg-15">
                                    <!--begin::Title-->
                                    <h2 class="fw-bold text-dark">Professional Info</h2>
                                    <!--end::Title-->
                                    <!--begin::Notice-->
                                    <div class="text-muted fw-semibold fs-6">If you need more info, please check out 
                                    <a href="#" class="link-primary fw-bold">Help Page</a>.</div>
                                    <!--end::Notice-->
                                </div>
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center form-label mb-3">Specify current Educationa status 
                                    </label>
                                    <!--end::Label-->
                                    {{now()}}
                                    <div class="row">
                                        <!--begin::Col-->
                                        <div class="col-lg-6">
                                            <!--begin::Option-->
                                            <input type="radio" class="btn-check" wire:model="educational_status" value="uGraduate" {{$educational_status == 'uGraduate'? 'checked' : ''}} id="kt_create_account_form_account_type_personal">
                                            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center mb-10" for="kt_create_account_form_account_type_personal">
                                                <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                                                <span class="svg-icon svg-icon-3x me-5">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor"></path>
                                                        <path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <!--begin::Info-->
                                                <span class="d-block fw-semibold text-start">
                                                    <span class="text-dark fw-bold d-block fs-4 mb-2">Under-Graduate</span>
                                                    <span class="text-muted fw-semibold fs-6">Select this option if you are an undergraduate</span>
                                                </span>
                                                <!--end::Info-->
                                            </label>
                                            <!--end::Option-->
                                        
                                    </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-6">
                                            <!--begin::Option-->
                                            <input type="radio" class="btn-check" wire:model="educational_status" {{$educational_status == 'graduate'? 'checked' : ''}}  value="graduate" id="kt_create_account_form_account_type_corporate">
                                            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center" for="kt_create_account_form_account_type_corporate">
                                                <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                                                <span class="svg-icon svg-icon-3x me-5">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="currentColor"></path>
                                                        <path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <!--begin::Info-->
                                                <span class="d-block fw-semibold text-start">
                                                    <span class="text-dark fw-bold d-block fs-4 mb-2">Graduate</span>
                                                    <span class="text-muted fw-semibold fs-6">Select this option if you are a Graduate</span>
                                                </span>
                                                <!--end::Info-->
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Col-->
                                        <div class="fv-plugins-message-container invalid-feedback mt-n6">@error('educational_status')
                                            {{$message}}
                                        @enderror</div>
                                    </div>
                                    <!--begin::Hint-->
                                    <div class="form-text">Customers will see this shortened version of your Educational status</div>
                                    <!--end::Hint-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10 fv-row">
                                   <div class="text-center">
                                    <button type="button" class="btn btn-sm btn-dark fw-bold" wire:click="openEducationModal">
                                        Add Education
                                    </button>
                                    
                                    <div class="fv-plugins-message-container invalid-feedback">@error('institution_collection')
                                        {{$message}}
                                    @enderror</div>
                                   </div>
                                   

                                    <hr>
                                    
                                    @isset($user['advertiser_infos'])
                                    {{-- Avoinding the error that come when education is null --}}
                                    @if ($user['advertiser_infos']['education'] == null)
                                        
                                    @php
                                        $user['advertiser_infos']['education'] = [];
                                    @endphp
                                    @endif
                                    @forelse ($user['advertiser_infos']['education'] as $item)
                                        
                                    <div class="card card-flush shadow-sm mb-5" >
                                        <div class="card-header">
                                            <h3 class="card-title">{{$item['degree'].' in '.$item['course']}}</h3>
                                            <div class="card-toolbar">
                                                
                                                
                                                <button wire:click="delInstitution('{{$item['id']}}')" class="btn btn-sm btn-danger">
                                                    Del
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body py-5">
                                        <div class="d-flex flex-stack">
                                            <div class="d-flex">
                                                <img src="{{asset('images/universities/'.\App\Models\NigerianUniversities::find($item['institution'])->acronym.'.jpg')}}" class="w-50px h-50px rounded-circle shadow object-fit-cover border border-primary border-active me-6" alt="">
                                                <div class="d-flex flex-column">
                                                    <a href="#" class="fs-5 text-dark text-hover-primary fw-bold">{{ \App\Models\NigerianUniversities::find($item['institution'])->name }}</a>
                                                    <div class="fs-6 fw-semibold text-gray-400">{{\App\Models\NigerianUniversities::find($item['institution'])->type.", ".\App\Models\NigerianUniversities::find($item['institution'])->ownership, }}</div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                {{$item['courseYear']}}
                                            </div>


                                        </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="card card-flush h-md-100">
                                        <!--begin::Body-->
                                        <div class="card-body d-flex flex-column justify-content-between mt-2 bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0" style="background-position: 100% 50%; background-image:url('assets/media/stock/900x600/42.png')">
                                            <!--begin::Wrapper-->
                                            <div class="mb-1">
                                                <!--begin::Title-->
                                                <div class="fs-2hx fw-bold text-gray-800 text-center mb-13">
                                                <span class="me-2">No Educational History Added,
                                                <br>
                                                <span class="position-relative d-inline-block text-danger">
                                                    <a href="#" class="text-danger opacity-75-hover">Add</a>
                                                    <!--begin::Separator-->
                                                    <span class="position-absolute opacity-15 bottom-0 start-0 border-4 border-danger border-bottom w-100"></span>
                                                    <!--end::Separator-->
                                                </span></span> one Now!</div>
                                                <div class="text-center">
                                                    <button type="button" class="btn btn-sm btn-dark fw-bold" wire:click="openEducationModal">
                                                        Add Education
                                                    </button>
                                                </div>
                                                <!--end::Title-->
                                              
                                            </div>
                                            <!--begin::Wrapper-->
                                            <!--begin::Illustration-->
                                            <img class="mx-auto h-150px h-lg-200px theme-light-show" src="{{asset('users/assets/media/illustrations/misc/upgrade.svg')}}" alt="">
                                            <img class="mx-auto h-150px h-lg-200px theme-dark-show" src="{{asset('users/assets/media/illustrations/misc/upgrade-dark.svg')}}" alt="">
                                            <!--end::Illustration-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    @endforelse
                                    @endisset
                                    
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-5 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center form-label mb-5">Select Category
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Gigs and Jobs will be shown to you based on the category selected"></i></label>
                                    <!--end::Label-->
                                    <!--begin::Options-->
                                    {{-- {{ $selected_category}} --}}
                                    <div wire:ignore>
                                        <input  class="form-control form-control-solid" wire:model="selected_category" id="category_tagify"/>
                                    </div>
                                    <div class="fv-plugins-message-container invalid-feedback">@error('selected_category')
                                        {{$message}}
                                    @enderror</div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-5 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center form-label mb-5">Portfolio Link</label>
                                    <!--end::Label-->
                                    <input wire:model="portfolio_url" type="url" placeholder="Enter Portfolio link" class="form-control">
                                    <div class="fv-plugins-message-container invalid-feedback">@error('portfolio_url')
                                        {{$message}}
                                    @enderror</div>
                                </div>
                                <!--end::Input group-->

                                <div class="d-flex flex-stack pt-15">
                                    <div class="mr-2">
                                        <button type="button" class="btn btn-lg btn-light-primary me-3" onclick="stepperGoPrevious()">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg')}}-->
                                        <span class="svg-icon svg-icon-4 me-1">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="currentColor" />
                                                <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->Previous</button>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="submit">
                                            <span class="indicator-label">Submit 
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg')}}-->
                                            <span class="svg-icon svg-icon-4 ms-2">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                                                    <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon--></span>
                                            <span class="indicator-progress">Please wait... 
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <button type="submit" class="btn btn-lg btn-primary" >Continue 
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg')}}-->
                                        <span class="svg-icon svg-icon-4 ms-1">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                                                <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon--></button>
                                    </div>
                                </div>
                            </div>
                            <!--end::Wrapper-->
                        </form>
                            
                        </div>
                        <!--end::Step 2-->
                        <!--begin::Step 3-->
                        <div class="" data-kt-stepper-element="content" wire:ignore.self>
                            <!--begin::Wrapper-->
                            <div class="w-100">
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
                                            <div class="py-2" >
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
                                                        @if ($user['social_google_id'] != null)
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
                                                        @if ($user['social_github_id'] != null)
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
                                                        @if ($user['social_linkedin_id'] != null)
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
                                        
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <div class="d-flex flex-stack pt-15">
                                    <div class="mr-2">
                                        <button type="button" class="btn btn-lg btn-light-primary me-3" onclick="stepperGoPrevious()">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg')}}-->
                                        <span class="svg-icon svg-icon-4 me-1">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="currentColor" />
                                                <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->Previous</button>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="submit">
                                            <span class="indicator-label">Submit 
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg')}}-->
                                            <span class="svg-icon svg-icon-4 ms-2">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                                                    <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon--></span>
                                            <span class="indicator-progress">Please wait... 
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <button type="button" class="btn btn-lg btn-primary" wire:click="stepThree" >Continue 
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg')}}-->
                                        <span class="svg-icon svg-icon-4 ms-1">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                                                <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon--></button>
                                    </div>
                                </div>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Step 3-->
                        <!--begin::Step 4-->
                        <div class="" data-kt-stepper-element="content">
                            <!--begin::Wrapper-->
                            <div class="w-100">
                                <div class="card mb-5 mb-xl-10">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_connected_accounts" aria-expanded="true" aria-controls="kt_account_connected_accounts">
                                        <div class="card-title m-0">
                                            <h3 class="fw-bold m-0">Extra Security</h3>
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
                                            <div class="py-2">
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack">
                                                    <div class="d-flex">
                                                        {{-- <img src="{{asset('users/assets/media/svg/brand-logos/google-icon.svg')}}" class="w-30px me-6" alt=""> --}}
                                                        <div class="d-flex flex-column">
                                                            <a href="#" class="fs-5 text-dark text-hover-primary fw-bold">Email</a>
                                                            <div class="fs-6 fw-semibold text-gray-400">Get News letter and instant Updatesw</div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-end">
                                                        @if (auth()->user()->email_verified_at == null)
                                                        <a href="#" class="btn btn-outline btn-outline-dashed btn-outline-info btn-active-light-info">Connect</a>
                                                        @else
                                                        <a href="#" class="btn btn-outline btn-outline-dashed btn-outline-success btn-active-light-info">Verified</a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!--end::Item-->
                                                <div class="separator separator-dashed my-5"></div>
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack">
                                                    <div class="d-flex">
                                                        {{-- <img src="{{asset('users/assets/media/svg/brand-logos/github.svg')}}" class="w-30px me-6" alt=""> --}}
                                                        <div class="d-flex flex-column">
                                                            <a href="#" class="fs-5 text-dark text-hover-primary fw-bold">Phone Number</a>
                                                            <div class="fs-6 fw-semibold text-gray-400">Lets Keep in touch</div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-end flex-column">
                                                        <a href="#" class="mb-1 btn btn-outline btn-outline-dashed btn-outline-info btn-active-light-info">Add new</a>
                                                        <p class="text-success text-md fs-bold">080 345 676 3332</p>
                                                        <p class="text-success text-md fs-bold">080 345 676 3332</p>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <!--end::Items-->
                                        </div>
                                        <!--end::Card body-->
                                        
                                    </div>
                                    <!--end::Content-->
                                </div>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Step 4-->
                        <!--begin::Step 5-->
                        <div class="" data-kt-stepper-element="content">
                            <!--begin::Wrapper-->
                            <div class="w-100">
                                <!--begin::Heading-->
                                <div class="pb-8 pb-lg-10">
                                    <!--begin::Title-->
                                    <h2 class="fw-bold text-dark">Your Are Done!</h2>
                                    <!--end::Title-->
                                    <!--begin::Notice-->
                                    <div class="text-muted fw-semibold fs-6">If you need more info, please 
                                    <a href="../sign-in/basic.html" class="link-primary fw-bold">Sign In</a>.</div>
                                    <!--end::Notice-->
                                </div>
                                <!--end::Heading-->
                                <!--begin::Body-->
                                <div class="mb-0">
                                    <!--begin::Text-->
                                    <div class="fs-6 text-gray-600 mb-5">Writing headlines for blog posts is as much an art as it is a science and probably warrants its own post, but for all advise is with what works for your great & amazing audience.</div>
                                    <!--end::Text-->
                                    <!--begin::Alert-->
                                    <!--begin::Notice-->
                                    <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                                        <!--begin::Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg')}}-->
                                        <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                                <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor" />
                                                <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <!--end::Icon-->
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-stack flex-grow-1">
                                            <!--begin::Content-->
                                            <div class="fw-semibold">
                                                <h4 class="text-gray-900 fw-bold">We need your attention!</h4>
                                                <div class="fs-6 text-gray-700">To start using great tools, please, please 
                                                <a href="#" class="fw-bold">Create Team Platform</a></div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Notice-->
                                    <!--end::Alert-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Step 5-->
                        <!--begin::Actions-->
                        {{-- <div class="d-flex flex-stack pt-15">
                            <div class="mr-2">
                                <button type="button" class="btn btn-lg btn-light-primary me-3" onclick="stepperGoPrevious()">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg')}}-->
                                <span class="svg-icon svg-icon-4 me-1">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="currentColor" />
                                        <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->Previous</button>
                            </div>
                            <div>
                                <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="submit">
                                    <span class="indicator-label">Submit 
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg')}}-->
                                    <span class="svg-icon svg-icon-4 ms-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                                            <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon--></span>
                                    <span class="indicator-progress">Please wait... 
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Continue 
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg')}}-->
                                <span class="svg-icon svg-icon-4 ms-1">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                                        <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon--></button>
                            </div>
                        </div> --}}
                        <!--end::Actions-->
                    {{-- </form> --}}
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Body-->
       
        
        <div wire:ignore.self class="modal fade" tabindex="-1" id="kt_modal_1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Modal title</h3>
        
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </div>
                        <!--end::Close-->
                    </div>
        
                    <form wire:submit.prevent="saveInstitution" id="institutionForm">
                    <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col-12 mb-3">
                                    <!--begin::Label-->
                                    <label class="form-label mb-3">Choose Institution</label>
                                    <!--end::Label-->
                                    <!--begin::Input--> 
                                  
                                    <div >
                                        <select  wire:model="institution" id="university-select" class="form-select form-select-sm form-select-solid mb-3" placeholder="Select an option">
                                            <option>Choose Institution</option>
                                            @forelse ($universities as $item)
                                                
                                            <option value="{{$item->id}}">{{$item->name}}, [{{$item->acronym}}]</option>
                                            @empty
                                                
                                            <option ><div class="text-danger">None Found</div></option>
                                            @endforelse
                                        </select>
                                    </div>
                                    <span class="text-danger">@error('institution') {{$message}} @enderror</span>
                                    <!--end::Input-->
                                </div>
                                <div class="col-4 mb-3">
                                    <select class="form-control" wire:model="degree">
                                        <option selected disabled>==ENTER TITLE==</option>
                                        <option class="QKJ+Vaf" value="associate">
                                        <span class="nyEVF9g"></span>Associate</option>
                                        <option class="QKJ+Vaf" value="B.A."><span class="nyEVF9g"></span>B.A.</option>
                                        <option class="QKJ+Vaf" value="B.Sc."><span class="nyEVF9g"></span>B.Sc.</option>
                                        <option class="QKJ+Vaf" value="M.A."><span class="nyEVF9g"></span>M.A.</option>
                                        <option class="QKJ+Vaf" value="M.B.A."><span class="nyEVF9g"></span>M.B.A.</option>
                                        <option class="QKJ+Vaf" value="M.Sc."><span class="nyEVF9g"></span>M.Sc.</option>
                                        <option class="QKJ+Vaf" value="J.D."><span class="nyEVF9g"></span>J.D.</option>
                                        <option class="QKJ+Vaf" value="M.D."><span class="nyEVF9g"></span>M.D.</option>
                                        <option class="QKJ+Vaf" value="Ph.D"><span class="nyEVF9g"></span>Ph.D</option>
                                        <option class="QKJ+Vaf" value="BArch"><span class="nyEVF9g"></span>BArch</option>
                                        <option class="QKJ+Vaf" value="BM"><span class="nyEVF9g"></span>BM</option>
                                        <option class="QKJ+Vaf" value="BFA"><span class="nyEVF9g"></span>BFA</option>
                                        <option class="QKJ+Vaf" value="MFA"><span class="nyEVF9g"></span>MFA</option>
                                        <option class="QKJ+Vaf" value="certificate">
                                        <span class="nyEVF9g"></span>Certificate</option>
                                        <option class="QKJ+Vaf" value="LLB"><span class="nyEVF9g"></span>LLB</option>
                                        <option class="QKJ+Vaf" value="LLM"><span class="nyEVF9g"></span>LLM</option>
                                        <option class="QKJ+Vaf" value="Other"><span class="nyEVF9g"></span>Other</option></select>
                                        <span class="text-danger">@error('degree') {{$message}} @enderror</span>
                                </div>
                                <div class="col-8 mb-3">
                                    <input wire:model="course" type="text" name="" placeholder="Enter Course Studied" class="form-control">
                                    <span class="text-danger">@error('course') {{$message}} @enderror</span>
                                </div>
                
                                <div class="col-7 d-flex mb-3">
                                    <input wire:model="courseYear" class="form-control" placeholder="Pick a date" id="kt_datepicker_2"/>
                                    <span class="text-danger">@error('courseYear') {{$message}} @enderror</span>
                                   
                                    
                                </div>
                                
                            </div>
                            @if (session()->has('success'))
                                <span class="text-success">{{session('success')}}</span>
                            @endif
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit"   class="ml-3 hover-rotate-end btn btn-active-success  ">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@push('select2Script')
    <script>
        // submiting instittution form
        $('#submitInstitution').click(()=>{
            $("form#institutionForm").submit();
        })
        $('#university-select').select2();
            $('#university-select').on('change', function (e) {
                var data = $('#university-select').select2("val");
                @this.set('institution', data);
                // alert('hi');
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
    //    })

    
    </script>
@endpush
   
</div>
