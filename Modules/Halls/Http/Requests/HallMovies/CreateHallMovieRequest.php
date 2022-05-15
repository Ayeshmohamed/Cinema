<?php

namespace Modules\Halls\Http\Requests\HallMovies;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Modules\Halls\Entities\HallMovie;

class CreateHallMovieRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if(HallMovie::where('hall_id',$this->request->get('hall_id'))->where('hall_id',$this->request->get('hall_id'))->where('from_date',date('Y-m-d H:i',strtotime($this->request->get('from_date'))))->where('to_date',date('Y-m-d H:i',strtotime($this->request->get('to_date'))))->exists()){
            $errors = [];
            $errors[] = [
                'message' => 'this hall movie already exists'
            ];
    
            throw new HttpResponseException(response()->json([
                'errors' => $errors
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
        }

        return [
            'hall_id' => 'required|exists:halls,id',
            'movie_id' => 'required|exists:movies,id',
            'from_date' => 'required|date_format:Y-m-d H:i', 
            'to_date' => 'required|date_format:Y-m-d H:i', 
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
