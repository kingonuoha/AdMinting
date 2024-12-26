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
    public  $search, $payment_status, $perPage = 10, $userStats, $balance;
    public function mount()
    {
        //    dd(Payroll::search(trim($this->search)));
        $payroll = Payroll::all();


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
            $this->balance = 11 / 100;
        } else {
            // dd($response);
            if ($response['status']) {
                $this->balance = (($response['data'][0]['balance'] == 0) ? 11 : $response['data'][0]['balance']  / 100);
            }
            // dd($response);
        }

        $this->userStats = [
            [
                'title' => "Total Balance",
                'percent' =>  percent_two_values($payroll->where('payment_status', '!=', 'paid')->sum('amount'), $this->balance),
                'value' =>  'N' . formatMoney($this->balance),
                'color' => 'info'
            ],
            [
                'title' => "Total Debt Cleared",
                'percent' => percent_two_values($payroll->where('payment_status', 'paid')->sum('amount'), $payroll->sum('amount')),
                'value' => 'N' . formatMoney($payroll->where('payment_status', 'paid')->sum('amount'), true),
                'color' => 'warning'
            ],
            [
                'title' => "Out Standing Debt",
                'percent' => percent_two_values($payroll->where('payment_status', '!=', 'paid')->sum('amount'), $payroll->sum('amount')),
                'value' => 'N' . formatMoney($payroll->where('payment_status', '!=', 'paid')->sum('amount'), true),
                'color' => 'primary'
            ],

        ];
    }


    public function payOut($id)
    {
        $payroll = Payroll::find($id);
        $recipient = $payroll->user;
        // dd($recipient);
        $recipient_payment_id = $recipient->bank_details['recipient_code'];
        // $this->dispatchBrowserEvent('show:OTPModal');
        // dd('otp');
        $url = "https://api.paystack.co/transfer";

        $fields = [
            "source" => "balance",
            "reason" => env("APP_NAME") . "- Listing Completion Payout",
            "amount" => $payroll->amount * 100,
            "recipient" => $recipient_payment_id
        ];

        $fields_string = http_build_query($fields);

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . env('PAYSTACK_SECRET'),
            "Cache-Control: no-cache",
        ));

        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute post
        $result = json_decode(curl_exec($ch), true);

        if ($result['status']) {
            // no errors
            if ($result['data']['status'] == 'otp') {
                return $this->dispatchBrowserEvent('error_alert', [
                    'message' => "PAYSTACK ERROR:" . $result['message'] . "go to your Dashboard and disable OTP verification"
                ]);
            } else {

                $payroll->update([
                    'payment_status' => "paid"
                ]);
                // send db notification to recipient
                $title = "Payment Received! 🎉";
                $message = "Hi " . $recipient->name . ", we're thrilled to inform you that we've received your payment of NGN" . formatMoney($payroll->amount) . ". It's on its way to your bank account. Keep an eye out for it! 😎";

                dbNotify($title, $message, "info", $recipient, getIcon('wallet'));
                // send db notification to Admin
                $title = "New Payment Alert! 🚨";
                $message = "Hey Admin, we've just made a payment of  NGN" . formatMoney($payroll->amount) . " to " . $recipient->name . ". Please verify and confirm the transaction. You're doing great! 😊" ;
                notify_admin($title, $message , 'success');

                return $this->dispatchBrowserEvent('success_alert', [
                    'message' => "User's Payment Processing, User is Expected to see the tansaction within the next 5 mins"
                ]);
                // verify payment here
                $this->verifyTransfer($result['reference']);
       createLog("NGN" . formatMoney($payroll->amount) . "is on its way to " . $recipient->name , getIcon('wallet'), 'success');

            }
        } else {
            $this->dispatchBrowserEvent('error_alert', [
                'message' => "PAYSTACK ERROR:" . $result['message']
            ]);
       createLog("error occured while paying a creator", getIcon('wallet'), 'danger');

        }
    }


    public function verifyTransfer($ref = "gi75976tcudqguhyvl9u")
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transfer/verify/:" . $ref,
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

        $response = json_decode(curl_exec($curl), true);;
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $this->dispatchBrowserEvent('error_alert', [
                'message' => "PAYSTACK ERROR:" . $err
            ]);
        } else {
            if ($response['status']) {
                // no errors
                // return $this->dispatchBrowserEvent('error_alert', [
                //     'message' => "PAYSTACK ERROR:" . $response['message']. "go to your Dashboard and disable OTP verification"
                // ]);
                dd($response);
            } else {
                $this->dispatchBrowserEvent('error_alert', [
                    'message' => "PAYSTACK ERROR:" . $response['message']
                ]);
            }
            //   echo $response;
        }
    }
    public function render()
    {
        return view('livewire.payroll-view', [
            'payrolls' =>  Payroll::search(trim($this->search))
                ->when($this->payment_status, function ($query) {
                    $query->where('payment_status', strtolower($this->payment_status));
                })->paginate($this->perPage),


        ]);
    }
}
