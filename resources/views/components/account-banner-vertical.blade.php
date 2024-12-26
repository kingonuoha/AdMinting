<div>
    <div class="card mb-5 mb-xl-8">
        <!--begin::Card body-->
        <div class="card-body">
            <!--begin::Summary-->
            <!--begin::User Info-->
            <div class="d-flex flex-center flex-column py-5">
                <!--begin::Avatar-->
                <div class="symbol symbol-100 symbol-circle mb-7">
                    <img src="{{ $user->profile_photo_url }}" alt="image">
                </div>
                <!--end::Avatar-->
                <!--begin::Name-->
                <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3">{{ $user->name }}</a>
                <!--end::Name-->
                <!--begin::Position-->
                <div class="mb-9">
                    <!--begin::Badge-->
                    <div class="badge badge-lg badge-light-primary d-inline">{{ ucfirst($user->role) }}</div>
                    <!--begin::Badge-->
                </div>
                <!--end::Position-->
                <!--begin::Info-->
                <!--begin::Info heading-->
                <div class="fw-bold mb-3">Insights
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover" data-bs-trigger="hover"
                        data-bs-html="true"
                        data-bs-content="Number of support tickets assigned, closed and pending this week."
                        data-kt-initialized="1"></i>
                </div>
                <!--end::Info heading-->
                <div class="d-flex flex-wrap flex-center">
                    <!--begin::Stats-->
                    <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                        <div class="fs-4 fw-bold text-gray-700">
                            <span class="w-75px">{{formatNumber($sumFollowers)}}</span>
                        </div>
                        <div class="fw-semibold text-muted">Fol/Sub</div>
                    </div>
                    <!--end::Stats-->
                    <!--begin::Stats-->
                    <div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-4 mb-3">
                        <div class="fs-4 fw-bold text-gray-700">
                            <span class="w-50px">56</span>
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                            <span class="svg-icon svg-icon-3 svg-icon-danger">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1"
                                        transform="rotate(-90 11 18)" fill="currentColor"></rect>
                                    <path
                                        d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z"
                                        fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <div class="fw-semibold text-muted">Eng Rate</div>
                    </div>
                    <!--end::Stats-->
                    <!--begin::Stats-->
                    <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                        <div class="fs-4 fw-bold text-gray-700">
                            <span class="w-50px">188</span>
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                            <span class="svg-icon svg-icon-3 svg-icon-success">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                                        transform="rotate(90 13 6)" fill="currentColor"></rect>
                                    <path
                                        d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                        fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <div class="fw-semibold text-muted">Open</div>
                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Info-->
            </div>
            <!--end::User Info-->
            <!--end::Summary-->
            <!--begin::Details toggle-->
            <div class="d-flex flex-stack fs-4 py-3">
                <div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details"
                    role="button" aria-expanded="false" aria-controls="kt_user_view_details">Details
                    <span class="ms-2 rotate-180">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                        <span class="svg-icon svg-icon-3">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                </div>
                {{-- <span data-bs-toggle="tooltip" data-bs-trigger="hover" data-kt-initialized="1">
                    <a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_update_details">Edit</a>
                </span> --}}
            </div>
            <!--end::Details toggle-->
            <div class="separator"></div>
            <!--begin::Details content-->
            <div id="kt_user_view_details" class="collapse show">
                <div class="pb-5 fs-6">
                    <!--begin::Details item-->
                    <div class="fw-bold mt-5">Email</div>
                    <div class="text-gray-600">
                        <a href="#" class="text-gray-600 text-hover-primary">{{ $user->email }}</a>
                    </div>
                    <!--begin::Details item-->
                    <!--begin::Details item-->
                    <div class="fw-bold mt-5">Bio</div>
                    <div class="text-gray-600">{{ $user->advertiserInfos->bio }}</div>
                    <!--begin::Details item-->
                    <!--begin::Details item-->
                    <div class="fw-bold mt-5">Religion</div>
                    <div class="text-gray-600">{{ $user->advertiserInfos->religion }}
                        <!--begin::Details item-->
                        <!--begin::Details item-->
                        <div class="fw-bold mt-5">Loaction</div>
                        <div class="text-gray-600">{{ $user->advertiserInfos->state }}</div>
                        <!--begin::Details item-->
                        <!--begin::Details item-->
                        <div class="fw-bold mt-5">Last Login</div>
                        <div class="text-gray-600">{{ get_last_seen($user->id) }}</div>
                        <!--begin::Details item-->
                    </div>
                </div>
                <!--end::Details content-->
            </div>
            <!--end::Card body-->
        </div>
    </div>
</div>
