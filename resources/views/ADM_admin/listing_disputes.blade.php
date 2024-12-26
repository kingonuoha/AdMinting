@extends('layouts.ADM_app')
@section('title')
  {{ucwords(env('app_name'))}} | Listing Disputes
@endsection
@section('content')

<livewire:super-admin-listing-dispute />
@endsection