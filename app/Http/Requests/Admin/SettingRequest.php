<?php

namespace App\Http\Requests\Admin;

use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
                'email' => 'required|string|max:190|min:3|unique:settings,email,'.$input['setting_id'].',id',
                'mobile' => 'required|numeric|digits:10|unique:settings,mobile,'.$input['setting_id'].',id',
                'address' => 'required|string|max:255',
                'zip' => 'required|numeric|digits:6',
                'commission' => 'required|numeric|between:0,99999999.99',
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
