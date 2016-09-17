<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class OperationWasPublished extends Event
{
    use SerializesModels;

    public $profit;

    /**
     * Create a new event instance.
     *
     * @param $profit
     */
    public function __construct($profit)
    {
        $this->profit = $profit;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
