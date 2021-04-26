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

    // google auth-loginri
    'google' => [
        'client_id' => '708373571094-h6phlm2t5dm8so0rnrpvpj0kjoutvpi4.apps.googleusercontent.com',
        'client_secret' => 'qc9eDGU3UgeWZ63UDelkM4xO',
        'redirect' => 'http://localhost:8000/login/google/callback',
    ],

    'github' => [
        'client_id' => 'fb21c9d5f2d1f32d2792',
        'client_secret' =>'6329e62bfc2062dd1ca572b5e6f777b9d90d10f4',
        'redirect' => 'http://localhost:8000/login/github/callback',
    ],
];
