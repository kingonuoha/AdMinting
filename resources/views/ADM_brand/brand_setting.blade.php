@extends('layouts.ADM_app')
@section('title')
    AdMinting | {{$brand->brand_name}} Settings
@endsection
@section('content')
@livewire('account-banner')
@livewire('brand.brand-settings')
@endsection