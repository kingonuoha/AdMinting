<div>

   


    <div class="card card-custom gutter-b">
        <div class="card-body">
            <!--begin::Details-->
            <div class="d-flex mb-9">
                <!--begin: Pic-->
                <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                    <div class="symbol symbol-50 symbol-lg-120">
                        <img src="{{ asset('storage/' . $listing->user->brandInfos->logo_path) }}" alt="image">
                    </div>
    
                    <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
                        <span class="font-size-h3 symbol-label font-weight-boldest">JM</span>
                    </div>
                </div>
                <!--end::Pic-->
    
                <!--begin::Info-->
                <div class="flex-grow-1">
                    <!--begin::Title-->
                    <div class="d-flex justify-content-between flex-wrap mt-1">
                        <div class="d-flex mr-3">
                            <a href="#" class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3">{{$listing->title}}</a>
                            <a href="#"><i class="flaticon2-correct text-success font-size-h5"></i></a>
                        </div>
    
                        <div class="my-lg-0 my-3">
                             <!--begin::Actions-->
                        <div class="d-flex mb-4">
                            @if (auth()->user()->id != $applicant->id)
                                {{-- if not marked as completed by brand and auth user is creator --}}
                                @if (is_null($listing->completed_on) && is_null($listing->creator_marked_complete_on))
                                    {{-- if not marked as completed by creator and auth user is creator --}}
                                    <x-button loading="markAsCompleted" wire:click.prevent="markAsCompleted" href="#"
                                        class="btn btn-sm bg-light-success text-success text-success btn-active-color-primary me-3">
                                        <span>
                                            {!! getIcon('lock-shield') !!}
                                        </span>Mark As Completed</x-button>
                                @elseif (is_null($listing->completed_on))
                                    <x-button loading="markAsCompleted" wire:click.prevent="markAsCompleted" href="#"
                                        class="btn btn-sm btn-bg-light btn-active-color text-success-primary me-3" disabled>
                                        <span>
                                            {!! getIcon('lock-shield') !!}
                                        </span>Awaiting Brand Response..</x-button>
                                @else
                                    <span class="badge badge-light-success mx-2">Completed</span>
                                @endif
                            @else
                                @if (auth()->user()->id == $brand->id)
                                    {{-- if not marked as completed by brand and auth user is Brand --}}
                                    @if (is_null($listing->completed_on) && !is_null($listing->creator_marked_complete_on))
                                        {{-- if not marked as completed by creator and auth user is Brand --}}
                                        <x-button loading="markAsCompleted" wire:click.prevent="markAsCompleted"
                                            href="#"
                                            class="btn btn-sm bg-light-success text-success text-success btn-active-color-primary me-3">
                                            <span>
                                                {!! getIcon('lock-shield') !!}
                                            </span>Confirm Completion</x-button>
                                    @elseif (is_null($listing->completed_on))
                                        {{-- if not marked as completed by creator and auth user is Brand --}}
                                        <x-button loading="markAsCompleted" wire:click.prevent="markAsCompleted"
                                            href="#"
                                            class="btn btn-sm bg-light-success text-success btn-active-color-primary me-3">
                                            <span>
                                                {!! getIcon('lock-shield') !!}
                                            </span>Mark As Completed</x-button>
                                    @else
                                        <span class="badge badge-light-success mx-2">Completed</span>
                                    @endif
                                @else
                                    @if (auth()->user()->role == 'adm_admin' && is_null($listing->completed_on))
                                        {{-- if not marked as completed by brand and auth user is Admin --}}
                                        <x-button loading="markAsCompleted" wire:click.prevent="markAsCompleted"
                                            href="#"
                                            class="btn btn-sm bg-light-success text-success text-success btn-active-color-primary me-3">
                                            <span>
                                                {!! getIcon('lock-shield') !!}
                                            </span>Mark As Completed</x-button>
                                    @else
                                        <span class="badge badge-light-success mx-2">Completed</span>
                                    @endif
    
                                @endif
                                {{-- <a wire:click.prevent="markAsCompleted" href="#" class="btn btn-sm bg-light-success btn-active-color-primary me-3 text-success">
                               <span>
                               {!! getIcon('check-square') !!}
                               </span> Mark as Completed</a> --}}
                            @endif
                        </div>
                        <!--end::Actions-->
                        </div>
                    </div>
                    <!--end::Title-->
    
                    <!--begin::Content-->
                    <div class="d-flex flex-wrap justify-content-between mt-1">
                        <div class="d-flex flex-column flex-grow-1 pr-8">
                            <div class="d-flex flex-wrap mb-4">
                                <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2"><i class="flaticon2-new-email mr-2 font-size-lg"></i>{{$listing->user->email}}</a>
                                <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2"><i class="flaticon2-calendar-3 mr-2 font-size-lg"></i>{{$listing->user->brandInfos->brand_name}} </a>
                                @php
                                    use Carbon\Carbon;

                                    $date = Carbon::parse($listing->due_date);
                                    $diffInDays = Carbon::now()->diffInDays($date);
                                    
                                @endphp
                                <a href="#" class="text-dark-50 text-hover-primary font-weight-bold"><i class="flaticon2-placeholder mr-2 font-size-lg"></i>Due in {{($diffInDays)}} Day(s) </a>
                            </div>

                      
                            <span class="fs-5 font-weight-bold  text-dark-50 ">Listing Workflow ({{$listing->useCase->name}})</span>
                            <span class="font-weight-bold text-dark-50 max-w-500px">{{$listing->useCase->description}}</span>
                        </div>
    
                        <div class="d-flex align-items-center w-25 flex-fill float-right mt-lg-12 mt-8">
                            <span class="font-weight-bold text-dark-75">Progress</span>
                            <div class="progress progress-xs mx-3 w-100">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 63%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="font-weight-bolder text-dark">78%</span>
                        </div>
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Info-->
            </div>
            <!--end::Details-->
    
            <div class="separator separator-solid"></div>
    
            <!--begin::Items-->
            <div class="d-flex align-items-center flex-wrap mt-8">
                <!--begin::Item-->
                <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                    <span class="mr-4">
                        <i class="flaticon-piggy-bank display-4 text-muted font-weight-bold"></i>
                    </span>
                    <div class="d-flex flex-column text-dark-75">
                        <span class="font-weight-bolder font-size-sm">Earning</span>
                        <span class="font-weight-bolder font-size-h5"><span class="text-dark-50 font-weight-bold">NGN</span>{{formatMoney($listing->price)}}</span>
                    </div>
                </div>
                <!--end::Item-->
    
                <!--begin::Item-->
                <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                    <span class="mr-4">
                        <i class="flaticon-confetti display-4 text-muted font-weight-bold"></i>
                    </span>
                    <div class="d-flex flex-column text-dark-75">
                        <span class="font-weight-bolder font-size-sm">Total Duration</span>
                        <span class="font-weight-bolder font-size-h5">{{$listing->no_of_days}}</span>
                    </div>
                </div>
                <!--end::Item-->
    
                <!--begin::Item-->
                <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                    <span class="mr-4">
                        <i class="flaticon-pie-chart display-4 text-muted font-weight-bold"></i>
                    </span>
                    <div class="d-flex flex-column text-dark-75">
                        <span class="font-weight-bolder font-size-sm">Onboarded Date</span>
                        <span class="font-weight-bolder font-size-h5">{{time_Ago($listing->onboarded_on)}}</span>
                    </div>
                </div>
                <!--end::Item-->
    
                <!--begin::Item-->
                <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                    <span class="mr-4">
                        <i class="flaticon-file-2 display-4 text-muted font-weight-bold"></i>
                    </span>
                    <div class="d-flex flex-column flex-lg-fill">
                        <span class="text-dark-75 font-weight-bolder font-size-sm">Required Socials</span>
                        <a href="#" class="text-primary font-weight-bolder">
                            @if (!is_null($listing->required_social))
                                @foreach ($listing->required_social as $social)
                                    {{$social}},
                                @endforeach
                                @else
                                - -
                            @endif
                        </a>
                    </div>
                </div>
                <!--end::Item-->
    
                <!--begin::Item-->
                <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                    <span class="mr-4">
                        <i class="flaticon-chat-1 display-4 text-muted font-weight-bold"></i>
                    </span>
                    <div class="d-flex flex-column">
                        <span class="text-dark-75 font-weight-bolder font-size-sm">Region</span>
                        <a href="#" class="text-primary font-weight-bolder">{{$listing->location}}</a>
                    </div>
                </div>
                <!--end::Item-->
    
                <!--begin::Item-->
                <div class="d-flex align-items-center flex-lg-fill mb-2 float-left">
                    <span class="mr-4">
                        <i class="flaticon-network display-4 text-muted font-weight-bold"></i>
                    </span>
                    <!--begin::Users-->
                    <div class="symbol-group symbol-hover mb-3">
                        <!--begin::User-->
                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                            title="{{ $applicant->name }}">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                {{-- {{dd($this->user->profile_photo_url)}} --}}
                                <img src="{{ $applicant->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            @else
                                <span
                                    class="symbol-label bg-warning text-inverse-warning fw-bold">{{ strtoupper(substr($applicant->name, 0, 1)) }}</span>
                            @endif
                        </div>
                        <!--begin::All users-->
                        <a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_view_users">
                            <span class="symbol-label bg-dark text-inverse-dark fs-8 fw-bold" data-bs-toggle="tooltip"
                                data-bs-trigger="hover" title="View more users">+0</span>
                        </a>
                        <!--end::All users-->
                    </div>
                    <!--end::Users-->
                </div>
                <!--end::Item-->
            </div>
            <!--begin::Items-->

            <div class="separator"></div>
            <!--begin::Nav-->
            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                <!--begin::Nav item-->
    
                @foreach ((new \App\Http\Livewire\SideBar())->links() as $item)
                    @foreach ($item['category'] as $key => $links)
                        @foreach ($links as $link)
                                @if ($key == '__ListingManagement')
                                    <li class="nav-item mt-2">
                                        <a class="nav-link text-active-primary ms-0 me-10 py-5"
                                            href="{{ $link['url'] }}">{{ $link['title'] }}</a>
                                    </li>
                                @endif
                        @endforeach
                    @endforeach
                @endforeach
                <!--end::Nav item-->
    
            </ul>
            <!--end::Nav-->
        </div>
    </div>

</div>