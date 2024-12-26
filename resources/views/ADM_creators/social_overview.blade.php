@extends('layouts.ADM_app')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <x-_social-banner :page="$page" :metrics="$metrics" :snapshots="$snapshots" />
    @php

    $socialAccounts = $page->socialAccount->user->socialAccounts;
    $followers = 0;
    $selPages = [];
    foreach ($socialAccounts as $account) {
        foreach ($account->socialPages as $selPage) {
            $selPages[] = $selPage ?? [];
        }
    }
    //   dd($selPages);
@endphp
<div class="d-flex flex-stack mb-5">
    <!--begin::Title-->
    <h3 class="text-dark">All Analytics</h3>
    <!--end::Title-->
    <!--begin::Link-->
    {{-- <a href="#" class="fs-6 fw-semibold link-primary">Last 30 posts</a> --}}
    <div class="max-w-300px">
        <select class="form-select w-100" id="page-select">
            <option value="" disabled selected>Select a page</option> <!-- Default option -->
            @foreach ($selPages as $selPage)
                <option class="{{getPlatformColorClass($selPage->platform)}} fw-bold" value="{{ route('social_page.overview', ['page_id' => $selPage->id]) }}">
                    {{ $selPage->page_name }}
                </option>
            @endforeach
        </select>
    </div>

    <!--end::Link-->
</div>

    
    @if ($page->platform === "facebook" )
    <x-_social-body-facebook :page="$page" :metrics="$metrics" :snapshots="$snapshots" :engagement-data="$engagementDataChart" />
    
    @elseif($page->platform === "instagram")
    <x-_social-body-instagram :page="$page" :metrics="$metrics" :snapshots="$snapshots" :engagement-data="$engagementDataChart" />
    
    @elseif($page->platform === "youtube")
    <x-_social-body-youtube :page="$page" :metrics="$metrics" :snapshots="$snapshots" :engagement-data="$engagementDataChart" />
    @else
    lol
    @endif

    <script>
        document.getElementById('page-select').addEventListener('change', function() {
                const selectedValue = this.value;
                if (selectedValue) {
                    if (confirm('Are you sure you want to navigate to this page?')) {
                        window.location.href = selectedValue;
                    }
                }
            });

    </script>
@endsection
