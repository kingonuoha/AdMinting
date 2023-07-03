@extends('layouts.ADM_mail_layouts')
@section('title')
    AdMinting | Exciting Job Opportunity at [Company/Organization Name] - Apply Now!
@endsection
@section('mail_body')
    <!--begin:Media-->
    
    {{-- <div style="margin-bottom: 15px">
        <img alt="Logo" src="{{asset('users/assets/media/email/icon-positive-vote-2.svg')}}" />
    </div> --}}
    <!--end:Media-->
    <!--begin:Text-->
    <div style="text-align:left; font-size: 14px; font-weight: 500; margin:0 60px 30px 60px; font-family:Arial,Helvetica,sans-serif">
        <p style="color:#181C32; font-size: 24px; font-weight:700; line-height:1.4; margin-bottom:24px">Dear {{$user->name}}:</p>
        <p style="margin-bottom:2px; color:#3F4254; line-height:1.6">We are delighted to announce a fantastic job opportunity at <span style="font-weight: 900"> [Company/Organization Name] </span> that may be of interest to you. As a valued member of our network, we wanted to share this opening with you first. We believe that your skills, experience, and passion make you an ideal candidate for this role.</p>
    </div>
    <!--end:Text-->
   

@endsection
{{-- @include('mail.component.whats_next') --}}

@section('mail_subBody')
    @include('mail.component.job_listing_single', ['listing'=>$listing])
@endsection