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

            if (!$user)
                $user = User::create([
                    'first_name' => $facebookUser->name,
                    'email' => $facebookUser->email,
                    'facebook_id' => $user->id,
                    'password' => Hash::make(Str::random(16)),
                    'terms_accepted' => true
                ]);


            Auth::login($user);
            return redirect()->intended(route('home'));
        } catch (Exception $e) {
            return redirect()->route('login_page')->with('error', 'Erreur lors de la connexion avec Facebook');
        }
    }
}
