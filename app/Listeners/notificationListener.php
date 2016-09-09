<?php

namespace App\Listeners;

use App\Events\notifications;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class notificationListener
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
     * @param  notifications  $event
     * @return void
     */
    public function handle(notifications $event)
    {
//        dd($event->notification->username);
        //
    }
}
