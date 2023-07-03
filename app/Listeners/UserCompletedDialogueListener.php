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
        Mail::to($event->user->email)->send(new DialogueCompletedMail($event->user));
    }
}
