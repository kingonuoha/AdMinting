@extends('layouts.ADM_app')
@section('title')
  {{ucwords(appSetting('app_name'))}} | Users List
@endsection
@section('content')
<div class="separator separator-dashed"></div>
@livewire('s-admin-users-list')
@endsection