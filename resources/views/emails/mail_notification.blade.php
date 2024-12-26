<x-mail::message>
Hello {{ $data['user']->name }}
# {{ $data['title'] }}
 {!! $data['message'] !!}

 @if (isset($data['button']) && !empty($data['button']))
 @component('mail::button', ['url' => $data['button']['url'], "color" => $data['button']['color']])
 {{$data['button']['text']}}
 @endcomponent
 @endif

@if (isset($data['panel']) && !empty($data['panel']))
<x-mail::panel>
{{ $data['panel'] }}
</x-mail::panel>
@endif

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
