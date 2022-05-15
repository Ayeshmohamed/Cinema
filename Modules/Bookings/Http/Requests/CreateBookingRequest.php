<?php

namespace Modules\Bookings\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'hall_id' => 'required|exists:halls,id',
            'movie_id' => 'required|exists:movies,id',
            'from_date' => 'required|date_format:Y-m-d H:i', 
            'to_date' => 'required|date_format:Y-m-d H:i', 
            'seet_number' => 'required|numeric'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
