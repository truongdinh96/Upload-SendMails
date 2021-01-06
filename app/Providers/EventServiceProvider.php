<?php

namespace App\Providers;

use App\Events\UploadFileEvent;
use App\Listeners\PushNotificationToDashboard;
use App\Listeners\SendEmailAdmin;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        UploadFileEvent::class => [
            SendEmailAdmin::class,
            PushNotificationToDashboard::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
