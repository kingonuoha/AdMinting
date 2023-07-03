<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Listing;
use App\Models\Payroll;
use Livewire\Component;
use Livewire\WithPagination;

class PayrollView extends Component
{
    use WithPagination;
    public  $search, $payment_status, $perPage = 10, $userStats;
    public function mount(){
    //    dd(Payroll::search(trim($this->search)));
    $payroll = Payroll::all();
    $this->userStats = [
     [
         'title' => "Total Budjet",
         'percent'=>  percent_two_values($payroll->sum('amount'), $payroll->sum('amount')),
         'value'=>  'N'.formatMoney($payroll->sum('amount'), true),
         'color' => 'info'
     ],
     [
         'title' => "Total Debt Cleared",
         'percent'=> percent_two_values($payroll->where('payment_status', 'paid')->sum('amount'), $payroll->sum('amount')),
         'value'=> 'N'.formatMoney($payroll->where('payment_status', 'paid')->sum('amount'), true),
         'color' => 'warning'
     ],
     [
         'title' => "Out Standing Debt",
         'percent'=> percent_two_values($payroll->where('payment_status', '!=', 'paid')->sum('amount'), $payroll->sum('amount')),
         'value'=> 'N'.formatMoney($payroll->where('payment_status', '!=', 'paid')->sum('amount'), true),
         'color' => 'primary'
     ],
    
 ];

    }


    public function render()
    {
        return view('livewire.payroll-view', [
            'payrolls' =>  Payroll::search(trim($this->search))
            ->when($this->payment_status, function($query){
                $query->where('payment_status', strtolower($this->payment_status));
            })->paginate($this->perPage),
                
            
        ]);
    }
}
