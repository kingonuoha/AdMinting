<div>
    @livewire('listing.listing-banner')

    <div class="row g-6 g-xl-9 mb-6 mb-xl-9">
        @forelse ($listingFiles as $file)
             <!--begin::Col-->
        <div class="col-md-6 col-lg-4 col-xl-3">
            <!--begin::Card-->
            <div class="card h-100">
                <!--begin::Card body-->
                <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                    <!--begin::Name-->
                    <a href="{{asset('storage/'.$file->folder.'/'.$file->name)}}" target="__blank" class="text-gray-800 text-hover-primary d-flex flex-column">
                        <!--begin::Image-->
                        <div class="symbol symbol-60px mb-5">
                            <img src="{{asset('users/assets/media/svg/files/folder-document.svg')}}" class="theme-light-show" alt="">
                            <img src="{{asset('users/assets/media/svg/files/folder-document-dark.svg')}}" class="theme-dark-show" alt="">
                            <div class="px-2 py-1 bg-success text-white">{{strtoupper($file->type)}}</div>
                        </div>
                        <!--end::Image-->
                        <span class="bg-light-success text-success px-1 w-100px mx-auto rounded-pill">{{$file->size}}Mb</span>
                        <!--begin::Title-->
                        <div class="fs-5 fw-bold mb-2">{{ substr($file->name, 0, 13)}}...</div>
                        <!--end::Title-->
                    </a>
                    <!--end::Name-->
                    <!--begin::Description-->
                    <div class="fs-7 fw-semibold text-gray-400">{{time_Ago($file->created_at)}}</div>
                    <!--end::Description-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Col-->
        @empty
            
        @endforelse
       
        {{-- <!--begin::Col-->
        <div class="col-md-6 col-lg-4 col-xl-3">
            <!--begin::Card-->
            <div class="card h-100">
                <!--begin::Card body-->
                <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                    <!--begin::Name-->
                    <a href="../file-manager/files.html" class="text-gray-800 text-hover-primary d-flex flex-column">
                        <!--begin::Image-->
                        <div class="symbol symbol-60px mb-5">
                            <img src="{{asset('users/assets/media/svg/files/doc.svg')}}" class="theme-light-show" alt="">
                            <img src="{{asset('users/assets/media/svg/files/doc-dark.svg')}}" class="theme-dark-show" alt="">
                        </div>
                        <!--end::Image-->
                        <!--begin::Title-->
                        <div class="fs-5 fw-bold mb-2">CRM App Docs..</div>
                        <!--end::Title-->
                    </a>
                    <!--end::Name-->
                    <!--begin::Description-->
                    <div class="fs-7 fw-semibold text-gray-400">3 days ago</div>
                    <!--end::Description-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-md-6 col-lg-4 col-xl-3">
            <!--begin::Card-->
            <div class="card h-100">
                <!--begin::Card body-->
                <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                    <!--begin::Name-->
                    <a href="../file-manager/files.html" class="text-gray-800 text-hover-primary d-flex flex-column">
                        <!--begin::Image-->
                        <div class="symbol symbol-60px mb-5">
                            <img src="{{asset('users/assets/media/svg/files/css.svg')}}" class="theme-light-show" alt="">
                            <img src="{{asset('users/assets/media/svg/files/css-dark.svg')}}" class="theme-dark-show" alt="">
                        </div>
                        <!--end::Image-->
                        <!--begin::Title-->
                        <div class="fs-5 fw-bold mb-2">User CRUD Styles</div>
                        <!--end::Title-->
                    </a>
                    <!--end::Name-->
                    <!--begin::Description-->
                    <div class="fs-7 fw-semibold text-gray-400">4 days ago</div>
                    <!--end::Description-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-md-6 col-lg-4 col-xl-3">
            <!--begin::Card-->
            <div class="card h-100">
                <!--begin::Card body-->
                <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                    <!--begin::Name-->
                    <a href="../file-manager/files.html" class="text-gray-800 text-hover-primary d-flex flex-column">
                        <!--begin::Image-->
                        <div class="symbol symbol-60px mb-5">
                            <img src="{{asset('users/assets/media/svg/files/ai.svg')}}" class="theme-light-show" alt="">
                            <img src="{{asset('users/assets/media/svg/files/ai-dark.svg')}}" class="theme-dark-show" alt="">
                        </div>
                        <!--end::Image-->
                        <!--begin::Title-->
                        <div class="fs-5 fw-bold mb-2">Product Logo</div>
                        <!--end::Title-->
                    </a>
                    <!--end::Name-->
                    <!--begin::Description-->
                    <div class="fs-7 fw-semibold text-gray-400">5 days ago</div>
                    <!--end::Description-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-md-6 col-lg-4 col-xl-3">
            <!--begin::Card-->
            <div class="card h-100">
                <!--begin::Card body-->
                <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                    <!--begin::Name-->
                    <a href="../file-manager/files.html" class="text-gray-800 text-hover-primary d-flex flex-column">
                        <!--begin::Image-->
                        <div class="symbol symbol-60px mb-5">
                            <img src="{{asset('users/assets/media/svg/files/sql.svg')}}" class="theme-light-show" alt="">
                            <img src="{{asset('users/assets/media/svg/files/sql-dark.svg')}}" class="theme-dark-show" alt="">
                        </div>
                        <!--end::Image-->
                        <!--begin::Title-->
                        <div class="fs-5 fw-bold mb-2">Orders backup</div>
                        <!--end::Title-->
                    </a>
                    <!--end::Name-->
                    <!--begin::Description-->
                    <div class="fs-7 fw-semibold text-gray-400">1 week ago</div>
                    <!--end::Description-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-md-6 col-lg-4 col-xl-3">
            <!--begin::Card-->
            <div class="card h-100">
                <!--begin::Card body-->
                <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                    <!--begin::Name-->
                    <a href="../file-manager/files.html" class="text-gray-800 text-hover-primary d-flex flex-column">
                        <!--begin::Image-->
                        <div class="symbol symbol-60px mb-5">
                            <img src="{{asset('users/assets/media/svg/files/xml.svg')}}" class="theme-light-show" alt="">
                            <img src="{{asset('users/assets/media/svg/files/xml-dark.svg')}}" class="theme-dark-show" alt="">
                        </div>
                        <!--end::Image-->
                        <!--begin::Title-->
                        <div class="fs-5 fw-bold mb-2">UTAIR CRM API Co..</div>
                        <!--end::Title-->
                    </a>
                    <!--end::Name-->
                    <!--begin::Description-->
                    <div class="fs-7 fw-semibold text-gray-400">2 weeks ago</div>
                    <!--end::Description-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-md-6 col-lg-4 col-xl-3">
            <!--begin::Card-->
            <div class="card h-100">
                <!--begin::Card body-->
                <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                    <!--begin::Name-->
                    <a href="../file-manager/files.html" class="text-gray-800 text-hover-primary d-flex flex-column">
                        <!--begin::Image-->
                        <div class="symbol symbol-60px mb-5">
                            <img src="{{asset('users/assets/media/svg/files/tif.svg')}}" class="theme-light-show" alt="">
                            <img src="{{asset('users/assets/media/svg/files/tif-dark.svg')}}" class="theme-dark-show" alt="">
                        </div>
                        <!--end::Image-->
                        <!--begin::Title-->
                        <div class="fs-5 fw-bold mb-2">Tower Hill App..</div>
                        <!--end::Title-->
                    </a>
                    <!--end::Name-->
                    <!--begin::Description-->
                    <div class="fs-7 fw-semibold text-gray-400">3 weeks ago</div>
                    <!--end::Description-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div> --}}
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-md-6 col-lg-4 col-xl-3">
            <!--begin::Card-->
            <div class="card h-100 flex-center bg-light-primary border-primary border border-dashed p-8">
                <!--begin::Image-->
                <img src="{{asset('users/assets/media/svg/files/upload.svg')}}" class="mb-5" alt="">
                <!--end::Image-->
                <!--begin::Link-->
                <a onclick="event.preventDefault();document.getElementById('ListingFile').click();" href="#" class="text-hover-primary fs-5 fw-bold mb-2">File Upload</a>
                <!--end::Link-->
                <!--begin::Description-->
                {{-- <div class="fs-7 fw-semibold text-gray-400">Drag and drop files here</div> --}}
                <!--end::Description-->
            </div>
                <input type="file" id="ListingFile" name="file" hidden>
            <!--end::Card-->
        </div>
        <!--end::Col-->
    </div>
</div>

@push('script')
<script>
    // Get a reference to the file input element
    const inputElement = document.querySelector('input[id="ListingFile"]');

    // Create a FilePond instance
    const pond = FilePond.create(inputElement);

    FilePond.setOptions({
        server: {
            url: @js(route('listing.files.upload', $listing_slug)),
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        },
        // error('oh my goodness');
        // onerror(error[, file, status])
    });

//     pond.on('FilePond:error', (file, error) => {
//   console.log('FilePond error:', error);
  
//             // Handle the error as needed
//             // For example, display an error message to the user
//             const errorMessage = `Error uploading file ${file.filename}: ${error}`;
//             // Display the error message to the user or perform any other action
//             });







</script>
@endpush