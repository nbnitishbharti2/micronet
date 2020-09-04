<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        return $this->id = [
            'name' => 'required|string|max:120',
            'email' => 'required|Email|max:191|unique:users,email,'.$this->id.',id',
            'mobile' => 'required|numeric|regex:/^([0-9\s\-\+\(\)]*)$/|unique:users,mobile,'.$this->id.',id',
            'password' => ['required','string','min:8','confirmed'],    
            'password_confirmation'=> ['required','same:password'],
            'state_id' => 'required|integer',
            'city_id' => 'required|integer',
            'zip' => 'required|numeric|digits:6',
            'address' => "required|max:250",
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name'  => 'User Name is required',
            'user_type.required' => 'Select user type form dropdown list',
            'email.unique' => 'Email already register with us',
			'mobile.required' => 'Phone number is required',
            'mobile.unique' => 'Phone already register with us',
            'first_name.required' => 'First Name is required',
            'address_line_1.required' => 'Address line 1 is required',
            'postal_code.required'  => 'Postal Code is required',
            'country_id.required'  => 'Select country from dropdown list',
			'state_id.integer'  => 'Select state from dropdown list',
            'city_id.integer'  => 'Select city from dropdown list',
            'state_id.required'  => 'Select state from dropdown list',
            'city_id.required'  => 'Select city from dropdown list',
			
            // 'agent_license_number.required_if' => 'Please Enter Agent License Number',
            // 'agent_license_file'=>'nullable'
        ];
    }
}
