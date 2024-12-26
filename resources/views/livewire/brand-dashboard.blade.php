<div>
    @push('style')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.4/swiper-bundle.min.css"
            integrity="sha512-1CRCT9P70z3SktzqL7P8o8YvlmT1nXwFeXLBuVBa4mzQJ4fsvpmsObWooerRi4WzQT8QFrBVz/36mt/XGPYVzw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endpush
    {{-- Stop trying to control. --}}
    <x-engage-hero />

    <div class="row g-5 g-xl-8 mt-n30" >
        @foreach ($listing_summary as $summary)
            <x-stat-card :stat="$summary" style="z-index:20" />
        @endforeach


        <div class="row">
           <x-engage-search class="col-lg-7"/>
           <x-engage-join_premium class="col-lg-5"/>
            
        </div>

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Creators you might be intrested in</h2>
            </div>
            <div class="card-body">
                <div class="swiper">
                    <div class="row-notused swiper-wrapper">
                        @foreach ($featuredCreators as $creator)
                            <div class=" my-4 swiper-slide overlay">
                                <a href="{{ route('user.public_profile', "@".$creator->username ?? "rr") }}">
                                    <div class="overlay-wrapper h-300px w-100 bg-gray-200 rounded-lg rounded-bottom-0"
                                        style="background-repeat: no-repeat; background-size: cover; background-position: center center; background-image: url('{{ $creator->profile_photo_url }}')">
                                    </div>
                                </a>
                                <div class="bg-gray-200 rounded-lg rounded-top-0 h-100 px-5 pb-3 ">
                                    <div class="align-items-end justify-content-center">
                                        <div
                                            class="d-flex align-items-center flex-stack flex-wrap flex-row-fluid d-grid gap-2 bg-white-o-5 py-5">
                                            <a href="#" class="text-primary">Social</a>
                                            <a href="#"
                                                class=" font-weight-boldbtn-shadow ml-2">NGN{{ formatMoney($creator->advertiserInfos->max_price) }}</a>
                                        </div>
                                    </div>
                                    <p class="mt-2 text-grey">
                                        {{ substr($creator->advertiserInfos->bio, 0, 30) }}
                                    </p>
                                </div>
                                <div class="overlay-layer rounded ">
                                    @if (!empty($creator->primary_handle))
                                    <div class="position-absolute top-0 left-0 bg-info p-2 p-lg-4 rounded-start-0 rounded-bottom">
                                        <a href="" class="d-flex">
                                            <span class="symbol symbol-20">
                                                <img src="{{asset('users/assets/media/svg/brand-logos/'.$creator->primary_handle.'.svg')}}" alt="">
                                            </span>
                                            <div class="text-muted fw-bold ml-1">
                                                
                                                @switch($creator->primary_handle)
                                                @case('instagram')
                                                 {{ formatNumber($creator->social_instagram_followers) }}
                                                    @break
                                                @case('twitter')
                                                 {{ formatNumber($creator->social_twitter_followers) }}
                                                    @break
                                                @case('youtube')
                                                 {{ formatNumber($creator->social_youtube_followers) }}
                                                    @break
                                                @case('linkedin')
                                                 {{ formatNumber($creator->social_linkedin_followers) }}
                                                    @break
                                                @case('facebook')
                                                {{ formatNumber($creator->social_facebook_followers) }}
                                                    @break
                                                @default
                                                    NULL
                                            @endswitch
                                            
                                            </div>
                                        </a>
                                    </div>
                                    @endif
                                    <div class="m-auto d-flex justify-content-center flex-center flex-column ">
                                        <h3 class="fw-bold text-white">{{ $creator->name }}</h3>
                                        <a href="{{ route('user.public_profile', "@".$creator->username ?? "rr") }}" class="btn bg-radial-gradient-info"><i
                                                class="fab la-telegram"></i>Visit Profile</a>
                                    </div>
                                    
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
        @push('script')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.4/swiper-bundle.min.js"
                integrity="sha512-/LKHQ9K9yatyOfEKXiysc9SPCpF6xkvfHQxtPkhdKS83GvfyIWDwKaOr3/LqVxbEX89Bqz+SbMHEPWm0AeRWnA=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>

            <script>
                const swiper = new Swiper('.swiper', {
                    slidesPerView: 1.1,
                    spaceBetween: 10,
                    freeMode: true,
                    // Optional parameters
                    loop: true,
                    mousewheel: true,





                    // Responsive breakpoints
                    breakpoints: {
                        // when window width is >= 320px
                        480: {
                            // Navigation arrows
                            navigation: {
                                enabled: false
                            },
                        },
                        // when window width is >= 320px
                        780: {
                            slidesPerView: 2.5,
                            spaceBetween: 20,
                            // Navigation arrows
                            navigation: {
                                nextEl: '.swiper-button-next',
                                prevEl: '.swiper-button-prev',
                            },
                        },
                        // when window width is >= 480px
                        1200: {
                            slidesPerView: 3.5,
                            spaceBetween: 30,
                            // Navigation arrows
                            navigation: {
                                nextEl: '.swiper-button-next',
                                prevEl: '.swiper-button-prev',
                            },
                        },
                    }
                });
            </script>
        @endpush
    </div>
</div>
