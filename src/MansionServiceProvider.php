<?php
namespace Iqionly\MansionClient;

use Illuminate\Support\ServiceProvider;

class MansionServiceProvider extends ServiceProvider {
    
    public function boot() {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
    }

    public function register() {
        $this->mergeConfigFrom(__DIR__.'/config/mansion.php', 'mansion');
    }
} 
