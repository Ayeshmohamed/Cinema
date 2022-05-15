<?php

namespace Modules\Halls\Http\Controllers\Actions\Movies;

use Illuminate\Support\Facades\Cache;
use Modules\Halls\Entities\Movie;
use Modules\Halls\Transformers\MovieResource;

class IndexMoviesAction
{
    public function execute(array $request)
    {
        return Cache::rememberForever('movies', function () {
            $movies = MovieResource::collection(Movie::all());

            return $movies;
        });
    }
}
