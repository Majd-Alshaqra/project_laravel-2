<?php

namespace App\Mail;

use App\Models\admin;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class aconts extends Mailable
{
    use Queueable, SerializesModels;
    public admin $oll;
    // public admin $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(admin $oll)
    {
        $this->oll = $oll;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'acont',
            from: 'majd@me.com',
            cc: 'admin@com.ps'
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'emails.aconts',

        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
