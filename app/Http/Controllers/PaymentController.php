<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentRequest;
use App\Models\Comment;
use App\Models\Payment;
use App\Models\Subscription;
use App\Models\UserSubscription;
use App\Models\Video;
use DateTime;
use FedaPay\Error\ApiConnection;
use FedaPay\FedaPay;
use FedaPay\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{

    /* public function store(StorePaymentRequest $request)
    {
        // Configuration de FedaPay
        FedaPay::setApiKey(config('services.fedapay.api_key'));
        FedaPay::setEnvironment(config('services.fedapay.environment'));


        $validated_inputs = $request->validationData();

        $newest = Payment::create($validated_inputs);
        if ($newest) {
            $customer = [
                'firstname' => $validated_inputs['first_name'],
                'lastname' => $validated_inputs['last_name'],
                'email' => $validated_inputs['email'],
                'phone_number' => [
                    'number'  => $validated_inputs['number'],
                    'country' => $validated_inputs['country_code']
                ]
            ];

            $subscription = Subscription::findOrFail($validated_inputs['subscription_id']);
            $callback_url = route('sub-pay', ['type' => $subscription->name]);

            $data = [
                'description' => 'Paiement de l\'abonnement ' . $subscription->name,
                'amount' => (int)$validated_inputs['amount'],
                'currency' => ['iso' => 'XOF'],
                'callback_url' => $callback_url,
                'customer' => $customer
            ];


            try {

                // Configuration de FedaPay
                FedaPay::setApiKey(config('services.fedapay.api_key'));
                FedaPay::setEnvironment(config('services.fedapay.environment'));


                $transaction = Transaction::create($data);

                $newest->transaction_id = $transaction->id;
                $newest->save();

                $token = $transaction->generateToken();
                return redirect($token->url);
            } catch (ApiConnection $e) {

                Log::error($e->getErrorMessage(), ['fedapay : process of payment']);
                if ($e->hasErrors()) {
                    $errors = $e->getErrors();

                    foreach ($errors as $key => $errorMessages) {
                        foreach ($errorMessages as $message) {
                            Log::error("$key: $message", ['fedapay : process of payment']);
                        }
                    }
                }
            }
        } else {
            return redirect()->back()->with('error', 'Une erreur inattendue est survenue.');
        }
    } */


    public function handleKKiaPayCallback(Request $request)
    {
        // Vérification du secret
        if ($request->header('x-kkiapay-secret') !== 'grandpublic-MaxMagic@2024') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        // Validation des données
        $validator = Validator::make(
            $request->all(),
            [
                'transactionId' => 'required|string',
                'isPaymentSucces' => 'required|boolean',
                'amount' => 'required|numeric',
                'stateData' => 'required|string',
            ]
        );

        if (!$validator->passes()) {
            return response()->json(
                [
                    'errors' => $validator->errors()->toArray(),
                    'status' => 400
                ],
                400
            );
        }


        $validated_inputs = $validator->validated();

        $data = $validated_inputs['stateData'];

        // Initialiser les variables pour stocker les valeurs extraites
        $user_id = null;
        $video_id = null;
        $subscription_id = null;

        // Vérifier quel paramètre est présent dans la chaîne et extraire les valeurs
        if (strpos($data, 'video_id') !== false) {
            // Cas où la chaîne contient "video_id"
            preg_match('/user_id:(\d+)&video_id:(\d+)/', $data, $matches);
            if ($matches) {
                $user_id = $matches[1];
                $video_id = $matches[2];
            }
        } elseif (strpos($data, 'subscription_id') !== false) {
            // Cas où la chaîne contient "subscription_id"
            preg_match('/user_id:(\d+)&subscription_id:(\d+)/', $data, $matches);
            if ($matches) {
                $user_id = $matches[1];
                $subscription_id = $matches[2];
            }
        }


        $amount = (int)$validated_inputs['amount'];

        // Enregistrement ou mise à jour du paiement
        $newPayment = Payment::firstOrCreate(
            ['transaction_id' => $validated_inputs['transactionId']],
            [
                'isPaymentSucces' => $validated_inputs['isPaymentSucces'],
                'user_id' => $user_id,
                'video_id' => $video_id,
                'subscription_id' => $subscription_id,
                'amount' => $amount
            ]
        );

        if ($newPayment->subscription_id) {
            $now = new DateTime();

            $subscription = Subscription::findOrFail($subscription_id);
            $monthsToAdd = $subscription->duration;

            UserSubscription::firstOrCreate([
                'user_id' => $user_id,
                'amount_paid' => $amount,
                'start_date' => $now->format('Y-m-d H:i:s'),
                'end_date' => $now->modify("+$monthsToAdd months")->format('Y-m-d H:i:s'),
            ]);
        }


        // Réponse
        return response()->json(['status' => 'success'], 200);
    }
}
