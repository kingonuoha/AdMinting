<div>
   <div class="row">
    <div class="col-lg-12">
        <div class="card card-custom card-stretch gutter-b">
            <div class="card-body d-flex p-0">
                <div class="flex-grow-1 p-12 card-rounded bgi-no-repeat d-flex flex-column justify-content-center align-items-start"
                    style="background-color: rgb(247, 222, 255); background-position: right bottom; background-size: auto 100%; background-image: url({{ asset('users/assets/media/custom/report-info.svg') }})">

                    <h4 class="text-info font-weight-bolder m-0">Resolve Disputes with Confidence</h4>

                    <p class="text-dark-50 my-5 font-size-xl font-weight-bold">
                        Found an issue? Add a dispute and let us handle it with care. Your concerns matter, and
                        we're here to ensure a fair resolution for all involved. Trust us to address your grievances
                        effectively.
                    </p>

                    <a href="#" data-bs-toggle="modal" data-bs-target="#dispute-modal"
                        class="btn btn-info font-weight-bold py-2 px-6">Report an Issue</a>
                </div>
            </div>
        </div>
    </div>
   </div>
   <div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Disputes</div>
            </div>
            <div class="card-body">
                @forelse ($disputes as $dispute)
                <div class="d-flex flex-stack  align-items-start mb-10">
                    <div class="symbol symbol-200 mr-4 pl-2 pt-2">
                      
                       <img src="{{$dispute->user->profile_photo_url}}" alt="">
                    </div>
                    <div class="bg-light rounded shadow p-4">
                        <h4 class="fw-bold text-muted">Description</h4>

                        <div class=" scroll-y max-h-500px min-h-300px">
                           <div class="text-grey-700">
                            {{$dispute->description}}
                           </div>


                            <div class="separator separator-dashed my-8"></div>
                            <h4 class="fw-bold text-muted">Supporting Documents</h4>
                    <div class="border border-primary d-flex flex-wrap bg-light-primary">
                        @forelse ($dispute->supporting_files as $files)
                        <a target="_blank" href="{{ asset('storage/'.$files)}}" class="symbol symbol-120 border-hover-primary m-5 bg-light-info  ">
                            @if (!isImage(getFileExtFromUrl(asset('storage/'.$files))))
                            <div class="d-flex flex-column symbol-label font-size-h5 text-info text-upper">
                                <div class="svg-icon svg-icon-info svg-icon-2x mb-2">
                                    {!! getIcon('file-up') !!}
                                </div>
                                {{getFileExtFromUrl(asset('storage/'.$files))}}
                            </div>
                            @else
                            <img class="object-fit:cover" src="{{ asset('storage/'.$files)}}" alt="">
                            @endif
                        </a>
                        <div class="separator separator-dashed my-8"></div>
                            
                        @empty
                            
                        @endforelse
                        
                    </div>
                        </div>
                        
                     
                    </div>
                   
                    
                </div>
                @empty
                    
                @endforelse
               
                
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Create new Dispute</div>
            </div>
            <div class="card-body">
               <form class="form" wire:submit.prevent="saveDispute">
                @csrf
                <div class="fv-row mb-5">
                    <label for="name" class="fs-4 fw-bolder form-label mb-2">Description</label>
                    <textarea wire:model="dispute_description" id="" cols="10" rows="10" class="form-control"
                        placeholder="Enter what went wrong"></textarea>
                    @error('dispute_description')
                        <span
                            class="text-danger bg-light-danger px-2 py-1 mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="fv-row">

                    <label for="despute_dropzone" class="fs-4 fw-bolder form-label mb-2">Upload
                        Supporting Documents</label>
                    <!--begin::Dropzone-->
                    <div wire:ignore class="dropzone dropzone-default dropzone-primary" id="despute_dropzone">
                        <!--begin::Message-->
                            
                            <div class="dropzone-msg dz-message needsclick">
                                <span class="fs-3x symbol symbol-200px bg-light-primary">
                                    <span class=" svg-icon svg-icon-3x svg-icon-primary">
                                    {!! getIcon('file-up') !!}
                                </span>
                                </span>
                                <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                                <span class="dropzone-msg-desc">Upload up to 10 files</span>
                            </div>
                            <!--end::Info-->
                    </div>
                    @error('fileLinks')
                        <span
                            class="text-danger bg-light-danger px-2 py-1 mt-2">{{ $message }}</span>
                    @enderror
                    <!--end::Dropzone-->
                </div>
                <div class="flex-end card-footer d-flex">
                    <!--begin::Button-->
                    <button type="reset" id="dispute-modal_cancel"
                        class="btn btn-light me-3">Discard</button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <x-button loading="saveDispute">Submit </x-button>
                    <!--end::Button-->
                </div>
               </form>
            </div>
        </div>
    </div>
   </div>

   @push('script')
       <script>
          $('#despute_dropzone').dropzone({
            url:  "{{ route('listing.upload_dispute_files') }}", // Set the url for your upload script location
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 10,
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            acceptedFiles: "image/*,application/pdf,.mp4",
            sending: function(file, xhr, formData) {
                    formData.append("_token", "{{ csrf_token() }}");
                },
            accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else {

                    done();
                }
            },
            success: function(file, response){
                console.log(file, response[0]);
                @this.addFileLink(response[0]); // Use a Livewire method to store the link

            }
        });
       </script>
   @endpush
</div>
