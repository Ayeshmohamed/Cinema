<?php

namespace Modules\Halls\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Event;
use Wildside\Userstamps\Userstamps;

class HallMovie extends Model
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
        'created_at',
        'updated_at'
    ];


    public static function boot()
    {
        parent::boot();

        static::created(function (HallMovie $hall_movie) {
            Event::dispatch('hall_movie.created', $hall_movie);
        });
        static::updated(function (HallMovie $hall_movie) {
            Event::dispatch('hall_movie.updated', $hall_movie);
        });
        static::saved(function (HallMovie $hall_movie) {
            Event::dispatch('hall_movie.saved', $hall_movie);
        });
        static::deleted(function (HallMovie $hall_movie) {
            Event::dispatch('hall_movie.deleted', $hall_movie);
        });
    }
}
