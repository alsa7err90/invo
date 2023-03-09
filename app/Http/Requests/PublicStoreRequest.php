<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
 
    public function rules()
    {
        return [
            'email' => 'required|email|unique:invitations',
            'name' => 'required|string|max:150' 
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required!',
            'email.unique' => 'this email is exist!',
            'name.required' => 'Name is required!' 
        ];
    }
}
