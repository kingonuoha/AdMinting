@extends('layouts.ADM_app')
@section('content')

@livewire('creators.creator-listing-new', ['user'=> $user])
@endsection