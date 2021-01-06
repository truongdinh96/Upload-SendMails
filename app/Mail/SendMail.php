<?php

namespace App\Mail;

use App\EmailData;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var EmailData
     */
    public $details;

    /**
     * Create a new message instance.
     * @param $details
     */
    public function __construct(EmailData $details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Send Mail')
            ->view('emails.email')
            ->attachFromStorage($this->details->path);
    }
}
