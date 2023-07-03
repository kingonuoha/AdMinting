@extends('layouts.ADM_mail_layouts')
@section('title')
    AdMinting | Welcome {{$user->name}}
@endsection
@section('mail_body')
    <!--begin:Media-->
    <div style="margin-bottom: 15px">
        <img alt="Logo" src="{{asset('users/assets/media/email/icon-positive-vote-3.svg')}}" />
    </div>
    <!--end:Media-->
    <!--begin:Text-->
    <div style="font-size: 14px; font-weight: 500; margin-bottom: 27px; font-family:Arial,Helvetica,sans-serif;">
        <p style="margin-bottom:9px; color:#181C32; font-size: 22px; font-weight:700">Congratulations {{$user->name}}!!, <br>Your Job Posting is now Live</p>
        
    </div>
    <!--end:Text-->
    <!--begin:Action-->
    <!--begin:Action-->

@endsection
{{-- @include('mail.component.whats_next') --}}

@section('mail_subBody')
    @include('mail.component.job_listing_single_brand', ['user'=>$user])
@endsection

