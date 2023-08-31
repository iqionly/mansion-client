<?php

namespace Iqionly\MansionClient\Controllers;

use Illuminate\Support\Facades\Http;
use Iqionly\MansionClient\Storage\SessionHandle;
use Illuminate\Http\Request;

class CallbackController {
    public function __invoke(Request $request)
    {
        $state = $request->session()->pull('state');

        if(!(strlen($state) > 0 && $state == $request->state)) {
            return back();
        }

        $response = Http::withOptions([
            'verify' => false
        ])->asForm()->post(config('mansion.url') . '/oauth/token', [
                'grant_type' => 'authorization_code',
                'client_id' => config('mansion.client_id'),
                'client_secret' => config('mansion.client_secret'),
                'redirect_uri' => route('mansion.callback'),
                'code' => $request->code,
            ]);

        $request->session()->put($response->json());
        return redirect()->route('mansion.auth-user');
    }
}