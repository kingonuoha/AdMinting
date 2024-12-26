                <!-- Service Section - Start
        ================================================== -->
                <section class="service_section section_space_lg">
                    <div class="container">
                        <div class="section_heading text-center">
                            <h2 class="heading_subtitle">
                                <span class="double_icon">
                                    <i class="fas fa-sharp fa-square-full"></i>
                                    <i class="fas fa-sharp fa-square-full"></i>
                                </span>
                                <span>What we Do</span>
                            </h2>
                            <h3 class="heading_title mb-0">
                                Offering latest services
                            </h3>
                        </div>

                        <div class="services_carousel">
                            <div class="row common_carousel_3col" data-slick='{"arrows": false, "autoplay:": false}'>
                                @foreach (get_guest_services() as $service)
                                    <div class="col carousel_item">
                                        <div class="service_item style_3">
                                            <div class="item_icon">
                                                {!! getIcon($service['icon']) !!}
                                            </div>
                                            <div class="item_content">
                                                <h3 class="item_title">
                                                    {{ $service['title'] }}
                                                </h3>
                                                <p class="item_description">
                                                    {{ $service['description'] }}
                                                </p>
                                            </div>
                                            <a class="btn-link" href="service_details.html">
                                                <span class="btn_text">View Details</span>
                                                <span class="btn_icon">
                                                    <img src="{{ asset('guest/assets/images/icons/icon_arrow_down_right_dark.svg') }}"
                                                        alt="Paradox icons" />
                                                    <img src="{{ asset('guest/assets/images/icons/icon_arrow_down_right_primary.svg') }}"
                                                        alt="Paradox icons" />
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </section>
                <!-- Service Section - End
