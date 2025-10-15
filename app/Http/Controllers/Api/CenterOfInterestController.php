<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CenterOfInterestResource;
use App\Models\CenterOfInterest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CenterOfInterestController extends Controller
{
    public function index()
    {
        return CenterOfInterestResource::collection(CenterOfInterest::all());
    }

    public function submit_preferences(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'center_of_interest_ids' => 'required|array',
                'center_of_interest_ids.*' => 'exists:centers_of_interest,id', // Validation stricte
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


        $user = $request->user();

        if ($user->centerOfInterests()->sync($validator->validated()['center_of_interest_ids']))
            return response()->json(
                [
                    'message' => 'Centres d\'intérêt sauvegardés avec succès',
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
