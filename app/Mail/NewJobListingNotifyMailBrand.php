<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewJobListingNotifyMailBrand extends Mailable
{
    use Queueable, SerializesModels;

    public $brand;
    public $listing;
    /**
     * Create a new message instance.
     */
    public function __construct($brand, $listing)
    {
        //
        $this->brand  =  $brand;
        $this->listing  =  $listing;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "AdMinting | Congratulations! Your Job Posting is Live",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.new_job_brand',
            with: [
                'user'=> $this->brand,
                'listing' => $this->listing
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
