<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:students,email,'.$this->id,
            'phone' => 'required|numeric|regex:/^([0]){1}([9]){1}([0-9]){9}/u|digits:11',
            'address' => 'required',
            'major_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please Enter Your Name!!!',
            'email.required' => 'Please Enter Your Email!!!',
            'email.email' => 'Invalid Email!!!',
            'phone.required' => 'Please Enter Your Phone!!!',
            'phone.numeric' => 'Invalid Phone Number!!!',
            'phone.regex' => 'Invalid Phone Format!!!',
            'address.required' => 'Please Enter Your Address!!!',
            'major_id.required' => 'Please Enter Your Major!!!',
        ];
    }
}
