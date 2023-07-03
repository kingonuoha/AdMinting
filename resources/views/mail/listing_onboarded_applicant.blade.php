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
        <p style="margin-bottom:9px; color:#181C32; font-size: 22px; font-weight:700">Hey {{$user->name}}, <br> 🎉 Congratulations! Job Offer Accepted! 🎉</p>
        
    </div>
    <!--end:Text-->
  

@endsection
{{-- @include('mail.component.whats_next') --}}

@section('mail_subBody')
<tr style="display: flex; justify-content: center; margin:0 60px 35px 60px">
    <td align="start" valign="start" style="padding-bottom: 10px;">
        <!--begin::Wrapper-->
        <div style="background: #F9F9F9; border-radius: 12px; padding:35px 30px">
            {{-- <div style="width:220px; margin:18px 20px"> --}}
            <div style="display: flex; width:100%; margin:18px 20px">
                <!--begin:Media-->
                <img alt="" style="object-fit:cover; width:30%; border-radius:12px; margin:0 9px 9px" src="{{asset('storage/company_logo/'.$listing->logo)}}">
                <!--end:Media-->
                <!--begin:Text-->
               <div style="width:50%">
                <a href="#" style="color:#181C32; font-size: 14px; font-weight:600; display:block; margin-bottom:9px">{{$listing->title}}</a>
                <!--begin:Text-->
                <!--begin:Price-->
                <span style="color:#7E8299; font-size: 10px; font-weight:600; display:block; line-height:1.1">{{(isset($listing->price))? '$'. $listing->price : "$12,000"}}</span>
                <!--begin:Price-->
                <!--begin:Username-->
                <a href="#" style="color:#5E6278; font-size: 10px; font-weight:600">{{$brand->brand_name}}</a>
               </div>
                <!--begin:Username-->
            </div>
            <!--end::Item-->
            <div class="separator separator-dashed" style="margin:17px 0 15px 0"></div>

            <!--begin::Item-->
            <div style="display:flex">
              
                <!--begin::Block-->
                <div>
                    <!--begin::Content-->
                    <div>
                       
                        <!--begin::Desc-->
                        <p style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:30px 0 0 0;font-family:Arial,Helvetica,sans-serif">
                            We are thrilled to inform you that you have been accepted for the job listing you previously applied for. Your skills, experience, and qualifications have impressed the employer, and they would like to extend an offer to you.
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
                            This is an exciting opportunity for you to embark on a new professional journey. We encourage you to review the offer details, including the job position, salary, benefits, and any additional instructions provided by the employer.
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
                            If you have any questions or need further clarification, don't hesitate to reach out to the employer directly. Once again, congratulations on this achievement, and we wish you continued success in your career!
                        </p>
                        <!--begin::Desc-->
                        <p style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:10px 0 0 0;font-family:Arial,Helvetica,sans-serif">
                            #JobOfferAccepted #NewOpportunity #CareerSuccess
                        </p>
                        <p style="color:#5E6278;font-weight: 600; font-size: 13px; padding-top:3px; margin:0;font-family:Arial,Helvetica,sans-serif">
                           AdMinting Team
                        </p>

                        <!--begin:Action-->
                        <a href='{{route('user', $listing->user_id)}}' style="margin-top:8px; background-color:#50CD89; border-radius:6px;display:inline-block; padding:11px 19px; color: #FFFFFF; font-size: 14px; font-weight:500;">Chat with Employer</a>
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

