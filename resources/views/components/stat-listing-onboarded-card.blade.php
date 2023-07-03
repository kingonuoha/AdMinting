    <!--begin::Col-->
    <div class="col-xl-4">
        <!--begin::Mixed Widget 9-->
        <div class="card card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body d-flex flex-column pb-10 pb-lg-15">
                <div class="flex-grow-1">
                    <!--begin::Info-->
                    <div class="d-flex align-items-center pe-2 mb-5">
                        <span class="text-muted fw-bold fs-5 flex-grow-1">{{time_Ago($onboardedListing->onboarded_on)}}</span>
                        <div class="symbol symbol-50px">
                            <span class="symbol-label bg-light">
                                <img src="{{asset('storage/company_logo/'.$onboardedListing->logo)}}" class="h-50 align-self-center" alt="">
                            </span>
                        </div>
                    </div>
                    <!--end::Info-->
                    <!--begin::Link-->
                    <a href="#" class="text-dark fw-bold text-hover-primary fs-4">{{$onboardedListing->title}}</a>
                    <!--end::Link-->
                    <!--begin::Desc-->
                    <p class="py-3">{!!substr($onboardedListing->content, 0, 130)!!}...</p>
                    <!--end::Desc-->
                </div>
                <!--begin::Team-->
                <div class="d-flex align-items-center">
                    <div class="symbol symbol-35px me-2" data-bs-toggle="tooltip" title="{{$onboardedListing->applicant->name}}">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        {{-- {{dd($this->user->profile_photo_url)}} --}}
                                    <img  src="{{ $onboardedListing->applicant->profile_photo_url }}" alt="{{ $onboardedListing->applicant->profile_photo_url  }}" />
                            @else
                               
                                    <span class="symbol-label bg-warning text-inverse-warning fw-bold">{{strtoupper(substr($onboardedListing->applicant->name, 0, 1))}}</span>
                            @endif
                        </div>
                   
                </div>
                <!--end::Team-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Mixed Widget 9-->
    </div>
    <!--end::Col-->