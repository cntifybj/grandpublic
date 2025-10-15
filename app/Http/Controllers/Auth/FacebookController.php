<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->stateless()->user();
            $user = User::where('email', $facebookUser->email)->first();

            if (!$user) {
                $nameParts = explode(' ', $facebookUser->name);
                $user = User::create([
                    'first_name' => $nameParts[0],
                    'last_name' => $nameParts[1] ?? '',
                    'email' => $facebookUser->email,
                    'facebook_id' => $facebookUser->id,
                    'password' => Hash::make(Str::random(16)),
                    'terms_accepted' => true
                ]);
            } else {
                $user->update([
                    'facebook_id' => $facebookUser->id,
                ]);
            }


            Auth::login($user);
            return redirect()->intended(route('home'));
        } catch (Exception $e) {
            return redirect()->route('login_page')->with('error', 'Erreur lors de la connexion avec Facebook');
        }
    }
}
