<?php

return [
    /**
     * Config Mansion
     * 
     * You can change this to your mansion url, id or secret key
     */
    'url' => env('MANSION_URL', null),
    'auth_url' => '/oauth/authorize',
    
    /**
     * URL of your login page
     */
    'login_url' => '/', 
    'username_column' => env('MANSION_USERNAME', 'nik'),
    'password_column' => env('MANSION_PASSWORD', 'password'),
    'client_id' => env('MANSION_CLIENT_ID', null),
    'client_secret' => env('MANSION_CLIENT_SECRET', null),

    /**
     * Middleware for client mansion using
     */
    'middleware' => [
        'web'
    ]
];