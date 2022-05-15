<?php

namespace Modules\Halls\Events;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Modules\Halls\Entities\HallMovie;

class HallMovieEvent
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

    private function clearCaches(HallMovie $hallMovie)
    {
        Cache::forget('hall_movies');
    }

    public function hallMovieCreated(HallMovie $hallMovie)
    {
        $this->clearCaches($hallMovie);
    }

    public function hallMovieUpdated(HallMovie $hallMovie)
    {
        $this->clearCaches($hallMovie);
    }

    public function hallMovieSaved(HallMovie $hallMovie)
    {
        $this->clearCaches($hallMovie);
    }

    public function hallMovieDeleted(HallMovie $hallMovie)
    {
        $this->clearCaches($hallMovie);
    }

    public function hallMovieRestored(HallMovie $hallMovie)
    {
        $this->clearCaches($hallMovie);
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
