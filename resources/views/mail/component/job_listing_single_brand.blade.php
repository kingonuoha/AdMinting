<tr style="display: flex; justify-content: center; margin:0 60px 35px 60px">
    <td align="start" valign="start" style="padding-bottom: 10px;">
        <!--begin::Wrapper-->
        <div style="background: #F9F9F9; border-radius: 12px; padding:35px 30px">
            <!--begin::Item-->
            <div style="display:flex">
               
                <!--begin::Block-->
                <div>
                    <!--begin::Content-->
                    <div>
                        <!--begin::Title-->
                        <a href="#" style="color:#181C32; font-size: 14px; font-weight: 600;font-family:Arial,Helvetica,sans-serif">Dear {{$user->name}} </a>
                        <!--end::Title-->
                       
                    </div>
                   
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
                            We are delighted to inform you that your job posting has been successfully published on our platform. Congratulations on taking this crucial step in finding the perfect candidate for your open position. We are excited to assist you in your recruitment process!
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
                        <div style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:0;font-family:Arial,Helvetica,sans-serif">
                            <ul>
                                <li><span style="font-weight: 900;">Job Title: </span>{{$listing->title}}</li>
                                <li><span style="font-weight: 900;">Location: </span>{{$listing->location}}</li>
                                <li><span style="font-weight: 900;">Company: </span>{{$user->brandInfos->brand_name}}</li>
                                <li><span style="font-weight: 900;">Price: </span>#{{'200'}}</li>
                                {{-- <li><span style="font-weight: 900;">Category: </span>{{print_r($listing->categories->count())}}</li> --}}
                            </ul>
                        </div>
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
                            Your job listing will now be visible to our vast network of talented professionals seeking new opportunities. By leveraging our platform, you have increased your chances of finding the right candidate to join your team.
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
                            To manage and monitor your job posting, you can access your account on our website using your registered credentials. Within your account, you will have options to review applications, communicate with candidates, and make updates to your posting as needed. We recommend regularly checking your account to stay updated on the progress of your job listing.
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
                            Thank you for choosing our platform to advertise your job opportunity. We wish you the best of luck in finding the perfect candidate for the position. If there's anything else we can do to support your hiring needs, please do not hesitate to let us know.
                        </p>
                        
                        <!--begin::Desc-->
                        <p style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:10px 0 0 0;font-family:Arial,Helvetica,sans-serif">
                            Warm Regards!
                        </p>
                        <p style="color:#5E6278;font-weight: 600; font-size: 13px; padding-top:3px; margin:0;font-family:Arial,Helvetica,sans-serif">
                           AdMinting Team
                        </p>
                        <!--end::Desc-->
                    </div>
                    <!--end::Content-->
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
                        <div style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:0 0 20px 0;font-family:Arial,Helvetica,sans-serif;">
                            <div> <!--begin:Action-->
                                <a href='{{route('dashboard')}}' style="background-color:#50CD89; border-radius:6px;display:inline-block; padding:11px 19px; color: #FFFFFF; font-size: 14px; font-weight:500;">Go to Dashboard</a>
                                <!--begin:Action-->
                            </div>
                        </div>
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