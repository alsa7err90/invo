<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
 
    public function rules()
    {
        // |unique:users,email
        return [
            'email' => [
                'required',
                Rule::unique('users', 'email')->ignore(auth()->user())
            ], 
            'nickname' => 'required|string|max:150' 
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required!',
            'email.unique' => 'this email is exist!',
            'email2.required' => 'Email is required!',
            'email2.unique' => 'this email is exist!',
            'nickname.required' => 'Name is required!' 
        ];
    }
}
