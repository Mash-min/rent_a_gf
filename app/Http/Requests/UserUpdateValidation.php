<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateValidation extends FormRequest
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
          'firstname' => 'required',
          'lastname' => 'required',
          'email' => 'required',
          'contact' => 'required'
        ];
    }

    public function messages()
    {
      return [
        'firstname.required' => "Firstname is required",
        'lastname.required' => "Lastname is required",
        'email.required' => "Email is required",
        'email.unique' => "Email is not available",
        'contact.required' => "Contact is required",
        'contact.unique' => "Contact is not available"
      ];
    }
}
