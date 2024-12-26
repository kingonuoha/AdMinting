      <div {{ $attributes->merge(['class' => '']) }}>
          <!--begin::Engage Widget 15-->
          <div class="card card-custom ">
              <div class="card-body rounded p-0 d-flex bg-light">
                  <div
                      class="d-flex flex-column flex-lg-row-auto w-auto w-lg-350px w-xl-450px w-xxl-650px py-10 py-md-14 px-10 px-md-20 pr-lg-0">
                      <h1 class="font-weight-bolder text-dark mb-0">Search Creators</h1>
                      <div class="font-size-h4 mb-8">Find Amazing Creators</div>
                      <!--begin::Form-->
                      <form class="d-flex flex-center py-2 px-6 bg-white rounded ">
                          <span
                              class="svg-icon svg-icon-lg svg-icon-primary"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/Search.svg--><svg
                                  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                  width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                      <rect x="0" y="0" width="24" height="24"></rect>
                                      <path
                                          d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                          fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                      <path
                                          d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                          fill="#000000" fill-rule="nonzero"></path>
                                  </g>
                              </svg><!--end::Svg Icon--></span>
                          <input type="text"
                              class="form-control border-0 font-weight-bold pl-2"
                              placeholder="Search Creators of Intrest" readonly>

                      </form>
                      <!--end::Form-->
                        </div>
                  <div class="d-none d-md-flex flex-row-fluid bgi-no-repeat bgi-position-y-center bgi-position-x-left bgi-size-cover"
                      style="background-image: url(https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/illustrations/copy.svg);">
                  </div>
              </div>
          </div>
          <!--end::Engage Widget 15-->
          @push('script')
              <script>
                  var processs = function(search) {
                      var timeout = setTimeout(function() {
                          var number = KTUtil.getRandomInt(1, 6);

                          // Hide recently viewed
                          suggestionsElement.classList.add("d-none");

                          if (number === 3) {
                              // Hide results
                              resultsElement.classList.add("d-none");
                              // Show empty message
                              emptyElement.classList.remove("d-none");
                          } else {
                              // Show results
                              resultsElement.classList.remove("d-none");
                              // Hide empty message
                              emptyElement.classList.add("d-none");
                          }

                          // Complete search
                          search.complete();
                      }, 1500);
                  }

                  var clear = function(search) {
                      // Show recently viewed
                      suggestionsElement.classList.remove("d-none");
                      // Hide results
                      resultsElement.classList.add("d-none");
                      // Hide empty message
                      emptyElement.classList.add("d-none");
                  }

                  // Input handler
                  const handleInput = () => {
                      // Select input field
                      const inputField = element.querySelector("[data-kt-search-element="
                          input "]");

                      // Handle keyboard press event
                      inputField.addEventListener("keydown", e => {
                          // Only apply action to Enter key press
                          if (e.key === "Enter") {
                              e.preventDefault(); // Stop form from submitting
                          }
                      });
                  }

                  // Elements
                  element = document.querySelector('#kt_docs_search_handler_basic');

                  if (!element) {
                      return;
                  }

                  wrapperElement = element.querySelector("[data-kt-search-element="
                      wrapper "]");
                  suggestionsElement = element.querySelector("[data-kt-search-element="
                      suggestions "]");
                  resultsElement = element.querySelector("[data-kt-search-element="
                      results "]");
                  emptyElement = element.querySelector("[data-kt-search-element="
                      empty "]");

                  // Initialize search handler
                  searchObject = new KTSearch(element);

                  // Search handler
                  searchObject.on("kt.search.process", processs);

                  // Clear handler
                  searchObject.on("kt.search.clear", clear);

                  // Handle select
                  KTUtil.on(element, "[data-kt-search-element="
                      customer "]", "click",
                      function() {
                          //modal.hide();
                      });

                  // Handle input enter keypress
                  handleInput();
              </script>
          @endpush
      </div>
