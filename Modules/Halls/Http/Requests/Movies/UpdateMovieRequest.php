<?php

namespace Modules\Halls\Http\Requests\Movies;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|exists:movies,id',
            'name' => 'required|string|max:191|unique:movies,name,'. $this->request->get('id'),
            'description' => 'nullable|string|max:65567',
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
