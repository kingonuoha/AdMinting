<div>
    <div class="text-center mb-13">
        <!--begin::Title-->
        <h1 class="mb-3">Applied Users ({{ $hasApplied->count() }})</h1>
        <!--end::Title-->
        <!--begin::Description-->
        <div class="text-muted fw-semibold fs-5">Only users that have met our requirements will be displayed below </div>
        {{-- <a href="#" class="link-primary fw-bold">Users Directory</a>. --}}
        <!--end::Description-->
    </div>
    <!--end::Heading-->
    <!--begin::Users-->
    <div class="mb-15">
        <!--begin::List-->
        <div class="mh-375px scroll-y me-n7 pe-7">
            <!--begin::User-->
            <!--end::User-->
            <!--begin::User-->

            @forelse ($hasApplied as $applicant)
                {{-- {{dd($applicant);}} --}}
                @if (!is_null($applicant->advertiserInfos))
                    <div class="border border-hover-primary p-7 rounded mb-7">
                        <!--begin::Info-->
                        <div class="d-flex flex-stack pb-3">
                            <!--begin::Info-->
                            <div class="d-flex">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-35px symbol-circle">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        {{-- {{dd($this->user->profile_photo_url)}} --}}
                                        <img src="{{ $applicant->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    @else
                                        <span
                                            class="symbol-label bg-light-danger text-danger fw-semibold">{{ strtoupper(substr($applicant->name, 0, 1)) }}</span>
                                    @endif
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-5">
                                    <!--begin::Name-->
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('user.public_profile', "@".$applicant->username) }}"
                                            class="text-dark fw-bold text-hover-primary fs-5 me-4">{{ ucwords($applicant->name) }}</a>
                                        <!--begin::Label-->
                                        <span
                                            class="badge badge-light-success d-flex align-items-center fs-8 fw-semibold">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
                                            <span class="svg-icon svg-icon-8 svg-icon-success me-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->{{ ucwords($applicant->getRoleNames()->first()) }}</span>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Name-->
                                    <!--begin::Desc-->
                                    <span
                                        class="text-muted fw-semibold mb-3">{{ getListingStats($applicant->id) }}</span>
                                    <!--end::Desc-->
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::Info-->
                            <!--begin::Stats-->
                            <div clas="d-flex">
                                <!--begin::Price-->
                                <div class="text-end pb-3">
                                    <span
                                        class="text-dark fw-bold fs-5">NGN{{ $applicant->advertiserInfos->max_price == 0 ? 'Ꝏ' : $applicant->advertiserInfos->max_price }}</span>
                                    <span class="text-muted fs-7">/Net Worth</span>
                                </div>
                                <!--end::Price-->
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Info-->
                        <!--begin::Wrapper-->

                        <div class="p-0">
                            <!--begin::Section-->
                            <div class="d-flex flex-column">
                                <!--begin::Text-->
                                <p class="text-gray-700 fw-semibold fs-6 mb-4">
                                    {{ substr($applicant->advertiserInfos->bio, 0, 160) }}...</p>
                                <!--end::Text-->
                                <!--begin::Tags-->
                                <div class="d-flex text-gray-700 fw-semibold fs-7">
                                    @foreach (explode(',', $applicant->advertiserInfos->category) as $item)
                                        <!--begin::Tag-->
                                        <span class="border border-2 rounded me-3 p-1 px-2">{{ $item }}</span>
                                    @endforeach

                                </div>
                                <!--end::Tags-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Footer-->
                            <div class="d-flex flex-column">
                                <!--begin::Separator-->
                                <div class="separator separator-dashed border-muted my-5"></div>
                                <!--end::Separator-->
                                <!--begin::Action-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Progress-->
                                    <div class="d-flex flex-column mw-200px">
                                        <div class="d-flex align-items-center mb-2">
                                            <span class="text-gray-700 fs-6 fw-semibold me-2">90%</span>
                                            <span class="text-muted fs-8">Job Success</span>
                                        </div>
                                        <div class="progress h-6px w-200px">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 90%"
                                                aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <!--end::Progress-->
                                    <!--begin::Button-->
                                    @if ($listing->onboarded_by !== null)
                                        <x-button class="btn btn-sm btn-primary disabled" disabled>Already
                                            onboarded</x-button>
                                    @else
                                        <x-button type="button" class="btn btn-sm btn-primary"
                                            loading="selectUserForListing"
                                            wire:click="selectUserForListing({{ $applicant->id }}, {{ $listing->id }})">select</x-button>

                                        <!--end::Button-->
                                    @endif

                                </div>
                                <!--end::Action-->
                            </div>
                            <!--end::Footer-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                @endif

                {{-- <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                <!--begin::Details-->
                <div class="d-flex align-items-center">
                    <!--begin::Avatar-->
                    
                    <!--end::Avatar-->
                    <!--begin::Details-->
                    <div class="ms-6">
                        <!--begin::Name-->
                        <a href="#" class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">{{ucwords($applicant->name)}}
                        <span class="badge badge-light fs-8 fw-semibold ms-2">5 Star Rating</span></a>
                        <!--end::Name-->
                        <!--begin::Email-->
                        <div class="fw-semibold text-muted">{{$applicant->email}}</div>
                        <!--end::Email-->
                    </div>
                    <!--end::Details-->
                </div>
                <!--end::Details-->
                <!--begin::Stats-->
                <div class="d-flex">
                    <!--begin::Sales-->
                    <div class="text-end">
                        <div class="fs-5 fw-bold text-dark">70%</div>
                        <div class="fs-7 text-muted">postitve Rating</div>
                    </div>
                    <!--end::Sales-->
                </div>
                <!--end::Stats-->
            </div>
                 --}}
            @empty
                <div class="card-px text-center py-20 my-10">
                    <!--begin::Title-->
                    <h1 class="mb-3">Applied Users ({{ $hasApplied->count() }})</h1>
                    <!--end::Title-->
                    <!--begin::Description-->

                    <p class="text-gray-400 fs-4 fw-semibold mb-10">There are currently no Applications yet.</p>
                    <!--begin::Action-->
                    <a href="{{ route('dashboard') }}" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#adm_modal_create_job">Back to Dashboard</a>
                    <div class="text-center px-4">
                        <img class="mw-100 mh-300px" alt=""
                            src="{{ asset('users/assets/media/illustrations/sketchy-1/2.png') }}">
                    </div>
            @endforelse
            <!--end::User-->

        </div>
        <!--end::List-->
    </div>
    {{-- @push('script')
        <script>
         
        </script>
    @endpush --}}
</div>
