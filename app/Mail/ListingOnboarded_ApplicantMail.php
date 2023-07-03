<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ListingOnboarded_ApplicantMail extends Mailable
{
    use Queueable, SerializesModels;
    public $applicant, $listing, $brand;
    /**
     * Create a new message instance.
     */
    public function __construct($applicant, $listing, $brand)
    {
        //
        $this->applicant = $applicant;
        $this->listing = $listing;
        $this->brand = $brand;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '🎉 Congratulations! Job Offer Accepted! 🎉',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.listing_onboarded_applicant',
            with: [
                'user'=> $this->applicant,
                'brand' => $this->brand,
                'listing'=> $this->listing
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
