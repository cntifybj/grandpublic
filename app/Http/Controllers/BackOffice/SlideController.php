<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSlideRequest;
use App\Http\Requests\UpdateSlideRequest;
use App\Models\Slide;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backoffice.pages.slide.index', [
            'slides' => Slide::orderBy('visible', 'desc')
                ->orderBy('position', 'asc')
                ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backoffice.pages.slide.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSlideRequest $request)
    {
        $validated_inputs = $request->validated();
        $validated_inputs['image'] = '';


        if ($request->hasFile('image')) {
            $image_file = $request->file('image');
            $validated_inputs['image'] = $image_file->store('Slides') ?? '';
        }

        $newest = Slide::create($validated_inputs);
        if ($newest) {
            $newest->position = $newest->id;
            $newest->save();

            return response()->json(['message' => 'Slide successfully saved'], 200);
        } else {
            $uploaded_file_path = public_path($validated_inputs['image']);
            if (File::exists($uploaded_file_path)) {
                File::delete($uploaded_file_path);
            }

            return response()->json(['errors' => ['general' => ['Error on creating of slide']]], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slide $slide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSlideRequest $request, Slide $slide)
    {
        $validated_inputs = $request->validated();
        $validated_inputs['image'] = $slide->image;
        $old_file_path = '';

        if ($request->hasFile('image')) {
            $old_file_path = public_path($slide->image);

            $image_file = $request->file('image');
            $validated_inputs['image'] = $image_file->store('Slides') ?? $validated_inputs['image'];
        }


        if ($slide->update($validated_inputs)) {
            if ($request->hasFile('image') && File::exists($old_file_path))
                File::delete($old_file_path);

            $slide = $slide->toArray();
            $slide['image'] = Storage::url($slide['image']);

            return response()->json([
                'message' => 'Slide successfully saved',
                'slide' => json_encode($slide)
            ], 200);
        } else {

            $uploaded_file_path = public_path($validated_inputs['image']);
            if (File::exists($uploaded_file_path)) {
                File::delete($uploaded_file_path);
            }
            return response()->json(['errors' => ['general' => ['Error on creating of slide']]], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slide $slide)
    {
        //
    }

    public function sort_page()
    {
        return view(
            'backoffice.pages.slide.sort',
            [
                'visible_slides' => Slide::whereVisible(true)
                    ->orderBy('position', 'asc')
                    ->get(),
                'not_visible_slides' => Slide::whereVisible(false)
                    ->orderBy('position', 'asc')
                    ->get()
            ]
        );
    }

    public function sort(Request $request)
    {
        try {
            $visibles = $request->input('visibles');
            $hiddens = $request->input('hiddens');
            $last_position = 1;

            if (is_array($visibles)) {
                foreach ($visibles as $key => $slide_id) {
                    $slide = Slide::find($slide_id);
                    if ($slide) {
                        $slide->position = $key + 1;
                        $slide->visible = true;
                        $slide->save();
                    }

                    $last_position = $key;
                }
            }
            if (is_array($hiddens)) {
                foreach ($hiddens as $slide_id) {
                    $slide = Slide::find($slide_id);
                    if ($slide) {
                        $slide->position = ++$last_position;
                        $slide->visible = false;
                        $slide->save();
                    }
                }
            }
            return response()->json(['message' => 'Ordre correctement mis à jour.']);
        } catch (Exception $e) {
            return response()->json(['message' => 'Une erreur c\'est produite : ' . $e->getMessage()]);
        }
    }
}
