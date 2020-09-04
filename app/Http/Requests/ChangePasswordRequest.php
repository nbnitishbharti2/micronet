<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Hash;


class ChangePasswordRequest extends FormRequest
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
                'old_password' => 'required',
                'newpassword'=> ['required','string','min:6','different:old_password','confirmed'],
                'newpassword_confirmation'=> ['required','same:newpassword'],
            ];

    }

    public function withValidator($validator)
    {
        // checks user current password
        // before making changes
        $validator->after(function ($validator) {
            if ( !Hash::check($this->old_password,  Auth::guard('web')->user()->password) ) {
                $validator->errors()->add('old_password', 'Your old password is incorrect.');
            }
        });
        return;
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
