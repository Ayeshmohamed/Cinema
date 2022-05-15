<?php

namespace Modules\Halls\Http\Controllers\Actions\Movies;

use Modules\Halls\Entities\Movie;

class UpdateMovieAction
{
    public function execute($id, array $data)
    {
        $movie = Movie::find($id);

        if ($movie) {
            $movie->update($data);
        }

        return $movie;
    }
}
