<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|string|unique:users,email',
            'first_name' => 'string|required',
            'last_name' => 'string|required',
            'phone_number' => 'string|required|max:15|min:11',
            'password' => 'string|required|confirmed',
        ];
    }
}
