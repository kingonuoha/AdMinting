<div>
    <div class="card mb-7">
        <div class="card-body">
            <div class="d-flex flex-fluid flex-stack">
                <div class="min-w-50 d-flex">
                    <input type="text" class="form-control form-control-solid"
                        placeholder="Enter Creator name to Filter">
                    <!--begin::Dropdown-->
                    <div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="Quick actions"
                        data-placement="left">
                        <a href="#" class="btn btn-light-primary btn-icon" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                          <span class="svg-icon svg-icon-2x svg-icon-primary">{!! getIcon('settings-1')!!}</span> 
                        </a>
                        <div class="min-w-300px dropdown-menu px-5 pb-5 m-0 dropdown-menu-md dropdown-menu-right">
                            <!--begin::Navigation-->
                            <ul class="navi navi-hover">
                                <li class="navi-header font-weight-bold py-4">
                                    <span class="font-size-lg">Filter:</span>
                                    <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip"
                                        data-placement="right" title="Click to learn more..."></i>
                                </li>
                                <li class="navi-separator mb-3 opacity-70"></li>
                            </ul>
                            <!--end::Navigation-->
                            <div class="my-2">
                                <label >Choose Category</label>
                                <input type="text" class="form-control form-control-solid">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label >Choose Category</label>
                                    <input type="text" class="form-control form-control-solid">
                                </div>
                                <div class="col">
                                    <label >Choose Category</label>
                                    <input type="text" class="form-control form-control-solid">
                                </div>
                            </div>
                            <div class="my-4 d-flex justify-content-end">
                                <div>
                                    <button class="btn-sm btn btn-light-primary">Apply</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Dropdown-->
                </div>
                <div>
                    <button class="btn btn-primary">Search</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        @foreach ($creators as $creator)
            <div class=" my-4 col-lg-3 overlay shadow">
                <a href="{{ route('user.profile.show', $creator->id) }}">
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
                                    <img src="{{ asset('users/assets/media/svg/brand-logos/' . $creator->primary_handle . '.svg') }}"
                                        alt="">
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
                        <a href="{{ route('user.profile.show', $creator->id) }}" class="btn bg-radial-gradient-info"><i
                                class="fab la-telegram"></i>Visit Profile</a>
                    </div>

                </div>
            </div>
        @endforeach
    </div>

</div>
