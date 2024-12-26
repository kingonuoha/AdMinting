<?php

namespace App\Http\Livewire\Socials;

use Livewire\Component;
use App\Models\Socials\SocialPage;
use Illuminate\Support\Facades\Log;
use App\Models\Socials\SocialAccount;
use App\Jobs\FetchFacebookPageMetrics;
use App\Http\Controllers\Social\FacebookController;

class SocialsIndex extends Component
{
    public $pages = [], $allFetched = false, $socials;
    public $search = '';
    public $getDetails = false;
    public $socialAccountID, $socialAccount,  $connectedAccounts, $seeSocialAccounts;
    protected $facebookSDK;
    protected $listeners = [
        "handleRequest" => 'handleRequest',
        "deletePage" => "deletePage",
        "deleteAllPages" => "deleteAllPages"
    ];


    public function mount()
    {
        // Check for query parameters
        $this->socials = [
            [
                'name' => 'Facebook',
                "desc" => "Connect with Friends and Clients",
                'redirect_url' => route('facebook.redirect'), // Replace with your actual route
                'logo' => asset('users/assets/media/svg/brand-logos/facebook-4.svg'),
            ],
            [
                'name' => 'Google',
                "desc" => "Plan properly your workflow",
                'redirect_url' => route('google.redirect'), // Replace with your actual route
                'logo' => asset('users/assets/media/svg/brand-logos/youtube-3.svg'),
            ],
            [
                'name' => 'Instagram',
                "desc" => "Share Ideas",
                'redirect_url' => route('facebook.redirect'), // Replace with your actual route
                'logo' => asset('users/assets/media/svg/brand-logos/instagram-2-1.svg'),
            ],
        ];
        $this->facebookSDK =  app(FacebookController::class);
        // dd($this->facebookSDK);
        $this->getDetails = request()->query('getDetails', false);
        $this->socialAccountID = request()->query('account', null);
        $this->socialAccount = SocialAccount::find($this->socialAccountID);
    }

    public function handleRequest()
    {
        $allFetched = true; // Assume all pages are fetched by default
        $retryInterval = now()->subDay(); // Retry if `updated_at` is more than a day old
        $defaultTokenExpiryDays = 60; // Default token expiry duration (if `token_expires_at` is null)

        foreach ($this->connectedAccounts as $account) {
            // Determine token expiry date
            $tokenExpiryDate = $account->token_expires_at
                ? $account->token_expires_at
                : $account->created_at->addDays($defaultTokenExpiryDays);

            // If the token has expired, skip processing
            if (now()->greaterThan($tokenExpiryDate)) {
                Log::warning("Skipping account ID {$account->id} due to expired token.");
                createLog("Skipping account ID {$account->id} due to expired token.", getIcon("time-schedule"), "warning");
                continue;
            }

            foreach ($account->socialPages as $page) {
                if (is_null($page->details_gotten_at)) {
                    // dd("hi", $page);
                    // Retry if `updated_at` is older than the retry interval
                    if ($page->updated_at < $retryInterval) {
                        try {
                            if ($page->platform === "facebook") {
                                $this->fetchFacebookData($page);
                            }
                            $allFetched = false; // At least one page still needs fetching


                            // app(FacebookController::class)->handlePageMetricAndSnapshot($page);
                            $page->touch(); // Update the `updated_at` timestamp
                        } catch (\Exception $e) {
                            // Log the exception and continue
                            Log::error("Failed to fetch insights for page ID {$page->id}: {$e->getMessage()}");
                            createLog("Failed to fetch insights for page ID {$page->id}: {$e->getMessage()}", getIcon("settings-1"), "warning");
                        }
                    }
                }
            }
        }

        $this->allFetched =  $allFetched;
    }



    public function fetchFacebookData(SocialPage $page)
    {
        FetchFacebookPageMetrics::dispatch($page)->onQueue('facebook-metrics');
        // // Get the list of pages that the user manages
        // $pageList = app(FacebookController::class)->getPageList($socialAccount->access_token);
        // foreach ($pageList['data'] as $page) {
        //     // check if the user has the social page already
        //     // get other info about page
        //     $pageInfo = app(FacebookController::class)->getPageInfo($page['id'], $page['access_token']);
        //     // check if page has instagram 
        //     // dd($IGPageInfo);
        //     // dd($pageInfo);
        //     $SocialPage = $socialAccount->socialPages()->updateOrCreate([
        //         'page_id' => $page['id'],
        //     ], [
        //         'platform' => "facebook",
        //         'picture' =>  $pageInfo["picture"]['data'],
        //         'about' =>  isset($pageInfo["about"]) ? $pageInfo["about"] : "-",
        //         'page_name' => $page['name'],
        //         'access_token' => $page['access_token'],
        //         'token_expires_at' => null,
        //     ]);

        //     app(FacebookController::class)->handlePageMetricAndSnapshot($SocialPage);
        //     // end get page details 

        //     $IGPageInfo = app(FacebookController::class)->getInstagramAccounts($page['id'], $page['access_token'], $socialAccount);
        // }
        return true;
    }

    public function openConectedAccountModal($platform)
    {
        $this->seeSocialAccounts = [
            "platform" => $platform,
            "accounts" => $this->connectedAccounts->where("platform", strtolower($platform))
        ];
        // dd($this->seeSocialAccounts);
        return $this->dispatchBrowserEvent('social:open-connected');
    }

    public function closeConectedAccountModal()
    {
        $this->seeSocialAccounts = null;
        return $this->dispatchBrowserEvent('social:close-connected');
    }

    public function openAddAccountModal()
    {
        $this->dispatchBrowserEvent('showAddAccountModal');
    }

    // This method will be triggered when the user clicks the delete single page button
    public function confirmDeletePage($pageId)
    {
        return  $this->deleteAllPages();
        // Dispatch a Livewire event to trigger SweetAlert in JavaScript
        $this->dispatchBrowserEvent('trigger-swal-confirmation', [
            'type' => 'single',
            'pageId' => $pageId,
            'message' => 'This page will be deleted permanently.'
        ]);
    }

    // This method will be triggered when the user clicks the delete all pages button
    public function confirmDeleteAllPages()
    {
        // Dispatch a Livewire event to trigger SweetAlert in JavaScript
        $this->dispatchBrowserEvent('trigger-swal-confirmation', [
            'type' => 'all',
            'message' => 'All pages will be deleted permanently.'
        ]);
    }

    // Method to delete a single page
    public function deletePage($pageId)
    {
        // dd("delete single");
        $page = SocialPage::find($pageId);
        if ($page) {
            $page_name = $page->page_name;
            $page->snapshots()->delete();
            $page->metrics()->delete();
            $page->delete();

            // Dispatch a Livewire event to trigger SweetAlert in JavaScript
            $this->dispatchBrowserEvent('success_alert', [
                'message' => $page_name . ' page has been deleted successfully!'
            ]);
        }
    }

    // Method to delete all pages
    public function deleteAllPages()
    {
        //  dd("delete all");
        $pages = SocialPage::all();
        foreach ($pages as $page) {
            $page->snapshots()->delete();
            $page->metrics()->delete();
            $page->delete();
        }
        $this->dispatchBrowserEvent('success_alert', [
            'message' => 'all the pages has been deleted successfully!'
        ]);
    }



    public function render()
    {
        // Get authenticated user's connected social accounts
        $this->connectedAccounts = auth()->user()->socialAccounts;

        // Build the query for the user's social pages
        $query = SocialPage::whereHas('socialAccount', function ($q) {
            $q->whereIn('id', auth()->user()->socialAccounts->pluck('id'));
        });

        // Apply search filter if needed
        if (!empty($this->search)) {
            $query->search($this->search);
        }

        // Load the pages, including related metrics
        $this->pages = $query->with('metrics')->get();
        // Process metrics for each page
        foreach ($this->pages as $page) {
            $metrics = $page->metrics;

            // Calculate engagement rate
            $engagement_rate = $metrics->firstWhere('name', 'engagement_rate');
            $page->followers = $metrics->firstWhere('name', 'followers')->value ?? null;

            if ($engagement_rate) {
                $page->engagement_rate = $engagement_rate->value . "%";
            }

            if ($page->followers > 0) {
                $page->followers = formatNumber($page->followers);
            }
        }

        // Return the view with the filtered pages
        return view('livewire.socials.socials-index', [
            'pages' => $this->pages,
        ]);
    }
}
