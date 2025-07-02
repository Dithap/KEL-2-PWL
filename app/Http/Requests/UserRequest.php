<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check() && is_role(['2']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'max:50'],
            'phone_number' => ['required', 'max:15'],
            'role_id' => ['required', 'in:1,2', 'not_in:placeholder'],
        ];

        if($this->isMethod('post')){
            $rules['email'] = ['required', 'email', 'max:100', 'unique:users,email'];
            $rules['password'] = ['required', 'confirmed', Password::min(8)
            ->mixedCase()
            ->numbers()
            ->symbols()];
        }else if($this->isMethod('put')){
            $rules['email'] = ['required', 'email', 'max:100'];
            $rules['password'] = ['nullable', 'confirmed', Password::min(8)
            ->mixedCase()
            ->numbers()
            ->symbols()];
        }

        return $rules;
    }

    public function prepareForValidation(){
        if (!filled(trim($this->password))) {
            $this->request->remove('password');
        }
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama wajib diisi.',
            'name.max' => 'Nama maksimal terdiri dari 50 karakter.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',

            'phone_number.required' => 'Nomor telepon wajib diisi.',
            'phone_number.max' => 'Nomor telepon maksimal terdiri dari 15 karakter.',

            'role_id.required' => 'Peran wajib dipilih.',
            'role_id.in' => 'Peran yang dipilih tidak valid.',

            'password.required' => 'Kata sandi wajib diisi.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            'password.min' => 'Kata sandi minimal 8 karakter.',
            'password.mixedCase' => 'Kata sandi harus mengandung huruf besar dan huruf kecil.',
            'password.numbers' => 'Kata sandi harus mengandung angka.',
            'password.symbols' => 'Kata sandi harus mengandung simbol.',
        ];
    }
}
