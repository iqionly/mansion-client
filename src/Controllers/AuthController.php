<?php

namespace Iqionly\MansionClient\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthController {
    public array $users;

    public function __invoke(Request $request)
    {
        Auth::logout();

        $access_token = $request->session()->get('access_token');
        $response = Http::withOptions([
            'verify' => false
        ])->withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $access_token
        ])->get(config('mansion.url_local'). '/api/user');

        $users = $response->json();
        unset($users['id']);
        
        try {
            $email = $users['email'];
        } catch (\Throwable $th) {
            return redirect(config('mansion.login_url'))->withErrors('Failed to get login information! Try again later.');
        }

        $this->users = $users;
        
        $call = config('auth.providers.users.model');
        $user = $call::where(config('mansion.username_column'), $users['name'])->first();
        
        if (!$user) {
            return redirect(config('mansion.login_url'))->withErrors('Your account could not found in KaryaPres');
        }

        Auth::login($user);

        return redirect()->intended(config('mansion.login_url'));
    }

}