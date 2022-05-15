<?php

namespace Modules\Bookings\Http\Controllers\Actions;

use Modules\Bookings\Entities\Booking;

class DeleteBookingAction
{
    public function execute($id)
    {
        $booking = Booking::find($id);

        if ($booking) {
            $booking->delete();
        }

        return null;
    }
}
