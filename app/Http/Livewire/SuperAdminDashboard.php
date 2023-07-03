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
    public $topStats, $outstandingDebt, $listing_summary, $ranking_users, $recently_onboarded_listing;
    public function mount(){
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $thisWeekVisits = appVisits::whereBetween('created_at', [$startOfWeek, $endOfWeek])
                        ->sum('hits');
        $allListingCount = Listing::all()->count();
        $this->topStats = [
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
                'title' => "Total Jobs Created",
                'icon' =>'briefcase',
                'count'=> $allListingCount,
                'color' => 'primary'
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
    public function render()
    {
        return view('livewire.super-admin-dashboard');
    }
}
