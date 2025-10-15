<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCenterOfInterestRequest;
use App\Http\Requests\UpdateCenterOfInterestRequest;
use App\Models\CenterOfInterest;

class CenterOfInterestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backoffice.pages.center_of_interest.index');
    }


    public function fetch_resource()
    {
        return response()->json(['data' => CenterOfInterest::all()], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCenterOfInterestRequest $request)
    {
        $validated_inputs = $request->validated();
        $validated_inputs = array_merge($validated_inputs, ['short_identifier' => $this->abbreviatePhrase($validated_inputs['name'])]);
        $newest = CenterOfInterest::create($validated_inputs);

        if ($newest) {
            return response()->json(['message' => 'New center of interest successfully created'], 200);
        } else {
            return response()->json(['errors' => ['general' => ['Error on creating of a new center of interest']]], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CenterOfInterest $center_of_interest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CenterOfInterest $center_of_interest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCenterOfInterestRequest $request, CenterOfInterest $center_of_interest)
    {
        $validated_inputs = $request->validated();
        $validated_inputs = array_merge($validated_inputs, ['short_identifier' => $this->abbreviatePhrase($validated_inputs['name'])]);

        if ($center_of_interest->update($validated_inputs)) {
            return response()->json(['message' => 'Infos successfully modified'], 200);
        } else {
            return response()->json(['errors' => ['general' => ['Error on updating center of interest']]], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $center_of_interest_id)
    {
        if (CenterOfInterest::destroy($center_of_interest_id)) {
            return response()->json(['message' => 'Center of interest successfully deleted'], 200);
        } else {
            return response()->json(['message' => 'Error on removing center of interest'], 500);
        }
    }


    protected function abbreviatePhrase($phrase)
    {
        // Séparer la phrase en mots
        $words = explode(' ', $phrase);

        // Parcourir les mots pour créer l'abréviation
        $abbreviation = '';
        foreach ($words as $word) {
            // Ne considérer que les mots de 2 lettres ou plus
            if (strlen($word) > 2) {
                // Ajouter les 3 premières lettres du mot
                $abbreviation .= ucfirst(substr($word, 0, 3));
            }
        }

        return $abbreviation;
    }
}
