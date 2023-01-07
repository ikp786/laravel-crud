<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
                'name'               => 'required|min:3|max:50',
                'email'              => 'required|email|max:100',
                'phone'              => 'required|integer|digits:10',
                'department'         => 'required|max:100',
                'gender'             => 'required|In:M,F,O',
                'profile_picture'    => 'required|mimes:png,jpg'
        ];
    }
}
