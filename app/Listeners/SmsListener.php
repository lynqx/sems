<?php

namespace App\Listeners;

use App\Events\SmsEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SmsListener
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
     * @param  SmsEvent  $event
     * @return void
     */
    public function handle(SmsEvent $event)
    {
        //
    }
}
