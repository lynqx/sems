<?php

return [

    /*
    |--------------------------------------------------------------------------
    | SMS URL
    |--------------------------------------------------------------------------
    |
    | The URL for the SMS gateway's api
    |
    */

    'url' => env('SMS_URL', 'http://smsapi.example.com'),


    /*
    |--------------------------------------------------------------------------
    | SMS Sender Id
    |--------------------------------------------------------------------------
    |
    | The URL for the SMS gateway's api
    |
    */

    'sender' => env('SMS_SENDER', 'SEMS'),

    /*
    |--------------------------------------------------------------------------
    | SMS Username
    |--------------------------------------------------------------------------
    |
    | The username for the SMS gateway's api [preferably without spaces]
    | If your SMS server requires a username for authentication, you should
    | set it here. This will get used to authenticate with your server on
    | connection. You may also set the "password" value below this one.
    |
    */

    'username' => env('SMS_USERNAME', 'example'),

    /*
    |--------------------------------------------------------------------------
    | SMS Password
    |--------------------------------------------------------------------------
    |
    | Here you may set the password required by your SMS gateway to send out
    | messages from your application. This will be given to the server on
    | connection so that the application will be able to send messages.
    |
    */

    'password' => env('SMS_PASSWORD'),

];
