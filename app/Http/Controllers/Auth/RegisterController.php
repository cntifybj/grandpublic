<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller; // Importer la classe Controller
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request; // Importer le modèle User
use Illuminate\Support\Facades\Hash;

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

        event(new Registered($user));

        return back()->with('status', 'Inscription réussie ! Veuillez vérifier votre email pour confirmer votre compte.');
    }
}
