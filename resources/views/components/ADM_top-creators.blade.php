
@php
     $popularListings = App\Models\Listing::getPopularListings(4) // Get the top 10 popular listings
@endphp
        <!-- Portfolio Section - Start
        ================================================== -->
        <section class="portfolio_section section_space_lg bg_primary">
            <div class="container">
              <div class="section_heading text-white text-center">
                <h2 class="heading_subtitle text-uppercase">
                  <span class="double_icon">
                    <i class="fas fa-sharp fa-square-full"></i>
                    <i class="fas fa-sharp fa-square-full"></i>
                  </span>
                  <span>Popular listings</span>
                </h2>
                <h3 class="heading_title mb-0">
                  Check out our most appied listing
                </h3>
              </div>
              <div class="portfolio_carousel">
                <div class="common_carousel_centered">
                    @foreach ($popularListings as $listing)
                        
                  <div class="carousel_item" style="width: 200px">
                    <div class="portfolio_item layout_fullimage">
                      <div class="item_image">
                        <a href="portfolio_details.html">
                          <img src="{{ asset(is_null($listing->user->brandInfos->banner_path) ? 'storage/brand_banner/' . 'default-1.jpg' : 'storage/' . $listing->user->brandInfos->banner_path) }}" alt="Paradox Portfolio Image">
                          {{-- <img src="{{asset('guest/assets/images/portfolio/portfolio_lfi_image_1.jpg')}}" alt="Paradox Portfolio Image"> --}}
                        </a>
                      </div>
                      <div class="item_content">
                        <ul class="category_list unordered_list">
                          <li><a href="#!">{{$listing->title}}</a></li>
                        </ul>
                        <h3 class="item_title mb-0">
                          <a href="portfolio_details.html">
                           {{(is_null($listing->useCase))? "no use case" : $listing->useCase->name}}
                          </a>
                        </h3>
                      </div>
                    </div>
                  </div>

                  @endforeach

                  {{-- <div class="carousel_item" style="width: 200px">
                    <div class="portfolio_item layout_fullimage">
                      <div class="item_image">
                        <a href="portfolio_details.html">
                          <img src="{{asset('guest/assets/images/portfolio/portfolio_lfi_image_2.jpg')}}" alt="Paradox Portfolio Image">
                        </a>
                      </div>
                      <div class="item_content">
                        <ul class="category_list unordered_list">
                          <li><a href="#!">UI/UX</a></li>
                        </ul>
                        <h3 class="item_title mb-0">
                          <a href="portfolio_details.html">
                            Street Art Map of the City
                          </a>
                        </h3>
                      </div>
                    </div>
                  </div>
                  <div class="carousel_item" style="width: 200px">
                    <div class="portfolio_item layout_fullimage">
                      <div class="item_image">
                        <a href="portfolio_details.html">
                          <img src="{{asset('guest/assets/images/portfolio/portfolio_lfi_image_3.jpg')}}" alt="Paradox Portfolio Image">
                        </a>
                      </div>
                      <div class="item_content">
                        <ul class="category_list unordered_list">
                          <li><a href="#!">Webpage</a></li>
                        </ul>
                        <h3 class="item_title mb-0">
                          <a href="portfolio_details.html">
                            Crafting Effective Landing Page
                          </a>
                        </h3>
                      </div>
                    </div>
                  </div>
                  <div class="carousel_item" style="width: 200px">
                    <div class="portfolio_item layout_fullimage">
                      <div class="item_image">
                        <a href="portfolio_details.html">
                          <img src="{{asset('guest/assets/images/portfolio/portfolio_lfi_image_4.jpg')}}" alt="Paradox Portfolio Image">
                        </a>
                      </div>
                      <div class="item_content">
                        <ul class="category_list unordered_list">
                          <li><a href="#!">Product</a></li>
                        </ul>
                        <h3 class="item_title mb-0">
                          <a href="portfolio_details.html">
                            3D Package Tracking Delivery
                          </a>
                        </h3>
                      </div>
                    </div>
                  </div> --}}
                </div>
              </div>
            </div>
          </section>
          <!-- Portfolio Section - End
          ================================================== -->