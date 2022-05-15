<?php

namespace Modules\Halls\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Event;
use Modules\Bookings\Entities\Booking;
use Wildside\Userstamps\Userstamps;

class Hall extends Model
{
    use HasFactory, Userstamps;

    const CREATED_BY = 'created_by';
    const UPDATED_BY = 'updated_by';
    const DELETED_BY = 'deleted_by';

    protected $fillable = [
        'name',
        'description',
        'number_of_seets',
        'created_at',
        'updated_at'
    ];

    public function movies()
    {
        return $this->belongsToMany(Hall::class, 'hall_movies', 'hall_id', 'movie_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'hall_id', 'id');
    }
    public static function boot()
    {
        parent::boot();

        static::created(function (Hall $hall) {
            Event::dispatch('hall.created', $hall);
        });
        static::updated(function (Hall $hall) {
            Event::dispatch('hall.updated', $hall);
        });
        static::saved(function (Hall $hall) {
            Event::dispatch('hall.saved', $hall);
        });
        static::deleted(function (Hall $hall) {
            Event::dispatch('hall.deleted', $hall);
        });
    }
}
