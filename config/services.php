<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY', 'pk_test_WvcvKFFAmiM0l2U4q1ME5YSb'),
        'secret' => env('STRIPE_SECRET', 'sk_test_UCIRotq9FdF5jFZgJylZr3ra'),
        // email - stef5513@edu.sde.dk
        // pass - m!D93Bxw
        // 
        
        'plans' => [
            [
                'name'  => 'member',
                'title' => 'Almindeligt Medlemskab',
                'price' => 60000,
                'age'   => [16,100],
            ],
            [
                'name'  => 'junior',
                'title' => 'Junior Medlemskab',
                'price' => 25000,
                'age'   => [5,15],
            ],
        ]
    ],

];
