<div class="card mb-6 mb-xl-9">
    <div class="card-body pt-9 pb-0">
        <!--begin::Details-->
        <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
            <!--begin::Image-->
            <div class="d-flex flex-center flex-shrink-0 bg-light rounded w-100px h-100px w-lg-150px h-lg-150px me-7 mb-4">
                <img class="mw-50px mw-lg-75px" src="{{asset('storage/company_logo/'.$listing->logo)}}" alt="image" />
            </div>
            <!--end::Image-->
            <!--begin::Wrapper-->
            <div class="flex-grow-1">
                <!--begin::Head-->
                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                    <!--begin::Details-->
                    <div class="d-flex flex-column">
                        <!--begin::Status-->
                        <div class="d-flex align-items-center mb-1">
                            <a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bold me-3">CRM Dashboard</a>
                            @if (!is_null($listing->completed_on))
                            <span class="badge badge-light-success me-auto">Completed</span>
                            @elseif(!is_null($listing->creator_marked_complete_on) && is_null($listing->completed_on))
                            <span class="badge badge-light-success me-auto">Awaiting Confirmation</span>
                            @else
                            <span class="badge badge-light-success me-auto">In Progress</span>
                            @endif
                                
                        </div>
                        <!--end::Status-->
                        <!--begin::Description-->
                        <div class="d-flex flex-wrap fw-semibold mb-4 fs-5 text-gray-400">{{$listing->title}}</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Details-->
                    <!--begin::Actions-->
                    <div class="d-flex mb-4">
                       @if ( auth()->user()->id != $applicant->id)
                       {{-- if not marked as completed by brand and auth user is creator --}}
                                @if (is_null($listing->completed_on) && is_null($listing->creator_marked_complete_on) )
                                {{-- if not marked as completed by creator and auth user is creator --}}
                                <button wire:click.prevent="markAsCompleted" href="#" class="btn btn-sm bg-light-success text-success btn-active-color-primary me-3">
                                    <span>
                                    {!! getIcon('lock-shield') !!}
                                    </span>Mark As Completed</button>
                                    @elseif (is_null($listing->completed_on))
                                    <button wire:click.prevent="markAsCompleted" href="#" class="btn btn-sm btn-bg-light btn-active-color-primary me-3" disabled>
                                        <span>
                                        {!! getIcon('lock-shield') !!}
                                        </span>Awaiting Brand Response..</button>
                                @else
                                <span class="badge badge-light-success mx-2">Completed</span>
                                @endif
                      
                       @else
                            @if ( auth()->user()->id == $brand->id)
                            {{-- if not marked as completed by brand and auth user is Brand --}}
                                    @if (is_null($listing->completed_on) && !is_null($listing->creator_marked_complete_on))
                                    {{-- if not marked as completed by creator and auth user is Brand --}}
                                    <button wire:click.prevent="markAsCompleted" href="#" class="btn btn-sm bg-light-success text-success btn-active-color-primary me-3">
                                        <span>
                                        {!! getIcon('lock-shield') !!}
                                        </span>Confirm Completion</button>
                                    @elseif (is_null($listing->completed_on))
                                               {{-- if not marked as completed by creator and auth user is Brand --}}
                                    <button wire:click.prevent="markAsCompleted" href="#" class="btn btn-sm bg-light-success btn-active-color-primary me-3">
                                        <span>
                                        {!! getIcon('lock-shield') !!}
                                    </span>Mark As Completed</button>
                                    @else
                                            
                                    <span class="badge badge-light-success mx-2">Completed</span>
                                    @endif
                           
                            @else
                              @if (auth()->user()->role == 'adm_admin'&&  is_null($listing->completed_on))
                                     {{-- if not marked as completed by brand and auth user is Admin --}}
                            <button wire:click.prevent="markAsCompleted" href="#" class="btn btn-sm bg-light-success text-success btn-active-color-primary me-3">
                                <span>
                                {!! getIcon('lock-shield') !!}
                                </span>Mark As Completed</button>
                              @else
                                  <span class="badge badge-light-success mx-2">Completed</span>
                              @endif
                                
                            @endif
                       {{-- <a wire:click.prevent="markAsCompleted" href="#" class="btn btn-sm bg-light-success btn-active-color-primary me-3 text-success">
                           <span>
                           {!! getIcon('check-square') !!}
                           </span> Mark as Completed</a> --}}
                       @endif
                       
                        <!--begin::Menu-->
                        <div class="me-0">
                            <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <i class="bi bi-three-dots fs-3"></i>
                            </button>
                            <!--begin::Menu 3-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
                                <!--begin::Heading-->
                                <div class="menu-item px-3">
                                    <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Listing</div>
                                </div>
                                <!--end::Heading-->
                                <!--begin::Menu item-->
                                @foreach ((new \App\Http\Livewire\SideBar)->links()['__ListingManagement'] as $item)
                                <div class="menu-item px-3">
                                    <a href="{{$item['url']}}" class="menu-link px-3">{{$item['title']}}</a>
                                </div>
                            @endforeach
                                <!--end::Menu item-->
                               
                            </div>
                            <!--end::Menu 3-->
                        </div>
                        <!--end::Menu-->
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Head-->
                <!--begin::Info-->
                <div class="d-flex flex-wrap justify-content-start">
                    <!--begin::Stats-->
                    <div class="d-flex flex-wrap">
                        <!--begin::Stat-->
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <!--begin::Number-->
                            <div class="d-flex align-items-center">
                                <div class="fs-4 fw-bold">{{(!is_null($listing->due_date)? date('dd m yy', timestamp($listing->due_date)) : '12 Jan 2023')}}</div>
                            </div>
                            <!--end::Number-->
                            <!--begin::Label-->
                            <div class="fw-semibold fs-6 text-gray-400">Due Date</div>
                            <!--end::Label-->
                        </div>
                        <!--end::Stat-->
                       
                        <!--begin::Stat-->
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <!--begin::Number-->
                            <div class="d-flex align-items-center">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg')}}-->
                                <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                        <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <div class="fs-4 fw-bold" data-kt-countup="true" data-kt-countup-value="{{(isset($listing->price))? $listing->price : "12000"}}" data-kt-countup-prefix="$">0</div>
                            </div>
                            <!--end::Number-->
                            <!--begin::Label-->
                            <div class="fw-semibold fs-6 text-gray-400">Budget Spent</div>
                            <!--end::Label-->
                        </div>
                        <!--end::Stat-->
                    </div>
                    <!--end::Stats-->
                    <!--begin::Users-->
                    <div class="symbol-group symbol-hover mb-3">
                        <!--begin::User-->
                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="{{$applicant->name}}">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        {{-- {{dd($this->user->profile_photo_url)}} --}}
                                    <img  src="{{ $applicant->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            @else
                               
                                    <span class="symbol-label bg-warning text-inverse-warning fw-bold">{{strtoupper(substr($applicant->name, 0, 1))}}</span>
                            @endif
                        </div>
                        <!--end::User-->
                        {{-- <!--begin::User-->
                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Michael Eberon">
                            <img alt="Pic" src="{{asset('users/assets/media/avatars/300-11.jpg')}}" />
                            <!--end::User-->
                        </div> --}}
                        <!--begin::User-->
                        <!--end::User-->
                        <!--begin::All users-->
                        <a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">
                            <span class="symbol-label bg-dark text-inverse-dark fs-8 fw-bold" data-bs-toggle="tooltip" data-bs-trigger="hover" title="View more users">+0</span>
                        </a>
                        <!--end::All users-->
                    </div>
                    <!--end::Users-->
                </div>
                <!--end::Info-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Details-->
        <div class="separator"></div>
        <!--begin::Nav-->
        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
            <!--begin::Nav item-->
                
            @foreach ((new \App\Http\Livewire\SideBar)->links()['__ListingManagement'] as $item)
                
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5" href="{{$item['url']}}">{{$item['title']}}</a>
                </li>
            @endforeach
           
            <!--end::Nav item-->
            
        </ul>
        <!--end::Nav-->
    </div>
</div>
