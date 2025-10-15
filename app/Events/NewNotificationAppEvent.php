<?php

namespace App\Events;

use App\Models\Notification;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewNotificationAppEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $notif_title;
    public string $notif_description;

    /**
     * Create a new event instance.
     */
    public function __construct(Notification $notif)
    {
        $this->notif_title = $notif->title;
        $this->notif_description = $notif->short_description;
    }

    /**
     * The data to broadcast.
     *
     * @return array
     */
    public function broadcastWith(): array
    {
        return [
            'title' => $this->notif_title,
            'description' => $this->notif_description,
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('new-notification'),
        ];
    }
}
