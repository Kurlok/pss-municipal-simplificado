<?php

return [

    /*
    |--------------------------------------------------------------------------
    | API Keys
    |--------------------------------------------------------------------------
    |
    | Set the public and private API keys as provided by reCAPTCHA.
    |
    | In version 2 of reCAPTCHA, public_key is the Site key,
    | and private_key is the Secret key.
    |
    RECAPTCHA_PUBLIC_KEY
    RECAPTCHA_PRIVATE_KEY
    */
    'public_key'     => env('RECAPTCHA_PUBLIC_KEY', '6LfEo7AUAAAAAP9Aua4eVIpaZXAWLrt3qeGk6Efg'),
    'private_key'    => env('RECAPTCHA_PRIVATE_KEY', '6LfEo7AUAAAAALw4FYyyyc1haRTTG6c4TUYfw6jF'),

    /*
    |--------------------------------------------------------------------------
    | Template
    |--------------------------------------------------------------------------
    |
    | Set a template to use if you don't want to use the standard one.
    |
    */
    'template'    => '',

    /*
    |--------------------------------------------------------------------------
    | Driver
    |--------------------------------------------------------------------------
    |
    | Determine how to call out to get response; values are 'curl' or 'native'.
    | Only applies to v2.
    |
    */
    'driver'      => 'curl',

    /*
    |--------------------------------------------------------------------------
    | Options
    |--------------------------------------------------------------------------
    |
    | Various options for the driver
    |
    */
    'options'     => [

        'curl_timeout' => 1,
        'curl_verify' => true,
        'lang' => 'pt-BR',

    ],

    /*
    |--------------------------------------------------------------------------
    | Version
    |--------------------------------------------------------------------------
    |
    | Set which version of ReCaptcha to use.
    |
    */

    'version'     => 2,

];
