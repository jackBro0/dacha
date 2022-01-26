<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DachaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => 'required',
            'name' => 'required',
            'bathroom_count' => 'required',
            'capacity' => 'required',
            'room_count' => 'required',
            'cost' => 'required'
        ];
    }
}
