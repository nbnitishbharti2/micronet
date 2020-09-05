<?php

namespace App\Http\Requests\Admin;

use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Http\FormRequest;

class ServicesRequest extends FormRequest
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
            'name' => 'required|string|max:190|min:3|unique:services,name,'.$input['category_id'].',id',
            'price' => 'required',
            'discount' => 'required',
            'new_price' => 'required',
            'short_description' => 'required|string|max:190|min:25',
            'description' => 'required|string|max:190|min:50',
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
