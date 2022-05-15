<?php

namespace Modules\Bookings\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        // Bookings
        'booking.created' => [
            'Modules\Bookings\Events\BookingEvent@bookingCreated',
        ],
        'booking.updated' => [
            'Modules\Bookings\Events\BookingEvent@bookingUpdated',
        ],
        'booking.saved' => [
            'Modules\Bookings\Events\BookingEvent@bookingUpdated',
        ],
        'booking.deleted' => [
            'Modules\Bookings\Events\BookingEvent@bookingDeleted',
        ],
    ];
    
    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
