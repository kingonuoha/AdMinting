<?php

namespace App\Events;

use App\Models\Listing;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ListingOnboardedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $applicant_id, $onboarded_listing;
    /**
     * Create a new event instance.
     */
    public function __construct($applicant_id, Listing $onboarded_listing)
    {
        //
        $this->onboarded_listing = $onboarded_listing;
        $this->applicant_id = $applicant_id;
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
