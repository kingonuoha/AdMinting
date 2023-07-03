<div>
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_connected_accounts" aria-expanded="true" aria-controls="kt_account_connected_accounts">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">My Job Listings ({{$listings->count()}})</h3>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Content-->
        <div id="kt_account_settings_connected_accounts" class="collapse show">
            <!--begin::Card body-->
            <div class="card card-flush" data-select2-id="select2-data-125-5wrc">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5" data-select2-id="select2-data-124-cse6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            {{-- <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" class="form-control form-control-solid w-250px ps-14" wire:model="search" placeholder="Search Listings"> --}}
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5" data-select2-id="select2-data-123-c59m">
                        {{-- <div class="w-100 mw-150px" data-select2-id="select2-data-122-1oju">
                            <!--begin::Select2-->
                            <select class="form-select form-select-solid" wire:model="category" >
                                <option>Choose Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->category_slug}}">{{ucwords($category->category_name)}}</option>
                                @endforeach
                            </select>
                            
                            <!--end::Select2-->
                        </div> --}}
                        <!--begin::Add product-->
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adm_modal_create_job">Create Listing ($99)</a>
                        <!--end::Add product-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <div id="kt_ecommerce_products_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="table-responsive"><table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="listings_table">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0"><th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1" aria-label="
                                    
                                        
                                    
                                " style="width: 29.8906px;">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#listings_table .form-check-input" value="1">
                                    </div>
                                </th>
                                <th class="min-w-200px sorting" tabindex="0" aria-controls="listings_table" rowspan="1" colspan="2" aria-label="Product: activate to sort column ascending" >Product</th>
                                {{-- <th class="text-end min-w-100px sorting" tabindex="0" aria-controls="listings_table" rowspan="1" colspan="1" aria-label="SKU: activate to sort column ascending" >SKU</th> --}}
                                <th class="text-end min-w-100px sorting" tabindex="0" aria-controls="listings_table" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" >Category</th>
                                <th class="text-end min-w-100px sorting" tabindex="0" aria-controls="listings_table" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" >No. of Applicant</th>
                                <th class="text-end min-w-70px sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 99.7031px;">Actions</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-semibold text-gray-600">
                        @foreach ($listings as $listing)
                            
                        <tr class="odd">
                                <!--begin::Checkbox-->
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1">
                                    </div>
                                </td>
                                <!--end::Checkbox-->
                                <!--begin::Category=-->
                                <td>
                                    <div class="d-flex align-items-center">
                                        <!--begin::Thumbnail-->
                                        <a href="{{route('listings.show', $listing->slug)}}" class="symbol symbol-50px">
                                            <span class="symbol-label" style="background-image:url({{asset('storage/'.$listing->logo)}});"></span>
                                        </a>
                                        <!--end::Thumbnail-->
                                        <div class="ms-5">
                                            <!--begin::Title-->
                                            <a href="{{route('listing.dashboard', $listing->slug)}}" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">{{$listing->title}}</a><br>
                                            <span class="text-primary">{{$listing->company}} &mdash; <span class="text-muted">{{$listing->location}}</span></span>
                                            <!--end::Title-->
                                        </div>
                                    </div>
                                </td>
                                <!--end::Category=-->
                            
                                <!--begin::Qty=-->
                                <td class="text-end pe-0" data-order="28">
                                    <span class="fw-bold ms-3">{{$listing->created_at->diffForHumans()}}</span>
                                </td>
                                <!--end::Qty=-->
                                <!--begin::Price=-->
                                <td class="text-end pe-0">
                                    @foreach ($listing->categories as $category)
                                    <a href="{{route('listing.index', ['category'=> $category->category_slug])}}" class=" {{($category->category_slug == request()->get('category')) ? 'bg-primary text-white' : 'link-primary'}} mt-2 text xs font-md px-2 py-1 mx-1 border border-gray-500 border-dotted">{{$category->category_name}}</a>
                                    @endforeach
                                </td>
                                <!--end::Price=-->
                            
                                <!--begin::Status=-->
                                <!--begin::Badges-->
                            {{-- check if listing has been onboarded already  --}}
                            {{-- listing has been onboarded --}}
                            @if (!is_null($listing->onboarded_by) && is_null($listing->completed_on))
                                <td class="text-end pe-0" data-order="Inactive">
                                    <div class="badge badge-light-info">Inprogress</div>
                                </td>
                                <td class="text-end">
                                    <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions 
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                    <span class="svg-icon svg-icon-5 m-0">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon--></a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3 bg-light-info">See Progress</a>
                                            
                                        </div>
                                        <!--end::Menu item-->
                                       
                                       
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </td>
                            @else
                            {{-- listing not onboarded yet  --}}
                                <td class="text-end pe-0" data-order="Inactive">
                                    <div class="badge badge-light-success">{{$listing->clicks()->count()}}</div>
                                </td>
                                <td class="text-end">
                                    <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions 
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                    <span class="svg-icon svg-icon-5 m-0">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon--></a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            @if ($listing->is_active)
                                            <a wire:click.prevent="confirmDiableListing({{$listing->id}})" href="" class="menu-link px-3 bg-light-danger">Disable Listing</a>
                                            @else
                                            <a wire:click.prevent="confirmEnableListing({{$listing->id}})" class="menu-link px-3 bg-light-success">Enable Listing</a>
                                            @endif
                                            
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a wire:click.prevent="confirmDeleteListing({{$listing->id}})" href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a wire:click.prevent="showAppliedUsers({{$listing->id}})" href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">View Applications</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </td>
                            @endif
                                    
                                    <!--end::Badges-->
                                <!--end::Status=-->
                                <!--begin::Action=-->
                                
                                <!--end::Action=-->
                            </tr>
                            <!--end::Table row-->
                        @endforeach
                            
                        </tbody>
                        <!--end::Table body-->
                        </table>
                    </div>
                </div>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--begin::Card footer-->
           
            <!--end::Card footer-->
        </div>
        <!--end::Content-->
    </div>

    <div class="modal fade" id="kt_modal_view_users" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                    <!--begin::Heading-->
                    
                    @if(!is_null($_selected_listing))
                    @livewire('listing-user-applied-list', ['listing_id' => $_selected_listing])
                    @endif
                    <!--end::Users-->
                    <!--begin::Notice-->
                    {{-- <div class="d-flex justify-content-between">
                        <!--begin::Label-->
                        <div class="fw-semibold">
                            <label class="fs-6">Adding Users by Team Members</label>
                            <div class="fs-7 text-muted">If you need more info, please check budget planning</div>
                        </div>
                        <!--end::Label-->
                        <!--begin::Switch-->
                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="" checked="checked" />
                            <span class="form-check-label fw-semibold text-muted">Allowed</span>
                        </label>
                        <!--end::Switch-->
                    </div> --}}
                    <!--end::Notice-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
</div>

@push('script')
    <script>
        window.addEventListener('swal:confirm', (e)=>{
            Swal.fire({
                title: e.detail.title,
                text: e.detail.message,
                icon: e.detail.type,
                showCancelButton: true,
                confirmButtonText: "Yeah sure!",
                cancelButtonText: "Cancel",
                // customClass: {
                //     confirmButton: e.detail.confirmButtonClass,
                //     cancelButton: e.detail.cancelButtonClass
                //     },
                // buttonsStyling: false
                }).then((result)=>{
                    if (result.isConfirmed) {
                        livewire.emit('disableListingConfirmed', e.detail.id);
                        }else{

                        }
                    })

        })
        window.addEventListener('swal:confirm_enable', (e)=>{
            Swal.fire({
                title: e.detail.title,
                text: e.detail.message,
                icon: e.detail.type,
                showCancelButton: true,
                confirmButtonText: "Yeah Enable!",
                cancelButtonText: "Cancel",
                // customClass: {
                //     confirmButton: e.detail.confirmButtonClass,
                //     cancelButton: e.detail.cancelButtonClass
                //     },
                // buttonsStyling: false
                }).then((result)=>{
                    if (result.isConfirmed) {
                        toastR('Processing Action...', 'info')
                        livewire.emit('enableListingConfirmed', e.detail.id);
                        }else{

                        }
                    })

        })
        window.addEventListener('showAppliedUsers', (e)=>{
            $('#kt_modal_view_users').modal('show')
        })
        window.addEventListener('swal:confirm_Delete', (e)=>{
            Swal.fire({
                html: e.detail.message,
                title: e.detail.title,
                text: e.detail.message,
                icon: e.detail.type,
                showCancelButton: true,
                confirmButtonText: "Yeah Delete!",
                cancelButtonText: "Cancel",
                // customClass: {
                //     confirmButton: e.detail.confirmButtonClass,
                //     cancelButton: e.detail.cancelButtonClass
                //     },
                // buttonsStyling: false
                }).then((result)=>{
                    if (result.isConfirmed) {
                        toastR('Processing Action...', 'info')
                        livewire.emit('deleteListingConfirmed', e.detail.id);
                        }else{
                            toastR('Listing not Deleted, Action was canceled by User!', 'warning')
                        }
                    })

        })

        // for pplied user livewire instance
        window.addEventListener('listing:onboarded_success', (e)=>{
            Swal.fire({
                    html: e.detail.message,
                    title: e.detail.title,
                    text: e.detail.message,
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonText: "Chat Now!",
                    cancelButtonText: "Later",
                    // customClass: {
                    //     confirmButton: e.detail.confirmButtonClass,
                    //     cancelButton: e.detail.cancelButtonClass
                    //     },
                    // buttonsStyling: false
                    }).then((result)=>{
                        if (result.isConfirmed) {
                            livewire.emit('redirect_to_user_inbox', e.detail.user_id)
                            }else{
                                toastR('User Select Canceled!', 'warning')
                            }
                        })
        });
    </script>
@endpush