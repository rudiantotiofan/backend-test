<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ForgotRequest extends FormRequest
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
            'password' => 'required|min:8|max:20|confirmed',
            'password_confirmation' => 'required|min:8|max:20'
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi harus minimal 8 karakter.',
            'password.max' => 'Kata sandi harus maksimal 20 karakter.',
            'password.confirmed' => 'Kata sandi yang dimasukan tidak sama.',

            'password_confirmation.required' => 'Konfrimasi kata sandi wajib diisi.',
            'password_confirmation.min' => 'Konfrimasi kata sandi harus minimal 8 karakter.',
            'password_confirmation.max' => 'Konfrimasi kata sandi harus maksimal 20 karakter.',
        ];
    }
}
