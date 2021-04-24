<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    // google auth-login
    'google' => [
        'client_id' => '632197224184-jecuqi1j6hifm6br3rutbrto1omi17tq.apps.googleusercontent.com',
        'client_secret' => 'jc_iorT43DTnnAMYlXg4qQxo',
        'redirect' => 'http://127.0.0.1:8000/login/google/callback',
    ],

    'github' => [
        'client_id' => 'fb21c9d5f2d1f32d2792',
        'client_secret' => 'f0f231f24f99951e23deced9d6e9493cf4741c37',
        'redirect' => 'http://127.0.0.1:8000/login/github/callback',
    ],
];
