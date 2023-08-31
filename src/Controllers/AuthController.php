<?php

namespace Iqionly\MansionClient\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthController {
    public function __invoke(Request $request)
    {
        Auth::logout();

        $access_token = $request->session()->get('access_token');
        $response = Http::withOptions([
            'verify' => false
        ])->withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $access_token
            ])->get(config('mansion.url'). '/api/user');

        $users = $response->json();

        try {
            $email = $users['email'];
        } catch (\Throwable $th) {
            return back()->withErrors('Failed to get login information! Try again later.');
        }

        $user = User::where('nik', $users['name'])->first();

        // $user = User::firstOrNew(['email' => $email], [
        //     'name' => $users['name'],
        //     'email_verified_at' => $users['email_verified_at'],
        //     'password' => bcrypt('prestasi2022')
        // ]);

        if (!$user) {
            return back()->withErrors('Your account could not found in KaryaPres');
        }

        Auth::login($user);

        return redirect()->intended('/');
    }

}