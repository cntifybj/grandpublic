<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller; // Importer la classe Controller
use App\Http\Requests\StoreUserRequest;
use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request; // Importer le modèle User
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    // Méthode pour afficher le formulaire d'inscription
    public function showRegistrationForm()
    {
        return view('auth.register'); // Remplacez 'auth.register' par le nom de votre vue d'inscription
    }

    // Méthode pour créer un nouvel utilisateur
    public function create(StoreUserRequest $request)
    {
        $validated_inputs = $request->validated();

        // Création de l'utilisateur
        $user = User::create([
            'first_name' => $validated_inputs['first_name'],
            'last_name' => $validated_inputs['last_name'],
            'email' => $validated_inputs['email'],
            'password' => Hash::make($validated_inputs['password']),
            'terms_accepted' => true,
        ]);

        Mail::to($validated_inputs['email'])->send(new VerifyEmail($validated_inputs['email']));

        return back()->with('status', 'Inscription réussie ! Veuillez vérifier votre email pour confirmer votre compte.');
    }


    /**
     * Vérification de l'email avec le token
     *
     * @param string $token
     * @return RedirectResponse
     */
    public function verify_email(string $token): RedirectResponse
    {
        // Décodage du token pour obtenir l'email
        $email = self::getTokenEmail($token);
        $user = User::whereEmail($email)->firstOrFail();

        // Mise à jour du statut de vérification de l'email
        if (!$user->email_verified_at) {
            $user->email_verified_at = now();
            $user->save();
        }

        return redirect()->route('login_page')->with('status', 'Votre compte a été vérifié avec succès !');
    }

    /**
     * Extraction de l'email à partir du token
     *
     * @param string $token
     * @return string
     */
    public static function getTokenEmail(string $token): string
    {
        // Décodage et extraction de l'email depuis le token
        $decoded = decrypt($token);
        return explode('@@max-africa_grandpublic@@', $decoded)[0];
    }
}
