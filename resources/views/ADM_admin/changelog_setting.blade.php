@extends('layouts.ADM_app')
@section('title')
    {{ ucwords(appSetting('app_name')) }} | App Change Log Settings
@endsection
@section('content')
    <div class="separator separator-dashed"></div>
    @livewire('changelog-setting-live')
@endsection
