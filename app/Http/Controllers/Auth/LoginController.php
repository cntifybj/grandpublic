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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        // Vérifier si l'utilisateur existe avec cet email
        $user = User::where('email', $request->email)->first();

        // Vérifier si l'utilisateur existe
        if (!$user) {
            return back()->withErrors([
                'email' => 'Aucun compte trouvé avec cette adresse e-mail.',
            ]);
        }

        if (!$user->email_verified_at) {
            return back()->withErrors([
                'email' => 'Vous n\'avez pas encore validé votre compte.',
            ]);
        }

        // Tentative de connexion avec les informations fournies
        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            return redirect()->intended(); // Rediriger vers l'URL souhaitée
        }

        // Si les identifiants sont incorrects
        return back()->withErrors([
            'password' => 'Le mot de passe est incorrect.',
        ]);
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
