<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotifUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $reporterName;
    public $reporterEmail;
    public $reportTopic;

    public function __construct(string $reporterName, string $reporterEmail, string $reportTopic)
    {
        $this->reporterName = $reporterName;
        $this->reporterEmail = $reporterEmail;
        $this->reportTopic = $reportTopic;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Notifikasi Laporan Masuk',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.notif_user',
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
