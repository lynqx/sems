<?php

namespace App\Listeners;

use App\Events\SmsEvent;

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
     * @param  SmsEvent $event
     * @return void
     */
    public function handle(SmsEvent $event)
    {
        $params = http_build_query(
            array(
                'username' => config('sms.username'),
                'password' => config('sms.password'),
                'message' => $event->sms->message,
                'sender' => config('sms.sender'),
                'recipient' => $event->sms->recipient
            )
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, config('sms.url'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        $output = curl_exec($ch);
        $event->sms->sender = config('sms.sender');
        $response = explode(" ",$output);
        if ($response[0] === "OK") {
            $event->sms->status = 1;
        } else {
            $event->sms->status = 0;
        }
        $event->sms->response = $output;
        $event->sms->save();
    }
}
