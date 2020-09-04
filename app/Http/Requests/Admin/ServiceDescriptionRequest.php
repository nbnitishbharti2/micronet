<?php

namespace App\Http\Requests\Admin;

use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Http\FormRequest;

class ServiceDescriptionRequest extends FormRequest
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
        $input = Input::all();
        return [
            'service_id' => 'required|integer',
            'description' => 'required|string',
            'availability' => 'required|string',
        ];

    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            
        ];
    }
}
