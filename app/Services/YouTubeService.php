<?php

namespace App\Services;

use Google\Client;
use Google\Service\YouTube;
use Google\Service\YouTube\Video;

class YouTubeService
{
    protected $youtube;

    public function __construct()
    {
        $client = new Client();
        $client->setApplicationName(config('app.name')); // Utilisation de la configuration Laravel
        $client->setDeveloperKey(env('YOUTUBE_API_KEY')); // Clé API depuis .env

        $this->youtube = new YouTube($client);
    }

    /**
     * Récupérer les informations d'une vidéo YouTube.
     *
     * @param string $videoId
     * @return array
     */
    public function getVideoInfo(string $videoId): array
    {
        try {
            $response = $this->youtube->videos->listVideos('snippet,statistics', ['id' => $videoId]);

            $videos = $response->getItems();
            if ($videos)
                return $videos; // Retourner directement la vidéo


            return []; // Vidéo non trouvée
        } catch (\Exception $e) {
            throw new \RuntimeException('Erreur API YouTube : ' . $e->getMessage());
        }
    }
}
