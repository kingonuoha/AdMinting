                <!-- Review Section - Start
        ================================================== -->
                <section class="review_section section_space_lg bg_light_3">
                    <div class="container">
                        <div class="section_heading text-center">
                            <h2 class="heading_subtitle">
                                <span class="double_icon">
                                    <i class="fas fa-sharp fa-square-full"></i>
                                    <i class="fas fa-sharp fa-square-full"></i>
                                </span>
                                <span>Client Says</span>
                            </h2>
                            <h3 class="heading_title mb-0">What People Says</h3>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col col-lg-7">
                                <div class="review_carousel_3 arrow_right_left">
                                    <div class="common_carousel_1col row" data-slick='{"dots": false}'>
                                        @foreach (get_guest_testimonials() as $testimonial)
                                       
                                        <div class="carousel_item col">
                                            <div class="review_item style_2 text-center">
                                                <h3 class="review_title">
                                                    Best Customer Support
                                                </h3>
                                                <ul class="rating_star unordered_list">
                                                    <li>
                                                        <i class="fas fa-star"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star"></i>
                                                    </li>
                                                </ul>
                                                <p class="review_content">
                                                   {{$testimonial['testimony']}}
                                                </p>
                                                <span class="quote_icon">
                                                    <img src="{{asset('guest/assets/images/icons/icon_quote_dark.svg')}}"
                                                        alt="Paradox Icon Quote" />
                                                </span>
                                                <div class="admin_item">
                                                    <div class="admin_thumbnail">
                                                        <img src="{{asset('guest/assets/images/meta/avatar_2.png')}}" alt="Admin Avatar" />
                                                    </div>
                                                    <div class="admin_info">
                                                        <h3 class="admin_name">
                                                            {{$testimonial['name']}}
                                                        </h3>
                                                        <span class="admin_designation">   {{$testimonial['role']}}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            
                                        @endforeach
                                        {{-- <div class="carousel_item col">
                                            <div class="review_item style_2 text-center">
                                                <h3 class="review_title">
                                                    Best Customer Support
                                                </h3>
                                                <ul class="rating_star unordered_list">
                                                    <li>
                                                        <i class="fas fa-star"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star"></i>
                                                    </li>
                                                </ul>
                                                <p class="review_content">
                                                    Customer feedback will help
                                                    you understand exactly how
                                                    your customers experience
                                                    your service or product and
                                                    fixing their concerns will
                                                    lead to an improved client
                                                    experience. Customer
                                                    satisfaction leads to
                                                    customer retention
                                                    Excellent.
                                                </p>
                                                <span class="quote_icon">
                                                    <img src="{{asset('guest/assets/images/icons/icon_quote_dark.svg')}}"
                                                        alt="Paradox Icon Quote" />
                                                </span>
                                                <div class="admin_item">
                                                    <div class="admin_thumbnail">
                                                        <img src="{{asset('guest/assets/images/meta/avatar_2.png')}}" alt="Admin Avatar" />
                                                    </div>
                                                    <div class="admin_info">
                                                        <h3 class="admin_name">
                                                            Manuel K. Peoples
                                                        </h3>
                                                        <span class="admin_designation">Director</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel_item col">
                                            <div class="review_item style_2 text-center">
                                                <h3 class="review_title">
                                                    Best Customer Support
                                                </h3>
                                                <ul class="rating_star unordered_list">
                                                    <li>
                                                        <i class="fas fa-star"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star"></i>
                                                    </li>
                                                </ul>
                                                <p class="review_content">
                                                    Customer feedback will help
                                                    you understand exactly how
                                                    your customers experience
                                                    your service or product and
                                                    fixing their concerns will
                                                    lead to an improved client
                                                    experience. Customer
                                                    satisfaction leads to
                                                    customer retention
                                                    Excellent.
                                                </p>
                                                <span class="quote_icon">
                                                    <img src="{{asset('guest/assets/images/icons/icon_quote_dark.svg')}}"
                                                        alt="Paradox Icon Quote" />
                                                </span>
                                                <div class="admin_item">
                                                    <div class="admin_thumbnail">
                                                        <img src="{{asset('guest/assets/images/meta/avatar_3.png')}}" alt="Admin Avatar" />
                                                    </div>
                                                    <div class="admin_info">
                                                        <h3 class="admin_name">
                                                            Manuel K. Peoples
                                                        </h3>
                                                        <span class="admin_designation">Director</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <ul class="carousel_arrow unordered_list_center">
                                        <li>
                                            <button type="button" class="cc1c_left_arrow">
                                                <i class="far fa-arrow-left"></i>
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" class="cc1c_right_arrow">
                                                <i class="far fa-arrow-right"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Review Section - End
================================================== -->
