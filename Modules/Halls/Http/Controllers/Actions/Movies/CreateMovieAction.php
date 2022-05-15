<?php

namespace Modules\Halls\Http\Controllers\Actions\Movies;

use Modules\Halls\Entities\Movie;

class CreateMovieAction
{
    public function execute(array $data)
    {
        $data['image'] = $data['image']->store('movieimage','public');
        $movie = Movie::create($data);

        return $movie;
    }
}
