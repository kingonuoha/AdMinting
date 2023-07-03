<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;

class AccountSecurity extends Component
{
    public $user;
     /**
     * The component's state.
     *
     * @var array
     */
    public $state = [
        'current_password' => '',
        'password' => '',
        'password_confirmation' => '',
    ];

    protected $listeners = [
        'deleteCardConfirmed'
    ];
     /**
     * Update the user's password.
     *
     * @param  \Laravel\Fortify\Contracts\UpdatesUserPasswords  $updater
     * @return void
     */
    public function updatePassword(UpdatesUserPasswords $updater)
    {
        $this->resetErrorBag();

        $updater->update(Auth::user(), $this->state);

        if (request()->hasSession()) {
            request()->session()->put([
                'password_hash_'.Auth::getDefaultDriver() => Auth::user()->getAuthPassword(),
            ]);
        }

        $this->state = [
            'current_password' => '',
            'password' => '',
            'password_confirmation' => '',
        ];

        // warning
        dbNotify("⚠️ Password Changed!", "We noticed a recent change to your account password. If you made this change, please disregard this message.

        If you didn't change your password, take immediate action to secure your account. Reset your password, ensure it's strong and unique, and review your account activity.
        
        Stay vigilant and prioritize your account security!", 'warning', auth()->user(), getIcon('warning'));
       $this->dispatchBrowserEvent('success_alert',[
        'message'=> "password has been updated successfully, pls try not to forget your new password, as no one in AdMinting can help you out if you do!"
       ]);
    }

      /**
     * Get the current user of the application.
     *
     * @return mixed
     */
    public function getUserProperty()
    {
        return Auth::user();
    }

       // Begin Session Browser Algorithm

           /**
     * Indicates if logout is being confirmed.
     *
     * @var bool
     */
    public $confirmingLogout = false;

    /**
     * The user's current password.
     *
     * @var string
     */
    public $password = '';

    /**
     * Confirm that the user would like to log out from other browser sessions.
     *
     * @return void
     */
    public function confirmLogout()
    {
        $this->password = '';

        $this->dispatchBrowserEvent('confirming-logout-other-browser-sessions');

        $this->confirmingLogout = true;
    }


     /**
     * Log out from other browser sessions.
     *
     * @param  \Illuminate\Contracts\Auth\StatefulGuard  $guard
     * @return void
     */
    public function logoutOtherBrowserSessions(StatefulGuard $guard)
    {
        if (config('session.driver') !== 'database') {
            return;
        }

        $this->resetErrorBag();

        if (! Hash::check($this->password, Auth::user()->password)) {
            throw ValidationException::withMessages([
                'password' => [__('This password does not match our records.')],
            ]);
        }

        $guard->logoutOtherDevices($this->password);

        $this->deleteOtherSessionRecords();

        request()->session()->put([
            'password_hash_'.Auth::getDefaultDriver() => Auth::user()->getAuthPassword(),
        ]);

        $this->confirmingLogout = false;

        $this->dispatchBrowserEvent('closing-confirming-logout-other-browser-sessions');
        $this->dispatchBrowserEvent('success_alert', [
            'message'=> "You have been successfully logged out from previous logged in devices!"
        ]);
    }

    /**
     * Delete the other browser session records from storage.
     *
     * @return void
     */
    protected function deleteOtherSessionRecords()
    {
        if (config('session.driver') !== 'database') {
            return;
        }

        DB::connection(config('session.connection'))->table(config('session.table', 'sessions'))
            ->where('user_id', Auth::user()->getAuthIdentifier())
            ->where('id', '!=', request()->session()->getId())
            ->delete();
    }

    /**
     * Get the current sessions.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getSessionsProperty()
    {
        if (config('session.driver') !== 'database') {
            return collect();
        }

        return collect(
            DB::connection(config('session.connection'))->table(config('session.table', 'sessions'))
                    ->where('user_id', Auth::user()->getAuthIdentifier())
                    ->orderBy('last_activity', 'desc')
                    ->get()
        )->map(function ($session) {
            return (object) [
                'agent' => $this->createAgent($session),
                'ip_address' => $session->ip_address,
                'is_current_device' => $session->id === request()->session()->getId(),
                'last_active' => Carbon::createFromTimestamp($session->last_activity)->diffForHumans(),
            ];
        });
    }

    /**
     * Create a new agent instance from the given session.
     *
     * @param  mixed  $session
     * @return \Jenssegers\Agent\Agent
     */
    protected function createAgent($session)
    {
        return tap(new Agent, function ($agent) use ($session) {
            $agent->setUserAgent($session->user_agent);
        });
    }
    
    
    public function deleteCard($card_id)
    {

       $this->dispatchBrowserEvent('security:delete_card', [
        "message" => "You are about to delete a card, we will require you to put a valid card next time a transaction is been made.<br/> note that this action cannot be undone, Proceed?",
        'title' => "Are you sure?",
            "type"=> "error",
            'card_id' => $card_id
       ]);
    }
    public function deleteCardConfirmed($card_id)
    {
        // dd($card_id);
        dbNotify("💳 Card Deleted!", "We wanted to let you know that a card linked to your account has been successfully deleted. If you performed this action, you can disregard this message.

        However, if you did not delete the card, we recommend reviewing your account activity for any unauthorized changes. If you suspect any suspicious activity, please contact our support team immediately for further assistance.
        
        We prioritize the security of your financial information, and we're here to help resolve any concerns you may have.", 'danger', auth()->user(), getIcon('card'));
        
        $user = User::find(auth()->user()->id);
        $user->payment_methods()->where('id', $card_id)->first()->delete();
        $this->dispatchBrowserEvent('success_alert', [
            "message" => "Card has been sussessfully Deleted...running background actions",
            'title' => "Successfull",
        ]);
        //send mail
    }

    // End session browser Algorithm 

    
    public function render()
    {
        // dd(getCardList()[0]->authorization);
        $user =  $this->user = User::find(auth()->user()->id);
        return view('livewire.account-security',compact('user'))->extends('layouts.ADM_app', [
            'current_page' => 'Security',
            'title' => 'Adminting | Secure Profile',
            
        ]);
    }
}
