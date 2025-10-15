<?php

namespace App\Console\Commands;

use App\Models\UserSubscription;
use Carbon\Carbon;
use Illuminate\Console\Command;

class PassUserSubscriptionToExpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user-subscription:pass-to-expired-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Modifier le status des abonnements utilisateurs quand le moment défini arrive';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Récupère les commandes approuvées qui n'ont pas encore reçu le chèque
        $user_subscriptions = UserSubscription::where('expired', false)
            ->get();

        foreach ($user_subscriptions as $user_subscription) {

            $end_date = Carbon::create($user_subscription['end_date']);

            if ($end_date->timestamp <= now()->timestamp) {
                $user_subscription->expired = true;
                $user_subscription->save();
            }
        }
    }
}
