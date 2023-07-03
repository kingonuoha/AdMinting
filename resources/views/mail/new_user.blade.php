@extends('layouts.ADM_mail_layouts')
@section('title')
    AdMinting | Welcome {{$user->name}}
@endsection
@section('mail_body')
    <!--begin:Media-->
    <div style="margin-bottom: 15px">
        <img alt="Logo" src="{{asset('users/assets/media/email/icon-positive-vote-1.svg')}}" />
    </div>
    <!--end:Media-->
    <!--begin:Text-->
    <div style="font-size: 14px; font-weight: 500; margin-bottom: 27px; font-family:Arial,Helvetica,sans-serif;">
        <p style="margin-bottom:9px; color:#181C32; font-size: 22px; font-weight:700">Hey {{$user->name}}, thanks for signing up!</p>
        <p style="margin-bottom:2px; color:#7E8299">Pls take out some time to fill in some informations</p>
        <p style="margin-bottom:2px; color:#7E8299"> in order to activate your account</p>
    </div>
    <!--end:Text-->
    <!--begin:Action-->
    <a href='{{ $user->role=="creator"? route('creators.dialogue'): route('brand.dialogue')}}' style="background-color:#50CD89; border-radius:6px;display:inline-block; padding:11px 19px; color: #FFFFFF; font-size: 14px; font-weight:500;">Activate Account</a>
    <!--begin:Action-->
@endsection