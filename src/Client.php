<?php

namespace Iqionly\MansionClient;

use Illuminate\Support\Facades\Http;

class Client {
    public function handle($request, $next) {
        dd($request, $next);
        return $next($request);
    }
}