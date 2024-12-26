<!-- About Section - Start
        ================================================== -->
<section class="about_section section_space_lg decoration_wrap bg_light_3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col col-lg-5 col-xl-6">
                <div class="about_image decoration_wrap mb-4 mb-lg-0 text-center">
                    <img class="wow fadeInLeft amin-up-down" data-wow-delay=".1s"
                        src="{{ asset('guest/assets/images/shapes/socials_with_lady.png') }}" alt="Paradox - About Image" />
                    <div class="deco_item shape_1">
                        <img class="wow zoomIn" data-wow-delay=".1s"
                            src="{{ asset('guest/assets/images/shapes/shape_circle_2.svg') }}"
                            alt="Paradox - Shape Image" />
                    </div>
                </div>
            </div>
            <div class="col col-lg-7 col-xl-6">
                <div class="about_content">
                    <div class="section_heading">
                        <h2 class="heading_subtitle">
                            <span class="double_icon">
                                <i class="fas fa-sharp fa-square-full"></i>
                                <i class="fas fa-sharp fa-square-full"></i>
                            </span>
                            <span>Why Chose Us</span>
                        </h2>
                        <h3 class="heading_title mb-0">
                            We are Moving to a Higher & Better
                            Stage.
                        </h3>
                    </div>
                    <div class="row mb-4">
                        @php
                            $iconOptions = ['icon_development.svg', 'icon_flexibility.svg', 'icon_design.svg', 'icon_maintenance.svg'];
                        @endphp
                        @foreach (get_guest_whyus() as $item)
                            @php
                                 // Randomly select an icon option
                                $randomIcon = $iconOptions[array_rand($iconOptions)];

                            // Assign the selected icon to the "icon" key in the item
                            $item['icon'] = $randomIcon;
                            @endphp
                            <div class="col col-lg-6 col-md-6">
                                <div
                                    class="iconbox_item policy_item icon_align_left p-0 rounded-0 border-0 bg-transparent">
                                    <div class="item_icon">
                                        <img src="{{ asset('guest/assets/images/icons/'.$item['icon']) }}"
                                            alt="Paradox Icon Eye White" />
                                    </div>
                                    <div class="item_content">
                                        <h3 class="item_title">
                                            {{ $item['title'] }}
                                        </h3>
                                        <p class="mb-0">
                                            {{ $item['description'] }}

                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{-- <div class="col col-lg-6 col-md-6">
                                <div
                                    class="iconbox_item policy_item icon_align_left p-0 rounded-0 border-0 bg-transparent"
                                >
                                    <div class="item_icon">
                                        <img
                                            src="{{asset('guest/assets/images/icons/icon_flexibility.svg')}}"
                                            alt="Paradox Icon Eye White"
                                        />
                                    </div>
                                    <div class="item_content">
                                        <h3 class="item_title">
                                            Full Flexibility
                                        </h3>
                                        <p class="mb-0">
                                            Multiple development
                                            tools help us create.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-lg-6 col-md-6">
                                <div
                                    class="iconbox_item policy_item icon_align_left p-0 rounded-0 border-0 bg-transparent"
                                >
                                    <div class="item_icon">
                                        <img
                                            src="{{asset('guest/assets/images/icons/icon_design.svg')}}"
                                            alt="Paradox Icon Eye White"
                                        />
                                    </div>
                                    <div class="item_content">
                                        <h3 class="item_title">
                                            Modern Design
                                        </h3>
                                        <p class="mb-0">
                                            Most modern approaches
                                            to any design.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-lg-6 col-md-6">
                                <div
                                    class="iconbox_item policy_item icon_align_left p-0 rounded-0 border-0 bg-transparent"
                                >
                                    <div class="item_icon">
                                        <img
                                            src="{{asset('guest/assets/images/icons/icon_maintenance.svg')}}"
                                            alt="Paradox Icon Eye White"
                                        />
                                    </div>
                                    <div class="item_content">
                                        <h3 class="item_title">
                                            Simple Maintenance
                                        </h3>
                                        <p class="mb-0">
                                            Multiple development
                                            tools help us create.
                                        </p>
                                    </div>
                                </div>
                            </div> --}}
                    </div>
                    <ul class="btns_group unordered_list">
                        <li>
                            <a href="{{route('login')}}" class="bd-btn-link btn_primary">
                                <span class="bd-button-content-wrapper">
                                    <span class="bd-button-icon">
                                        <i class="fa-light fa-arrow-right-long"></i>
                                    </span>
                                    <span class="pd-animation-flip">
                                        <span class="bd-btn-anim-wrapp">
                                            <span class="bd-button-text">Know More</span>
                                            <span class="bd-button-text">Know More</span>
                                        </span>
                                    </span>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a class="video_play_btn popup_video" href="https://www.youtube.com/watch?v=7e90gBu4pas"
                                data-cursor="-exclusion -lg" data-cursor-stick="#intro_vbtn">
                                <span id="intro_vbtn" class="icon_wrap">
                                    <i class="fas fa-play"></i>
                                </span>
                                <span class="btn_text"><small class="d-block">Watch Our</small>
                                    Video</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section - End
