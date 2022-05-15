<?php

namespace Modules\Bookings\Http\Controllers\Actions;

use Modules\Bookings\Entities\Booking;

class CreateBookingAction
{
    public function execute(array $data)
    {
        if (!Booking::where('hall_id', $data['hall_id'])
            ->where('movie_id', $data['movie_id'])
            ->where('seet_number', $data['seet_number'])
            ->where('from_date', date('Y-m-d H:i', strtotime($data['from_date'])))
            ->where('to_date', date('Y-m-d H:i', strtotime($data['to_date'])))->where('status','confirmed')->exists()) {
            $data['status'] = 'confirmed';
            $booking = Booking::create($data);
            $message = "Booking Confirmed";
        } else {
            $booking = Booking::where('hall_id', $data['hall_id'])
                ->where('movie_id', $data['movie_id'])
                ->where('seet_number', $data['seet_number'])
                ->where('from_date', date('Y-m-d H:i', strtotime($data['from_date'])))
                ->where('to_date', date('Y-m-d H:i', strtotime($data['to_date'])))->update(['status' => 'cancel']);
            $message = "Booking Canceled";
        }

        return [
            'status' => true,
            'message' => $message,
            'data' => $booking,
        ];
    }
}
