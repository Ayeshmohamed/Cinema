<?php

namespace Modules\Bookings\Events;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Modules\Bookings\Entities\Booking;

class BookingEvent
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

    private function clearCaches(Booking $booking)
    {
        Cache::forget('bookings');
    }

    public function bookingCreated(Booking $booking)
    {
        $this->clearCaches($booking);
    }

    public function bookingUpdated(Booking $booking)
    {
        $this->clearCaches($booking);
    }

    public function bookingSaved(Booking $booking)
    {
        $this->clearCaches($booking);
    }

    public function bookingDeleted(Booking $booking)
    {
        $this->clearCaches($booking);
    }

    public function bookingRestored(Booking $booking)
    {
        $this->clearCaches($booking);
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
