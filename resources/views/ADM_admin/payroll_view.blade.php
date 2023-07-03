@extends('layouts.ADM_app')
@section('title')
  {{ucwords(appSetting('app_name'))}} | Payroll
@endsection
@section('content')
<div class="separator separator-dashed"></div>
@livewire('payroll-view')
@endsection