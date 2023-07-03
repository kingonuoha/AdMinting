@extends('layouts.ADM_app')
@section('title')
    AdMinting | View {{$user->name}} Profile
@endsection
@section('content')
@livewire('account-banner', ['selected_user_id' => $user->id], key($user->id))
@livewire('account-over-view', ['selected_user_id' => $user->id], key($user->id))
@endsection