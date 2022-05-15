<?php

namespace Modules\Bookings\Http\Controllers\Api\V1;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Bookings\Http\Controllers\Actions\CreateBookingAction;
use Modules\Bookings\Http\Controllers\Actions\DeleteBookingAction;
use Modules\Bookings\Http\Controllers\Actions\IndexBookingsAction;
use Modules\Bookings\Http\Controllers\Actions\UpdateBookingAction;
use Modules\Bookings\Http\Requests\CreateBookingRequest;
use Modules\Bookings\Http\Requests\DeleteBookingRequest;
use Modules\Bookings\Http\Requests\IndexBookingRequest;
use Modules\Bookings\Http\Requests\UpdateBookingRequest;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(IndexBookingRequest $request)
    {
        $bookings = (new IndexBookingsAction)->execute($request->all());

        return response()->json($bookings, 200);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateBookingRequest $request)
    {
        $booking = (new CreateBookingAction)->execute($request->all());

        return response()->json($booking, 200);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('Bookings::show');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateBookingRequest $request)
    {
        $booking = (new UpdateBookingAction)->execute($request->id, $request->except(['id']));

        return response()->json($booking, 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete(DeleteBookingRequest $request)
    {
        $booking = (new DeleteBookingAction)->execute($request->id);

        return response()->json($booking, 200);
    }
}
