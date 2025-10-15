<?php

namespace App\Repositories;


class VideoRepository
{
    static public function extractYouTubeID($url)
    {
        // Expression régulière pour capturer l'ID de la vidéo dans différents types de liens YouTube
        $pattern = '/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';

        /* 
        // Exemples d'utilisation
           -----------------------
            'https://www.youtube.com/watch?v=VIDEO_ID';
            'https://www.youtube.com/embed/VIDEO_ID';
            'https://youtu.be/VIDEO_ID';
            'https://m.youtube.com/watch?v=VIDEO_ID';
        */

        // Recherche de correspondance avec l'expression régulière
        if (preg_match($pattern, $url, $matches)) {
            return $matches[1]; // Retourne l'ID de la vidéo
        }

        return false; // Si aucune correspondance n'est trouvée
    }
}
