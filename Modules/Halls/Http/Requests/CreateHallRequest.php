<?php

namespace Modules\Halls\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateHallRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|unique:halls|max:191',
            'description' => 'nullable|string|max:65567',
            'number_of_seets' => 'required|numeric'
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
