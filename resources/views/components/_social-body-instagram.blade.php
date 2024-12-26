<div>

    <div class="card mb-17">
        <div class="card-body p-lg-20 pb-lg-0">
            <!--begin::Content-->
            <div class="d-flex flex-stack mb-5">
                <!--begin::Title-->
                <h3 class="text-dark">All Analytics</h3>
                <!--end::Title-->
                <!--begin::Link-->
                {{-- <a href="#" class="fs-6 fw-semibold link-primary">Last 30 posts</a> --}}
                <p class="{{ getPlatformColorClass($page->platform, 'text')  }}  fw-bold fs-5">last 90 Days</p>
                <!--end::Link-->
            </div>
            <!--end::Content-->

            <div class="row">
                <div class="col-lg-6">
                    <div id="engagement-chart">

                    </div>
                </div>
                <div class="col-lg-6">

                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body p-lg-20 pb-lg-0">
            <div class="mb-17">
                <!--begin::Content-->
                <div class="d-flex flex-stack mb-5">
                    <!--begin::Title-->
                    <h3 class="text-dark">All Posts</h3>
                    <!--end::Title-->
                    <!--begin::Link-->
                    {{-- <a href="#" class="fs-6 fw-semibold link-primary">Last 30 posts</a> --}}
                    <p class="{{ getPlatformColorClass($page->platform, 'text')  }}  fw-bold fs-5">last 30 Posts</p>
                    <!--end::Link-->
                </div>
                <!--end::Content-->
                <!--begin::Separator-->
                <div class="separator separator-dashed mb-9"></div>
                <!--end::Separator-->
                <!--begin::Row-->
                <div class="row g-10">
                    @php
                        $postsCollection = $snapshots->firstWhere('name', 'posts');
                        $posts = $postsCollection->data ?? [];
                    @endphp
                    @forelse ($posts as $post)
                        <!--begin::Col-->
                        <div class="col-md-4 col-l-3">
                            <!--begin::Hot sales post-->
                            <div class="card-xl-stretch me-md-6">
                                <!--begin::Overlay-->
                               @if ($post->media_type === "IMAGE")
                               <a class="d-block overlay" data-fslightbox="lightbox-hot-sales"
                               href="{{ $post->media_url === '(no-media)' ? 'https://placehold.co/800?text=No+Photo&font=roboto' : $post->media_url }}">
                               <!--begin::Image-->
                               <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                   style="background-image:url('{{ $post->media_url === '(no-media)' ? 'https://placehold.co/800?text=No+Photo&font=roboto' : $post->media_url }}')">
                               </div>
                               <!--end::Image-->
                               <!--begin::Action-->
                               <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                   <i class="bi bi-eye-fill fs-2x text-white"></i>
                               </div>
                               <!--end::Action-->
                           </a>
                           @else
                           <a class="d-block overlay" data-fslightbox="lightbox-hot-sales"
                           href="{{ $post->thumbnail_url ?? 'https://placehold.co/800?text=No+Photo&font=roboto'  }}">
                           <!--begin::Image-->
                           <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                               style="background-image:url('{{ $post->thumbnail_url ?? 'https://placehold.co/800?text=No+Photo&font=roboto'  }}')">
                           </div>
                           <!--end::Image-->
                           <!--begin::Action-->
                           <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                               <i class="bi bi-eye-fill fs-2x text-white"></i>
                           </div>
                           <!--end::Action-->
                       </a>
                                   
                               @endif
                                <!--end::Overlay-->
                                <!--begin::Body-->
                                <div class="mt-5">
                                    <!--begin::Title-->
                                    {{-- <a href="#" class="fs-4 text-dark fw-bold text-hover-primary text-dark lh-base">{{substr($post->message, 0, 40)}}...</a> --}}
                                    <!--end::Title-->
                                    <!--begin::Text-->
                                    <div class="fw-semibold fs-6 text-gray-600  text-dark mt-3">
                                        {{ substr($post->caption, 0, 40) }}...</div>
                                    <!--end::Text-->
                                    <!--begin::Text-->
                                    <div class="fs-6 fw-bold mt-5 d-flex flex-stack">
                                        <!--begin::Label-->
                                        <span class="badge border border-dashed fs-5 fw-semibold text-gray-600  p-2">
                                            {{ $post->engagement_rate }}<span class="fs-6 fw-bold text-dark-400">% Eng
                                                Rate</span></span>
                                        <!--end::Label-->
                                        <!--begin::Action-->
                                        {{-- <a href="#" class="btn btn-sm btn-primary"></a> --}}
                                        <span class="badge border border-dashed fs-6 fw-semibold text-gray-600  p-2">
                                            {{ date_formatter($post->timestamp) }}</span>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Hot sales post-->
                        </div>
                    @empty
                    @endforelse
                </div>
                <!--end::Row-->
            </div>
        </div>
    </div>
   @push('script')
   <script>
    // Use the PHP data passed to JavaScript
    document.addEventListener("DOMContentLoaded", () => {
        // alert("sup");
        // Shared Colors Definition
        const primary = '#6993FF';
        const success = '#1BC5BD';
        const info = '#8950FC';
        const warning = '#FFA800';
        const danger = '#F64E60';

        const engagementData = @json($engagementData);

        // ApexCharts configuration
        const options = {
            chart: {
                type: 'area',
                height: 350
            },
            series: [{
                    name: 'Engagements',
                    data: engagementData.engagements
                },
                {
                    name: 'Impressions',
                    data: engagementData.impressions
                }
            ],
            xaxis: {
                type: 'datetime',
                categories: engagementData.categories, // Dates
                title: {
                    text: 'Dates'
                }
            },
            yaxis: {
                title: {
                    text: 'Counts'
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
            colors: [primary, success]
        };



        // Render the chart
        const chart = new ApexCharts(document.querySelector("#engagement-chart"), options);
        chart.render();
    });
</script>
   @endpush
</div>
