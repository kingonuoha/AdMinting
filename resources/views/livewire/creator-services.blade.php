<div>

    <div class="card card-flush">
        <!--begin::Card header-->
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <!--begin::Card title-->
            <div class="card-title fs-2">
               All Listings
            </div>
            <!--end::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar flex-row-fluid justify-content-end gap-5 mb-4">
             
                <!-- Status Filter -->
                <div class="w-100 mw-150px">
                    <select wire:model="filters.status" class="form-select form-select-solid" data-control="select2"
                        data-hide-search="true">
                        <option value="all">All</option>
                        <option value="Draft">Draft</option>
                        <option value="Published">Published</option>
                        <option value="Awaiting Approval">Awaiting Approval</option>
                    </select>
                </div>
                <!-- Add Listing Button -->
                <a href="{{ route('user.creator.listing.new', $user->username) }}" class="btn btn-primary">Add Listing</a>
            </div>
            <!--end: Toolbar-->

            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <div id="kt_ecommerce_sales_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-100px">#</th>
                                <th class="min-w-100px">Listing Name</th>
                                <th class="min-w-175px">Orders</th>
                                <th class="text-end min-w-70px">Marketplace Status</th>
                                <th class="text-end min-w-100px">Last Update</th>
                                <th class="text-end min-w-100px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($listings as $listing)
                                <tr>
                                    <!-- Listing Name -->
                                    <td>
                                       {{$loop->iteration}}
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-50px overflow-hidden me-3">
                                                <a href="{{ route('user.creator.listing.new', ['user_name' => "@".$user->username, 'listing_id' => $listing->id]) }}">
                                                    @php
                                                        // Find the first image in the media collection
                                                        $firstImage = collect($listing->media ?? [])->firstWhere('type', 'image');
                                                    @endphp
                                                    @if ($firstImage)
                                                        <div class="symbol-label">
                                                            <img src="{{ $firstImage->url }}" alt="{{ $listing->title }}" class="w-100">
                                                        </div>
                                                    @else
                                                        <!-- If no image, show the first letter of the title -->
                                                        <div class="symbol-label fs-3 bg-light-primary text-primary">
                                                            {{ strtoupper(substr($listing->title ?? 'ADCR', 0, 1)) }}
                                                        </div>
                                                    @endif
                                                </a>
                                            </div>
                                            <!--end::Avatar-->
                                    
                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">
                                                    {{ $listing->title }}
                                                </a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <!-- Orders Count -->
                                    <td>
                                        @if ($listing->deal_purchases_count > 0)
                                        <span class="fw-bold">{{ $listing->deal_purchases_count }}</span>
                                    @else
                                        <span class="text-muted">No Purchases</span>
                                    @endif
                                    </td>
                                    <!-- Marketplace Status -->
                                    <td class="text-end">
                                        @php
                                            $badgeClasses = [
                                                'Draft' => 'badge-light-secondary',
                                                'Published' => 'badge-light-success',
                                                'Awaiting Approval' => 'badge-light-warning',
                                            ];
                                        @endphp
                                        <div class="badge {{ $badgeClasses[$listing->status] ?? 'badge-light' }}">
                                            {{ $listing->status }}
                                        </div>
                                    </td>
                                    <!-- Last Update -->
                                    <td class="text-end">
                                        <span class="fw-bold">{{ $listing->updated_at->diffForHumans() }}</span>
                                    </td>
                                    <!-- Actions -->
                                    <td class="text-end">
                                        <a href="{{ route('user.creator.listing.new', ['user_name' => "@".$user->username, 'listing_id' => $listing->id]) }}"
                                            class="btn btn-sm btn-light btn-active-light-primary">Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">No listings found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <!--end: Listings Table-->

                </div>
                <!--begin: Pagination-->
                <div class="d-flex justify-content-between mt-4">
                    <div>
                        <select wire:model="perPage" class="form-select form-select-sm form-select-solid">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div>
                        {{ $listings->links('pagination::bootstrap-4') }}
                    </div>
                </div>
                <!--end: Pagination-->
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
</div>
