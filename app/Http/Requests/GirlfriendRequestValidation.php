<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GirlfriendRequestValidation extends FormRequest
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
          'username' => 'required|unique:girlfriends,username',
          'description' => 'required',
          'rate' => 'required|numeric',
          'user_id' => 'required|unique:girlfriends,user_id'
        ];
    }

    public function messages()
    {
      return [
        'username.required' => 'Username field is required',
        'username.unique' => 'Username is not available',
        'description.required' => 'Description field is required',
        'rate.required' => 'Rate field is required',
        'rate.numeric' => 'Rate field must be a number',
        'user_id.required' => 'User is required',
        'user_id.unique' => 'User is already registered'
      ];
    }
}
