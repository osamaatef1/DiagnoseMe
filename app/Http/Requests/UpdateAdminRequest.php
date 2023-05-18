<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAdminRequest extends FormRequest
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

            'name' => 'required|max:255',
            'email' => ['required','email', Rule::unique('admins' , 'email')->ignore($this->id)],
            'password' => 'nullable|min:6',
            'image' => 'nullable:mimes:jpeg,png,svg,jpg'
        ];
    }
}
