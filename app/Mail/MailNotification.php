<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailNotification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

  
    public $data;
    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        //
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: env("APP_NAME")." | ". $this->data["subject"],
            cc: ['support@edubizapp.com'],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.mail_notification',
            with: [
                // "user" => $this->data["user"],
                // "title" => $this->data["title"],
                // "panel" => $this->data["panel"],
                // "message" => $this->data["message"],
                // "button" => $this->data["button"],
                "data" => $this->data
            ],
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
