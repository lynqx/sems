<?php

namespace App\Listeners;

use App\Events\NotificationsEvent;

class EventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  NotificationsEvent  $event
     * @return void
     */
    public function handle(NotificationsEvent $event)
    {
        //
        $event->notification->save();
    }
}
