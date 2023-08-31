<?php
namespace Iqionly\MansionClient;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class MansionServiceProvider extends ServiceProvider {
    
    public function boot() {
        Route::middlewareGroup('mansion', config('mansion.middleware', []));

        Route::group(['prefix' => 'mansion', 'middleware' => 'mansion'], function() {
            $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        });
    }

    public function register() {
        $this->mergeConfigFrom(__DIR__.'/config/mansion.php', 'mansion');
    }
} 
