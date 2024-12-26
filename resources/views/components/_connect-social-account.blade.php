<div>
     <!--begin::Card body-->
 <div class="card-body border-top p-9">
    <!--begin::Notice-->
    <div
        class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
        <!--begin::Icon-->
        <!--begin::Svg Icon | path: icons/duotune/art/art006.svg-->
        <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
            <svg width="24" height="24" viewBox="0 0 24 24"
                fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.3"
                    d="M22 19V17C22 16.4 21.6 16 21 16H8V3C8 2.4 7.6 2 7 2H5C4.4 2 4 2.4 4 3V19C4 19.6 4.4 20 5 20H21C21.6 20 22 19.6 22 19Z"
                    fill="currentColor"></path>
                <path
                    d="M20 5V21C20 21.6 19.6 22 19 22H17C16.4 22 16 21.6 16 21V8H8V4H19C19.6 4 20 4.4 20 5ZM3 8H4V4H3C2.4 4 2 4.4 2 5V7C2 7.6 2.4 8 3 8Z"
                    fill="currentColor"></path>
            </svg>
        </span>
        <!--end::Svg Icon-->
        <!--end::Icon-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-stack flex-grow-1">
            <!--begin::Content-->
            <div class="fw-semibold">
                <div class="fs-6 text-gray-700">Connect accounts to your page to gain more credibility when applying for listings
                    <a href="#" class="fw-bold">Learn More</a>
                </div>
            </div>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Notice-->
    <!--begin::Items-->
    <div class="py-2" wire:poll.10s>
        <!--begin::Item-->
       @forelse ($socials as $social)
       <div class="d-flex flex-stack">
        <div class="d-flex">
            <img src="{{$social["logo"]}}"
                class="w-30px me-6" alt="">
            <div class="d-flex flex-column">
                <a href="#" target="_blank"
                    class="fs-5 text-dark text-hover-primary fw-bold">{{$social["name"]}}</a>
                <div class="fs-6 fw-semibold text-gray-400">{{$social["desc"]}}</div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
           {{-- if an account has been conected on this social --}}
            @if (count($userSocialAccounts->where("platform", strtolower($social["name"]))) > 0)
                <x-button type="button" wire:click="openConectedAccountModal('{{strtolower($social['name'])}}')" loading="openConectedAccountModal"  class="mr-2 btn btn-sm btn-outline btn-outline-dashed btn-outline-success btn-active-light-info">
                    {{count($userSocialAccounts->where("platform", strtolower($social["name"])))}} Connected!
                </x-button>
            @endif
            <a href="{{$social['redirect_url']}}"
                class="btn btn-sm btn-outline btn-outline-dashed btn-outline-info btn-active-light-info">
                Connect
            </a>

        </div>
    </div>
    <!--end::Item-->
    <div class="separator separator-dashed my-5"></div>
       @empty
           <div class="text-danger fw-bold bg-light-danger fs-3">You Can Skip this Step</div>
       @endforelse
      
    </div>
    <!--end::Items-->

    @error('socialLinks')
        <span
            class="text-danger bg-light-danger px-2 py-1 mt-2">{{ $message }}</span>
    @enderror
</div>
<!--end::Card body-->
</div>