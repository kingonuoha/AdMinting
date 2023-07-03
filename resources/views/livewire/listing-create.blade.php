 {{-- Begin Main Content --}}
 <div>
        <div class="card my-3">
            <!--begin::Card body-->
            <div class="card-body p-0">
                <!--begin::Wrapper-->
                <div class="card-px text-center py-20 my-10">
                    <!--begin::Title-->
                    <h2 class="fs-2x fw-bold mb-10">Welcome to New Job Listings Page</h2>
                    <!--end::Title-->
                    <span class="p-2 bg-light-success btn mb-3">You have a Total of <span class="fw-semibold">({{$listings->count()}})</span> Job Listings</span>
                    <!--begin::Description-->
                    @if ($listings->count() > 0)
                        
                    <p class="text-gray-400 fs-4 fw-semibold mb-10">You currently have ({{$listings->count()}}) job listings created. Keep track of your listings for better management</p>
                    <!--end::Description-->
                    @else
                    <p class="text-gray-400 fs-4 fw-semibold mb-10">There are no Jobs added yet.
                    <br>Kickstart your CRM by adding a your first Job Listings.</p>
                    <!--end::Description-->
                        
                    @endif
                    <!--begin::Action-->
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adm_modal_create_job">Create Job Listing</a>
                    <!--end::Action-->
                </div>
            <!--end::Wrapper-->
                <!--begin::Illustration-->
                <div class="text-center px-4">
                    <img class="mw-100 mh-300px" alt="" src="{{asset('users/assets/media/illustrations/sketchy-1/2.png')}}">
                </div>
                <!--end::Illustration-->
            </div>
            <!--end::Card body-->
        </div> 
   
        {{-- Begin Listing --}}
        
        {{-- End Listing --}}

    <div class="modal fade" id="adm_modal_create_job" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Form-->
                <form class="form" method="post" action="{{route('listing.store')}}" id="adm_modal_create_job_form">
                    @csrf
                    <!--begin::Modal header-->
                    <div class="modal-header" id="adm_modal_create_job_header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bold">Create New Job Listing</h2>
                        @if($errors->any())
                        <p class="text-danger fs-bold">An error occured!</p>
                        @endif
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div id="adm_modal_create_job_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body py-10 px-lg-17">
                        <!--begin::Scroll-->
                        <div class="scroll-y me-n7 pe-7" id="adm_modal_create_job_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#adm_modal_create_job_header" data-kt-scroll-wrappers="#adm_modal_create_job_scroll" data-kt-scroll-offset="300px">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-semibold mb-2">Job Title</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder="" name="title"  />
                                <span class="text-danger error-text title_error"></span>

                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="form-label">Location<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Enter Job Location"></i></h2></label>
                                <select class="form-select" name="location" placeholder="Enter Location (eg. Remote Lagos)" >
                                    <option value="">CHOOSE Location</option>
                                    @foreach ( DB::table('states')->get() as $state)
                                    <option value="{{$state->state}}">{{$state->state}}</option>
                                        
                                    @endforeach
                                </select>
                                <!--begin::Label-->
                                
                                <span class="text-danger error-text location_error"></span>

                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-15">
                                <!--begin::Label-->
                                <label class="fs-6 fw-semibold mb-2">Description</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <textarea type="text" class="form-control form-control-solid" placeholder="Job Listing Content"  name="description"> </textarea>
                                <span class="text-danger error-text description_error"></span>

                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Billing toggle-->
                            <div class="fw-bold fs-3 rotate collapsible mb-7" data-bs-toggle="collapse" href="#adm_modal_create_job_billing_info" role="button" aria-expanded="false" aria-controls="kt_customer_view_details">Extras 
                            <span class="ms-2 rotate-180">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span></div>
                            <!--end::Billing toggle-->
                            <!--begin::Billing form-->
                            <div id="adm_modal_create_job_billing_info" class="collapse show">
                                <!--begin::Input group-->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-7">
                                            <label for="customRange1" class="form-label">Select Price Tag</label>
                                            <input type="range" class="form-range"  wire:model="amount"  id="priceTag" min="20" max="400" onchange="priceTagChanged(this)"/>
                                            <span class="text-muted fs-7" id="priceTagLabel">$-{{$amount}}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="d-flex flex-column mb-7 fv-row">
                                            <label class="fs-6 fw-semibold mb-2">Highlist this Post (extra ${{$highlighting_price}})</label>
                                            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6 active" data-kt-button="true">
                                                <!--begin::Radio-->
                                                <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                    <input class="form-check-input" wire:model="allow_highlight" type="checkbox" id="highlited"  name="highlighted" >
                                                </span>
                                                <!--end::Radio-->
                                                <!--begin::Info-->
                                                <span class="ms-5">
                                                    <span class="fs-4 fw-bold text-gray-800 d-block">Highlight Job Listing (+${{$highlighting_price}})</span>
                                                </span>
                                                <!--end::Info-->
                                            </label>
                                            <span class="text-danger error-text highlighted_error"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Input group-->
                                
                                 <!--begin::Input group-->
                            <div class="fv-row mb-15">
                                <!--begin::Label-->
                                <label class="fs-6 fw-semibold mb-2">Job Category</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div wire:ignore>
                                    <input  class="form-control form-control-solid" name="category" id="category_tagify_listing"/>
                                </div>
                                <span class="text-danger error-text category_error"></span>

                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                                 <!--begin::Input group-->
                           <!--begin::Input wrapper-->
                            {{-- <div class="d-flex flex-column mb-8 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Price Budjet</span>

                                    <span class="ms-1" data-bs-toggle="tooltip" title="Select an option.">
                                        <i class="ki-duotone ki-information text-gray-500 fs-7"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                    </span>
                                </label>
                                <!--end::Label-->

                                <!--begin::Buttons-->
                                <div class="d-flex flex-stack gap-5 mb-3">
                                    <button type="button" class="btn btn-light-primary w-100" data-kt-docs-advanced-forms="interactive">10</button>
                                    <button type="button" class="btn btn-light-primary w-100" data-kt-docs-advanced-forms="interactive">50</button>
                                    <button type="button" class="btn btn-light-primary w-100" data-kt-docs-advanced-forms="interactive">100</button>
                                </div>
                                <!--begin::Buttons-->

                                <input type="text" class="form-control form-control-solid" placeholder="Enter Amount" name="price" />
                                <p class="text-muted">Enter Budjeted amount for this Job Listing</p>
                                <span class="text-danger error-text price_error"></span>
                            </div> --}}
                            <!--end::Input wrapper-->
                            <!--end::Input group-->
                                
                            </div>
                            <!--end::Billing form-->
                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Modal body-->
                    <!--begin::Modal footer-->
                    <div class="modal-footer flex-center">
                        <!--begin::Button-->
                        <button type="reset" id="adm_modal_create_job_cancel" class="btn btn-light me-3">Discard</button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="adm_modal_create_job_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait... 
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                    <!--end::Modal footer-->
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
</div>

@push('script')
<script src="https://js.paystack.co/v1/inline.js"></script> 
<script>
    let amount_js = 20;
    function priceTagChanged(input){
        $('#priceTagLabel').text(input.value)
        amount_js = parseInt(input.value)
        // console.log(typeof amount_js);
    //    @set($amount, input.value)
   }
//    handle highlighting
// Livewire.hook('afterDOMUpdate', () => {
    
// });
    $(document).ready(()=>{
         // Handle Price Tag Changes
        // tagify 
        let categories = @js($category);
        var category_input = document.querySelector("#category_tagify_listing");
		//tagify
		// The DOM elements you wish to replace with Tagify
		new Tagify(category_input, {
			whitelist: categories.category_name,
			maxTags: 4,
            // enforceWhitelist: true,
            originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(','),
			dropdown: {
				maxItems: 20,           // <- mixumum allowed rendered suggestions
				classname: "tagify__inline__suggestions", // <- custom classname for this dropdown, so it could be targeted
				enabled: 0,             // <- show suggestions on focus
				closeOnSelect: false    // <- do not hide the suggestions dropdown once an item has been selected
			}
		}).on('invalid', onInvalidTag)

        function onInvalidTag(e){
            
            toastr.options = {
                    "closeButton": true,
                    "debug": true,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toastr-top-right",
                    "preventDuplicates": false,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    };
            
            toastr.warning(e.detail.message, "Warning!");
        }

       
        const paymentForm = document.getElementById('adm_modal_create_job_form');
        var payment_ref = "";  //= 'ee';
        paymentForm.addEventListener("submit", payWithPaystack, false);
        function payWithPaystack(e) {
           
            e.preventDefault();
             // handle Highlighting
             const checkbox = document.querySelector('input#highlited[type="checkbox"]');
    
            if (checkbox.checked) {
                // Livewire.emit('addCount');
                @this.set('amount', @js($amount) + parseInt(@json($highlighting_price)));
                amount_js = amount_js + parseInt(@json($highlighting_price));
                // console.log(typeof  amount_js);
                // console.log(typeof  parseInt(@json($highlighting_price)));

                console.log(amount_js);
            }
            $("#adm_modal_create_job_submit span.indicator-label").hide()
            $("#adm_modal_create_job_submit span.indicator-progress").show()
            $("#adm_modal_create_job_submit").attr('disabled', true);
            if (payment_ref == "") {
                let handler = PaystackPop.setup({
                    key: @js(env('PAYSTACK_KEY')), // Replace with your public key
                    email: @js(auth()->user()->email),
                    amount: amount_js * 100,
                    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                    // label: "Optional string that replaces customer email"
                    onClose: function(){
                    //   alert('Window closed.');
                    //   TostR alert
                    toastR("Window was closed!", 'error');
                    //   End Toast r alert
                    },
                    callback: function(response){
                        let message = 'Payment complete! Reference: ' + response.reference;
                    //   TostR alert
                    toastR(message, 'success');
                    //   End Toast r alert
                    console.log(response);
                    // calling a function
                    payment_ref = response.reference;

                    formSumbit(response.reference)
                    }
                });

               handler.openIframe();
            }else{
                formSumbit(payment_ref)
            }
            }


     function formSumbit(reference){
        var formdata =  new FormData(paymentForm);
                formdata.append('payment_ref', reference)
                    // setting the reference code in the livewire instance fo non repeated payments 
                @this.set('payment_ref', reference);

               
                // Submit form Via Ajax Request
                $.ajax({
                    url: $(paymentForm).attr('action'),
                    method: $(paymentForm).attr('method'),

                    data:formdata,
                    processData:false,
                    dataType:'json',
                    contentType:false,
                    beforeSend:function(){
                        $(paymentForm).find('span.error-text').text('');
                    },
                    success:function(response){

                        $("#adm_modal_create_job_submit span.indicator-label").show()
                        $("#adm_modal_create_job_submit span.indicator-progress").hide()
                        $("#adm_modal_create_job_submit").attr('disabled', false);
                        console.log(response);

                        if (response.code == 1) {
                            $(paymentForm)[0].reset();
                            //set all values to null or zero
                            @this.set('payment_ref', '');
                            amount_js = 20;
                            payment_ref = ''
                           
                            console.log(response);
                            success_alert( response.message)
                            // $('div.image_holder').html('')
                        }else{
                        console.log(response);
                            success_alert( response.message)

                        }
                        },
                    error:function(response){
                        console.log(response);

                        $("#adm_modal_create_job_submit span.indicator-label").show()
                        $("#adm_modal_create_job_submit span.indicator-progress").hide()
                        $("#adm_modal_create_job_submit").attr('disabled', false);
                        console.log(response);
                        let error = response.responseJSON.message || response.responseText;
                        error_alert("An Error Occured, pls make sure all fields are filled appropriately  ERROR:"+error);
                        $.each(response.responseJSON.errors, function(prefix, val){
                            $(paymentForm).find('span.'+prefix+'_error').text(val[0]);
                        })
                   
                }
                });
     }
    })
</script>
    
@endpush
{{-- End Main Content --}}