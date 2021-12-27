<?php

return [
    /*
    |--------------------------------------------------------------------------
    | List your email providers
    |--------------------------------------------------------------------------
    |
    | Enjoy a life with multimail
    |
    */
    'use_default_mail_facade_in_tests' => true,

    'emails'  => [
        'office@kwmofficial.my.id' => [
            'pass'          => config('app.official_pass'),
            'username'      => config('app.official_email'),
            'from_name'     => config('app.official_name'),
        ],
        'support@kwmofficial.my.id'  => [
            'pass'          => config('app.support_pass'),
            'username'      => config('app.support_email'),
            'from_name'     => config('app.support_name'),
        ],
    ],

    'provider' => [
        'default' => [
            'host'      => env('MAIL_HOST'),
            'port'      => env('MAIL_PORT'),
            'encryption' => env('MAIL_ENCRYPTION'),
        ],
    ],

];
