<div>
    <div class="mb-12">
        <div class="d-flex justify-content-center ">
            @foreach ($categories as $category)
                <a href="{{route('listing.index', ['category'=> $category->category_slug])}}" class=" {{($category->category_slug == request()->get('category')) ? 'bg-primary text-white' : 'link-primary'}} d-inline mt-2 text xs font-md px-2 py-1 mx-2 border border-gray-500 border-dotted">{{$category->category_name}}</a>
            @endforeach
        </div>
    </div>

    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_connected_accounts" aria-expanded="true" aria-controls="kt_account_connected_accounts">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">All Listings ({{$listing_count}})</h3>
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
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" class="form-control form-control-solid w-250px ps-14" wire:model="search" placeholder="Search Listings">
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
                        <a href="add-product.html" class="btn btn-primary">Add Product</a>
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
                                <th class="text-end min-w-100px sorting" tabindex="0" aria-controls="listings_table" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" >No. Applications</th>
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
                                            <span class="symbol-label" style="background-image:url({{asset('storage/company_logo/'.$listing->logo)}});"></span>
                                        </a>
                                        <!--end::Thumbnail-->
                                        <div class="ms-5">
                                            <!--begin::Title-->
                                            <a href="{{route('listings.show', $listing->slug)}}" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">{{$listing->title}}</a><br>
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
                                <td class="text-end pe-0" data-order="Inactive">
                                    <!--begin::Badges-->
                                    <div class="badge badge-light-success">{{$listing->clicks()->count()}}</div>
                                    <!--end::Badges-->
                                </td>
                                <!--end::Status=-->
                                <!--begin::Action=-->
                                
                                <td class="text-end">
                                   
                                    <a  href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions 
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
                                                <a href="{{route('listings.show', $listing->slug)}}" class="menu-link px-3">Apply</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu--> 
                                </td>
                                <!--end::Action=-->
                            </tr>
                            <!--end::Table row-->
                           @endforeach
                            
                        </tbody>
                        <!--end::Table body-->
                    </table></div>
                </div>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--begin::Card footer-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
               {{$listings->links()}}
            </div>
            <!--end::Card footer-->
        </div>
        <!--end::Content-->
    </div>
</div>
