<div>
    <div id="kt_ecommerce_add_product_form"
        class="form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework"
        data-kt-redirect="products.html">
        <!--begin::Aside column-->
        <div wire:ignore.self class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">

            <!--begin::Weekly sales-->
            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2>Previous Versions</h2>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <ul class="list-group border-primary border">
                        @foreach ($all_versions as $changelog)
                            <li class="fw-bold list-item border px-2 py-1">{{env("APP_NAME").' '. $changelog->version }}  
                            @if (strtolower($changelog->version) == strtolower(env("APP_VERSION")))
                            <span
                            class="badge bg-light-info text-info px-2 py-1">Current</span>
                            @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!--end::Card body-->
            </div>

        </div>
        <!--end::Aside column-->
        <!--begin::Main column-->
        <div wire:ignore.self class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
            <!--begin:::Tabs-->
            <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2"
                role="tablist">
                <!--begin:::Tab item-->
                <li class="nav-item" role="presentation">
                    <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                        href="#kt_ecommerce_add_product_general" aria-selected="true" role="tab">Create</a>
                </li>
                <!--end:::Tab item-->
                <!--begin:::Tab item-->
                <li class="nav-item" role="presentation">
                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                        href="#kt_ecommerce_add_product_advanced" aria-selected="false" tabindex="-1"
                        role="tab">Update</a>
                </li>
                <!--end:::Tab item-->
            </ul>
            <!--end:::Tabs-->
            <!--begin::Tab content-->
            <div class="tab-content">
                <!--begin::Tab pane-->
                <div wire:ignore.self class="tab-pane fade show active" id="kt_ecommerce_add_product_general"
                    role="tab-panel">
                    <div class="d-flex flex-column gap-7 gap-lg-10">
                        <!--begin::General options-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Create New Changelog</h2>
                                </div>
                                <span class="text-muted text-grey-400 mb-10">In order to add new changes you need to
                                    first create a new version, then go to the update Tab and add the changes in this
                                    new version</span>
                            </div>
                            <!--end::Card header-->
                            <form wire:submit.prevent="newVersion">
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="required form-label">New Version</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" wire:model.defer="version_name" class="form-control mb-2"
                                            placeholder="New version" value="">
                                        @error('version_name')
                                            <span class="text-danger bg-light-danger px-2 py-1">{{ $message }}</span>
                                        @enderror
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">Enter the version name, Last verion is <span
                                                class="text-success fw-bold">{{ $last_version? $last_version->version : "NULL" }}</span></div>
                                        <!--end::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="required form-label">Version Type</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" wire:model.defer="version_type" class="form-control mb-2"
                                            placeholder="version Type" value="">
                                        @error('version_type')
                                            <span class="text-danger bg-light-danger px-2 py-1">{{ $message }}</span>
                                        @enderror
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">Enter the version Type, Eg.<span
                                                class="text-success fw-bold">Beta, Stable, Testing ETC.</span></div>
                                        <!--end::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <!--end::Input group-->
                                    <div class="d-flex justify-content-end">
                                        <!--begin::Button-->
                                        <a href="products.html" id="kt_ecommerce_add_product_cancel"
                                            class="btn btn-light me-5">Cancel</a>
                                        <!--end::Button-->
                                        <!--begin::Button-->
                                        <x-button loading="newVersion"> Save Changes</x-button>
                                        <!--end::Button-->
                                    </div>
                                </div>
                                <!--end::Card header-->
                            </form>
                        </div>
                        <!--end::General options-->
                    </div>
                </div>
                <!--end::Tab pane-->
                <!--begin::Tab pane-->
                <div wire:ignore.self class="tab-pane fade" id="kt_ecommerce_add_product_advanced" role="tab-panel">
                    <div class="d-flex flex-column gap-7 gap-lg-10">
                        <!--begin::Inventory-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Update ChangeLogs</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Input group-->
                                <div class="mb-10 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required form-label">Choose version</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select wire:model="s_version_id" class="form-control" id="">
                                        <option value="">__Select Version__</option>
                                        @foreach ($all_versions as $version)
                                            <option value="{{ $version->id }}">
                                                {{ $version->version . ' - ' . $version->type }} <span
                                                    class="text-success">By
                                                    {{ $version->user_id == auth()->user()->id ? 'You' : $version->creator->name }}</span>
                                            </option>
                                        @endforeach

                                    </select>
                                    <!--end::Input-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">Select Version </div>
                                    <!--end::Description-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>

                                <!--end::Input group-->
                                @if (!is_null($s_version))
                                    <div class="d-flex flex-column mb-6">
                                        {{-- @for ($i = 0; $i < count($s_version->change_description); $i++)
                                     <li class="d-flex align-items-center py-2">
                                        <span class="bullet me-5"></span> {{$$s_version->change_description[$i]}}
                                        <div class="button btn-sm text-info bg-light-info">edit</div>
                                    </li>
                                @endfor --}}
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach ($s_version->change_description as $change)
                                            <li class="d-flex align-items-center py-2">
                                                <span class="bullet me-5"></span> {{ $change }}
                                                <x-button loading="editChange"
                                                    class="btn btn-sm text-info bg-light-info"
                                                    wire:click.prevent="editChange({{ $i }})">edit</x-button>
                                            </li>
                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach
                                    </div>

                                    <div class="seprator seprator-dashed"></div>
                                    <div class="mb-10 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="required form-label">{{ ($isUpdating)? 'Update' : 'Add' }}
                                            Changes</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" wire:model="s_version_change" class="form-control">
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">{{ $isUpdating ? 'Update' : 'Add' }} the given
                                            change in the current version </div>
                                        <!--end::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback mb-3"></div>

                                    </div>
                                    <div class="d-flex">
                                        <div class="d-flex justify-content-start">
                                            <x-button loading="deleteVersionConfirm" wire:click="deleteVersionConfirm"
                                            class="btn btn-danger bg-light-danger text-danger btn-light me-5">Delete ({{$s_version->version}})</x-button>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <!--begin::Button-->
                                           @if (is_null($s_version->publish_date))
                                           <x-button loading="publish" wire:click="publish"
                                           id="kt_ecommerce_add_product_cancel"
                                           class="btn btn-success btn-light me-5">Publish</x-button>
                                           @else
                                           <x-button loading="rollBack" wire:click="rollBack"
                                           class="btn btn-success btn-light me-5">Rollback</x-button>
                                           @endif
                                            <!--end::Button-->
                                            <!--begin::Button-->
                                            <button wire:click="{{ ($isUpdating)? 'updateChange' : 'saveChanges' }}" class="btn btn-primary ">{{ ($isUpdating)? 'Update' : 'Save' }} 
                                                Changes</button>
                                            <!--end::Button-->
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <!--end::Card header-->
                        </div>
                        <!--end::Inventory-->
                    </div>
                </div>
                <!--end::Tab pane-->
            </div>
            <!--end::Tab content-->

        </div>
        <!--end::Main column-->
        <div></div>
    </div>

    @push('script')
    <script>
          // for pplied user livewire instance
          window.addEventListener('deleteVersionConfirm', (e) => {
            Swal.fire({
                html: e.detail.message,
                title: "Warning!",
                text: e.detail.message,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "Ok, Proceed!",
                cancelButtonText: "Nope!",
                // customClass: {
                //     confirmButton: e.detail.confirmButtonClass,
                //     cancelButton: e.detail.cancelButtonClass
                //     },
                // buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    toastR('Deleting....', 'info')
                    livewire.emit('deleteVersionConfirmed', e.detail.id)
                } else {
                    toastR('User Canceled Action', 'warning')
                }
            })
        });
    </script>
        
    @endpush
</div>
