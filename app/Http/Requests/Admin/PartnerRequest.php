<?php

namespace App\Http\Requests\Admin;

use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Http\FormRequest;

class PartnerRequest extends FormRequest
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
        
        if($input['partner_id']){
            $partner_request = [
                'name' => 'required|string|max:190|min:3',
                'email' => 'required|string|max:190|min:3|unique:partners,email,'.$input['partner_id'].',id',
                'password' => 'nullable|string|min:6|confirmed',
                'password_confirmation'=> 'nullable|same:password',
                'mobile' => 'required|numeric|digits:10|unique:partners,mobile,'.$input['partner_id'].',id',
                'state_id' => 'required|integer',
                'city_id' => 'required|integer',
                'zip' => 'required|numeric|digits:6',
                'address' => 'required|string|max:255',
                'aadhar' => 'required|integer|unique:partners,aadhar,'.$input['partner_id'].',id',
                'image' => 'nullable|image|mimes:jpg,jpeg,png',
                'service_ids.*' =>'required',
            ];

        }else{
            $partner_request = [
                'name' => 'required|string|max:190|min:3',
                'email' => 'required|string|max:190|min:3|unique:partners,email,'.$input['partner_id'].',id',
                'password' => 'required|string|min:6|confirmed',
                'password_confirmation'=> 'required|same:password',
                'mobile' => 'required|numeric|digits:10|unique:partners,mobile,'.$input['partner_id'].',id',
                'state_id' => 'required|integer',
                'city_id' => 'required|integer',
                'zip' => 'required|numeric|digits:6',
                'address' => 'required|string|max:255',
                'aadhar' => 'required|integer|unique:partners,aadhar,'.$input['partner_id'].',id',
                'image' => 'nullable|image|mimes:jpg,jpeg,png',
                'service_ids.*' =>'required',
            ];
        }
        return $partner_request;

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
