<div>
    <div class="row g-6 g-xl-9" @if (!$allFetched) wire:poll="handleRequest" @endif>
        @if (!$allFetched)
            <!--begin::Content-->
            <div class="d-flex flex-stack mb-5">
                <!--begin::Title-->
                <h3 class="text-dark">Fetching New page Insights...</h3>
                <!--end::Title-->
                <!--begin::Link-->
                {{-- <a href="#" class="fs-6 fw-semibold link-primary">Last 30 posts</a> --}}
                <x-button wire:click="handleRequest" loading="handleRequest">make request</x-button>
                <!--end::Link-->
            </div>
        @else
            <!--begin::Content-->
            <div class="row d-flex flex-stack mb-5 mt-7">
                <!--begin::Title-->
               <div class="col-md-12 d-flex flex-stack mb-5">
                <input type="text" class="form-control" placeholder="Search Pages..."
                wire:model.debounce.300ms="search" />
                
                <span wire:loading class="spinner spinner-loader spinner-loader-primary"></span>
               </div>
                <!--end::Title-->
                <!--begin::Link-->
              <div class="col-md-12 d-flex flex-stack mb-5">  
                  <a href="#" class="fs-6 fw-semibold link-primary"> {{count($pages)." ". Illuminate\Support\Str::plural('page', count($pages))}}  </a>
                  <x-button wire:click="openAddAccountModal" loading="openAddAccountModal">connect new</x-button> 
            </div>
               
                <!--end::Link-->
            </div>
        @endif
        @forelse ($pages as $page)
            <div class="col-md-6 col-xl-3">
                <!--begin::Card-->
                <div href="#" class="card border-hover-primary">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-9">
                        <!--begin::Card Title-->
                        <div class="card-title m-0">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-50px w-50px bg-light">
                                <img src="{{ $page->picture->url }}" alt="image" class="p-3">
                            </div>
                            <!--end::Avatar-->
                        </div>
                        <!--end::Car Title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            {{-- <x-button wire:click="confirmDeletePage({{ $page->id }})"  loading="confirmDeletePage({{ $page->id }})"  class="btn btn-light-{{ getPlatformColorClass($page->platform, 'theme')  }} btn-sm " type="button">
                              <div class="svg-icon-1x">
                                {!! getIcon("bin") !!}
                              </div>
                            </x-button> --}}
                            <span class="spinner" wire:target="confirmDeletePage({{ $page->id }})" wire:loading.class="spinner-primary spinner-sm"></span>
                            
                           <div class="btn-group">
                                <button class="btn btn-light-{{ getPlatformColorClass($page->platform, 'theme')  }} font-weight-bold btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   {{$page->platform}}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <x-button class="dropdown-item" loading="confirmDeletePage({{ $page->id }})" wire:click="confirmDeletePage({{ $page->id }})" >Delete</x-button>
                                    <a class="dropdown-item"  href="{{ route('social_page.overview', $page->id) }}">View</a>
                                </div>
                            </div>
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end:: Card header-->
                    <!--begin:: Card body-->
                    <div class="card-body p-9">
                        <!--begin::Name-->
                        <a href="{{ route('social_page.overview', $page->id) }}" class="fs-3 fw-bold {{ getPlatformColorClass($page->platform, 'text')  }} ">{{ $page->page_name }} </a>
                        <!--end::Name-->
                        <!--begin::Description-->
                        <p class="text-gray-400 fw-semibold fs-5 mt-1 mb-7">{{ substr($page->about, 0, 100) }}...</p>
                        <!--end::Description-->
                        <!--begin::Info-->
                        <div class="d-flex flex-wrap mb-5">
                            <!--begin::Due-->
                            <div class="border border-gray-300 border-dashed rounded py-3 px-4 me-7 mb-3">
                                <div class="fs-6 text-gray-800 fw-bold">{{ $page->followers ?? 'No Data' }}</div>
                                <div class="fw-semibold text-gray-400">Followers</div>
                            </div>
                            <!--end::Due-->
                            <!--begin::Budget-->
                            <div class="border border-gray-300 border-dashed rounded py-3 px-4 mb-3">
                                <div class="fs-6 text-gray-800 fw-bold">{{ $page->engagement_rate ?? 'No Data' }}</div>
                                <div class="fw-semibold text-gray-400">Engagement <br>Rate</div>
                            </div>
                            <!--end::Budget-->
                        </div>
                        <!--end::Info-->

                    </div>
                    <!--end:: Card body-->
                </div>
                <!--end::Card-->
            </div>
        @empty
            <x-_empty-card :title="'No Page Connected'" :desc="'No page connected yet, click on Connect new to connect an Account'" />
        @endforelse
    </div>
    <!-- Modal-->
<div class="modal fade" id="addAccountModal" tabindex="-1" role="dialog" aria-labelledby="addAccountModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Connect New Account</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <x-_connect-social-account :socials="$socials" :user-social-accounts="$connectedAccounts" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary font-weight-bold">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" tabindex="-1" id="connectedAccountModal">
    @if (!is_null($seeSocialAccounts))
        
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Connected {{ ucfirst($seeSocialAccounts['platform']) }} Account</h3>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" wire:click="closeConectedAccountModal">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                            class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

                <div class="modal-body">
                    <div class="row mb-3 max-h-300px scroll-y">
                        <div class="col-12 mb-3" wire:ignore>
                            <!--begin::Label-->
                            <label class="form-label mb-3">List of your connected {{ ucfirst($seeSocialAccounts['platform']) }} Accounts</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            @foreach ($seeSocialAccounts['accounts'] as $social_account)
                            @php
                                // Convert $social_account to an object if it's an array
                                $social_account = is_array($social_account) ? (object) $social_account : $social_account;
                            @endphp
                            <div class="d-flex flex-stack">
                                <div class="d-flex">
                                    <img src="{{ empty($social_account->profile) ? 'https://placehold.co/400?text=No+Photo&font=roboto' : $social_account->profile }}"
                                         class="w-50px me-6" alt="">
                                    <div class="d-flex flex-column">
                                        <a href="#"
                                           class="fs-2 text-dark text-hover-primary fw-bold">{{ $social_account->name }}</a>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <x-button disabled type="button"
                                              class="btn btn-outline btn-outline-dashed btn-outline-info btn-active-light-info">
                                        {{ count($social_account->socialPages ?? []) }} {{Illuminate\Support\Str::plural('page', count($pages))}}
                                    </x-button>
                                </div>
                            </div>

                            <div class="separator separator-dashed my-5"></div>
                        @endforeach
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <x-button type="button" class="btn btn-light" loading="closeConectedAccountModal" wire:click.prevent="closeConectedAccountModal">Close</x-button>
                </div>
        </div>
    </div>

    @endif

</div>


    <script>

          // Listen for the Livewire event dispatched from the backend
          window.document.addEventListener('trigger-swal-confirmation', (data) => {
            console.log(data);
        let swalConfig = {
            title: 'Are you sure?',
            text: data.detail.message,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel',
            reverseButtons: true
        };

        // Show the SweetAlert confirmation dialog
        Swal.fire(swalConfig).then((result) => {
            if (result.isConfirmed) {
                // If the user confirms, call the respective Livewire method
                if (data.detail.type === 'single') {
                    // Delete the single page
                    Livewire.emit('deletePage', data.detail.pageId);
                } else if (data.detail.type === 'all') {
                    // Delete all pages
                    Livewire.emit('deleteAllPages');
                }
            }
        });
    });

    window.addEventListener('social:open-connected', () => {
                $("#connectedAccountModal").modal('show')
            });
  //  close modals 
            window.addEventListener('social:close-connected', () => {
                $("#connectedAccountModal").modal('hide')
            });
 
        window.document.addEventListener("showAddAccountModal", ()=>{
            $("#addAccountModal").modal("show");
        })
        document.addEventListener('livewire:load', () => {
            Livewire.emit('handleRequest');
        });
    </script>
</div>
