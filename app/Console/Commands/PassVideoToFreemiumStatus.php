<?php

namespace App\Console\Commands;

use App\Models\Video;
use Illuminate\Console\Command;

class PassVideoToFreemiumStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'video:pass-to-freemium-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Modifier le status des vidéos payantes en vidéos gratuites quand le moment défini arrive';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Récupère les commandes approuvées qui n'ont pas encore reçu le chèque
        $videos = Video::where('premium_video', true)
            ->get();

        foreach ($videos as $video) {
            if ($video->date_time_to_offer_free_access->timestamp <= now()->timestamp) {
                $video->premium_video = false;
                $video->save();
            }
        }
    }
}
