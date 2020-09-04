<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Http\FormRequest;
use Auth;



class UserRequest extends FormRequest
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
                'name' => 'required|string|max:190',
                'email' => 'required|string|max:190|unique:users,email,'.Auth::guard('web')->user()->id.',id',
                'mobile' => 'required|numeric|digits:10|unique:users,mobile,'.Auth::guard('web')->user()->id.',id',
                'state_id' => 'required|integer',
                'city_id' => 'required|integer',
                'zip' => 'required|numeric|digits:6',
                'address' => 'required|string|max:255',
                'aadhar' => 'required|integer|unique:users,aadhar,'.Auth::guard('web')->user()->id.',id',
                //'image' => 'nullable|image|mimes:jpg,jpeg,png',
                'image' => 'nullable',
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
