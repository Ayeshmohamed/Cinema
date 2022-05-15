<?php

namespace Modules\Halls\Events;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Modules\Halls\Entities\Hall;

class HallEvent
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    private function clearCaches(Hall $hall)
    {
        Cache::forget('halls');
    }

    public function hallCreated(Hall $hall)
    {
        $this->clearCaches($hall);
    }

    public function hallUpdated(Hall $hall)
    {
        $this->clearCaches($hall);
    }

    public function hallSaved(Hall $hall)
    {
        $this->clearCaches($hall);
    }

    public function hallDeleted(Hall $hall)
    {
        $this->clearCaches($hall);
    }

    public function hallRestored(Hall $hall)
    {
        $this->clearCaches($hall);
    }
    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
