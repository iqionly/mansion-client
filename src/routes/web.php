<?php

use Illuminate\Support\Facades\Route;
use Iqionly\MansionClient\Controllers\AuthController;
use Iqionly\MansionClient\Controllers\CallbackController;
use Iqionly\MansionClient\Controllers\LoginController;

Route::middleware(['web'])->group(function() {
    Route::get('/mansion/login-sso', LoginController::class)->name('mansion.sso');
    Route::get('/mansion/callback', CallbackController::class)->name('mansion.callback');
    Route::get('/mansion/auth-user', AuthController::class)->name('mansion.auth-user');
});