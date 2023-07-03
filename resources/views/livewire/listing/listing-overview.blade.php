<div>
    <div class="row g-6 g-xl-9 mb-5">
        <!--begin::Col-->
        <div class="col-lg-6">
            <!--begin::Summary-->
            <div class="card card-flush h-lg-100">
                <!--begin::Card header-->
                <div class="card-header mt-6">
                    <!--begin::Card title-->
                    <div class="card-title flex-column">
                        <h3 class="fw-bold mb-1">Tasks Summary</h3>
                        <div class="fs-6 fw-semibold text-gray-400">24 Overdue Tasks</div>
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <a href="#" class="btn btn-light btn-sm">View Tasks</a>
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body p-9 pt-5">
                    <!--begin::Wrapper-->
                    <div class="d-flex align-items-center mb-5">
                        <!--begin::Avatar-->
                        <div class="me-5 position-relative">
                            <!--begin::Image-->
                            <span class="text-success">
                                {!! getIcon('briefcase') !!}
                            </span>
                            <!--end::Image-->
                            <!--begin::Online-->
                            <div class="bg-success position-absolute h-8px w-8px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1"></div>
                            <!--end::Online-->
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Details-->
                        <div class="fw-semibold">
                            <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary">Title:</a>
                            <div class="text-gray-400">{{$listing->title}}</div>
                        </div>
                        <!--end::Details-->
                        {{-- <!--begin::Badge-->
                        <div class="badge badge-light ms-auto">8</div>
                        <!--end::Badge--> --}}
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Wrapper-->
                    <div class="d-flex align-items-center mb-5">
                        <!--begin::Avatar-->
                        <div class="me-5 position-relative">
                            <!--begin::Image-->
                            <span class="text-success">
                                {!! getIcon('rocket') !!}
                            </span>
                            <!--end::Image-->
                            <!--begin::Online-->
                            <div class="bg-success position-absolute h-8px w-8px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1"></div>
                            <!--end::Online-->
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Details-->
                        <div class="fw-semibold">
                            <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary">Desc:</a>
                            <div class="text-gray-400">{!! $listing->content !!}</div>
                        </div>
                        <!--end::Details-->
                        {{-- <!--begin::Badge-->
                        <div class="badge badge-light ms-auto">8</div>
                        <!--end::Badge--> --}}
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Notice-->
                    <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-grow-1">
                            <!--begin::Content-->
                            <div class="fw-semibold">
                                <div class="fs-6 text-gray-700">
                                <a href="#" class="fw-bold me-1">Invite New .NET Collaborators</a>to create great outstanding business to business .jsp modutr class scripts</div>
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Notice-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Summary-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-lg-6">
            <!--begin::Graph-->
            <div class="card card-flush h-lg-100">
                <!--begin::Card header-->
                <div class="card-header mt-6">
                    <!--begin::Card title-->
                    <div class="card-title flex-column">
                        <h3 class="fw-bold mb-1">Tasks Over Time</h3>
                        <!--begin::Labels-->
                        <div class="fs-6 d-flex text-gray-400 fs-6 fw-semibold">
                            <!--begin::Label-->
                            <div class="d-flex align-items-center me-6">
                            <span class="menu-bullet d-flex align-items-center me-2">
                                <span class="bullet bg-success"></span>
                            </span>Complete</div>
                            <!--end::Label-->
                            <!--begin::Label-->
                            <div class="d-flex align-items-center">
                            <span class="menu-bullet d-flex align-items-center me-2">
                                <span class="bullet bg-primary"></span>
                            </span>Incomplete</div>
                            <!--end::Label-->
                        </div>
                        <!--end::Labels-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Select-->
                        <select name="status" data-control="select2" data-hide-search="true" class="form-select form-select-solid form-select-sm fw-bold w-100px select2-hidden-accessible" data-select2-id="select2-data-10-btdx" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                            <option value="1">2020 Q1</option>
                            <option value="2">2020 Q2</option>
                            <option value="3" selected="selected" data-select2-id="select2-data-12-qicw">2020 Q3</option>
                            <option value="4">2020 Q4</option>
                        </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-11-l0wv" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm fw-bold w-100px" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-status-eh-container" aria-controls="select2-status-eh-container"><span class="select2-selection__rendered" id="select2-status-eh-container" role="textbox" aria-readonly="true" title="2020 Q3">2020 Q3</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        <!--end::Select-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-10 pb-0 px-5">
                    <!--begin::Chart-->
                    <div id="kt_apexcharts_3" style="height: 350px;"></div>
                    <!--end::Chart-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Graph-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-lg-6">
            <!--begin::Card-->
            <div class="card card-flush h-lg-100">
                <!--begin::Card header-->
                <div class="card-header mt-6">
                    <!--begin::Card title-->
                    <div class="card-title flex-column">
                        <h3 class="fw-bold mb-1">Latest Files</h3>
                        <div class="fs-6 text-gray-400">Total {{countFiles('storage/'.$folder)}} Files, {{folderSize('storage/'.$folder)}} space usage</div>
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View All</a>
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body p-9 pt-3">
                    <!--begin::Files-->
                    <div class="d-flex flex-column mb-9">
                        <!--begin::File-->
                        @forelse (getLatestFiles($listing_slug) as $file)
                        <div class="d-flex align-items-center mb-5">
                            <!--begin::Icon-->
                            <div class="symbol symbol-30px me-5">
                                <img alt="Icon" src="{{asset('users/assets/media/svg/files/pdf.svg')}}">
                            </div>
                            <!--end::Icon-->
                            <!--begin::Details-->
                            <div class="fw-semibold">
                                <a class="fs-6 fw-bold text-dark text-hover-primary" href="#">{{$file->name}}</a>
                                <div class="text-gray-400">{{time_Ago($file->created_at)}} by
                                <a href="#">{{$file->uploader->name}}</a></div>
                            </div>
                            <!--end::Details-->
                            <!--begin::Menu-->
                            <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary ms-auto" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="5" y="5" width="5" height="5" rx="1" fill="currentColor"></rect>
                                            <rect x="14" y="5" width="5" height="5" rx="1" fill="currentColor" opacity="0.3"></rect>
                                            <rect x="5" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3"></rect>
                                            <rect x="14" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3"></rect>
                                        </g>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </button>
                            <!--begin::Menu 1-->
                            <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_62fe52d605adf">
                                <!--begin::Header-->
                                <div class="px-7 py-5">
                                    <div class="fs-5 text-dark fw-bold">Filter Options</div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Menu separator-->
                                <div class="separator border-gray-200"></div>
                                <!--end::Menu separator-->
                                <!--begin::Form-->
                                <div class="px-7 py-5">
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fw-semibold">Status:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <div>
                                            <select class="form-select form-select-solid select2-hidden-accessible" data-kt-select2="true" data-placeholder="Select option" data-dropdown-parent="#kt_menu_62fe52d605adf" data-allow-clear="true" data-select2-id="select2-data-16-heb1" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                <option data-select2-id="select2-data-18-ena7"></option>
                                                <option value="1">Approved</option>
                                                <option value="2">Pending</option>
                                                <option value="2">In Process</option>
                                                <option value="2">Rejected</option>
                                            </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-17-188l" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-wawt-container" aria-controls="select2-wawt-container"><span class="select2-selection__rendered" id="select2-wawt-container" role="textbox" aria-readonly="true" title="Select option"><span class="select2-selection__placeholder">Select option</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fw-semibold">Member Type:</label>
                                        <!--end::Label-->
                                        <!--begin::Options-->
                                        <div class="d-flex">
                                            <!--begin::Options-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" value="1">
                                                <span class="form-check-label">Author</span>
                                            </label>
                                            <!--end::Options-->
                                            <!--begin::Options-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="2" checked="checked">
                                                <span class="form-check-label">Customer</span>
                                            </label>
                                            <!--end::Options-->
                                        </div>
                                        <!--end::Options-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fw-semibold">Notifications:</label>
                                        <!--end::Label-->
                                        <!--begin::Switch-->
                                        <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked">
                                            <label class="form-check-label">Enabled</label>
                                        </div>
                                        <!--end::Switch-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-end">
                                        <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                                        <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Form-->
                            </div>
                            <!--end::Menu 1-->
                            <!--end::Menu-->
                        </div>
                        @empty
                            
                        @endforelse
                    </div>
                    <!--end::Files-->
                    <!--begin::Notice-->
                    <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6">
                        <!--begin::Icon-->
                        <!--begin::Svg Icon | path: svg/files/upload.svg-->
                        <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                            <svg width="67" height="67" viewBox="0 0 67 67" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.25" d="M8.375 11.167C8.375 6.54161 12.1246 2.79199 16.75 2.79199H43.9893C46.2105 2.79199 48.3407 3.67436 49.9113 5.24497L56.172 11.5057C57.7426 13.0763 58.625 15.2065 58.625 17.4277V55.8337C58.625 60.459 54.8754 64.2087 50.25 64.2087H16.75C12.1246 64.2087 8.375 60.459 8.375 55.8337V11.167Z" fill="#00A3FF"></path>
                                <path d="M41.875 5.28162C41.875 3.90663 42.9896 2.79199 44.3646 2.79199V2.79199C46.3455 2.79199 48.2452 3.57889 49.6459 4.97957L56.4374 11.7711C57.8381 13.1718 58.625 15.0715 58.625 17.0524V17.0524C58.625 18.4274 57.5104 19.542 56.1354 19.542H44.6667C43.1249 19.542 41.875 18.2921 41.875 16.7503V5.28162Z" fill="#00A3FF"></path>
                                <path d="M32.4311 25.3368C32.1018 25.4731 31.7933 25.675 31.5257 25.9427L23.1507 34.3177C22.0605 35.4079 22.0605 37.1755 23.1507 38.2657C24.2409 39.3559 26.0085 39.3559 27.0987 38.2657L30.708 34.6563V47.4583C30.708 49.0001 31.9579 50.25 33.4997 50.25C35.0415 50.25 36.2913 49.0001 36.2913 47.4583V34.6563L39.9007 38.2657C40.9909 39.3559 42.7585 39.3559 43.8487 38.2657C44.9389 37.1755 44.9389 35.4079 43.8487 34.3177L35.4737 25.9427C34.6511 25.1201 33.443 24.9182 32.4311 25.3368Z" fill="#00A3FF"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <!--end::Icon-->
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-grow-1">
                            <!--begin::Content-->
                            <div class="fw-semibold">
                                <h4 class="text-gray-900 fw-bold">Quick file uploader</h4>
                                <div class="fs-6 text-gray-700"><a onclick="event.preventDefault();document.getElementById('ListingFile').click();" href="#" class="text-hover-primary fs-5 fw-bold mb-2">File Upload</a>
                                      <input type="file" id="ListingFile" name="file" hidden></div>
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Notice-->
                </div>
                <!--end::Card body -->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-lg-6">
            <!--begin::Card-->
            <div class="card card-flush h-lg-100">
                <!--begin::Card header-->
                <div class="card-header mt-6">
                    <!--begin::Card title-->
                    <div class="card-title flex-column">
                        <h3 class="fw-bold mb-1">Contibutors</h3>
                        {{-- <div class="fs-6 text-gray-400">From total 482 Participants</div> --}}
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View All</a>
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card toolbar-->
                <!--begin::Card body-->
                <div class="card-body d-flex flex-column p-9 pt-3 mb-9">
                    <!--begin::Item-->
                    <div class="d-flex align-items-center mb-5">
                        <!--begin::Avatar-->
                        <div class="me-5 position-relative">
                            <!--begin::Image-->
                          
                            <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="{{$listing->applicant->name}}">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                {{-- {{dd($this->user->profile_photo_url)}} --}}
                                            <img  src="{{ $listing->applicant->profile_photo_url }}" alt="{{$listing->applicant->name }} profile" />
                                    @else
                                       
                                            <span class="symbol-label bg-warning text-inverse-warning fw-bold">{{strtoupper(substr($listing->applicant->name, 0, 1))}}</span>
                                    @endif
                                </div>
                            <!--end::Image-->
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Details-->
                        <div class="fw-semibold">
                            <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary">{{$listing->applicant->name}}</a>
                            <div class="text-gray-400">{{$listing->applicant->email}}</div>
                        </div>
                        <!--end::Details-->
                        <!--begin::Badge-->
                        @if (auth()->user()->id == $listing->applicant->id || auth()->user()->id == $listing->user->id || auth()->user()->role == 'adm_admin')
                        <div class="btn btn-sm btn-light-success text-success ms-auto"><a href="{{route('user', $listing->applicant->id)}}">Chat User</a></div>
                        @else
                        <div class="badge badge-light ms-auto">rated {{$listing->applicant->rating}}</div>
                        @endif
                        <!--end::Badge-->
                    </div>
                    <!--end::Item-->
                  
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Col-->
    </div>
                            
                            

    @push('script')


    {{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}
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





            var element = document.getElementById('kt_apexcharts_3');

var height = parseInt(KTUtil.css(element, 'height'));
var labelColor = KTUtil.getCssVariableValue('--kt-gray-500');
var borderColor = KTUtil.getCssVariableValue('--kt-gray-200');
var baseColor = KTUtil.getCssVariableValue('--kt-info');
var lightColor = KTUtil.getCssVariableValue('--kt-info-light');

if (!element) {
    return;
}

var options = {
    series: [{
        name: 'Net Profit',
        data: [30, 40, 40, 90, 90, 70, 70]
    }],
    chart: {
        fontFamily: 'inherit',
        type: 'area',
        height: height,
        toolbar: {
            show: false
        }
    },
    plotOptions: {

    },
    legend: {
        show: false
    },
    dataLabels: {
        enabled: false
    },
    fill: {
        type: 'solid',
        opacity: 1
    },
    stroke: {
        curve: 'smooth',
        show: true,
        width: 3,
        colors: [baseColor]
    },
    xaxis: {
        categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
        axisBorder: {
            show: false,
        },
        axisTicks: {
            show: false
        },
        labels: {
            style: {
                colors: labelColor,
                fontSize: '12px'
            }
        },
        crosshairs: {
            position: 'front',
            stroke: {
                color: baseColor,
                width: 1,
                dashArray: 3
            }
        },
        tooltip: {
            enabled: true,
            formatter: undefined,
            offsetY: 0,
            style: {
                fontSize: '12px'
            }
        }
    },
    yaxis: {
        labels: {
            style: {
                colors: labelColor,
                fontSize: '12px'
            }
        }
    },
    states: {
        normal: {
            filter: {
                type: 'none',
                value: 0
            }
        },
        hover: {
            filter: {
                type: 'none',
                value: 0
            }
        },
        active: {
            allowMultipleDataPointsSelection: false,
            filter: {
                type: 'none',
                value: 0
            }
        }
    },
    tooltip: {
        style: {
            fontSize: '12px'
        },
        y: {
            formatter: function (val) {
                return '$' + val + ' thousands'
            }
        }
    },
    colors: [lightColor],
    grid: {
        borderColor: borderColor,
        strokeDashArray: 4,
        yaxis: {
            lines: {
                show: true
            }
        }
    },
    markers: {
        strokeColor: baseColor,
        strokeWidth: 3
    }
};

var chart = new ApexCharts(element, options);
chart.render();



        </script>
    @endpush

</div>
