<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SearchRequest extends FormRequest
{
    public function authorize()
    {
        return false;
    }
 
    public function rules()
    {
        // |unique:users,email
        return [
            
        ];
    }

    public function messages()
    {
        return [
           
        ];
    }
}
