<?php

namespace App\Repositories;

use App\Models\Payment;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;

class UserVideoRepository
{
    static public function canWatchPremiumVideo($video_id): bool
    {
        $video = Video::find($video_id);

        if (!$video) return false;

        if (!$video->premium_video) return true;

        if (!Auth::check()) return false;

        /** @var App\Models\User $user l'utilisateur actuellement connecté */
        $user = auth()->user();

        // Check if the user has paid for the video
        $hasPaid = Payment::where('user_id', $user->id)
            ->where('video_id', $video_id)
            ->exists();

        // Check if the user has an active subscription
        $hasActiveSubscription = $user->userSubscriptions()
            ->where('expired', false)
            ->exists();

        return $hasPaid || $hasActiveSubscription;
    }
}
