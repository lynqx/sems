<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Paystack Public Key
    |--------------------------------------------------------------------------
    |
    | The URL for the SMS gateway's api
    |
    */

    'public_key' => env('PAYSTACK_PUBLIC_KEY', 'pk_xxxxxxxxxxxxxxxxxxxxx'),


    /*
    |--------------------------------------------------------------------------
    | Paystack Secret Key
    |--------------------------------------------------------------------------
    |
    | The URL for the SMS gateway's api
    |
    */

    'secret_key' => env('PAYSTACK_SECRET_KEY', 'sk_xxxxxxxxxxxxxxxxxxxxx'),

    /*
    |--------------------------------------------------------------------------
    | Paystack Payment URL
    |--------------------------------------------------------------------------
    |
    | The username for the SMS gateway's api [preferably without spaces]
    | If your SMS server requires a username for authentication, you should
    | set it here. This will get used to authenticate with your server on
    | connection. You may also set the "password" value below this one.
    |
    */

    'url' => env('PAYSTACK_PAYMENT_URL', 'https://api.paystack.co'),

    /*
    |--------------------------------------------------------------------------
    | Paystack Merchant Email
    |--------------------------------------------------------------------------
    |
    | Here you may set the password required by your SMS gateway to send out
    | messages from your application. This will be given to the server on
    | connection so that the application will be able to send messages.
    |
    */

    'merchant' => env('MERCHANT_EMAIL'),

];
