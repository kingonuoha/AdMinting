@extends('layouts.ADM_app')
@section('content')


@if (auth()->user()->role == 'adm_admin')
    @livewire('super-admin-dashboard')
@elseif(auth()->user()->role == 'brand')
    @livewire('brand-dashboard')

@endif


@endsection