<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'max:70'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users,email'],
            'phone_number' => ['required', 'max:15'],
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()]
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama wajib diisi.',
            'name.max' => 'Nama tidak boleh lebih dari 70 karakter.',

            'email.required' => 'Email wajib diisi.',
            'email.string' => 'Email harus berupa teks.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email tidak boleh lebih dari 100 karakter.',
            'email.unique' => 'Email sudah digunakan.',

            'phone_number.required' => 'Nomor telepon wajib diisi.',
            'phone_number.max' => 'Nomor telepon tidak boleh lebih dari 15 karakter.',

            'password.required' => 'Kata sandi wajib diisi.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            'password.min' => 'Kata sandi minimal 8 karakter.',
            'password.mixedCase' => 'Kata sandi harus mengandung huruf besar dan kecil.',
            'password.numbers' => 'Kata sandi harus mengandung angka.',
            'password.symbols' => 'Kata sandi harus mengandung simbol.'
        ];
    }

}
