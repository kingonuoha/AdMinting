            <!-- Site Header - Start
      ================================================== -->
            <header class="site_header site_header_4 p-0 bg-transparent shadow-none">
                <div class="container">
                    <div class="content_box">
                        <div class="header_wrapper">
                            <div class="site_logo">
                                <a class="site_link" href="index.html">
                                    <img src="{{ asset('guest/assets/images/logo/site_logo_dark.svg') }}"
                                        alt="Site Logo - Paradox - Agency Template" />
                                </a>
                            </div>
                            <div class="mean__menu-wrapper d-none d-lg-block">
                                <div class="main-menu main-menu-4">
                                    <nav id="mobile-menu">
                                        <ul>
                                            @foreach (guest_nav_links() as $links)
                                                <li class="{{ is_array($links['url']) ? 'has-dropdown' : '' }}">
                                                    <a
                                                        href="{{ is_array($links['url']) ? '#' : $links['url'] }}">{{ $links['name'] }}</a>
                                                    @if (is_array($links['url']))
                                                        <ul class="submenu">
                                                            @foreach ($links['url'] as $link)
                                                                <li class="">
                                                                    <a
                                                                        href="{{ $link[1] }}">{{ $link[0] }}</a>
                                                                </li>
                                                            @endforeach


                                                        </ul>
                                                    @endif

                                                </li>
                                            @endforeach
                                            <li class="has-dropdown header_right">
                                                {{-- <div class="icon_wrap">
                                                    <img src="{{ asset('guest/assets/images/icons/icon_globe.svg') }}"
                                                        alt="Globe Icon" />
                                                </div> --}}
                                                <a href="#">Register</a>
                                                <ul class="submenu">
                                                    <li>
                                                        <a href="{{ route('register', ['type'=> 'brand']) }}">Register as a Brand</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('register') }}">Register as a Creator</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>

                                        
                                    </nav>
                                    <!-- for wp -->
                                    <div class="header__hamburger ml-50 d-none">
                                        <button type="button" class="hamburger-btn offcanvas-open-btn">
                                            <span>01</span>
                                            <span>01</span>
                                            <span>01</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="header_right">
                                
                                
                                <ul class="header_btns_group unordered_list_end d-none d-md-flex">
                                    {{-- <li>
                                        <div class="select_option m-0">
                                            <div class="icon_wrap">
                                                <img src="{{ asset('guest/assets/images/icons/icon_globe.svg') }}"
                                                    alt="Globe Icon" />
                                            </div>
                                            <select>
                                                <a href="#">Register</a>

                                                <option value="arabic">
                                                    Arabic
                                                </option>
                                                <option value="portuguese">
                                                    Portuguese
                                                </option>
                                                <option value="french">
                                                    French
                                                </option>
                                            </select>
                                        </div>
                                    </li> --}}
                                    <li>
                                        @guest
                                        <a href="{{ route('login') }}" class="bd-btn-link btn_dark">
                                            <span class="bd-button-content-wrapper">
                                                <span class="pd-animation-flip">
                                                    <span class="bd-btn-anim-wrapp">
                                                        <span class="bd-button-text">Login</span>
                                                        <span class="bd-button-text">Login</span>
                                                    </span>
                                                </span>
                                            </span>
                                        </a>
                                        @endguest
                                        @auth
                                        <a href="{{route('dashboard')}}" class="bd-btn-link btn_dark text-sm">
                                            {{auth()->user()->name}}

                                        </a>
                                        @endauth
                                    </li>
                                </ul>
                                <div class="offcanvas-toggle d-lg-none">
                                    <a class="bar-icon" href="javascript:void(0)">
                                        <span></span>
                                        <span>
                                            <small></small>
                                        </span>
                                        <span></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Site Header - End
================================================== -->
