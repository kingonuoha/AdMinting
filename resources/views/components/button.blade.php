@props(['loading' => false])

<button {{ $attributes->class(['btn btn-primary'])->merge(['type' => 'submit']) }} >
    @if ($loading && $target = $loading)
        <span wire:loading.remove wire:target="{{$target}}">{{$slot}}</span>
        {{-- <span wire:loading wire:target="{{$target}}">{{$loading}}</span> --}}
        <span wire:loading wire:target="{{$target}}" class="indicator-progress">Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
    @else
        {{$slot}} 
    @endif
</button>