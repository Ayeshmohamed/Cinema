<?php

namespace Modules\Bookings\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Event;
use Wildside\Userstamps\Userstamps;

class Booking extends Model
{
    use HasFactory, Userstamps;

    const CREATED_BY = 'created_by';
    const UPDATED_BY = 'updated_by';
    const DELETED_BY = 'deleted_by';

    protected $fillable = [
        'hall_id',
        'movie_id',
        'from_date',
        'to_date',
        'seet_number',
        'status',
        'created_at',
        'updated_at'
    ];


    public static function boot()
    {
        parent::boot();

        static::created(function (Booking $booking) {
            Event::dispatch('booking.created', $booking);
        });
        static::updated(function (Booking $booking) {
            Event::dispatch('booking.updated', $booking);
        });
        static::saved(function (Booking $booking) {
            Event::dispatch('booking.saved', $booking);
        });
        static::deleted(function (Booking $booking) {
            Event::dispatch('booking.deleted', $booking);
        });
    }
}
