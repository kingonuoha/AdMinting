<div>
    <div class="card">
        <!--begin::Body-->
        <div class="card-body p-lg-17">
            <!--begin::Hero-->
            <div class="position-relative mb-17">
                <!--begin::Overlay-->
                <div class="overlay overlay-show">
                    <!--begin::Image-->
                    <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-250px"
                        style="background-image:url('{{ asset(is_null($user->brandInfos->banner_path) ? 'storage/brand_banner/' . 'default-1.jpg' : 'storage/' . $user->brandInfos->banner_path) }}')">
                    </div>
                    <!--end::Image-->
                    <!--begin::layer-->
                    <div class="overlay-layer rounded bg-black" style="opacity: 0.4"></div>
                    <!--end::layer-->
                </div>
                <!--end::Overlay-->
                <!--begin::Heading-->
                <div class="position-absolute text-white mb-8 ms-10 bottom-0">
                    <div class="symbol symbol-50px mb-1">
                        <img src="{{ asset('storage/' . $listing->user->brandInfos->logo_path) }}"
                            style="object-fit:contain" alt="{{ $user->brandInfos->brand_name }} Logo">
                    </div>

                    <div>
                        <!--begin::Title-->
                        <h3 class="text-white fs-2qx fw-bold mb-3 m">{{ ucwords($user->brandInfos->brand_name) }}</h3>
                        <!--end::Title-->
                        <!--begin::Text-->
                        <div class="fs-5 fw-semibold">{{ ucwords($user->brandInfos->short_desc) }}</div>
                        <!--end::Text-->
                    </div>
                </div>
                <!--end::Heading-->
            </div>
            <!--end::-->
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-lg-row mb-17">
                <!--begin::Content-->
                <div class="flex-lg-row-fluid me-0 me-lg-20">
                    <!--begin::Job-->
                    <div class="mb-17">
                        <!--begin::Description-->
                        <div class="m-0">
                            <!--begin::Title-->
                            <h4 class="fs-1 text-gray-800 w-bolder mb-6">{{ $listing->title }} (<span class="text-primary">{{$listing->useCase->name}}</span>)</h4> <span
                                class="text-info bg-light-info px-3 py-2 mx-2"> <span
                                    class="svg-icon-info svg-icon svg-icon-2x">{!! getIcon('rocket') !!}</span>
                                {{ $listing->no_of_days }} Delivery Days</span>
                            @foreach ($listing->categories as $category)
                                <a href="{{ route('listing.index', ['category' => $category->category_slug]) }}"
                                    class=" {{ $category->category_slug == request()->get('category') ? 'bg-primary text-white' : 'link-primary' }} mt-2 text xs font-md px-2 py-1 mx-1 border border-gray-500 border-dotted mb-5">{{ strtoupper($category->category_name) }}</a>
                            @endforeach
                            <!--end::Title-->
                            <!--begin::Text-->
                            <div class="bg-light py-5 px-5 rounded-lg my-6">
                                <span class="fs-4 text-dark-50 fw-bold mb-4">Description</span>
                                {!! $listing->content !!}
                            </div>
                            <!--end::Text-->
                        </div>
                        <!--end::Description-->
                        <!--begin::Accordion-->
                        <!--begin::Section-->
                        <div class="m-0">
                            <!--begin::Heading-->
                            <div class="d-flex align-items-center collapsible py-3 toggle mb-0"
                                data-bs-toggle="collapse" data-bs-target="#kt_job_1_1">
                                <!--begin::Icon-->
                                <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg')}}-->
                                    <span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                rx="5" fill="currentColor"></rect>
                                            <rect x="6.0104" y="10.9247" width="12" height="2" rx="1"
                                                fill="currentColor"></rect>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg')}}-->
                                    <span class="svg-icon toggle-off svg-icon-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                rx="5" fill="currentColor"></rect>
                                            <rect x="10.8891" y="17.8033" width="12" height="2" rx="1"
                                                transform="rotate(-90 10.8891 17.8033)" fill="currentColor"></rect>
                                            <rect x="6.01041" y="10.9247" width="12" height="2" rx="1"
                                                fill="currentColor"></rect>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Icon-->
                                <!--begin::Title-->
                                <h4 class="text-gray-700 fw-bold cursor-pointer mb-0">Required Socials</h4>
                                <!--end::Title-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Body-->
                            <div id="kt_job_1_1" class="collapse show fs-6 ms-1 ml-7">
                                <!--begin::Item-->
                                @if (!is_null($listing->required_social))
                                    @forelse ($listing->required_social as $social)
                                        <div class="mb-4">
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center ps-10 mb-n1">
                                                <!--begin::Bullet-->
                                                <span class="bullet me-3"></span>
                                                <!--end::Bullet-->
                                                <!--begin::Label-->
                                                <div class="text-gray-600 fw-semibold fs-6">{{ $social }}</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                    @empty
                                        <span class="text-warning">No required socials for now </span>
                                    @endforelse
                                @else
                                    <div
                                        class="notice d-flex bg-light-info rounded border-info border border-dashed p-6">
                                        <!--begin::Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                                        <span class="svg-icon svg-icon-2tx svg-icon-info me-4">
                                            {!! getIcon('rocket') !!}
                                        </span>
                                        <!--end::Svg Icon-->
                                        <!--end::Icon-->
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                            <!--begin::Content-->
                                            <div class="mb-3 mb-md-0 fw-semibold">
                                                <h4 class="text-gray-900 fw-bold">No Required social platform</h4>
                                                <div class="fs-6 text-gray-700 pe-7">Opps, Looks like there were no
                                                    Required social platform specified during listing creation</div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                @endif


                                <!--end::Item-->
                            </div>
                            <!--end::Content-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed"></div>
                            <!--end::Separator-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Section-->
                        <div class="m-0">
                            <!--begin::Heading-->
                            <div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0"
                                data-bs-toggle="collapse" data-bs-target="#kt_job_1_4">
                                <!--begin::Icon-->
                                <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg')}}-->
                                    <span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                rx="5" fill="currentColor"></rect>
                                            <rect x="6.0104" y="10.9247" width="12" height="2" rx="1"
                                                fill="currentColor"></rect>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg')}}-->
                                    <span class="svg-icon toggle-off svg-icon-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                rx="5" fill="currentColor"></rect>
                                            <rect x="10.8891" y="17.8033" width="12" height="2"
                                                rx="1" transform="rotate(-90 10.8891 17.8033)"
                                                fill="currentColor"></rect>
                                            <rect x="6.01041" y="10.9247" width="12" height="2"
                                                rx="1" fill="currentColor"></rect>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Icon-->
                                <!--begin::Title-->
                                <h4 class="text-gray-700 fw-bold cursor-pointer mb-0">Application Terms</h4>
                                <!--end::Title-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Body-->
                            <div id="kt_job_1_4" class="collapse fs-6 ms-1 ml-7">
                                <!--begin::Item-->
                                <div class="mb-4">
                                    @if ($listing->terms_of_service !== null)
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center ps-10 mb-n1">
                                            <!--begin::Bullet-->
                                            <span class="bullet me-3"></span>
                                            <!--end::Bullet-->
                                            <!--begin::Label-->
                                            <div class="text-gray-600 fw-semibold fs-6">
                                                {{ $listing->terms_of_service }}</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Item-->
                                    @else
                                        <div
                                            class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                                            <!--begin::Icon-->
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                                            <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                                                {!! getIcon('warning') !!}
                                            </span>
                                            <!--end::Svg Icon-->
                                            <!--end::Icon-->
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                                <!--begin::Content-->
                                                <div class="mb-3 mb-md-0 fw-semibold">
                                                    <h4 class="text-gray-900 fw-bold">No Terms Of Service</h4>
                                                    <div class="fs-6 text-gray-700 pe-7">Opps, Looks like there were no
                                                        terms of service specified during listing creation, just make
                                                        sure you understand our own terms of service and you are good to
                                                        go, click "see Terms" to see our terms of service</div>
                                                </div>
                                                <!--end::Content-->
                                                <!--begin::Action-->
                                                <a href="{{ route('guest.privacy_policy') }}" target="_blank"
                                                    class="btn btn-warning px-6 align-self-center text-nowrap">See
                                                    Terms</a>
                                                <!--end::Action-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                    @endif
                                </div>

                                <!--end::Item-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Section-->
                        <!--end::Accordion-->
                        <!--begin::Apply-->
                        <div class="mt-5 form-check form-check-custom form-check-success form-check-solid">
                            <input wire:model="termsAndConditions" class="form-check-input" type="checkbox"
                                value="" id="tandc" />
                            <label class="ml-8 form-check-label" for="tandc">
                                I have read and agreed to the above Terms and Conditions
                            </label>
                        </div>
                        @error('termsAndConditions')
                            <span class="text-danger bg-light danger px-2 py-1 mt-2">{{ $message }}</span>
                        @enderror
                        <br>
                        {{-- <div class="mt-5">
                        <input type="checkbox" class="form-check" wire:model="termsAndConditions">
                        <div class="text-muted">I have read and agreed to the above Terms and Conditions</div>
                        @error('termsAndConditions')
                            <span class="text-danger bg-light danger px-2 py-1 mt-2">{{$message}}</span>
                        @enderror
                       </div> --}}
                        @if ($hasApplied)
                            <x-button class="btn btn-sm btn-success mt-5" disabled>Applied!</x-button>
                        @else
                            <x-button wire:click.prevent="applyJob" loading="applyJob"
                                class="btn btn-sm btn-primary mt-5">Apply Now</x-button>
                        @endif


                        {{-- <a href="{{route('listings.apply', $listing->slug)}}" class="btn btn-sm btn-primary mt-5">Apply Now</a> --}}
                        <!--end::Apply-->
                    </div>
                    <!--end::Job-->
                    <!--begin::Job-->

                    <!--end::Apply-->
                    <!--end::Job-->
                </div>
                <!--end::Content-->
                <!--begin::Sidebar-->
                <div class="flex-lg-row-auto w-100 w-lg-275px w-xxl-350px">
                    <!--begin::Careers about-->
                    <div class="card bg-light">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Top-->
                            <div class="mb-7">
                                <!--begin::Title-->
                                <h2 class="fs-1 text-gray-800 w-bolder mb-1">About Us</h2>
                                <div class="separator separator-dashed mb-5"></div>
                                <!--end::Title-->
                              <div class="d-flex justify-content-center align-items-center w-100">
                                <a href="#" class="symbol symbol-50 symbol-lg-120 mx-auto mb-4">
                                    <img src="{{ asset('storage/' . $listing->user->brandInfos->logo_path) }}"
                                        style="object-fit:contain" alt="{{ $user->brandInfos->brand_name }} Logo">
                                </a>
                              </div>

                                <!--begin::Text-->
                                <p class="fw-semibold fs-6 text-gray-600">
                                    {{ $user->brandInfos->description }}
                                </p>
                                <!--end::Text-->
                            </div>
                            <!--end::Top-->
                            <!--begin::Item-->
                            <div class="mb-8">
                                <!--begin::Title-->
                                <h4 class="text-gray-700 w-bolder mb-0">Location</h4>
                                <!--end::Title-->

                                <!--begin::Section-->
                                <div class="my-2 text-gray-600">
                                    {{ $listing->location }}
                                </div>
                                <!--end::Section-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="mb-8">
                                <!--begin::Title-->
                                <h4 class="text-gray-700 w-bolder mb-0">Phone Numbers</h4>
                                <!--end::Title-->

                                <!--begin::Section-->
                                <div class="my-2">
                                    @foreach ($user->brandInfos->phone_number as $number)
                                        <p class="text-gray-600">{{ $number }}</p>
                                    @endforeach
                                </div>
                                <!--end::Section-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="mb-8">
                                <!--begin::Title-->
                                <h4 class="text-gray-700 w-bolder mb-0">Email</h4>
                                <!--end::Title-->

                                <!--begin::Section-->
                                <div class="my-2">
                                    <p class="text-gray-600">{{ $user->brandInfos->brand_email }}</p>
                                </div>
                                <!--end::Section-->
                            </div>
                            <!--end::Item-->

                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Careers about-->
                </div>
                <!--end::Sidebar-->
            </div>
            <!--end::Layout-->
            <!--begin::Section-->
            <div class="mb-19">
                <!--begin::Top-->
                <div class="text-center mb-12">
                    <!--begin::Title-->
                    <h3 class="fs-2hx text-dark mb-5">Related Gigs</h3>
                    <!--end::Title-->
                    <!--begin::Text-->
                    <div class="fs-5 text-muted fw-semibold">Our goal is to provide a complete and robust theme
                        solution
                        <br>to boost all of our customer’s project deployments
                    </div>
                    <!--end::Text-->
                </div>
                <!--end::Top-->
                <!--begin::Row-->
                <div class="row g-10">
                    <!--begin::Col-->
                    @forelse (related_listing($listing->id, $listing->categories) as $listing)
                        <div class="col-md-4">
                            <!--begin::Publications post-->
                            <div class="card-xl-stretch me-md-6">
                                <!--begin::Overlay-->
                                <a class="d-block overlay mb-4" data-fslightbox="lightbox-hot-sales"
                                    href="{{ asset('storage/' . $listing->user->brandInfos->logo_path) }}">
                                    <!--begin::Image-->
                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                        style="background-image:url('{{ asset('storage/' . $listing->user->brandInfos->logo_path) }}')">
                                    </div>
                                    <!--end::Image-->
                                    <!--begin::Action-->
                                    <div class="overlay-layer bg-dark card-rounded bg-opacity-25">
                                        <i class="bi bi-eye-fill fs-2x text-white"></i>
                                    </div>
                                    <!--end::Action-->
                                </a>
                                <!--end::Overlay-->
                                <!--begin::Body-->
                                <div class="m-0">
                                    <!--begin::Title-->
                                    <a href="{{ route('listings.show', $listing->slug) }}"
                                        class="fs-4 text-dark fw-bold text-hover-primary text-dark lh-base">{{ substr($listing->title, 0, 30) }}...</a>
                                    <!--end::Title-->
                                    <!--begin::Text-->
                                    <div class="fw-semibold fs-5 text-gray-600 text-dark mt-3 mb-5">
                                        {!! substr($listing->content, 0, 30) !!}...</div>
                                    <!--end::Text-->
                                    <!--begin::Content-->
                                    <div class="fs-6 fw-bold">
                                        <!--begin::Author-->
                                        <a href="#"
                                            class="text-gray-700 text-hover-primary">{{ App\Models\User::find($listing->user_id)->brandInfos->brand_name }}</a>
                                        <!--end::Author-->
                                        <!--begin::Date-->
                                        <span class="text-muted">on
                                            {{ date('M d Y', strtotime($listing->created_at)) }}</span>
                                        <!--end::Date-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Publications post-->
                        </div>
                    @empty
                        <span class="text-danger bg-light-danger text-center fs-1 px-4 py-2">We couldnt get any
                            suggestions for now</span>
                    @endforelse

                </div>
                <!--end::Row-->
            </div>
            <!--end::Section-->
            <!--begin::Card-->
            <div class="card mb-4 bg-light text-center">
                <!--begin::Body-->
                <div class="card-body py-12">
                    @if (!is_null($user->social_instagram_profile))
                        <!--begin::Icon-->
                        <a href="{{ $user->social_instagram_profile }}" class="mx-4">
                            <img src="{{ asset('users/assets/media/svg/brand-logos/instagram-2-1.svg') }}"
                                class="h-30px my-2" alt="">
                        </a>
                        <!--end::Icon-->
                    @endif
                    @if (!is_null($user->social_twitter_profile))
                        <!--begin::Icon-->
                        <a href="#" class="mx-4">
                            <img src="{{ asset('users/assets/media/svg/brand-logos/twitter.svg') }}"
                                class="h-30px my-2" alt="">
                        </a>
                        <!--end::Icon-->
                    @endif
                    <!--begin::Icon-->
                    <a href="#" class="mx-4">
                        <img src="{{ asset('users/assets/media/svg/brand-logos/github.svg') }}" class="h-30px my-2"
                            alt="">
                    </a>
                    <!--end::Icon-->
                    <!--begin::Icon-->
                    <a href="#" class="mx-4">
                        <img src="{{ asset('users/assets/media/svg/brand-logos/behance.svg') }}" class="h-30px my-2"
                            alt="">
                    </a>
                    <!--end::Icon-->
                    <!--begin::Icon-->
                    <a href="#" class="mx-4">
                        <img src="{{ asset('users/assets/media/svg/brand-logos/pinterest-p.svg') }}"
                            class="h-30px my-2" alt="">
                    </a>
                    <!--end::Icon-->
                    <!--begin::Icon-->
                    <a href="#" class="mx-4">
                        <img src="{{ asset('users/assets/media/svg/brand-logos/twitter.svg') }}" class="h-30px my-2"
                            alt="">
                    </a>
                    <!--end::Icon-->
                    <!--begin::Icon-->
                    <a href="#" class="mx-4">
                        <img src="{{ asset('users/assets/media/svg/brand-logos/dribbble-icon-1.svg') }}"
                            class="h-30px my-2" alt="">
                    </a>
                    <!--end::Icon-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Body-->
    </div>
</div>
