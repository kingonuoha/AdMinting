<?php

namespace App\Listeners;

use App\Events\UserCompletedDialogue;
use App\Mail\DialogueCompletedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class UserCompletedDialogueListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserCompletedDialogue $event): void
    {
        $mail_body = view('mail.dialogue_complete',[
            'user'=> $event->user
        ])->render();
      
      $mailConfig = [
       'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
       'mail_from_name' => env('EMAIL_FROM_NAME'),
       'mail_recipient_email' => $event->user->email,
       'mail_recipient_name' => $event->user->name,
       'mail_subject' => env("APP_NAME").' | '. $event->user->name.' Account Activated',
       'mail_body' => $mail_body
      ];
      sendMail($mailConfig);
        // Mail::to($event->user->email)->send(new DialogueCompletedMail($event->user));
    }
}
