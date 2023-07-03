<div>
    {{-- Stop trying to control. --}}
    <div class="row g-5 g-xl-8">
        @foreach ($listing_summary as $summary)
            <x-stat-card :stat="$summary" />
        @endforeach

        <x-stat-user-card class="col-lg-4" :user="$brand" />
    </div>
</div>
