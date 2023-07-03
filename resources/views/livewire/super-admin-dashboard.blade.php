
<div>
    {{-- SUPER ADMIN DASH --}}
        <div class="row g-5 g-xl-8">
        @foreach ($topStats as $stat)
        <x-stat-card :stat="$stat" />
        @endforeach
    </div>
    {{-- {{dd($listing_summary)}} --}}
    
    <div class="row g-5 g-xl-10 mb-xl-10">
        <x-stat-finance  :outstandingDebt="$outstandingDebt" :listingSummary="$listing_summary" />
        <x-stat-ranking-users class="col-xl-7"  :rankingUsers="$ranking_users"/>
        <div class="d-flex justify-content-between my-3 align-items-center">
            <h3>Recently Onboarded Listings</h3>
            <button class="btn btn-light-success text-success">Action</button>
        </div>
        <div class="seperator seperator-dashed"></div>
        @foreach ($recently_onboarded_listing as $listing)
        <x-stat-listing-onboarded-card :onboardedListing="$listing"/>
        @endforeach

        {{-- <x-stat-radial-card /> --}}
    </div>
    {{-- END SUPER ADMIN DASH --}}

</div>

