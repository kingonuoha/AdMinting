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
        <p style="margin-bottom:9px; color:#181C32; font-size: 22px; font-weight:700">Congratulations on the Success of the Job Listing!</p>
        {{-- <p style="margin-bottom:2px; color:#7E8299">Pls take out some time to fill in some informations</p>
        <p style="margin-bottom:2px; color:#7E8299"> in order to activate your account</p> --}}
    </div>
    <!--end:Text-->
    <!--begin:Action-->
    {{-- <a href='{{ $user->role=="creator"? route('dashboard'): route('dashboard')}}' style="background-color:#50CD89; border-radius:6px;display:inline-block; padding:11px 19px; color: #FFFFFF; font-size: 14px; font-weight:500;">Activate Account</a> --}}
    <!--begin:Action-->
@endsection

    @section('mail_subBody')
<tr style="display: flex; justify-content: center; margin:0 60px 35px 60px">
    <td align="start" valign="start" style="padding-bottom: 10px;">
        <!--begin::Wrapper-->
        <div style="background: #F9F9F9; border-radius: 12px; padding:35px 30px">
            {{-- <div style="width:220px; margin:18px 20px"> --}}
          <b> Dear {{$user->name}}</b>

            <!--begin::Item-->
            <div style="display:flex">
              
                <!--begin::Block-->
                <div>
                    <!--begin::Content-->
                    <div>
                       
                        <!--begin::Desc-->
                        <p style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:30px 0 0 0;font-family:Arial,Helvetica,sans-serif">
                            We are thrilled to inform you that the job listing for <b>[{{$listing->title}}]</b> has been a tremendous success, thanks to your efforts and dedication. Congratulations on achieving this milestone!
                        </p>
                        <!--end::Desc-->
                    </div>
                    <!--end::Content-->
                    <!--begin::Separator-->
                    <div class="separator separator-dashed" style="margin:17px 0 15px 0"></div>
                    <!--end::Separator-->
                </div>
                <!--end::Block-->
            </div>
            <!--end::Item-->
            <!--begin::Item-->
            <div style="display:flex">
              
                <!--begin::Block-->
                <div>
                    <!--begin::Content-->
                    <div>
                       
                        <!--begin::Desc-->
                        <p style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:0;font-family:Arial,Helvetica,sans-serif">
                            Your expertise and professionalism have been invaluable throughout the entire process. Your ability to effectively communicate the job requirements, screen candidates, and make informed decisions has contributed significantly to the success of the job listing.
                        </p>
                        <!--end::Desc-->
                    </div>
                    <!--end::Content-->
                    <!--begin::Separator-->
                    <div class="separator separator-dashed" style="margin:17px 0 15px 0"></div>
                    <!--end::Separator-->
                </div>
                <!--end::Block-->
            </div>
            <!--end::Item-->
            <!--begin::Item-->
            <div style="display:flex">
              
                <!--begin::Block-->
                <div>
                    <!--begin::Content-->
                    <div>
                       
                        <!--begin::Desc-->
                        <p style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:0;font-family:Arial,Helvetica,sans-serif">
                            We extend our heartfelt appreciation for your exceptional work and dedication. Your contributions have positively impacted our organization, and we are grateful to have you as part of our team.
                        </p>
                        <!--end::Desc-->
                    </div>
                    <!--end::Content-->
                    <!--begin::Separator-->
                    <div class="separator separator-dashed" style="margin:17px 0 15px 0"></div>
                    <!--end::Separator-->
                </div>
                <!--end::Block-->
            </div>
            <!--end::Item-->
            <!--begin::Item-->
            <div style="display:flex">
               
                <div>
                    <!--begin::Content-->
                    <div>
                      
                        <!--begin::Desc-->
                        <p style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:0;font-family:Arial,Helvetica,sans-serif">
                            Once again, congratulations on the success of the job listing. Your hard work and dedication have not gone unnoticed, and we look forward to witnessing your continued success.
                        </p>
                        <!--begin::Desc-->
                        {{-- <p style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:10px 0 0 0;font-family:Arial,Helvetica,sans-serif">
                            If you have any questions or require further assistance, please feel free to reach out to our support team. We are here to help you.
                        </p>
                        <p style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:10px 0 0 0;font-family:Arial,Helvetica,sans-serif">
                            Thank you for choosing our platform for your hiring needs. We wish you continued success in your future endeavors.
                        </p> --}}
                        <b style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:9px; margin:10px 0 0 0;font-family:Arial,Helvetica,sans-serif">
                            Best Regards, <br>
                        </b>
                        <p style="color:#5E6278;font-weight: 600; font-size: 13px; padding-top:3px; margin:0;font-family:Arial,Helvetica,sans-serif">
                           {{ucwords(appSetting('app_name'))}} Team
                        </p>

                        <!--begin:Action-->
                        <a href='{{route('user', $listing->user_id)}}' style="margin-top:8px; background-color:#50CD89; border-radius:6px;display:inline-block; padding:11px 19px; color: #FFFFFF; font-size: 14px; font-weight:500;">Upload Review</a>
                        <!--begin:Action-->
                        <!--end::Desc-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Block-->
            </div>
            <!--end::Item-->
        </div>
        <!--end::Wrapper-->
    </td>
</tr>
@endsection