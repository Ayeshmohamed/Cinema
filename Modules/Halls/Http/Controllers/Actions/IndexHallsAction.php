<?php

namespace Modules\Halls\Http\Controllers\Actions;

use Illuminate\Support\Facades\Cache;
use Modules\Halls\Entities\Hall;
use Modules\Halls\Transformers\HallResource;

class IndexHallsAction
{
    public function execute(array $request)
    {
        $halls = new Hall;
        $halls = $halls->whereHas('movies', function ($movies) use ($request) {
            if (isset($request['movie_id']) && $request['movie_id']) {
                $movies->where('movie_id', $request['movie_id']);
            }
            if (isset($request['from_date']) && $request['from_date']) {
                $movies->where('from_date', date('Y-m-d H:i', strtotime($request['from_date'])));
            }
            if (isset($request['to_date']) && $request['to_date']) {
                $movies->where('to_date', date('Y-m-d H:i', strtotime($request['to_date'])));
            }
        });

        $halls = $halls->get();

        $halls = HallResource::collection($halls);

        return $halls;
    }
}
