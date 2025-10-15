<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Events\NewNotificationAppEvent;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backoffice.pages.app_notif.index');
    }


    public function fetch_resource()
    {
        return response()->json(['data' => Notification::orderBy('created_at', 'desc')->get()], 200);
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
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'short_description' => 'required|string|max:255',
        ]);
        $newest = Notification::create($request->only(['title', 'short_description']));

        if ($newest) {
            return response()->json(['message' => 'New app notification successfully created'], 200);
        } else {
            return response()->json(['errors' => ['general' => ['Error on creating of a new app notification']]], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Notification $app_notif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notification $app_notif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notification $app_notif)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'short_description' => 'required|string|max:255',
        ]);

        if ($app_notif && !$app_notif->posted)
            if ($app_notif->update($request->only(['title', 'short_description']))) {
                return response()->json(['message' => 'Infos successfully modified'], 200);
            } else {
                return response()->json(['errors' => ['general' => ['Error on updating app notification']]], 500);
            }
        else
            return response()->json(['message' => 'Une notification déjà envoyé ne peut pas être modifié'], 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $app_notif_id)
    {
        $notif = Notification::findOrFail($app_notif_id);

        if ($notif && !$notif->posted)
            if (Notification::destroy($app_notif_id)) {
                return response()->json(['message' => 'App notification successfully deleted'], 200);
            } else {
                return response()->json(['message' => 'Error on removing app notification'], 500);
            }
        else
            return response()->json(['message' => 'Une notification déjà envoyé ne peut pas être supprimé'], 400);
    }


    public function postToApp(Request $request)
    {
        $notif = Notification::findOrFail($request->input('id'));

        if ($notif) {
            NewNotificationAppEvent::dispatch($notif);

            $notif->posted = true;
            $notif->save();

            return response()->json(['message' => 'New app notification successfully posted'], 200);
        } else {
            return response()->json(['message' => 'Error on removing app notification'], 500);
        }
    }
}
