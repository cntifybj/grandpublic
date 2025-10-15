<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function getNotifications()
    {
        $notifications = Notification::all();
        return response()->json([
                'data' => $notifications,
                'message' => 'Notifications récupérées avec succès.',
                'status' => 200
        ]);
    }
}
