<?php

namespace Iqionly\MansionClient\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoginController {
    public function __invoke(Request $request)
    {
        $request->session()->put('state', $state = Str::random(40));

        $query = http_build_query([
            'client_id' => config('mansion.client_id'),
            'redirect_uri' => route('mansion.callback'),
            'response_type' => 'code',
            'scope' => 'view-user',
            'state' => $state
        ]);

        return redirect(config('mansion.url').config('mansion.auth_url'). '?' . $query);
    }
}