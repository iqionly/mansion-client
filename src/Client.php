<?php

namespace Iqionly\MansionClient;

use Illuminate\Support\Facades\Http;

class Client {
    public function handle($request, $next) {
        return $next($request);
    }
}