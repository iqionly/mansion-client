<?php
namespace Iqionly\MansionClient;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class MansionServiceProvider extends ServiceProvider {
    
    public function boot() {
        $this->publishes([
            __DIR__.'/config/mansion.php' => config_path('mansion.php'),
        ], 'mansion-config');

        $this->mergeConfigFrom(
            __DIR__.'/config/mansion.php', 'mansion'
        );

        Route::middlewareGroup('mansion', array_merge(config('mansion.middleware', []),[
            \Iqionly\MansionClient\Middleware\CheckRequiredConfig::class,   # Checking required field for mansion-client works properly
        ]));

        Route::group(['prefix' => 'mansion', 'middleware' => 'mansion'], function() {
            $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        });
    }

    public function register() {
        $this->mergeConfigFrom(__DIR__.'/config/mansion.php', 'mansion');
    }
} 
