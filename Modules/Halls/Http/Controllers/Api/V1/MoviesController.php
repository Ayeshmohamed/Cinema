<?php

namespace Modules\Halls\Http\Controllers\Api\V1;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Halls\Http\Controllers\Actions\Movies\CreateMovieAction;
use Modules\Halls\Http\Controllers\Actions\Movies\DeleteMovieAction;
use Modules\Halls\Http\Controllers\Actions\Movies\IndexMoviesAction;
use Modules\Halls\Http\Controllers\Actions\Movies\UpdateMovieAction;
use Modules\Halls\Http\Requests\Movies\CreateMovieRequest;
use Modules\Halls\Http\Requests\Movies\DeleteMovieRequest;
use Modules\Halls\Http\Requests\Movies\IndexMovieRequest;
use Modules\Halls\Http\Requests\Movies\UpdateMovieRequest;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(IndexMovieRequest $request)
    {
        $movies = (new IndexMoviesAction)->execute($request->all());

        $response =[
            'status' => true,
            'data' => $movies
        ];
        
        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateMovieRequest $request)
    {
        $movie = (new CreateMovieAction)->execute($request->all());

        return response()->json($movie, 200);
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
    public function update(UpdateMovieRequest $request)
    {
        $movie = (new UpdateMovieAction)->execute($request->id, $request->except(['id']));

        return response()->json($movie, 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete(DeleteMovieRequest $request)
    {
        $movie = (new DeleteMovieAction)->execute($request->id);

        return response()->json($movie, 200);
    }
}
