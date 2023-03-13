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
            'name' => 'required|string|max:150' ,
            'side' => 'required|string|max:150' ,
            'position' => 'required|string|max:150' ,
            'surname' => 'required|string|max:150' , 
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'الايميل مطلوب!',
            'email.unique' => 'هذا الايميل مستخدم من قبل!',
            'name.required' => 'الاسم الكامل مطلوب!' ,
            'side.required' => ' يرجى ملئ حقل الجهة!' ,
            'position.required' => ' يرجى ملئ حقل  المنصب'  ,
            'surname.required' => 'يرجى اختيار اللقب!'  ,
        ];
    }
}
