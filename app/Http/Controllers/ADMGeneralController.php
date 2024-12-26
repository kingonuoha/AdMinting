<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ChangeLog;
use Illuminate\Http\Request;
use App\Models\Socials\SocialPage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Social\FacebookController;

class ADMGeneralController extends Controller
{
    //
    public function changeProfilePicture(Request $req)
    {
        $user = User::find(auth()->user()->id);
        $path = 'storage/profile-photos';
        $file = $req->file('file');
        $oldPicture = $user->profile_photo_path;
        $file_path = $path . $oldPicture;
        $new_picture_name = 'AIMG' . $user->id . time() . rand(1, 100000) . '.jpg';

        if ($oldPicture != null && File::exists(public_path($file_path))) {
            File::delete(public_path($file_path));
            $user->update([
                'profile_photo_path' => null,
            ]);
        }
        $upload = $file->move(public_path($path), $new_picture_name);
        if ($upload) {
            $user->update([
                'profile_photo_path' => 'profile-photos/' . $new_picture_name,
            ]);
            return response()->json(['status' => 1, 'msg' => "Your Profile Picture has been successfully Updated!!,"]);
        } else {
            return response()->json(['status' => 0, "Something Went Wrong!!"]);
        }
    }
    public function disputeFileUpload(Request $req)
    {

        // $listing = Listing::where('slug', $listing_slug)->first();


        if ($req->hasFile('file')) {
            $file = $req->file('file');
            // Get the size of the uploaded file
            $sizeInBytes = $file->getSize();
            $fileType = $file->getClientOriginalExtension();

            // Convert the size to a human-readable format
            $sizeInKB = round($sizeInBytes / 1024, 2);
            $sizeInMB = round($sizeInKB / 1024, 2);

            $filename = uniqid(str_replace(' ', '_',  $file->getClientOriginalName())) . "." . $fileType;
            $path = 'storage/Listing_Disputes/';
            $upload = $file->move(public_path($path), $filename);
            if ($upload) {

                return ["Listing_Disputes/" . $filename];
            }
        }

        return '';
    }





    public function changelog(Request $req)
    {
        $changelogs = ChangeLog::where('publish_date', "!=", NULL)->orderBy('publish_date', 'desc')->get();
        return view('guest.changelog', compact("changelogs"), [
            'current_page' => 'Listings Oveview',
            // 'bread_action' => [
            //     'url' => route('dashboard'),
            //     'text' => "Add Listing"
            // ],

        ]);
    }
    public function listing_dashboard($listing_id)
    {
        return view('listing.listing_dashboard', [
            'current_page' => 'Listings Oveview',
            // 'bread_action' => [
            //     'url' => route('dashboard'),
            //     'text' => "Add Listing"
            // ],

        ]);
    }

    public function listing_ratings($listing_id)
    {
        return view('listing.listing_rating', [
            'current_page' => 'Listings Ratings',
            // 'bread_action' => [
            //     'url' => route('dashboard'),
            //     'text' => "Add Listing"
            // ],

        ]);
    }
    public function listing_disputes($listing_id)
    {
        return view('listing.listing_disputes', [
            'current_page' => 'Listings Disputes',
            // 'bread_action' => [
            //     'url' => route('dashboard'),
            //     'text' => "Add Listing"
            // ],

        ]);
    }
    public function find_creators()
    {
        return view('guest.find-creators', [
            'current_page' => 'Find Creators',
            // 'bread_action' => [
            //     'url' => route('dashboard'),
            //     'text' => "Add Listing"
            // ],

        ]);
    }


    public function socialPageOverview(Request $req)
    {
        // dd($req->page_id);
        $page = SocialPage::find($req->page_id);

        // 
        // dd( $page->platform, $page);
        $metrics = $page->metrics;
        $snapshots = $page->snapshots;
        // Calculate the engagement rate if both metrics are available
        // Add engagement rate to page object
        $page->engagement_rate = $metrics->firstWhere('name', 'engagement_rate')->value;
        $engagements = $metrics->firstWhere('name', 'page_post_engagements');
        $impressions = $metrics->firstWhere('name', 'page_post_impressions');
        $engagementData = $snapshots->firstWhere('name', 'page_post_engagements');
        $impressionData = $snapshots->firstWhere('name', 'page_post_impressions');
        $page->engPerPost  = $metrics->firstWhere('name', 'average_post_engagement');
        $page->followers = $metrics->firstWhere('name', 'followers')->value ?? null;
        // $postsCollection = $snapshots->firstWhere('name', 'posts')->data ?? [];
        // dd($postsCollection);
        //    dd( $engagementData, $impressionData->data);
        // dd($page);
        $engagementDataChart = [];

        if ($page->platform === "facebook" ) {
               $engagementDataChart = $this->prepareDataChartFacebookNInstagram($engagementData, $impressionData);
        }
        if ($page->platform === "youtube") {
            $engagementDataChart = $this->prepareDataChartYoutube($page);
            // dd($engagementDataChart);
        }
        // dd($engagementDataChart);
        //    $postsCollection = $snapshots->firstWhere('name', 'posts');
        //                     $posts = $postsCollection->data ?? [];


        if ($page->followers > 0) {
            $page->followers = formatNumber($page->followers);
        }

        // dd($page, $metrics, $snapshots);
        return view('ADM_creators.social_overview', [
            'current_page' => 'Social Overview',
            'title' =>  env("APP_NAME") . "| Socials: " . $page->page_name . " overview",
        ], compact("page", "metrics", "snapshots", "engagementDataChart"));
    }


    public function prepareDataChartYoutube(SocialPage $socialPage)
    {
        $geoDataTest = (object) [
            'countries' => ['US', 'IN', 'GB', 'AU', 'CA', 'DE', 'FR'],
            'views' => [20000, 300000, 550000, 200000, 100000, 180000, 120000],
            'impressions' => [700000, 350000, 250000, 400000, 300000, 220000, 150000],
        ];
        
        $genderDataTest = (object) [
            'gender' => ['Male', 'Female', 'Other'],
            'percentage' => [60, 35, 5],  // Representing the percentage of users in each gender category
        ];
        
        // Retrieve the saved demographics snapshot
        $snapshot = $socialPage->snapshots()->where('name', 'demographics')->first();

        // Check if the data exists
        if ($snapshot) {
            $data = $snapshot->data;
            return [
                // 'genderData' => $data->gender,
                // 'geoData' => $data->geography
                'genderData' => $genderDataTest,
                'geoData' => $geoDataTest
            ];
        }
    }
    public function prepareDataChartFacebookNInstagram($engagementData, $impressionData)
    {

        // Initialize weekly aggregated data
        $weeklyData = [];

        // Helper function to get the start of the week for a given date
        function getWeekStartDate($date)
        {
            return date('Y-m-d', strtotime('monday this week', strtotime($date)));
        }

        // Helper function to format "Month Week" (e.g., "January Week 1")
        function formatWeekLabel($date)
        {
            $month = date('F', strtotime($date)); // Get the month name
            $weekNumber = date('W', strtotime($date)); // Get the week number
            return "{$month} Week {$weekNumber}";
        }

        // Group and aggregate data by week
        foreach ($engagementData->data as $engagement) {
            $date = $engagement->end_time;
            $weekStart = getWeekStartDate($date);

            // Initialize the week if not already present
            if (!isset($weeklyData[$weekStart])) {
                $weeklyData[$weekStart] = [
                    'start_date' => $weekStart,
                    'end_date' => date('Y-m-d', strtotime('sunday this week', strtotime($date))),
                    'engagements' => 0,
                    'impressions' => 0,
                ];
            }

            // Add engagement value to the week's total
            $weeklyData[$weekStart]['engagements'] += $engagement->value;
        }

        // Match and add impression values to the corresponding weeks
        foreach ($impressionData->data as $impression) {
            $date = $impression->end_time;
            $weekStart = getWeekStartDate($date);

            // Ensure the week is initialized (if there are impressions without engagements)
            if (!isset($weeklyData[$weekStart])) {
                $weeklyData[$weekStart] = [
                    'start_date' => $weekStart,
                    'end_date' => date('Y-m-d', strtotime('sunday this week', strtotime($date))),
                    'engagements' => 0,
                    'impressions' => 0,
                ];
            }

            // Add impression value to the week's total
            $weeklyData[$weekStart]['impressions'] += $impression->value;
        }

        // Prepare final output
        $finalData = [
            'categories' => [],
            'engagements' => [],
            'impressions' => [],
        ];

        // Extract weekly data into final arrays
        foreach ($weeklyData as $week) {
            $weekLabel = $week['start_date'];
            $finalData['categories'][] = $weekLabel;
            $finalData['engagements'][] = $week['engagements'];
            $finalData['impressions'][] = $week['impressions'];
        }

        // Output the result
        return $finalData;
    }
}
