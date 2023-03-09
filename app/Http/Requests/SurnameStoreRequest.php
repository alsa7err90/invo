<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SurnameStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
 
    public function rules()
    {
        return [
            'title' => 'required|unique:surnames',
            'lang' => 'required|string|max:150' 
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Email is required!',
            'title.unique' => 'this email is exist!',
            'lang.required' => 'Name is required!' 
        ];
    }
}
