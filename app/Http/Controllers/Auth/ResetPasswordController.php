<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    // URL de redirection après la réinitialisation du mot de passe
    protected $redirectTo = '/'; // ou '/' pour rediriger vers la page d'accueil

    public function showResetForm($token = null)
    {
        return view('auth.passwords.reset')->with(['token' => $token]);
    }
}
