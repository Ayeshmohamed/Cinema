<?php

namespace Modules\Halls\Http\Controllers\Actions\HallMovies;

use Modules\Halls\Entities\HallMovie;

class CreateHallMovieAction
{
    public function execute(array $data)
    {
        $hallMovie = HallMovie::create($data);

        return $hallMovie;
    }
}
