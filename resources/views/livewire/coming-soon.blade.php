<div>
     <!-- Comming Soon Section - Start
            ================================================== -->
            <section class="comming_soon_section decoration_wrap mouse_move">
                <div class="container">
                    <div class="site_logo">
                        <a class="site_link" href="index.html">
                            <img src="{{ asset('guest/assets/images/logo/site_logo_dark.svg') }}"
                                alt="Site Logo - Paradox - Agency Template">
                        </a>
                    </div>
                    <ul class="countdown_timer unordered_list_center" data-countdown="2023/10/7"></ul>
                    <h1 class="title_text">We're Coming! Stay with us</h1>
                    <form wire:submit.prevent="addToNewsLetter()">
                    <div class="form-group mb-0 subscribe_form">
                        <label for="input_email" class="form-label">
                            <i class="fas fa-envelope"></i>
                        </label>
                        <input id="input_email" class="form-control" type="email" wire:model="email" placeholder="Your Address">
                        <button type="submit" class="bd-btn-link btn_warning">
                            <span class="bd-button-content-wrapper">
                                <span class="bd-button-icon">
                                    <i class="fa-light fa-arrow-right-long"></i>
                                </span>
                                <span class="pd-animation-flip">
                                    <span class="bd-btn-anim-wrapp">
                                        <span class="bd-button-text">Subscribe Now</span>
                                        <span class="bd-button-text">Subscribe Now</span>
                                    </span>
                                </span>
                            </span>
                        </button>
                    </div>
                    @error('email')
                    <span class="text-red my-2">{{$message}}</span>
                    @enderror
                </form>
                </div>
        
                <div class="deco_item shape_1 wow fadeInDown" data-wow-delay=".1s">
                    <img class="layer" src="{{ asset('guest/assets/images/shapes/shape_circle_dashed_2.png') }}"
                        alt="Paradox - Shape Image">
                </div>
                <div class="deco_item shape_2 wow fadeInUp" data-wow-delay=".1s">
                    <img class="layer" src="{{ asset('guest/assets/images/shapes/shape_circle_1.svg') }}" data-depth="0.2"
                        alt="Paradox - Shape Image">
                </div>
                <div class="deco_item shape_3 wow fadeInRight" data-wow-delay=".1s">
                    <img class="layer" src="{{ asset('guest/assets/images/shapes/shape_1.svg') }}" data-depth="0.2"
                        alt="Paradox - Shape Image">
                </div>
                <div class="deco_item shape_4 wow fadeInUp" data-wow-delay=".1s">
                    <img class="layer" src="{{ asset('guest/assets/images/shapes/shape_circle_half_1.svg') }}" data-depth="0.2"
                        alt="Paradox - Shape Image">
                </div>
                <div class="deco_item shape_5 wow zoomIn" data-wow-delay=".1s">
                    <img src="{{ asset('guest/assets/images/shapes/shape_circle_2.svg') }}" alt="Paradox - Shape Image">
                </div>
            </section>
            <!-- Comming Soon Section - End
                    ================================================== -->
</div>

@push('script')
    <script>
        window.addEventListener('addedToNewsLetter', function(e){
            alert('Added To news letter')
        })
    </script>
@endpush