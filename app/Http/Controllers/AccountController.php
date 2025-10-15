<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function showAccount()
    {
        // Vérifiez si l'utilisateur est authentifié
        if (! Auth::check()) {
            return redirect()->route('login_page'); // Redirection vers la page de connexion si non authentifié
        }

        // Votre logique pour afficher les informations du compte
        return view('pages.account'); // Remplacez par le nom de votre vue
    }
}
