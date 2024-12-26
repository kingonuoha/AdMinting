<div>
    @push('style')
    <style>
        .media-wrapper {
            position: relative;
            width: 100%;
            padding-top: 56.25%; /* 16:9 Aspect Ratio */
            overflow: hidden;
            background: #f9f9f9; /* Optional background color */
            border-radius: 8px; /* Optional rounded corners */
            border: 1px solid #ddd; /* Optional border */
        }
    
        .media-wrapper img,
        .media-wrapper video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensures the media fills the wrapper */
        }
    </style>
    
    @endpush
    {{-- sssfsf --}}
    <div class="card card-custom card-transparent">
        <div class="card-body p-0">
            <!--begin: Wizard-->
            <div class="wizard wizard-4" id="kt_wizard" data-wizard-state="first" data-wizard-clickable="true">
                <!--begin: Wizard Nav-->
<div class="wizard-nav">
    <div class="wizard-steps">
        <!--begin::Wizard Step 1 Nav-->
        <div class="wizard-step" data-wizard-type="step" 
             data-wizard-state="{{ $step === 1 ? 'current' : ($step > 1 ? 'done' : 'pending') }}">
            <div class="wizard-wrapper">
                <div class="wizard-number">1</div>
                <div class="wizard-label">
                    <div class="wizard-title">Add Social Page</div>
                    <div class="wizard-desc">Connect a Social Account</div>
                </div>
            </div>
        </div>
        <!--end::Wizard Step 1 Nav-->

        <!--begin::Wizard Step 2 Nav-->
        <div class="wizard-step" data-wizard-type="step" 
             data-wizard-state="{{ $step === 2 ? 'current' : ($step > 2 ? 'done' : 'pending') }}">
            <div class="wizard-wrapper">
                <div class="wizard-number">2</div>
                <div class="wizard-label">
                    <div class="wizard-title">Listing Details</div>
                    <div class="wizard-desc">Title, Description, Media</div>
                </div>
            </div>
        </div>
        <!--end::Wizard Step 2 Nav-->

        <!--begin::Wizard Step 3 Nav-->
        <div class="wizard-step" data-wizard-type="step" 
             data-wizard-state="{{ $step === 3 ? 'current' : ($step > 3 ? 'done' : 'pending') }}">
            <div class="wizard-wrapper">
                <div class="wizard-number">3</div>
                <div class="wizard-label">
                    <div class="wizard-title">Manage Deals</div>
                    <div class="wizard-desc">Create and Manage Deals</div>
                </div>
            </div>
        </div>
        <!--end::Wizard Step 3 Nav-->

        <!--begin::Wizard Step 4 Nav-->
        <div class="wizard-step" data-wizard-type="step" 
             data-wizard-state="{{ $step === 4 ? 'current' : ($step > 4 ? 'done' : 'pending') }}">
            <div class="wizard-wrapper">
                <div class="wizard-number">4</div>
                <div class="wizard-label">
                    <div class="wizard-title">Review & Submit</div>
                    <div class="wizard-desc">Finalize Your Listing</div>
                </div>
            </div>
        </div>
        <!--end::Wizard Step 4 Nav-->
    </div>
</div>
<!--end: Wizard Nav-->


                <!--begin: Wizard Body-->
                <div class="card card-custom card-shadowless rounded-top-0">
                    <div class="card-body p-0">
                        <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                            <div class="col-xl-12 col-xxl-7">
                                <!--begin: Wizard Form-->
                                <div class="form mt-0 mt-lg-10 fv-plugins-bootstrap fv-plugins-framework"
                                    id="kt_form">
                                    <!--begin: Wizard Step 1-->
                                    <div class="pb-5" data-wizard-type="step-content"
                                        @if ($step === 1) data-wizard-state="current" @endif>
                                        <div class="mb-10 font-weight-bold text-dark">Connect Account/Page</div>
                                        <!--end::Input-->
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group fv-plugins-icon-container">
                                                    <label>Account</label>
                                                    <select class="form-select form-control-solid"
                                                        wire:model.live="listingData.social_page_id">
                                                        @foreach ($pages as $page)
                                                            <option
                                                                class=" fw-bold {{ getPlatformColorClass($page->platform) }}"
                                                                value="{{ $page->id }}">{{ $page->page_name }} -
                                                                ({{ $page->followers }})
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="form-text text-muted">Please choose an account or
                                                        connect new account <a class="fw-bold text-primary"
                                                            href="{{ route('profile.socials') }}">here</a>.</span>
                                                    @error('listingData.social_page_id')
                                                        <div class="text-danger bg-light-danger fw-bold mt-2 p-2">
                                                            {{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end: Wizard Step 1-->

                                    <!--begin: Wizard Step 2-->
                                    <div class="pb-5" data-wizard-type="step-content"
                                        @if ($step === 2) data-wizard-state="current" @endif>
                                        <div class="mb-10 font-weight-bold text-dark">Setup Your Listing</div>
                                        <!--begin::Input-->
                                        <div class="form-group fv-plugins-icon-container">
                                            <label>Listing Title</label>
                                            <input wire:model="listingData.title" type="text"
                                                class="form-control form-control-solid form-control-lg" name="address1"
                                                placeholder="Listing Title">
                                            <span class="form-text text-muted">Please enter your Address.</span>
                                            @error('listingData.title')
                                                <div class="text-danger bg-light-danger fw-bold mt-2 p-2">
                                                    {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--end::Input-->

                                        <div class="form-group fv-plugins-icon-container">
                                            <label>Listing Description</label>
                                            <textarea wire:model="listingData.description" class="form-control form-control-solid form-control-lg"
                                                placeholder="Enter a brief description of the listing"></textarea>
                                            <span class="form-text text-muted">Provide details about your
                                                listing.</span>
                                            @error('listingData.description')
                                                <div class="text-danger bg-light-danger fw-bold mt-2 p-2">
                                                    {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group fv-plugins-icon-container">
                                            <label>Upload Media</label>
                                            <div wire:ignore id="listing_media_dropzone"
                                                class="bg-light-primary flex-wrap dropzone h-100 w-100 d-flex justify-content-center align-items-center text-center">
                                                <!--begin::Dropzone-->
                                                <!--begin::Message-->
                                                <div class="dz-message needsclick">
                                                    <span class="fs-3x text-primary">
                                                        {!! getIcon('file-up') !!}
                                                    </span>
                                                    <!--begin::Info-->
                                                    <div class="ms-4">

                                                        <h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop files here or
                                                            click
                                                            to upload.</h3>
                                                        <span class="fs-7 fw-semibold text-gray-400">Upload up to 10
                                                            files</span>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                            </div>
                                            <span class="form-text text-muted">Upload images or videos for your
                                                listing. You can upload multiple files.</span>
                                            @error('listingData.media')
                                                <div class="text-danger bg-light-danger fw-bold mt-2 p-2">
                                                    {{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end: Wizard Step 2-->

                                    <!--begin: Wizard Step 3-->
                                    <div class="pb-5" data-wizard-type="step-content"
                                        @if ($step === 3) data-wizard-state="current" @endif>
                                        <form class="border-bottom pb-10"
                                            wire:submit.prevent="{{ $editingDealId ? 'updateDeal' : 'addDeal' }}">
                                            <div class="mb-10 font-weight-bold text-dark">
                                                {{ $editingDealId ? 'Edit Deal' : 'Create New Deal' }}
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!-- Deal Name -->
                                                    <div class="form-group mb-3">
                                                        <label for="dealName">Deal Name</label>
                                                        <input type="text" wire:model="currentDeal.name"
                                                            id="dealName" class="form-control"
                                                            placeholder="Enter deal name">
                                                        <span class="form-text text-muted">Enter deal name.</span>

                                                        @error('currentDeal.name')
                                                            <div class="text-danger mt-2">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <!-- Deal Description -->
                                                    <div class="form-group mb-3">
                                                        <label for="dealDescription">Deal Description</label>
                                                        <textarea wire:model="currentDeal.description" id="dealDescription" class="form-control"
                                                            placeholder="Enter deal description"></textarea>
                                                        <span class="form-text text-muted">Enter deal
                                                            description</span>
                                                        @error('currentDeal.description')
                                                            <div class="text-danger mt-2">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <!--begin::Input-->
                                                    <div class="form-group mb-3">
                                                        <label for="dealPrice">Deal Price (NGN)</label>
                                                        <input type="number" wire:model="currentDeal.price"
                                                            id="dealPrice" class="form-control"
                                                            placeholder="Enter deal price">
                                                        <span class="form-text text-muted">Enter deal price</span>

                                                        @error('currentDeal.price')
                                                            <div class="text-danger mt-2">{{ $message }}</div>
                                                        @enderror

                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-4">
                                                    <!--begin::Input-->
                                                    <div class="form-group mb-3">
                                                        <label for="deliveryDuration">Delivery Duration (days)</label>
                                                        <input type="number"
                                                            wire:model="currentDeal.delivery_duration"
                                                            id="deliveryDuration" class="form-control"
                                                            placeholder="Enter delivery duration in days">
                                                        <span class="form-text text-muted">Enter delivery duration in
                                                            days
                                                            E.g (6, 15, 21)</span>
                                                        @error('currentDeal.delivery_duration')
                                                            <div class="text-danger mt-2">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-4">
                                                    <!--begin::Input-->
                                                    <!-- Questions -->
                                                    <div class="form-group mb-3">
                                                        <label for="dealQuestions">Questions for Buyers</label>
                                                        <textarea wire:model="currentDeal.questions" id="dealQuestions" class="form-control"
                                                            placeholder="Enter questions for buyers (one per line)"></textarea>
                                                        <span class="form-text text-muted">Enter questions for buyers
                                                            (one
                                                            per line)</span>
                                                        @error('currentDeal.questions')
                                                            <div class="text-danger mt-2">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>

                                            <!-- Optional Deal Flag -->
                                            <div class="form-check mb-3">
                                                <input type="checkbox" wire:model="currentDeal.is_optional"
                                                    id="isOptional" class="form-check-input">
                                                <label for="isOptional" class="form-check-label">Is this an optional
                                                    deal?</label>
                                                @error('currentDeal.is_optional')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="d-flex justify-content-between mt-5">
                                                <!-- Submit Button -->
                                                <button type="submit" class="btn btn-primary">
                                                    {{ $editingDealId ? 'Update Deal' : 'Add Deal' }}
                                                    <span wire:loading
                                                        wire:target="{{ $editingDealId ? 'updateDeal' : 'addDeal' }}"
                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                </button>

                                                @if ($editingDealId)
                                                    <button type="button" wire:click="resetDealForm"
                                                        class="btn btn-secondary">Cancel</button>
                                                @endif
                                            </div>
                                            @error('deals')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </form>

                                        <!-- List of Existing Deals -->
                                        <div class="mb-4 mt-5">
                                            <h5 class="mb-3">Existing Deals</h5>
                                            @if (count($deals) > 0)
                                                <ul class="list-group">
                                                    @foreach ($deals as $deal)
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <strong>{{ $deal['name'] }}</strong> -
                                                                NGN{{ $deal['price'] }}
                                                                <br>
                                                                <span
                                                                    class="text-muted">{{ $deal['description'] }}</span>
                                                            </div>
                                                            <div class="min-w-160px">
                                                                <button wire:click="editDeal({{ $deal['id'] }})"
                                                                    class="btn btn-sm btn-primary">Edit</button>
                                                                <button wire:click="deleteDeal({{ $deal['id'] }})"
                                                                    class="btn btn-sm btn-danger">Delete</button>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <p class="text-muted">No deals have been created for this listing yet.
                                                </p>
                                            @endif
                                        </div>

                                    </div>
                                    <!--end: Wizard Step 3-->

                                    <!--begin: Wizard Step 4-->
                                    <div class="pb-5" data-wizard-type="step-content"
                                        @if ($step === 4) data-wizard-state="current" @endif>
                                        <!--begin::Section-->
                                        <h4 class="mb-10 font-weight-bold text-dark">Review your Details and Submit
                                        </h4>
                                        <!-- Listing Details -->
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <h5 class="card-title">Listing Details</h5>
                                            </div>
                                            <div class="card-body">
                                                <p><strong>Title:</strong> {{ $listingData['title'] }}</p>
                                                <p><strong>Description:</strong> {{ $listingData['description'] }}</p>
                                                <p><strong>Connected Social Page:</strong>
                                                    @php
                                                    $socialPage = collect($pages)->firstWhere('id', $listingData['social_page_id']);
                                                @endphp
                                                    @if ($socialPage)
                                                       <span class="fw-bold {{ getPlatformColorClass($socialPage->platform) }}"> {{ $socialPage->page_name}}</span>
                                                    @else
                                                        <span class="text-danger">Not Selected</span>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>

                                        <!-- Media Preview -->
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <div class="card-title">
                                                <h3 class="card-label">
                                                    Media Preview <br>
                                                    <small>Click and drag media to re-arrange</small>
                                                </h3>
                                            </div>
                                            <div class="card-toolbar">
                                                <span wire:loading
                                                wire:target="reorderMedia"
                                                class=" spinner-border spinner-border-lg text-info align-middle ms-2"></span>

                                            </div>
                                            </div>
                                            <div class="card-body">
                                                @if (count($listingData['media']) > 0)
                                                <div id="media-container" class="row">
                                                    @foreach ($listingData['media'] as $index => $media)
                                                        @php
                                                            $media = (object)$media; // Convert array to object
                                                        @endphp
                                                        <div class="col-md-3 mb-3" data-id="{{ $index }}">
                                                            <div class="media-wrapper">
                                                                @if ($media->type === 'image')
                                                                    <a href="{{ $media->url }}" 
                                                                       data-fslightbox="listing-media" 
                                                                       data-title="{{ $media->name }}">
                                                                        <img src="{{ $media->url }}" 
                                                                             class="img-fluid img-thumbnail" 
                                                                             alt="Image Preview">
                                                                    </a>
                                                                @elseif ($media->type === 'video')
                                                                    <a href="{{ $media->url }}" 
                                                                       data-fslightbox="listing-media" 
                                                                       data-title="{{ $media->name }}">
                                                                        <video autoplay loop muted playsinline 
                                                                               class="img-fluid img-thumbnail">
                                                                            <source src="{{ $media->url }}" type="video/mp4">
                                                                            Your browser does not support the video tag.
                                                                        </video>
                                                                    </a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                
                                                @else
                                                    <p class="text-muted">No media uploaded.</p>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Deals Summary -->
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <h5 class="card-title">Deals Summary</h5>
                                            </div>
                                            <div class="card-body">
                                                @if (count($deals) > 0)
                                                    <ul class="list-group">
                                                        @foreach ($deals as $deal)
                                                            <li class="list-group-item">
                                                                <strong class="fs-2 text-primary text-hover-muted">{{ $deal['name'] }}</strong>  @if ($deal['is_optional'])
                                                                <span
                                                                    class="badge bg-warning text-dark">Optional</span>
                                                            @endif -
                                                                NGN{{ $deal['price'] }}
                                                                <br>
                                                                <span
                                                                    class="text-muted">{{ $deal['description'] }}</span>
                                                                <br>
                                                                <span><strong>Delivery Duration:</strong>
                                                                    {{ $deal['delivery_duration'] }} days</span>
                                                              
                                                                @if (!empty($deal['questions']))
                                                                    <ul class="mt-2">
                                                                        <strong>Questions:</strong>
                                                                        @foreach ($deal['questions'] as $question)
                                                                            <li>{{ $question }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <p class="text-muted">No deals added.</p>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    <!--end: Wizard Step 4-->

                                    <!--begin: Wizard Actions-->
                                    <div class="d-flex justify-content-between border-top mt-5 pt-10">

                                        @if ($step > 1)
                                            <div class="mr-2">
                                                <x-button wire:click="previousStep" loading="previousStep"
                                                    type="button"
                                                    class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4">
                                                    Previous
                                                </x-button>
                                            </div>
                                        @endif
                                        <div>
                                            @if ($step === 4)
                                                <x-button wire:click="saveDraft" loading="saveDraft" type="button"
                                                    class="btn btn-success font-weight-bolder text-uppercase px-9 py-4">
                                                    Submit
                                                </x-button>
                                            @endif

                                            @if ($step < 4)
                                                <x-button wire:click="nextStep" loading="nextStep" type="button"
                                                    class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4">
                                                    Next
                                                </x-button>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <!--end: Wizard Form-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end: Wizard Bpdy-->
            </div>
            <!--end: Wizard-->
        </div>
    </div>
    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.0/min/dropzone.min.js"
            integrity="sha512-newCjW7Rcrz+YKyzmMzDjgBCHcy4KElNHTPszcsNGpkTv/K5YWJhQgCngiWl+ktD1TVror+msGiCa6FXkUHloA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            //    document.addEventListener('livewire:load', function () {
            //  drop js 
            let myDropzone = new Dropzone("#listing_media_dropzone", {
                url: "{{ route('user.creator.listing.media-upload') }}", // Updated route
                paramName: "file", // The name used to transfer the file
                maxFiles: 10,
                maxFilesize: 20, // Max file size in MB
                acceptedFiles: "image/*,video/*", // Accept only images and videos
                addRemoveLinks: true,
                dictResponseError: 'Error uploading file!',
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}" // CSRF token for Laravel
                },
                accept: function(file, done) {
                    const mimeType = file.type.split('/')[0]; // Get the main MIME type
                    if (mimeType === "image" || mimeType === "video") {
                        done(); // Accept the file
                    } else {
                        done("Only image and video files are allowed."); // Reject the file
                    }
                },
                // Hook into the sending event to pass additional parameters
                sending: function(file, xhr, formData) {
                    console.log("Sending file:", file); // Console log the file being sent
                    formData.append("username", "{{ $user->username }}"); // Pass username dynamically
                },

                // Hook for success response
                success: function(file, response) {
                    console.log("Upload success:", response); // Log the server response
                    if (response.status === "success") {
                        @this.addFileLink(response.file); // Use Livewire method to add the file link
                        file.serverId = response.file.id; // Store the server-side file ID for later removal
                    } else {
                        Swal.fire({
                            title: "Upload Error",
                            text: errorMessage || (xhr && xhr.statusText) || "An unknown error occurred.",
                            icon: "error"
                        });
                    }
                },

                // Hook for error response
                error: function(file, errorMessage, xhr) {
                    console.error("Upload failed:", errorMessage); // Log the error
                    let message = errorMessage.message || (xhr && xhr.statusText) || "An unknown error occurred.";
                    Swal.fire({
                        title: "Upload Error",
                        text: message,
                        icon: "error"
                    });
                },

                // Hook to handle file removal
                removedfile: function(file) {
                    console.log("File removed:", file); // Log the removed file
                    if (file.serverId) {
                        axios.post("{{ route('user.creator.listing.media-delete') }}", {
                                fileId: file.serverId
                            })
                            .then(response => {
                                console.log("File deleted successfully:", response.data);
                                file.previewElement.remove(); // Remove the file preview from Dropzone UI
                            })
                            .catch(error => {
                                console.error("Error deleting file:", error.response || error.message);
                                Swal.fire({
                                    title: "Delete Error",
                                    text: error.response?.data?.message ||
                                        "An error occurred while deleting the file.",
                                    icon: "error"
                                });
                            });
                    } else {
                        file.previewElement.remove(); // Remove the file preview for local-only files
                    }
                },

                // Hook into initialization to log and set up debugging
                init: function() {
                    this.on("addedfile", function(file) {
                        console.log("File added:", file); // Log added files
                    });

                    this.on("uploadprogress", function(file, progress) {
                        console.log("Upload progress:", file.name, progress + "%"); // Log progress
                    });

                    this.on("sending", function(file, xhr, formData) {
                        console.log("Sending file:", file.name); // Log sending files
                    });

                    this.on("complete", function(file) {
                        console.log("Upload complete for file:", file.name); // Log completed files
                    });

                    this.on("error", function(file, errorMessage) {
                        console.error("Error during upload:", file.name, errorMessage); // Log errors
                    });
                }
            });


            const container = document.getElementById('media-container');

    // Initialize SortableJS
    new Sortable(container, {
        animation: 150, // Smooth animation
        onEnd: function (evt) {
            // Get the new order of media items
            const orderedIds = Array.from(container.children).map((child) => child.dataset.id);

            // Send the new order to Livewire
            @this.reorderMedia(orderedIds);
        },
    });
        </script>
    @endpush
</div>
