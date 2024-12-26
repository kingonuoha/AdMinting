               <!-- Call to Action Section - Start
        ================================================== -->
        <section
        class="calltoaction_section style_4 section_space_lg bg_primary decoration_wrap"
    >
        <div class="container">
            <div class="row align-items-center">
                <div class="col col-lg-6 order-last">
                    <div class="cta_image">
                        <img
                            src="{{asset('guest/assets/images/calltoaction/cta_image_4.png')}}"
                            alt="{{ucwords(appSetting('app_name'))}} Call To Action Image"
                        />
                    </div>
                </div>
                <div class="col col-lg-6">
                    <div class="calltoaction_wrapper mb-4 mb-lg-0">
                        <div class="section_heading text-white">
                            <h2 class="heading_title mb-0">
                                Subscribe to {{ucwords(appSetting('app_name'))}} Newsletter
                            </h2>
                        </div>
                        <div
                            class="form-group m-0 subscribe_form is-cta"
                        >
                            <label
                                for="input_email_2"
                                class="form-label"
                            >
                                <i class="fas fa-envelope"></i>
                            </label>
                            <input
                                id="input_email_2"
                                class="form-control"
                                type="email"
                                name="email"
                                placeholder="Enter your Email Address"
                            />
                            <button
                                type="submit"
                                class="bd-btn-link btn_warning"
                            >
                                <span
                                    class="bd-button-content-wrapper"
                                >
                                    <span class="bd-button-icon">
                                        <i
                                            class="fa-light fa-arrow-right-long"
                                        ></i>
                                    </span>
                                    <span class="pd-animation-flip">
                                        <span
                                            class="bd-btn-anim-wrapp"
                                        >
                                            <span
                                                class="bd-button-text"
                                                >Subscribe Now</span
                                            >
                                            <span
                                                class="bd-button-text"
                                                >Subscribe Now</span
                                            >
                                        </span>
                                    </span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="deco_item shape_1">
            <img
                class="wow fadeInLeft"
                data-wow-delay=".2s"
                src="{{asset('guest/assets/images/shapes/shape_2.svg')}}"
                alt="{{ucwords(appSetting('app_name'))}} Illustration Image"
            />
        </div>
        <div class="deco_item shape_2">
            <img
                class="wow fadeInRight"
                data-wow-delay=".2s"
                src="{{asset('guest/assets/images/shapes/shape_3.svg')}}"
                alt="{{ucwords(appSetting('app_name'))}} Illustration Image"
            />
        </div>
    </section>
    <!-- Call to Action Section - End
================================================== -->
