<?php

namespace Modules\Halls\Http\Controllers\Actions\HallMovies;

use Modules\Halls\Entities\HallMovie;

class UpdateHallMovieAction
{
    public function execute($id, array $data)
    {
        $hallMovie = HallMovie::find($id);

        if ($hallMovie) {
            $hallMovie->update($data);
        }

        return $hallMovie;
    }
}
