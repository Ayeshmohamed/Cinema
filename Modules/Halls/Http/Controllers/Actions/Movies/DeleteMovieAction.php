<?php

namespace Modules\Halls\Http\Controllers\Actions\Movies;

use Modules\Halls\Entities\Movie;

class DeleteMovieAction
{
    public function execute($id)
    {
        $movie = Movie::find($id);

        if ($movie) {
            $movie->delete();
        }

        return null;
    }
}
