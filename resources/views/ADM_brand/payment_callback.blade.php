@extends('layouts.ADM_app')
@section('title')
    AdMinting | Payment Success
@endsection
@section('content')
<div class="card my-3">
    <!--begin::Card body-->
    <div class="card-body p-0">
        <!--begin::Wrapper-->
        <div class="card-px text-center py-20 my-10">
            <!--begin::Title-->
            <h2 class="fs-2x fw-bold mb-10">{{$title}}</h2>
            <!--end::Title-->
            <!--begin::Description-->
                <p class="text-gray-400 fs-4 fw-semibold mb-10">You currently have ({{ $listings->count() }}) job
                    listings created. Keep track of your listings for better management</p>
                <!--end::Description-->
                <p class="text-gray-400 fs-4 fw-semibold mb-10 w-70">{{$body}}
                </p>
            <!--begin::Action-->
            <a href="{{route('listing.my_listings')}}" class="btn btn-primary" >My Listings</a>
            <!--end::Action-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Illustration-->
        <div class="text-center px-4">
            <img class="mw-100 mh-300px" alt=""
                src="{{ asset('users/assets/media/illustrations/sketchy-1/2.png') }}">
        </div>
        <!--end::Illustration-->
    </div>
    <!--end::Card body-->
</div>
@endsection