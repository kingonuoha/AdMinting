@extends('layouts.ADM_app')
@section('title')
  {{ucwords(appSetting('app_name'))}} | App Settings
@endsection
@section('content')
<div class="separator separator-dashed"></div>
@livewire('app-settings-view')
@endsection