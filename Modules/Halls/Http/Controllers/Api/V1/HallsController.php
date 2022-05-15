<?php

namespace Modules\Halls\Http\Controllers\Api\V1;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Halls\Http\Controllers\Actions\CreateHallAction;
use Modules\Halls\Http\Controllers\Actions\DeleteHallAction;
use Modules\Halls\Http\Controllers\Actions\IndexHallsAction;
use Modules\Halls\Http\Controllers\Actions\UpdateHallAction;
use Modules\Halls\Http\Requests\CreateHallRequest;
use Modules\Halls\Http\Requests\DeleteHallRequest;
use Modules\Halls\Http\Requests\IndexHallRequest;
use Modules\Halls\Http\Requests\UpdateHallRequest;

class HallsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(IndexHallRequest $request)
    {
        $halls = (new IndexHallsAction)->execute($request->all());

        $response =[
            'status' => true,
            'data' => $halls
        ];
        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateHallRequest $request)
    {
        $hall = (new CreateHallAction)->execute($request->all());

        return response()->json($hall, 200);
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
    public function update(UpdateHallRequest $request)
    {
        $hall = (new UpdateHallAction)->execute($request->id, $request->except(['id']));

        return response()->json($hall, 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete(DeleteHallRequest $request)
    {
        $hall = (new DeleteHallAction)->execute($request->id);

        return response()->json($hall, 200);
    }
}
