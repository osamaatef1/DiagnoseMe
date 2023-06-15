<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DoctorRegisterRequest extends FormRequest
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
            'first_name'=>'required|max:20',
            'last_name'=>'required|max:20',
            'username'=>['required',Rule::unique('doctors','username')],
            'email' => ['required','email', Rule::unique('doctors' , 'email')],
            'password' => 'required|min:6|confirmed',
            'phone_number' => 'required|min:10',
        ];
    }
}
