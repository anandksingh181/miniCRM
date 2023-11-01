<?php

namespace App\Http\Requests\employees;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "first_name"=> "required",
            "last_name"=> "required",
            'profile_picture'=>'required|mimes:png,jpg,jpeg,gif|max:10000',
        
        ];
    }
}
