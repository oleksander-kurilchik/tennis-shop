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
    'google' => [

        'client_id' => '141450383616-thet67cs507a12t89rlqt9dug5nmglh3.apps.googleusercontent.com',

        'client_secret' => '3c5ZWHi5fFPZCzUFN03lmQGD',

        'redirect' => env('APP_URL').'account/auth/google/callback',

    ],
    'facebook' => [

        'client_id' => '704398287101099',
        'client_secret' => '9b83a36967dbb33644212dce3411ce6b',
        'redirect' => env('APP_URL').'account/auth/facebook/callback',

    ],

];
