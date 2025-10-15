<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            $user = User::where('email', $googleUser->email)->first();

            if (!$user)
                $user = User::create([
                    'first_name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $user->id,
                    'password' => Hash::make(Str::random(16)),
                    'terms_accepted' => true
                ]);


            Auth::login($user);
            return redirect()->intended(route('home'));
        } catch (Exception $e) {
            return redirect()->route('login_page')->with('error', 'Erreur lors de la connexion avec Google');
        }
    }
}
