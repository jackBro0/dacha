<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

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
        $image_path = 'required';
        if ($this->method() == 'PUT' or $this->method() == 'PATCH')
        {
            $image_path = '';
        }
        return [
            'category_id' => 'required',
            'advertiser_name' => 'required',
            'currency' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'comment' => 'required',
            'bathroom_count' => 'required',
            'capacity' => 'required',
            'room_count' => 'required',
            'cost' => 'required',
            'image_path' => $image_path
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
            'status' => true
        ], 422));
    }
}
