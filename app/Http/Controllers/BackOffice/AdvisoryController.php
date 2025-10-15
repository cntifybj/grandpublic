<?php

namespace App\Http\Controllers\BackOffice;

use App\Enums\AdPosition;
use App\Http\Controllers\Controller;
use App\Models\Advisory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdvisoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backoffice.pages.advisory.index', [
            'positions' => AdPosition::cases(),
            'advisories' => Advisory::orderBy('visible', 'desc')
                ->orderBy('position', 'asc')
                ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backoffice.pages.advisory.create', ['positions' => AdPosition::cases()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des champs
        $validated_inputs = $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimetypes:image/jpeg,image/png,video/mp4,video/x-matroska|max:51200',
            'position' => 'required|string|max:255',
            'isVideo' => 'required|string|in:0,1',
            'visible' => 'required|string|in:0,1',
        ]);

        try {
            // Gestion de l'upload de fichier
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $validated_inputs['file'] = $file->store('Advisories'); // Utilisation du stockage public
            } else {
                return response()->json(['errors' => ['file' => ['Le fichier est requis.']]], 422);
            }

            $validated_inputs['isVideo'] = boolval($validated_inputs['isVideo']);
            $validated_inputs['visible'] = boolval($validated_inputs['visible']);

            // Création de la publicité
            Advisory::create($validated_inputs);

            return response()->json(['message' => 'La publicité a été enregistrée avec succès.'], 200);
        } catch (Exception $e) {
            // Suppression du fichier en cas d'échec
            if (!empty($validated_inputs['file']) && Storage::exists($validated_inputs['file'])) {
                Storage::delete($validated_inputs['file']);
            }

            // Retourner une erreur générique
            return response()->json(['errors' => ['general' => ['Une erreur est survenue lors de la création.']]], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Advisory $advisory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Advisory $advisory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Advisory $advisory)
    {
        // Validation des champs
        $validated_inputs = $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'nullable|file|mimetypes:image/jpeg,image/png,video/mp4,video/x-matroska|max:51200',
            'position' => 'required|string|max:255',
            'isVideo' => 'required|string|in:0,1',
            'visible' => 'required|string|in:0,1',
        ]);

        try {
            // Gestion de l'upload de fichier
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $validated_inputs['file'] = $file->store('Advisories');

                // Supprimer l'ancien fichier s'il existe
                if ($advisory->file && Storage::exists($advisory->file)) {
                    Storage::delete($advisory->file);
                }
            }

            // Conversion des champs booléens
            $validated_inputs['isVideo'] = boolval($validated_inputs['isVideo']);
            $validated_inputs['visible'] = boolval($validated_inputs['visible']);

            // Mise à jour de la publicité
            $advisory->update($validated_inputs);

            return response()->json(['message' => 'La publicité a été mise à jour avec succès.'], 200);
        } catch (Exception $e) {
            // Suppression du fichier en cas d'échec d'upload
            if (!empty($validated_inputs['file']) && Storage::exists($validated_inputs['file'])) {
                Storage::delete($validated_inputs['file']);
            }

            // Retourner une erreur générique
            return response()->json(['errors' => ['general' => ['Une erreur est survenue lors de la mise à jour.']]], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Advisory $advisory)
    {
        try {
            // Supprimer le fichier associé, si existant
            if ($advisory->file && Storage::exists($advisory->file)) {
                Storage::delete($advisory->file);
            }

            // Supprimer la publicité
            $advisory->delete();

            return response()->json(['message' => 'La publicité a été supprimée avec succès.'], 200);
        } catch (Exception $e) {
            // Gestion des erreurs
            return response()->json(['errors' => ['general' => ['Une erreur est survenue lors de la suppression.']]], 500);
        }
    }
}
