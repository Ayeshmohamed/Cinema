<?php

namespace Modules\Halls\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        // Halls
        'hall.created' => [
            'Modules\Halls\Events\HallEvent@hallCreated',
        ],
        'hall.updated' => [
            'Modules\Halls\Events\HallEvent@hallUpdated',
        ],
        'hall.saved' => [
            'Modules\Halls\Events\HallEvent@hallUpdated',
        ],
        'hall.deleted' => [
            'Modules\Halls\Events\HallEvent@hallDeleted',
        ],

        // Movies
        'movie.created' => [
            'Modules\Halls\Events\MovieEvent@movieCreated',
        ],
        'movie.updated' => [
            'Modules\Halls\Events\MovieEvent@movieUpdated',
        ],
        'movie.saved' => [
            'Modules\Halls\Events\MovieEvent@movieUpdated',
        ],
        'movie.deleted' => [
            'Modules\Halls\Events\MovieEvent@movieDeleted',
        ],

        // Hall Movies
        'hall_movie.created' => [
            'Modules\Halls\Events\HallMovieEvent@hallMovieCreated',
        ],
        'hall_movie.updated' => [
            'Modules\Halls\Events\HallMovieEvent@hallMovieUpdated',
        ],
        'hall_movie.saved' => [
            'Modules\Halls\Events\HallMovieEvent@hallMovieUpdated',
        ],
        'hall_movie.deleted' => [
            'Modules\Halls\Events\HallMovieEvent@hallMovieDeleted',
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
