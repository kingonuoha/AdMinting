<?php

namespace App\Http\Livewire;

use App\Models\appVisits;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Listing;
use App\Models\Payroll;
use Livewire\Component;

class SuperAdminDashboard extends Component
{
    public $topStats, $outstandingDebt, $listing_summary, $ranking_users, $recently_onboarded_listing, $balance;
    public function mount(){
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $thisWeekVisits = appVisits::whereBetween('created_at', [$startOfWeek, $endOfWeek])
                        ->sum('hits');
        $allListingCount = Listing::all()->count();

        // get balance from payday
        $this->balance = $this->getBalance();
        $this->topStats = [
            [
                'title' => "Paystack Account Balance",
                'icon' =>'wallet',
                'count'=> "NGN".formatMoney($this->balance),
                'color' => 'primary'
            ],
            [
                'title' => "Visits this week",
                'icon' =>'cursor',
                'count'=>  $thisWeekVisits,
                'color' => 'info'
            ],
            [
                'title' => "Users Awaiting Payment",
                'icon' =>'bank',
                'count'=> Payroll::where('payment_status', '!=', 'declined')->where('payment_status', '!=', 'paid')->get()->count(),
                'color' => 'warning'
            ],
            [
                'title' => "Total Users",
                'icon' =>'trophy',
                'count'=> User::where('role', '!=', 'adm_admin')->get()->count(),
                'color' => 'success'
            ],
        ];

        $this->outstandingDebt = formatMoney(Payroll::where('payment_status', '!=', 'declined')->where('payment_status', '!=', 'paid')->sum('amount'));
        $this->listing_summary = [
            [
            'icon'=>'briefcase',
            'title'=>'Jobs Posted',
            'value'=>$allListingCount
            ],
            [
            'icon'=>'globe',
            'title'=>'Region',
            'value'=>Listing::distinct('location')->count().' different region'
            ],
            [
            'icon'=>'check-square',
            'title'=>'Percent Completed',
            'value'=>percentCalc(Listing::where('completed_on', '!=', null)->count(), $allListingCount).'% job Completed!'
            ],
            [
            'icon'=>'dollar',
            'title'=>'Debt Covered',
            'value'=>'N'.formatMoney(Payroll::where('payment_status', 'paid')->sum('amount'))
            ],
        ];

        $this->ranking_users = User::orderBy('rating', 'desc')->limit(5)->get();

        $this->recently_onboarded_listing = recently_onboarded_listing();
    }
    public function getBalance()
    {
       //  get balance from paystack
       $curl = curl_init();

       curl_setopt_array($curl, array(
           CURLOPT_URL => "https://api.paystack.co/balance",
           CURLOPT_RETURNTRANSFER => true,
           CURLOPT_ENCODING => "",
           CURLOPT_MAXREDIRS => 10,
           CURLOPT_TIMEOUT => 30,
           CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
           CURLOPT_CUSTOMREQUEST => "GET",
           CURLOPT_HTTPHEADER => array(
               "Authorization: Bearer " . env('PAYSTACK_SECRET'),
               "Cache-Control: no-cache",
           ),
       ));

       $response = json_decode(curl_exec($curl), true);
       $err = curl_error($curl);

       curl_close($curl);

       if ($err) {
           $this->dispatchBrowserEvent('error_alert', [
               'message' => "cURL Error #:" . $err
           ]);
           return  11 / 100;
       } else {
           // dd($response);
           if ($response['status']) {
              return  (($response['data'][0]['balance'] == 0) ? 11 : $response['data'][0]['balance']  / 100);
           }
           // dd($response);
       }
    }
    public function render()
    {
        return view('livewire.super-admin-dashboard');
    }
}
