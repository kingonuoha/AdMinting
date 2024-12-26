@extends('layouts.ADM_app')
@section('title')
    AdMinting | View {{$user->name}} Profile
@endsection
@section('content')

@livewire('creator-services', ['user' => $user], key($user->id))
@endsection