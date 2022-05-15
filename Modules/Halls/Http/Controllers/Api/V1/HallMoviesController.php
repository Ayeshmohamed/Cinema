<?php

namespace Modules\Halls\Http\Controllers\Api\V1;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Halls\Http\Controllers\Actions\HallMovies\CreateHallMovieAction;
use Modules\Halls\Http\Controllers\Actions\HallMovies\DeleteHallMovieAction;
use Modules\Halls\Http\Controllers\Actions\HallMovies\IndexHallMoviesAction;
use Modules\Halls\Http\Controllers\Actions\HallMovies\UpdateHallMovieAction;
use Modules\Halls\Http\Requests\HallMovies\CreateHallMovieRequest;
use Modules\Halls\Http\Requests\HallMovies\DeleteHallMovieRequest;
use Modules\Halls\Http\Requests\HallMovies\IndexHallMovieRequest;
use Modules\Halls\Http\Requests\HallMovies\UpdateHallMovieRequest;

class HallMoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(IndexHallMovieRequest $request)
    {
        $hallMovies = (new IndexHallMoviesAction)->execute($request->all());

        return response()->json($hallMovies, 200);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateHallMovieRequest $request)
    {
        $hallMovie = (new CreateHallMovieAction)->execute($request->all());

        return response()->json($hallMovie, 200);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('halls::show');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateHallMovieRequest $request)
    {
        $hallMovie = (new UpdateHallMovieAction)->execute($request->id, $request->except(['id']));

        return response()->json($hallMovie, 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete(DeleteHallMovieRequest $request)
    {
        $hallMovie = (new DeleteHallMovieAction)->execute($request->id);

        return response()->json($hallMovie, 200);
    }
}
