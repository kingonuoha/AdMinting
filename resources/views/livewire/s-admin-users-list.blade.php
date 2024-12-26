<div>
    <div class="row g-5 g-xl-8 mt-5">
        @foreach ($userStats as $stat)
            <x-stat-card-progress :stat="$stat" :class="__('col-xl-4')" />
        @endforeach
    </div>
    <div class="d-flex align-items-center justify-content-between border-0 pt-6">
        <!--begin::Card title-->
        <div class="card-title">
            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative my-1">
                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <input type="text" wire:model="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search user">
            </div>
            <!--end::Search-->
        </div>
        <!--begin::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <!--begin::Toolbar-->
            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                <!--begin::Filter-->
                <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor"></path>
                    </svg>
                </span>
                <!--end::Svg Icon-->Filter</button>
                <!--begin::Menu 1-->
                <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                    <!--begin::Header-->
                    <div class="px-7 py-5">
                        <div class="fs-5 text-dark fw-bold">Filter Options</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Separator-->
                    <div class="separator border-gray-200"></div>
                    <!--end::Separator-->
                    <!--begin::Content-->
                    <div class="px-7 py-5" data-kt-user-table-filter="form">
                        <!--begin::Input group-->
                        <div class="mb-10">
                            <label class="form-label fs-6 fw-semibold">Role:</label>
                            <select class="form-select form-select-solid fw-bold " wire:model="role">
                                @foreach(Spatie\Permission\Models\Role::all() as $role)
                                    <option value="{{ $role->name }}">{{ ucwords($role->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!--end::Input group-->

                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
                            <button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Menu 1-->
                <!--end::Filter-->
              
                <!--begin::Add user-->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor"></rect>
                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor"></rect>
                    </svg>
                </span>
                <!--end::Svg Icon-->Add User</button>
                <!--end::Add user-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Group actions-->
            <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                <div class="fw-bold me-5">
                <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected</div>
                <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
            </div>
            <!--end::Group actions-->

        </div>
        <!--end::Card toolbar-->
    </div>
    <div class="row g-6 my-6 g-xl-9 mb-xl-9">
        <!--begin::Followers-->
        <!--begin::Col-->
        <!--begin::Card-->
        @foreach ($admUsers as $user)
        <div class="col-md-6 col-xxl-4">
            <div class="card">
                <!--begin::Card body-->
                <div class="card-body d-flex flex-center flex-column py-9 px-5">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50 symbol-circle mb-5">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        {{-- {{dd($this->user->profile_photo_url)}} --}}
                                    <img  src="{{ $user->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="">
                                        {{ $user->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                                @endif
                        {{-- <img src="../../assets/media/avatars/300-11.jpg" alt="image"> --}}
                        <div class="bg-success position-absolute rounded-circle translate-middle start-100 top-100 border border-4 border-body h-15px w-15px ms-n3 mt-n3"></div>
                    </div>
                    <!--end::Avatar-->
                    <!--begin::Name-->
                    <a href="{{route('user.profile.show', $user->id)}}" class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">{{$user->name}}</a>
                    <!--end::Name-->
                    <!--begin::Position-->
                    @if ($user->hasRole('admin'))
    <div class="fw-semibold text-danger mb-6 bg-light-danger px-2">Admin</div>
@else
    <div class="fw-semibold text-success mb-6 bg-light-success px-2">{{ $user->getRoleNames()->first() }}</div>
@endif
                    
                    
                    <!--end::Position-->
                    <!--begin::Info-->
                    <div class="d-flex flex-center flex-wrap mb-5">
                        <!--begin::Stats-->
                        <div class="border border-dashed rounded min-w-90px py-3 px-4 mx-2 mb-3">
                            <div class="fs-6 fw-bold text-gray-700">$14,560</div>
                            <div class="fw-semibold text-gray-400">Earnings</div>
                        </div>
                        <!--end::Stats-->
                        <!--begin::Stats-->
                        <div class="border border-dashed rounded min-w-90px py-3 px-4 mx-2 mb-3">
                            <div class="fs-6 fw-bold text-gray-700">$236,400</div>
                            <div class="fw-semibold text-gray-400">Sales</div>
                        </div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Info-->
                    <!--begin::Follow-->
                    <div class="d-flex justify-content-between">
                        {{-- <a href="#" class="mx-2 btn btn-sm btn-light-primary">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr012.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" d="M10 18C9.7 18 9.5 17.9 9.3 17.7L2.3 10.7C1.9 10.3 1.9 9.7 2.3 9.3C2.7 8.9 3.29999 8.9 3.69999 9.3L10.7 16.3C11.1 16.7 11.1 17.3 10.7 17.7C10.5 17.9 10.3 18 10 18Z" fill="currentColor"></path>
                                    <path d="M10 18C9.7 18 9.5 17.9 9.3 17.7C8.9 17.3 8.9 16.7 9.3 16.3L20.3 5.3C20.7 4.9 21.3 4.9 21.7 5.3C22.1 5.7 22.1 6.30002 21.7 6.70002L10.7 17.7C10.5 17.9 10.3 18 10 18Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Following</a> --}}
                            @if (!$user->hasRole('admin'))
                            <button wire:click="makeAdminConfirm({{$user->id}})" class="mx-2 btn btn-sm btn-light-danger">
                                <span class="svg-icon svg-icon-3">
                                    {!! getIcon('lock-shield') !!}
                                </span>
                                Make Admin
                            </button>
                        @else
                            <button wire:click="removeAdminConfirm({{$user->id}})" class="mx-2 btn btn-sm btn-light-info">
                                <span class="svg-icon svg-icon-3">
                                    {!! getIcon('lock-shield') !!}
                                </span>
                                Remove Admin
                            </button>
                        @endif
                           
                    </div>
                    <!--end::Follow-->
                </div>
                <!--begin::Card body-->
            </div>
        </div>
            @endforeach
           
            <!--begin::Card-->
        <!--end::Col-->
        <div class="d-block mt-5">
            {{ $admUsers->links('livewire::bootstrap')}}
        </div>
    </div>

    @push('script')
        <script>
            window.addEventListener('makeAdmin:confirmation', (e)=>{
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
                        livewire.emit('makeAdminConfirmed', e.detail.user_id);
                        }else{

                        }
                    })
            });
            window.addEventListener('removeAdmin:confirmation', (e)=>{
                Swal.fire({
                title: e.detail.title,
                text: e.detail.message,
                icon: e.detail.type,
                showCancelButton: true,
                confirmButtonText: "Yeah Disable!",
                cancelButtonText: "Cancel",
                // customClass: {
                //     confirmButton: e.detail.confirmButtonClass,
                //     cancelButton: e.detail.cancelButtonClass
                //     },
                // buttonsStyling: false
                }).then((result)=>{
                    if (result.isConfirmed) {
                        toastR('Processing Action...', 'info')
                        livewire.emit('removeAdminConfirmed', e.detail.user_id);
                        }else{

                        }
                    })
            });
            </script>
    @endpush
</div>
