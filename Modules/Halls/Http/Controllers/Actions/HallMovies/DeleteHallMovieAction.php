<?php

namespace Modules\Halls\Http\Controllers\Actions\HallMovies;

use Modules\Halls\Entities\HallMovie;

class DeleteHallMovieAction
{
    public function execute($id)
    {
        $hallMovie = HallMovie::find($id);

        if ($hallMovie) {
            $hallMovie->delete();
        }

        return null;
    }
}
