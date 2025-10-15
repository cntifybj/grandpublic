<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\VerifyEmailMobileApp;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function create_user(Request $request)
    {
        $validatorRules = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'accepted',
        ]);

        if (!$validatorRules->passes()) {
            return response()->json(
                [
                    'errors' => $validatorRules->errors()->toArray(),
                    'status' => 400,
                ],
                400,
            );
        }

        // Création de l'utilisateur
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'terms_accepted' => true,
        ]);

        $code = mt_rand(1000, 9999) . '';
        Mail::to($user->email)->send(new VerifyEmailMobileApp($code));

        return response()->json([
            'status' => 200,
            'verification_code' => $code,
            'message' => 'Inscription réussie ! Veuillez vérifier votre email pour confirmer votre compte.',
        ]);
    }

    public function log_user(Request $request)
    {
        // Validation des données d'entrée
        $validatorRules = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
            'device_name' => 'required|string',
        ]);

        if (!$validatorRules->passes()) {
            return response()->json(
                [
                    'errors' => $validatorRules->errors()->toArray(),
                    'status' => 400,
                ],
                400,
            );
        }

        // Vérifier si l'utilisateur existe avec cet email
        $user = User::where('email', $request->email)->first();

        // Vérifier si l'utilisateur existe
        if (!$user) {
            return response()->json(
                [
                    'status' => 404,
                    'email' => 'Aucun compte trouvé avec cette adresse e-mail.',
                ],
                404,
            );
        }

        if (!$user->email_verified_at) {
            return response()->json(
                [
                    'status' => 400,
                    'email' => 'Vous n\'avez pas encore validé votre compte.',
                ],
                400,
            );
        }

        // Tentative de connexion avec les informations fournies
        if (Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 200,
                'token' => $user->createToken($request->device_name)->plainTextToken,
            ]);
        }

        // Si les identifiants sont incorrects
        return response()->json(
            [
                'status' => 400,
                'password' => 'Le mot de passe est incorrect.',
            ],
            400,
        );
    }

    public function getUserInfos(Request $request)
    {
        /** @var App\Models\User $user l'utilisateur actuellement connecté */
        $user = $request->user();

        // Check if the user has an active subscription
        $hasActiveSubscription = $user->userSubscriptions()->where('expired', false)->exists();

        return response()->json(
            array_merge(
                $user->toArray(),
                ['has_active_subscriptions' => $hasActiveSubscription]
            ),
            200
        );
    }
}
