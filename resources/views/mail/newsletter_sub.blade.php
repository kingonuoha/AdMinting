@extends('layouts.ADM_mail_layouts')
@section('title')
    AdMinting | Thank You for Subscribing to Our Newsletter
@endsection
@section('mail_body')
    <!--begin:Media-->
    <div style="margin-bottom: 15px">
        <img alt="Logo" src="{{asset('users/assets/media/email/icon-positive-vote-1.svg')}}" />
    </div>
    <!--end:Media-->
    <!--begin:Text-->
    <div style="font-size: 14px; font-weight: 500; font-family:Arial,Helvetica,sans-serif; " class="px-5 m-2 ">
        <p style="margin-bottom:9px; color:#181C32; font-size: 18px; font-weight:700" class="px-3">Hey {{$email}}, Thank You for Subscribing to Our Newsletter!</p>
        <p style="margin-bottom:2px; color:#7E8299">Thank you for subscribing to our newsletter. We are thrilled to have you join our community of Creative enthusiasts.</p>
        <p style="margin-bottom:2px; color:#7E8299">Get ready to stay updated on the latest trends, insights, and news.</p>
    </div>
    <a href='{{route('register')}}' style="background-color:#50CD89; border-radius:6px;display:inline-block; padding:11px 19px; color: #FFFFFF; font-size: 14px; font-weight:500;">Create Account</a>
    <!--begin:Action-->
@endsection