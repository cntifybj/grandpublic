<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('video:pass-to-freemium-status')->hourly();
        $schedule->command('user-subscription:pass-to-expired-status')->hourly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        // Enregistrement manuel de la commande
        $this->app->bind(\App\Console\Commands\MakeServiceCommand::class);

        require base_path('routes/console.php');
    }
}
