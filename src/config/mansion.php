<?php

return [
    /**
     * Config Mansion
     * 
     * You can change this to your mansion url, id or secret key
     */
    'url' => env('MANSION_URL', null),
    'url_local' => env('MANSION_URL_LOCAL', env('MANSION_URL', null)),
    'auth_url' => '/oauth/authorize',
    
    /**
     * URL of your login page
     * 
     * login_url: Your url login page for user to redirect, if user not authenticated or invalid login
     * username_column: Username for your app, if using email change to email
     */
    'login_url' => '/', 
    'username_column' => env('MANSION_USERNAME', 'nik'),
    'password_column' => env('MANSION_PASSWORD', 'password'),
    'client_id' => env('MANSION_CLIENT_ID', null),
    'client_secret' => env('MANSION_CLIENT_SECRET', null),

    /**
     * ====================================================
     * Configuration How Mansion Client can affect your app
     * ====================================================
     * 
     * register: Mansion App can create new user data in your app, default (false) or disabled
     */
    'register' => false,

    /**
     * Middleware for client mansion using
     */
    'middleware' => [
        'web'
    ]
];