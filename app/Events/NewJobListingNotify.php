<?php

namespace App\Events;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewJobListingNotify
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $creators;
    public $listing;
    public $brand_publishing;
    /**
     * Create a new event instance.
     */
    public function __construct(Listing $listing, User $brand_publishing)
    {
        //
        $this->brand_publishing = $brand_publishing;
        $this->listing = $listing;
        $this->creators = User::where('role', 'creator')->get();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
