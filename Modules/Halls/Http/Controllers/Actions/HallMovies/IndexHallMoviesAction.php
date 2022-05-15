<?php

namespace Modules\Halls\Http\Controllers\Actions\HallMovies;

use Illuminate\Support\Facades\Cache;
use Modules\Halls\Entities\HallMovie;
use Modules\Halls\Transformers\HallMovieResource;

class IndexHallMoviesAction
{
    public function execute(array $request)
    {
        return Cache::rememberForever('hall_movies', function () {
            $hallMovies = HallMovieResource::collection(HallMovie::all());

            return $hallMovies;
        });
    }
}
