<?php

namespace Modules\Halls\Events;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Modules\Halls\Entities\Movie;

class MovieEvent
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

    private function clearCaches(Movie $movie)
    {
        Cache::forget('movies');
    }

    public function movieCreated(Movie $movie)
    {
        $this->clearCaches($movie);
    }

    public function movieUpdated(Movie $movie)
    {
        $this->clearCaches($movie);
    }

    public function movieSaved(Movie $movie)
    {
        $this->clearCaches($movie);
    }

    public function movieDeleted(Movie $movie)
    {
        $this->clearCaches($movie);
    }

    public function movieRestored(Movie $movie)
    {
        $this->clearCaches($movie);
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
