<?php

namespace Modules\Bookings\Http\Controllers\Actions;

use Illuminate\Support\Facades\Cache;
use Modules\Bookings\Entities\Booking;
use Modules\Bookings\Transformers\BookingResource;

class IndexBookingsAction
{
    public function execute(array $request)
    {
        return Cache::rememberForever('bookings', function () {
            $bookings = BookingResource::collection(Booking::all());

            return $bookings;
        });
    }
}
