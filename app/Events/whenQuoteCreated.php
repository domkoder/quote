<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class whenQuoteCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $author;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    //we listen for when quote was created then we get the $author .
    public function __construct($author)
    {
        $this->author = $author;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
