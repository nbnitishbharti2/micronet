<?php

namespace App\Http\Requests\Admin;

use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ServiceRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:190', 'min:2', Rule::unique('services')->where(function ($query) use ($input) {
                                        return $query->where('sub_category_id', $input['sub_category_id']);
                                    })->ignore($input['service_id'])],
            'type_id' => 'required|integer',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
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
