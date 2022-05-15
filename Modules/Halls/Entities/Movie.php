<?php

namespace Modules\Halls\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Event;
use Wildside\Userstamps\Userstamps;

class Movie extends Model
{
    use HasFactory, Userstamps;

    const CREATED_BY = 'created_by';
    const UPDATED_BY = 'updated_by';
    const DELETED_BY = 'deleted_by';

    protected $fillable = [
        'name',
        'description',
        'image',
        'created_at',
        'updated_at'
    ];


    public function halls()
    {
        return $this->belongsToMany(Hall::class,'hall_movies','movie_id','hall_id');
    }
    public static function boot()
    {
        parent::boot();

        static::created(function (Movie $movie) {
            Event::dispatch('movie.created', $movie);
        });
        static::updated(function (Movie $movie) {
            Event::dispatch('movie.updated', $movie);
        });
        static::saved(function (Movie $movie) {
            Event::dispatch('movie.saved', $movie);
        });
        static::deleted(function (Movie $movie) {
            Event::dispatch('movie.deleted', $movie);
        });

    }
}
