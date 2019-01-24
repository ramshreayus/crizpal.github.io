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
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id'     => '300033313892859',
        'client_secret' => 'c52f56dd6a106f80c0f6d9ce85c413ab',
        'redirect'      => 'http://127.0.0.1:8000/login',
    ],

    'twitter' => [
        'client_id'     => '4ZpAEE7SCzDo3u66BYtwO3zAE',
        'client_secret' => 'hrFCDmI6rRvNXT81cEbCZCHJXcJeQno1mK9lGoXChxC7YpYOu2',
        'redirect'      => 'http://127.0.0.1:8000/login',
    ],

    'google' => [
        'client_id'     => '757620955217',
        'client_secret' => 'l6KAKilza17a2fJ8YNdqlZ7m',
        'redirect'      => 'http://127.0.0.1:8000/login',
    ],

    'linkedin' => [
        'client_id'     => '77pydyb5gl9xdf',
        'client_secret' => 'gc4WofVW6A9tRtEk',
        'redirect'      => 'http://127.0.0.1:8000/login',
    ],

];
