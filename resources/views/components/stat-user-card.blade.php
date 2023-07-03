<div {{ $attributes->merge(['class' => '']) }}>

<div class="card mb-5 mb-xl-8">
    <!--begin::Body-->
    <div class="card-body pt-15 px-0">
        <!--begin::Member-->
        <div class="d-flex flex-column text-center mb-9 px-9">
            <!--begin::Photo-->
            <div class="symbol symbol-80px symbol-lg-150px mb-4">
                <img src="{{asset('storage/company_logo/'.$user->brandInfos->logo_path)}}" class="" alt="">
            </div>
            <!--end::Photo-->
            <!--begin::Info-->
            <div class="text-center">
                <!--begin::Name-->
                <a href="../user-profile/overview.html" class="text-gray-800 fw-bold text-hover-primary fs-4">{{$user->brandInfos->brand_name}}</a>
                <!--end::Name-->
                <!--begin::Position-->
                <span class="text-muted d-block fw-semibold">{{$user->brandInfos->location}}</span>
                <!--end::Position-->
            </div>
            <!--end::Info-->
        </div>
        <!--end::Member-->
        <!--begin::Row-->
        <div class="row px-9 mb-4">
            <!--begin::Col-->
            <div class="col-md-4 text-center">
                <div class="text-gray-800 fw-bold fs-3">
                    <span class="m-0 counted" data-kt-countup="true" data-kt-countup-value="642" data-kt-initialized="1">{{$user->listings()->groupBy('onboarded_by')->count()}}</span>
                </div>
                <span class="text-gray-500 fs-8 d-block fw-bold">USERS ACCEPTED</span>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-md-4 text-center">
                <div class="text-gray-800 fw-bold fs-3">
                <span class="m-0 counted" data-kt-countup="true" data-kt-countup-value="24" data-kt-initialized="1">{{$user->listings()->groupBy('onboarded_by')->count()}}</span>K</div>
                <span class="text-gray-500 fs-8 d-block fw-bold">FOLLOWERS</span>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-md-4 text-center">
                <div class="text-gray-800 fw-bold fs-3">
                <span class="m-0 counted" data-kt-countup="true" data-kt-countup-value="12" data-kt-initialized="1">12</span>K</div>
                <span class="text-gray-500 fs-8 d-block fw-bold">FOLLOWING</span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
    </div>
    <!--end::Body-->
</div>

</div>