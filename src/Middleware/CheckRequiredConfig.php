<?php

namespace Iqionly\MansionClient\Middleware;

use Closure;
use Illuminate\Http\Request;
use Iqionly\MansionClient\Exceptions\RequiredMansionClientId;
use Iqionly\MansionClient\Exceptions\RequiredMansionClientKey;
use Iqionly\MansionClient\Exceptions\RequiredMansionUrl;

class CheckRequiredConfig {
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * 
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check all needs environment
        throw_unless(config('mansion.url'), RequiredMansionUrl::class);
        throw_unless(config('mansion.client_id'), RequiredMansionClientId::class);
        throw_unless(config('mansion.client_secret'), RequiredMansionClientKey::class);

        return $next($request);
    }
}