
    <div class="{{$class}}">
        <!--begin: Statistics Widget 6-->
        <div class="card bg-light-{{$stat['color']}} card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body my-3">
                <a href="#" class="card-title fw-bold text-{{$stat['color']}} fs-5 mb-3 d-block">{{$stat['value'].' '.$stat['title']}}</a>
                <div class="py-1">
                    <span class="text-dark fs-1 fw-bold me-2">{{$stat['percent']}}%</span>
                    <span class="fw-semibold text-muted fs-7">Avarage</span>
                </div>
                <div class="progress h-7px bg-{{$stat['color']}} bg-opacity-50 mt-7">
                    <div class="progress-bar bg-{{$stat['color']}}" role="progressbar" style="width: {{$stat['percent']}}%" aria-valuenow="{{$stat['percent']}}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <!--end:: Body-->
        </div>
        <!--end: Statistics Widget 6-->
    </div>