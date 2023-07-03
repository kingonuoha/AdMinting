<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ListingCompletedCreator extends Mailable
{
    use Queueable, SerializesModels;

     public $listing, $brand, $brandinfo, $user;
    /**
     * Create a new message instance.
     */
    public function __construct($listing, $brand, $applicant)
    {
        //
        $this->user = $applicant;
        $this->listing = $listing;
        $this->brand = $brand;
        $this->brandinfo = $this->brand->brandInfos;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Hurray! Listing has been Marked as completed',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.listing-completed_creator',
            with: [
                'user'=>$this->user,
                'brand' => $this->brandinfo,
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
