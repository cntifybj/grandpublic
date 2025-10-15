<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller; // Importer la classe Controller
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Importer le modèle User

class LoginController extends Controller
{
    // Affiche le formulaire de connexion
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Valide et traite la connexion de l'utilisateur
    public function login(Request $request)
    {
        // Validation des données d'entrée
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        // Tentative de connexion avec les informations fournies
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(); // Rediriger vers l'URL souhaitée
        }

        $user = User::where('email', $request->email)->first();
        if ($user && !$user->hasVerifiedEmail()) {
            return back()->withErrors([
                'email' => 'Vous n\'avez pas encore validé votre compte.',
            ])->onlyInput('email');
        }

        // Si les identifiants sont incorrects
        return back()->withErrors([
            'email' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.',
        ])->onlyInput('email');
    }

    public function subPay()
    {
        if (!auth()->check()) {
            return redirect()->route('login_page')->with('error', 'Vous devez être connecté pour accéder à cette page.');
        }

        // Le code de ta page sub-pay ici
    }

    // Déconnexion de l'utilisateur
    public function logout(Request $request)
    {
        Auth::logout(); // Déconnexion de l'utilisateur
        $request->session()->invalidate(); // Invalidation de la session
        $request->session()->regenerateToken(); // Régénération du token CSRF

        return redirect(route('home')); // Redirection vers la page d'accueil
    }
}
