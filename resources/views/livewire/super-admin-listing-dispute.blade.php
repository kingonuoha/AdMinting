<div>
    <div class="separator separator-dashed"></div>
    <div class="border border-dashed border-warning bg-light-warning p-4 d-flex justify-items-start rounded-lg">
        <div class="svg svg-icon svg-icon-4x svg-icon-warning mx-2">
            {!! getIcon('settings-3') !!}
        </div>
        <div class="fw-bold d-flex flex-column">
            <div class="text-warning fs-1">This page is still Under construction</div>
            <div class="text-muted">Opps, this page is still under construction and although some functions works</div>
        </div>
    </div>

    <div class="row g-10 my-5">
        @forelse ($total_disputes as $dispute)
            <div class="col-lg-4 col-md-6 col-12 ">
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
                            <span class="symbol symbol-30 mr-3">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                {{-- {{dd($this->user->profile_photo_url)}} --}}
                                <img src="{{$dispute->user->profile_photo_url}}" alt="{{$dispute->user->name}}" />
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="">
                                        {{$dispute->user->name}}
    
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                            </span>
                            <h3 class="card-label">
                                {{$dispute->user->name}} <br>
                                <small>{{date_formatter($dispute->created_at)}}</small>
                            </h3>
                        </div>
                        <div class="card-toolbar">
                            <a target="_blank" href="{{ route('listing.dashboard', $dispute->listing->slug) }}"  data-toggle="tooltip" data-theme="dark" title="View Listing" class="btn btn-sm btn-icon btn-light-danger mr-2">
                                <i class="flaticon-paper-plane"></i>
                            </a>
                            <a target="_blank" href="{{ route('user', $dispute->listing->applicant->id) }}"  data-toggle="tooltip" data-theme="dark" title="Chat Applicant" class="btn btn-sm btn-icon btn-light-success mr-2">
                                <i class="flaticon-speech-bubble"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-icon btn-light-primary">
                                <i class="flaticon-attachment"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body max-h-150px scroll-y">
                     {{$dispute->description}}
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        @if ($dispute->status !== "settled")
                        <x-button loading="markSettled" wire:click="markSettled({{$dispute->id}})" class="btn btn-light-primary font-weight-bold">Mark Settled</x-button>
                        @else
                        <div class="bg-light-success text-success fw-bold rounded-lg py-3 px-5">{{$dispute->status}}</div>
                        @endif
                        {{-- <a href="#" class="btn btn-outline-secondary font-weight-bold">Learn more</a> --}}
                    </div>
                </div>
            </div>
        @empty
            
        @endforelse
    </div>
</div>
