<?php

use Illuminate\Support\Facades\Route;
use Iqionly\MansionClient\Controllers\AuthController;
use Iqionly\MansionClient\Controllers\CallbackController;
use Iqionly\MansionClient\Controllers\LoginController;

Route::get('/login-sso', LoginController::class)->name('mansion.sso');
Route::get('/callback', CallbackController::class)->name('mansion.callback');
Route::get('/auth-user', AuthController::class)->name('mansion.auth-user');