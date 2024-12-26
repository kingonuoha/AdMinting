@extends('layouts.ADM_app')
@section('title')
   {{$title}}
@endsection
@section('content')
@livewire('account-banner')
    @livewire('finance')
@endsection