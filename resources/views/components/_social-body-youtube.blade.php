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
                <p class="{{ getPlatformColorClass($page->platform, 'text')  }} fw-bold fs-5">last 90 Days</p>
                <!--end::Link-->
            </div>
            <!--end::Content-->

            <div class="row">
                <div class="col-lg-6">
                    <div id="engagement-chart">

                    </div>
                </div>
                <div class="col-lg-6">
                    <div id="engagement-chart2">

                    </div>

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
                    <p class="{{ getPlatformColorClass($page->platform, 'text')  }} fw-bold fs-5">last 30 Posts</p>
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
                                <a class="d-block overlay" data-fslightbox="lightbox-hot-sales"
                                    href="{{ $post->picture === '(no-media)' ? 'https://placehold.co/800?text=No+Photo&font=roboto' : $post->picture }}">
                                    <!--begin::Image-->
                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                        style="background-image:url('{{ $post->picture === '(no-media)' ? 'https://placehold.co/800?text=No+Photo&font=roboto' : $post->picture }}')">
                                    </div>
                                    <!--end::Image-->
                                    <!--begin::Action-->
                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                        <i class="bi bi-eye-fill fs-2x text-white"></i>
                                    </div>
                                    <!--end::Action-->
                                </a>
                                <!--end::Overlay-->
                                <!--begin::Body-->
                                <div class="mt-5">
                                    <!--begin::Title-->
                                    {{-- <a href="#" class="fs-4 text-dark fw-bold text-hover-primary text-dark lh-base">{{substr($post->title, 0, 40)}}...</a> --}}
                                    <!--end::Title-->
                                    <!--begin::Text-->
                                    <div class="fw-semibold fs-6 text-gray-600 text-dark mt-3">
                                        {{ substr($post->title, 0, 40) }}...</div>
                                    <!--end::Text-->
                                    <!--begin::Text-->
                                    <div class="fs-6 fw-bold mt-5 d-flex flex-stack">
                                        <!--begin::Label-->
                                        <span class="badge border border-dashed fs-5 fw-semibold text-gray-600 p-2">
                                            {{ $post->engagement_rate }}<span class="fs-6 fw-bold text-dark-400">% Eng
                                                Rate</span></span>
                                        <!--end::Label-->
                                        <!--begin::Action-->
                                        {{-- <a href="#" class="btn btn-sm btn-primary"></a> --}}
                                        <span class="badge border border-dashed fs-6 fw-semibold text-gray-600 p-2">
                                            {{ date_formatter($post->published_at) }}</span>
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
                // alert("hi bruh");
                // alert("sup");
                // Shared Colors Definition
                const primary = '#6993FF';
                const success = '#1BC5BD';
                const info = '#8950FC';
                const warning = '#FFA800';
                const danger = '#F64E60';

                // Gender Demographics Pie Chart
                var chartData = {!! json_encode($engagementData) !!};
                console.log(chartData);
                // Extract genderData
                var genderData = chartData.genderData;

                // Ensure genderData is properly formatted
                var genderLabels = genderData.gender; // Extract the 'gender' array
                var genderValues = genderData.percentage; // Extract the 'percentage' array

                // ApexCharts configuration
                const options1 = {
                    series: genderValues,
                    chart: {
                        width: 500,
                        type: 'pie',
                    },
                    labels: genderLabels,
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 200
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }],
                    colors: [primary, success, warning, danger, info]
                };



                // Render the chart
                const chart = new ApexCharts(document.querySelector("#engagement-chart"), options1);
                chart.render();



                var geoData = chartData.geoData;

                // Extract geographic data correctly
                var geoLabels = geoData.countries; // Array of country names
                var geoValues = geoData.views; // Array of view counts (or use impressions if needed)

                // Define colors dynamically for each bar
                const colors = [primary, success, warning, danger, info];
                const barColors = geoLabels.map((_, index) => colors[index % colors.length]);

                // ApexCharts configuration
                const options2 = {
                    chart: {
                        type: 'bar', // A bar chart for geographic data
                        height: 350
                    },
                    series: [{
                        name: 'Views', // Label for data series
                        data: geoValues.map((value, index) => ({
                            x: geoLabels[index], // Label for x-axis
                            y: value, // Value for y-axis
                            fillColor: barColors[index] // Individual bar color
                        }))
                    }],
                    xaxis: {
                        categories: geoLabels, // Countries as the x-axis categories
                        title: {
                            text: 'Countries'
                        }
                    },
                    yaxis: {
                        title: {
                            text: 'Views Count'
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return val.toLocaleString(); // Format tooltip value with commas
                            }
                        }
                    },
                    colors: barColors, // Adjust color as needed
                    legend: {
                        position: 'top',
                        horizontalAlign: 'center'
                    },
                };

                // Render the chart
                const chart2 = new ApexCharts(document.querySelector("#engagement-chart2"), options2);
                chart2.render();

            });
        </script>
    @endpush
</div>
