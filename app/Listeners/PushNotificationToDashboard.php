<?php

namespace App\Listeners;


use App\Events\UploadFileEvent;
use App\User;
use Illuminate\Support\Facades\Mail;

class PushNotificationToDashboard
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UploadFileEvent  $event
     * @return void
     */
    public function handle(UploadFileEvent $event)
    {
        $admins = User::where('is_admin', 1)->get();
        foreach ($admins as $value) {
            //TODO:
        }
    }
}
