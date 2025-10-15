<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubscriptionResource;
use App\Models\Payment;
use App\Models\Subscription;
use App\Repositories\PhoneNumberRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{
    public function index()
    {
        return SubscriptionResource::collection(Subscription::all());
    }


    public function storePayment(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'amount' => 'required|numeric',
                'email' => 'required|string|email',
                'phone_number' => 'required|string',
                'video_id' => 'nullable|numeric|exists:videos,id',
                'subscription_id' => 'nullable|numeric|exists:subscriptions,id',
                'transaction_id' => 'required|string'
            ]
        );


        if (!$validator->passes())
            return response()->json(
                [
                    'errors' => $validator->errors()->toArray(),
                    'status' => 400
                ],
                400
            );


        $validated_inputs = array_merge(
            [
                'user_id' => $request->user()->id,
                'first_name' => $request->user()->first_name,
                'last_name' => $request->user()->last_name,
                'country_code' => PhoneNumberRepository::getCountryCode($request->input('phone_number')),
                'number' => PhoneNumberRepository::getPhoneNumber($request->input('phone_number')),
            ],
            $validator->validated()
        );


        $newest = Payment::create($validated_inputs);
        if ($newest)
            return response()->json(
                [
                    'message' => 'Paiement enregistré avec succès',
                    'status' => 200
                ],
                200
            );

        else return response()->json(
            [
                'message' => 'Une erreur inattendue est survenue',
                'status' => 500
            ],
            500
        );
    }
}
