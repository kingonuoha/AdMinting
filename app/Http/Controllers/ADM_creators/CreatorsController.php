<?php

namespace App\Http\Controllers\ADM_creators;

use ParsedownExtra;
use App\Models\User;
use App\Models\Listing;
use App\Models\BrandInfo;
use App\Models\Categories;
use Illuminate\Support\Str;
use App\Models\ListingFiles;
use Illuminate\Http\Request;
use App\Jobs\ListingOnboarded;
use App\Models\CreatorListing;
use App\Events\NewJobListingNotify;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CreatorsController extends Controller
{
    //
    public function brand_settings()
    {
        $brand = User::find(auth()->user()->id)->brandInfos;
        return view('ADM_brand.brand_setting', compact('brand'),  [
            'current_page' => $brand->brand_name . " Settings",
            'bread_action' => [
                'url' => route('dashboard'),
                'text' => "Dashboard"
            ],

        ]);
    }
    public function user_gallery_upload(Request $request, $user_id)
    {
        $user = User::find($user_id);

        $uploadedFiles = [];
        if ($request->hasFile('file')) {
            // return response()->json(['files' => $request->file('file')]);
            $file = $request->file('file');
            // foreach ($request->file('file') as $file) {
            // Get the size of the uploaded file
            $sizeInBytes = $file->getSize();
            $fileType = $file->getClientOriginalExtension();

            // Convert the size to a human-readable format
            $sizeInKB = round($sizeInBytes / 1024, 2);
            $sizeInMB = round($sizeInKB / 1024, 2);
            $unique_hash = uniqid("adcre8-file", true);
            $filename =  $unique_hash . str_replace(' ', '_',  $file->getClientOriginalName());
            $folder = 'Gallery/' . str_replace(' ', '_', $user->name);
            Storage::disk('public')->putFileAs($folder, $file, $filename);


            $uploadedFiles[] = $folder . '/' . $filename;
        }
        // }
        return response()->json(['files' => $uploadedFiles]);
    }


    public function listing_file_upload(Request $request)
    {
        $uploadedFiles = [];
        if ($request->hasFile('file')) {
            // return response()->json(['files' => $request->file('file')]);
            $file = $request->file('file');
            // foreach ($request->file('file') as $file) {
            // Get the size of the uploaded file
            $sizeInBytes = $file->getSize();
            $fileType = $file->getClientOriginalExtension();

            // Convert the size to a human-readable format
            $sizeInKB = round($sizeInBytes / 1024, 2);
            $sizeInMB = round($sizeInKB / 1024, 2);
            $unique_hash = uniqid("adcre8-file", true);
            $filename =  str_replace(' ', '_',  $file->getClientOriginalName());
            $folder = 'ListingsFiles/' . "initial";
            Storage::disk('public')->putFileAs($folder, $file, $filename);
            $listingFiles = new ListingFiles();
            $listingFiles->name = $filename;
            $listingFiles->listing_id = NULL;
            $listingFiles->uploaded_by = auth()->user()->id;
            $listingFiles->size =  $sizeInMB;
            $listingFiles->type = $fileType;
            $listingFiles->unique_hash = $unique_hash;
            $listingFiles->folder = $folder;
            // $listingFiles->uploaded_by = auth()->user()->id;
            $listingFiles->save();

            $uploadedFiles[] = $unique_hash;
        }
        // }
        return response()->json(['files' => $uploadedFiles]);
    }


    public function brand_logo(Request $req)
    {
        $user = User::find(auth()->user()->id);
        // $brand = BrandInfo::find(auth()->user()->id);
        $path = 'storage/company_logo';
        $file = $req->file('logo');
        $oldPicture = $user->brandInfos->logo_path;
        $file_path = $path . $oldPicture;
        $new_picture_name = 'AIMG' . $user->id . time() . rand(1, 100000) . '.jpg';

        if ($oldPicture != null && File::exists(public_path($file_path))) {
            File::delete(public_path($file_path));
            $user->brandInfos()->update([
                'logo_path' => null,
            ]);
        }
        $upload = $file->move(public_path($path), $new_picture_name);
        if ($upload) {
            $user->brandInfos()->update([
                'logo_path' => 'company_logo/' . $new_picture_name,
            ]);
            return response()->json(['status' => 1, 'msg' => "Your Brand Logo has been successfully Updated!!"]);
        } else {
            return response()->json(['status' => 0, "Something Went Wrong!!"]);
        }
    }
    public function brand_banner(Request $req)
    {
        $user = User::find(auth()->user()->id);
        // $brand = BrandInfo::find(auth()->user()->id);
        $path = 'storage/brand_banner';
        $file = $req->file('banner');
        $oldPicture = $user->brandInfos->logo_path;
        $file_path = $path . $oldPicture;
        $new_picture_name = 'AIMG' . $user->id . time() . rand(1, 100000) . '.jpg';

        if ($oldPicture != null && File::exists(public_path($file_path))) {
            File::delete(public_path($file_path));
            $user->brandInfos()->update([
                'banner_path' => null,
            ]);
        }
        $upload = $file->move(public_path($path), $new_picture_name);
        if ($upload) {
            $user->brandInfos()->update([
                'banner_path' => 'brand_banner/' . $new_picture_name,
            ]);
            return response()->json(['status' => 1, 'msg' => "Your Brand Banner has been successfully Updated!!"]);
        } else {
            return response()->json(['status' => 0, "Something Went Wrong!!"]);
        }
    }
    public function listing_index()
    {

        return view('ADM_creators.listing_index',  [
            'current_page' => 'Listings',
            // 'bread_action' => [
            //     'url' => route('dashboard'),
            //     'text' => "Add Listing"
            // ],

        ]);
    }


    public function listing_show()
    {

        return view('ADM_creators.listing_show',  [
            'current_page' => 'Listings',
            'bread_action' => [
                'url' => route('listing.index'),
                'text' => "Listing Index"
            ],

        ]);
    }


    public function listing_apply(Listing $listing, Request $req)
    {

        $listing->clicks()
            ->create([
                'user_agent' => $req->userAgent(),
                'ip' => $req->ip()
            ]);
        return redirect()->to($listing->apply_link);
    }

    public function showCreatorListings($username)
    {
        $user = User::findByUsername($username);
        // if someone else views their profile, notify user
        if ($user->id !== auth()->user()->id) {
            dbNotify('👀 Services Viewed!', "Hey there! Just wanted to give you a quick heads-up that your profile was recently viewed. It's great to see others taking an interest in what you have to offer. Keep up the good work and stay open to new opportunities!", 'info', $user, getIcon('search'));
        }

        return view('ADM_creators.show_creator_listing', [
            'user' => $user,
            'current_page' => $user->name . ' Listings',
            // 'title' => "Adminting | Create a new Job Listing",
            // 'bread_action' => [
            //     'url' => route('listing.my_listings'),
            //     'text' => "My Listing"
            // ],
        ]);
    }

    public function createCreatorListing($username)
    {
        $user = User::findByUsername($username);
        $title =  'New Listing';
        if ( isset(request()->listing_id)) {
            $listingId = (int)request()->listing_id;
            $listing = CreatorListing::findOrFail($listingId);
            $title = ucfirst( $listing->title);
        }
        return view('ADM_creators.new_creator_listing', [
            'user' => $user,
            'current_page' => $title,
            'title' => "Adminting | ".$title,
            'bread_action' => [
                'url' => route('user.services.show', "@".$user->username),
                'text' => "My Listing"
            ],
        ]);
    }
    public function showProfile($username)
    {
        $user = User::findByUsername($username);
        $listings = $user->creator_listings()  ->with(['deals' => function ($query) {
            $query->orderBy('created_at'); // Ensure deals are ordered properly
        }])->where("status", "published")->get();
        // (object)[
        //     (object)[
        //         "title" => "Olga Roberts -Precision Pilates",
        //         "description" => "The Powerhouse of Pilates",
        //         "price" => 200,
        //         "location" => "Arlington, VA, US",
        //         "media" => [
        //             ["type" => "image", "url" => "https://placehold.co/800?text=No+Photo&font=roboto"],
        //             ["type" => "video", "url" => asset("users/test.mov")],
        //         ]
        //     ],
        //     (object)[
        //         "title" => "New Content Spread",
        //         "description" => "The Powerhouse of Pilates",
        //         "price" => 40,
        //         "location" => "Owerri Imo State",
        //         "media" => [
        //             ["type" => "video", "url" => asset("users/test.mov")],
        //             ["type" => "image", "url" => "https://placehold.co/800?text=No+Photo&font=roboto"]
        //         ]
        //     ],
        // ];
        // dd($deals);
        $pages = [];
        $sumFollowers = 0;
        foreach ($user->socialAccounts as $account) {
            foreach ($account->socialPages as $page) {
                // get followers for each page and add to the page object
                $page->followers = $page->metrics()->firstWhere("name", "followers")->value ?? null;
                if (!is_null($page->followers)) {
                    // summing the number of followers in a page
                    $sumFollowers += $page->followers;

                    $page->followers =  formatNumber($page->followers);
                }


                array_push($pages, $page);
            }
        }
        // if someone else views their profile, notify user
        if ($user->id !== auth()->user()->id) {
            dbNotify('👀 Profile Viewed!', "Hey there! Just wanted to give you a quick heads-up that your profile was recently viewed. It's great to see others taking an interest in what you have to offer. Keep up the good work and stay open to new opportunities!", 'info', $user, getIcon('search'));
        }
        // dd($sumFollowers);

        return view('ADM_creators.public_profile', [
            'user' => $user,
            'current_page' => $user->name . ' Profile',
        ], compact("user", "pages", "sumFollowers", "listings"));
    }
    public function listing_create()
    {
        $amount = 900;
        return view('ADM_creators.listing_create',  [
            'current_page' => 'New Listing',
            'title' => "Adminting | Create a new Job Listing",
            'amount' => $amount,
            'bread_action' => [
                'url' => route('listing.my_listings'),
                'text' => "My Listing"
            ],

        ]);
    }
    public function listing_store(Request $req)
    {

        $req->validate([
            'title' => "required",
            'description' => "required"
        ]);

        $user = User::find(auth()->user()->id);

        //   begin paymet verification
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . $req->payment_ref,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,

            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . env('PAYSTACK_SECRET'),
                "Cache-Control: no-cache",
                'Content-Type: application/json'
            ),
        ));

        $response = json_decode(curl_exec($curl));
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            // echo "cURL Error #:" . $err;
        } else {
            // echo 'success';
            //save payment method for user 
            $auth = $response->data->authorization;
            $user->payment_methods()->firstOrCreate([
                'channel' => $auth->channel,
                'authorization_code' => $auth->authorization_code,
            ], [
                'channel' => $auth->channel,
                'ip_address' => $req->ip(),
                'authorization_code' => $auth->authorization_code,
                'authorization_email' => $user->email,
                'authorization' => $auth,
            ]);
            // save transaction
            saveTransaction($response->data, "Payment for New Job Listing");
            // notify user about payment success
            dbNotify("💰 Payment Confirmed! 💳", "Congratulations! We are thrilled to inform you that your payment ($" . $response->data->amount . ") has been successfully confirmed. Thank you for your prompt payment and trust in our services. Your transaction has been completed, and we appreciate your support.", 'success', auth()->user(), getIcon('bank'));
        }
        //   end paymet verification

        //   dd(($response), $user->payment_methods);

        try {
            $md = new \ParsedownExtra();

            $listing = $user->listings()->create([
                'title' => $req->title,
                'slug' => Str::slug($req->title) . '-' . rand(1111, 9999),
                'location' => $req->location,
                'content' => $md->text($req->description),
                'is_highlighted' => $req->filled('highlighted'),
                'is_active' => true,
                'apply_link' => "http://adminting.lcl/listings/new"
            ]);

            foreach (explode(',', $req->category) as $reqTag) {
                $tag = Categories::firstOrCreate(
                    [
                        'category_slug' => Str::slug(trim($reqTag))
                    ],
                    [
                        'category_name' => ucwords(trim($reqTag))
                    ],

                );
                $tag->listings()->attach($listing->id);
            }
            // dispatch app messages
            NewJobListingNotify::dispatch($listing, auth()->user());

            return response()->json([
                'code' => 1, //trigger success notification
                'message' => "Job Listing has been added Successfully, you can track progress at your dashboard!"
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'code' => 0, //trigger error notification
                'message' => "An Error occured! :" . $th->getMessage()
            ]);
            // return ;
        }
    }

    public function payment_confirm(Request $req)
    {
        // dd($req->reference);
        $payment_ref = $req->reference;
        $user = User::find($req->user_id);
        $listing = Listing::find($req->listing_id);
        //   begin paymet verification
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . $payment_ref,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,

            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . env('PAYSTACK_SECRET'),
                "Cache-Control: no-cache",
                'Content-Type: application/json'
            ),
        ));

        $response = json_decode(curl_exec($curl));
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            // echo "cURL Error #:" . $err;
        } else {
            // echo 'success';
            //save payment method for user 
            $auth = $response->data->authorization;
            // updating the listing as payment has been confirmed 
            $listing->update([
                'payment_status' => "paid"
            ]);
            // add payment method for user
            $user->payment_methods()->firstOrCreate([
                'channel' => $auth->channel,
                'authorization_code' => $auth->authorization_code,
            ], [
                'channel' => $auth->channel,
                'ip_address' =>   $_SERVER['REMOTE_ADDR'], //ip address
                'authorization_code' => $auth->authorization_code,
                'authorization_email' => $user->email,
                'authorization' => $auth,
            ]);
            // save transaction
            saveTransaction($response->data, "Payment for New Job Listing");
            // notify user about payment success
            dbNotify("💰 Payment Confirmed! 💳", "Congratulations! We are thrilled to inform you that your payment ($" . $response->data->amount . ") has been successfully confirmed. Thank you for your prompt payment and trust in our services. Your transaction has been completed, and we appreciate your support.", 'success', auth()->user(), getIcon('bank'));
        }
        //   end paymet verification

        return view('ADM_brand.payment_callback', [
            'current_page' => "Payment Successful",
            'bread_action' => [
                'url' => route('dashboard'),
                'text' => "Dashboard"
            ],
            "title" => "Payment Was successfull",
            "body" => "Congratulations! We are thrilled to inform you that your payment ($" . $response->data->amount . ") has been successfully confirmed. Thank you for your prompt payment and trust in our services. Your transaction has been completed, and we appreciate your support.",
            "listings" => auth()->user()->listings
        ]);
    }

    public function showFinance()
    {
        return view('ADM_creators.finance',  [
            'current_page' => 'Finance',
            'title' => env("APP_NAME") . "| Settings - Finance",
            'bread_action' => [
                'url' => route('dashboard'),
                'text' => "dashboard"
            ],

        ]);
    }

    public function showSocials()
    {
        return view('ADM_creators.socials',  [
            'current_page' => 'Socials',
            'title' => env("APP_NAME") . "| Settings - Socials",
            'bread_action' => [
                'url' => route('dashboard'),
                'text' => "dashboard"
            ],

        ]);
    }

    public function creatorListingUploadMedia(Request $request)
    {
        try {
            // Validate the file
            $request->validate([
                'file' => 'required|file|mimes:jpeg,png,jpg,gif,mp4,mov,avi|max:20480', // Max size 20MB
                "username" => "required"
            ]);

            $file = $request->file('file');
            $type = $file->getMimeType(); // Get the MIME type
            $fileType = strpos($type, 'image') === 0 ? 'image' : (strpos($type, 'video') === 0 ? 'video' : null);

            if (!$fileType) {
                return response()->json(['status' => 'error', 'message' => 'Only image and video files are allowed.'], 400);
            }

            // Store the file
            $path = $file->store('Gallery/@' . $request->username, "public");
            // Prepare response
            $fileData = [
                'id' => uniqid(), // Generate a unique ID
                'url' => asset("storage/{$path}"),
                'name' => $file->getClientOriginalName(),
                'type' => $fileType, // Either 'image' or 'video'
                'size' => $file->getSize()
            ];

            return response()->json(['status' => 'success', 'file' => $fileData]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function creatorListingDeleteMedia(Request $request)
    {
        try {
            $fileId = $request->input('fileId');
            // Retrieve the file data based on the ID (if stored in a database)
            $filePath = "uploads/media/{$fileId}"; // Adjust this logic based on your file naming/storage
            $fullPath = storage_path("app/public/{$filePath}");
    
            if (file_exists($fullPath)) {
                unlink($fullPath); // Delete the file
            }
    
            return response()->json(['status' => 'success', 'message' => 'File deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    
    }
}
