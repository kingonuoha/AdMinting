{{-- <div class="row g-5 g-xl-8"> --}}
    <div class="col-xl-3">
        <!--begin::Statistics Widget 5-->
        <a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                <span class="svg-icon svg-icon-{{$stat['color']}} svg-icon-3x ms-n1">
                    {!!getIcon($stat['icon'])!!}
                </span>
                <!--end::Svg Icon-->
                <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">{{$stat['count']}}</div>
                <div class="fw-semibold text-gray-400">{{$stat['title']}}</div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->
    </div>
{{-- </div> --}}