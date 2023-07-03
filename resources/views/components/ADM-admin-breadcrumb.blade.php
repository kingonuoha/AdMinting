@props(['current_page', "action"])

<div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack my-5">
    <!--begin::Page title-->
    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
        <!--begin::Title-->
        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">{{$current_page}}</h1>
        <!--end::Title-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
            <!--begin::Item-->
            <li class="breadcrumb-item text-muted">
                <a href="{{route('dashboard')}}" class="text-muted text-hover-primary">Home</a>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-400 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-muted">{{$current_page}}</li>
            <!--end::Item-->
        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Page title-->
    <!--begin::Actions-->
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        <!--begin::Secondary button-->
        <!--begin::Primary button-->
        @if (!is_null($action) || $action != [])
        <a href="{{$action['url']}}" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">{{$action['text']}}</a>
        @endif
        
        
        <!--end::Primary button-->
    </div>
    <!--end::Actions-->
</div>