<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewJobListingNotifyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $listing;
    /**
     * Create a new message instance.
     */
    public function __construct($user, $listing)
    {
        //
        $this->user = $user;
        $this->listing = $listing;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "AdMinting | Exciting Job Opportunity - Join Our Team!",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.new_job_creators',
            with: [
                'user'=> $this->user
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
