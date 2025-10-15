<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\YouTubeService;
use Illuminate\Support\Facades\Log;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'youtube_id',
        'title',
        'slug',
        'description',
        'premium_video',
        'single_price',
        'date_time_to_offer_free_access',
        'publication_date',
        'video_thumbnail',
        'video_preview',
        'highlighted',
        'category',
        'video_creator_id',
        'views'
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date_time_to_offer_free_access' => 'datetime:Y-m-d H:i',
        'publication_date' => 'datetime:Y-m-d H:i'
    ];


    public function likes()
    {
        return $this->hasMany(Like::class);
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function isLikedBy($user)
    {
        if (!$user) {
            return false;
        }

        return $this->likes()->where('user_id', $user->id)->exists();
    }

    /**
     * Obtenir le nombre de vues YouTube de la vidéo.
     *
     * @return string
     */
    public function getYoutubeViewCountAttribute()
    {
        $cacheKey = "youtube_views_{$this->youtube_id}";

        return cache()->remember($cacheKey, now()->addHours(6), function () {
            $youtubeService = new YouTubeService();

            try {
                $videoInfo = $youtubeService->getVideoInfo($this->youtube_id);

                if (!empty($videoInfo)) {
                    return number_format((int)$videoInfo[0]->statistics->viewCount, 0, '', ' ');
                }
            } catch (\Exception $e) {
                // Log l'erreur pour le débogage
                Log::error('Erreur lors de la récupération des vues YouTube : ' . $e->getMessage());
            }

            // Si une erreur survient ou si aucune donnée, retourne la valeur par défaut
            return $this->views ?? 'N/A';
        });
    }
}
