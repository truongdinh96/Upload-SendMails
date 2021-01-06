<?php

namespace App\Events;

use App\EmailData;
use Illuminate\Queue\SerializesModels;

class UploadFileEvent
{
    use SerializesModels;

    /**
     * @var EmailData
     */
    public $data;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(EmailData $emailData)
    {
        $this->data = $emailData;
    }
}
