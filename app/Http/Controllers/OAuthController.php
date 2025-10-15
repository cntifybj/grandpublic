<?php
namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OAuthController extends Controller
{
    public function redirectToProvider($provider) {
        if (in_array($provider, ['google', 'facebook'])) {
            return Socialite::driver($provider)->redirect();
        }
        abort(404);
    }

    public function handleProviderCallback($provider) {
        try {
            $socialUser = Socialite::driver($provider)->user();

            $user = User::where('provider_id', $socialUser->id)
                         ->orWhere('email', $socialUser->email)
                         ->first();

            if ($user) {
                if (!$user->provider_id) {
                    $user->update(['provider_id' => $socialUser->id, 'provider' => $provider]);
                }
                Auth::login($user);
            } else {
                $user = User::create([
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'password' => Hash::make('Password@1234'),
                    'provider_id' => $socialUser->getId(),
                    'provider' => $provider,
                ]);

                Auth::login($user);
            }

            return redirect()->route('/');

        } catch (Exception $e) {
            return redirect()->route('login_page')->withErrors(['login' => 'Échec de la connexion avec ' . ucfirst($provider)]);
        }
    }
}
