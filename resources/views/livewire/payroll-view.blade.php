<div>
    <div class="row g-5 g-xl-8 mt-5">
        @foreach ($userStats as $stat)
            <x-stat-card-progress :stat="$stat" :class="__('col-xl-4')" />
        @endforeach
    </div>
    
    <div class="card my-5">
        <div class="row">
            <div class="card-header align-items-center py-5 gap-2 gap-md-5" data-select2-id="select2-data-124-j3x6">
                <!--begin::Card title-->
                <div class="card-title">
                    <h3 >Payroll</h3>
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1 mx-2">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span class="svg-icon svg-icon-1 position-absolute ms-4">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <input type="text" wire:model="search"placeholder="search by Listing name or User" class="form-control form-control-solid w-250px ps-14" >
                    </div>
                    <!--end::Search-->
                </div>
                <!--end::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar flex-row-fluid justify-content-end gap-5" data-select2-id="select2-data-123-wk8y">
                    <div class="w-100 mw-150px" >
                        <!--begin::Select2-->
                        <select class="form-select form-select-solid " wire:model="payment_status" data-placeholder="Select Status" aria-placeholder="Select Status">
                            <option ></option>
                            <option value="paid" >Paid</option>
                            <option value="pending" >Pending</option>
                            <option value="declined" >Declined</option>
                            <option value="unknown" >Unknown</option>
                        </select>
                        <!--end::Select2-->
                    </div>
                    <!--begin::Add product-->
                    {{-- <div class="d-flex flex-column">
                        <span class="text-grey-500">Balance:</span>
                        <span class="fw-bold text-success"> NGN{{formatMoney($balance)}}</span>
                    </div> --}}
                </div>
                <!--end::Card toolbar-->
            </div>
           
        </div>

        <div class="card-body">
           
            <div class="table-responsive">
                <table class="table table-striped gy-7 gs-7">
                    <thead>
                        <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                            <th class="min-w-100px">User</th>
                            <th class="min-w-100px">Listing</th>
                            <th class="min-w-100px">Amount</th>
                            <th class="min-w-100px">Status</th>
                            <th class="min-w-100px">Marked For payment</th>
                            <th class="min-w-100px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                @forelse ($payrolls as $payroll)
                    <tr>
                       <td>
                        <div class="d-flex align-items-center">
                            <!--begin::Wrapper-->
                            <div class="me-5 position-relative">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="{{$payroll->user->name}}">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    {{-- {{dd($this->user->profile_photo_url)}} --}}
                                                <img  src="{{ $payroll->user->profile_photo_url }}" alt="{{ $payroll->user->name }}" />
                                        @else
                                           
                                                <span class="symbol-label bg-warning text-inverse-warning fw-bold">{{strtoupper(substr($payroll->user->name, 0, 1))}}</span>
                                        @endif
                                    </div>
                                {{-- <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="../../assets/media/avatars/300-6.jpg">
                                </div> --}}
                                <!--end::Avatar-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Info-->
                            <div class="d-flex flex-column justify-content-center">
                                <a href="#" class="mb-1 text-gray-800 text-hover-primary">{{$payroll->user->name}}</a>
                                <div class="fw-semibold fs-6 text-gray-400">{{$payroll->user->email}}</div>
                            </div>
                            <!--end::Info-->
                        </div>
                       </td>

                       <td>
                        <a target="_blank" href="{{route('listing.dashboard', $payroll->listing->slug)}}" class="active-primary"> {{$payroll->listing->title}}</a>
                       </td>
                       <td>
                        <p class="text-success">NGN{{formatMoney($payroll->amount)}}</p>
                       </td>
                       <td>
                        @if ($payroll->payment_status == 'paid')
                        <div class="badge px-2 py-1 bg-light-success text-success">
                            {{ucwords($payroll->payment_status)}}
                        </div>
                        @elseif($payroll->payment_status == 'pending')
                        <div class="badge px-2 py-1 bg-light-info text-info">
                            {{ucwords($payroll->payment_status)}}
                        </div>
                        @elseif($payroll->payment_status == 'declined')
                        <div class="badge px-2 py-1 bg-light-danger text-danger">
                            {{ucwords($payroll->payment_status)}}
                        </div>
                        @else
                        <div class="badge px-2 py-1 bg-light-warning text-warning">
                            {{ucwords($payroll->payment_status)}}
                        </div>
                        @endif
                        
                       </td>
                       <td>
                        <div class="badge px-2 fw-bold badge-secondary">
                            {{time_Ago($payroll->created_at)}}
                        </div>
                       </td>

                       <td>
                           
                           @if ($payroll->payment_status == 'paid')
                        <button disabled class="btn btn-sm btn-light-info text-info">
                           Paid
                        </button>
                        @else
                        <x-button  loading="payOut" wire:click.prevent="payOut({{$payroll->id}})" class="btn btn-sm btn-light-success text-success">
                            Pay User
                         </x-button>
                        @endif
                       </td>

                    </tr>
                @empty
                            
                @endforelse
                       
                    </tbody>
                </table>
            </div>
            <div class="d-block mt-5">
                {{ $payrolls->links('livewire::bootstrap')}}
            </div>
        </div>
    </div>
</div>
