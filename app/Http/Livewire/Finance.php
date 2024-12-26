<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use PhpParser\Node\Expr\Cast\Object_;

class Finance extends Component
{

    public $supported_banks = [],  $selected_bank, $account_number, $account_name, $isFetchingInfo, $user, $user_bank_details;
    protected $listeners = [
        "bankSelected"
    ];

    public function bankSelected($bankValue)
    {
        $this->selected_bank = $bankValue;
        $this->account_number = $this->account_name = NULL;
    }
    public function  mount()
    {
        $this->user = User::find(auth()->user()->id);
        $this->user_bank_details = $this->user->bank_details;
        // dd($this->user_bank_details);
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/bank?country=nigeria",
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

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $this->supported_banks = json_decode($response, true);
            // dd($this->supported_banks, $this->supported_banks);
        }
    }
    public function updatedAccountNumber($acc_no)
    {
        $this->dispatchBrowserEvent('showToast', [
            'type' => "success",
            "message" => "processing..."
        ]);
        return $this->fetchAccountName($acc_no);
    }

    public function fetchAccountName($acc_no)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/bank/resolve?account_number=" . $acc_no . "&bank_code=" . $this->selected_bank,
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

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $this->account_name = NULL;

            $this->dispatchBrowserEvent('error_alert', [
                'message' => "cURL Error #:" . $err
            ]);
            // echo "cURL Error #:" . $err;
        } else {
            $response = json_decode($response, true);
            if ($response['status']) {
                $this->account_name = $response['data']['account_name'];
            } else {
                $this->account_name = NULL;

                $this->dispatchBrowserEvent('showToast', [
                    'type' => "error",
                    "message" => $response['message']
                ]);
                $this->addError('error_name', $response['message']);
                //  dd($response);
            }
            $this->isFetchingInfo = null;
        }
    }
    public function saveBankDetails()
    {
        if (is_null($this->selected_bank) || is_null($this->account_number) || is_null($this->account_name)) {
            return  $this->addError('error_name', "There should be no empty field, pls check your details and try again");
        }

        $url = "https://api.paystack.co/transferrecipient";

        $fields = [
            "type" => "nuban",
            "name" => $this->account_name,
            "account_number" => $this->account_number,
            "bank_code" => $this->selected_bank,
            "currency" => "NGN"
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
            // 'Content-Type: application/json'
        ));

        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute post
        $result = json_decode(curl_exec($ch), true);
        // if the status was successful 
        if ($result['status']) {
            //  we are going to save the entire data field in the users table in the db
            $user = User::find(auth()->user()->id);
            $user->update([
                'bank_details' => $result['data']
            ]);

            // send mail
            // send db notification
            $title = "Bank Details Added";
            $message = "Your bank details have been successfully added. - [" . $this->account_name . "]- [" . $this->account_number . "]-[" . $result['data']['details']['bank_name'] . "];  We appreciate your trust in our platform and look forward to serving you better. If you have any questions or concerns, please don't hesitate to contact us. Thank you for choosing us!";

            dbNotify($title, $message, "success", $user, getIcon('globe'));
            // show success message 
            $this->dispatchBrowserEvent('success_alert', [
                'message' => "Your Bank details have been added successfully [" . $this->account_name . "]- [" . $this->account_number . "]-[" . $result['data']['details']['bank_name'] . "], you will recieve an email shortly."
            ]);
       createLog("you added your bank details", getIcon('bank'), 'success');

        } else {
            $user = User::find(auth()->user()->id);
            $title = "Bank Details Not Added";
            $message = "We're sorry, but we were unable to add your bank details. Please check your input and try again. If you continue to experience issues, please contact our support team for assistance.";
            dbNotify($title, $message, "error", $user, getIcon('warning'));
            // show error message 
            $this->dispatchBrowserEvent('error_alert', [
                'message' => $message
            ]);
       createLog("an error occured adding bank details", getIcon('warning'), 'danger');

        }
        $this->account_number = $this->account_name = $this->selected_bank = NULL;
        $this->mount();
        
    }
    public function deleteDetails()
    {
        // delete from paystack
        $curl = curl_init();
  
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.paystack.co/transferrecipient/:".$this->user_bank_details['id'],
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "DELETE",
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
        } else {

        //    delete from database 
          $this->user->update([
           "bank_details"=> NULL
          ]);
           // send db notification
           $title = "Bank Details Deleted";
           $message = "Your bank details have been successfully Deleted. we recomend adding back your details as soon as posible, because its the only way we can pay you after listing completion";

           dbNotify($title, $message, "warning", $this->user, getIcon('warning'));
           // show warning message 
           $this->dispatchBrowserEvent('warning_alert', [
               'message' => $message
           ]);
       createLog("bank detail deleted", getIcon('wallet'), 'danger');

           return $this->mount();
        }
    }
    public function editDetails()
    {
        $this->dispatchBrowserEvent('warning_alert', [
            'message' =>" this feature is not available at the moment, if your bank details is not correct, you can delete it and add the correct one again"
        ]);
    }
    public function render()
    {
        return view('livewire.finance');
    }
}
