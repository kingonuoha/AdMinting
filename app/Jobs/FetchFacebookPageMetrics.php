<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\Socials\SocialPage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Social\FacebookController;

class FetchFacebookPageMetrics implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $socialPage;
    /**
     * Create a new job instance.
     */
    public function __construct(SocialPage $socialPage)
    {
        $this->socialPage = $socialPage;
    }
    /**
     * Execute the job.
     */
    public function handle()
    {
        try {
           $socialAccount =  $this->socialPage->socialAccount;
           $user =  $socialAccount->user;
            $metricFetched = app(FacebookController::class)->handlePageMetricAndSnapshot($this->socialPage);
            $IGPageInfo =  app(FacebookController::class)->getInstagramAccounts($this->socialPage->page_id, $this->socialPage->access_token, $socialAccount);

            if($metricFetched){
                $this->socialPage->update([
                    "details_gotten_at" => now()
                ]);
            }

            $message = "insights for {$this->socialPage->name} has been fecthed successfully!!";
            createLog($message, getIcon('rocket'), "success", $user->id);

        } catch (\Exception $e) {
            $message = "Failed to fetch metrics for page {$this->socialPage->id} having name of {$this->socialPage->page_name}: " . $e->getMessage();
            Log::error($message);
            createLog($message, getIcon('warning'), "danger", $user->id);
        }
    }
}
