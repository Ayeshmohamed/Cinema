<?php

namespace Modules\Bookings\Http\Controllers\Actions;

use Modules\Bookings\Entities\Booking;

class UpdateBookingAction
{
    public function execute($id, array $data)
    {
        $booking = Booking::find($id);

        if ($booking) {
            $booking->update($data);
        }

        return $booking;
    }
}
