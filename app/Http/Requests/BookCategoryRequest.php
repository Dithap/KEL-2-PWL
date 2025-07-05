<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BookCategoryRequest extends FormRequest
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
        return [
            'name' => ['required', 'max:50'],
            'slug' => ['required'],
            'description' => ['nullable'],
            'enhancer_id' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama kategori wajib diisi.',
            'name.max' => 'Nama kategori tidak boleh lebih dari :max karakter.',

            'slug.required' => 'Slug kategori wajib diisi.',

            'enhancer_id.required' => 'Field enhancer wajib diisi.',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => filled($this->name) ? Str::slug($this->name) : null,
            'enhancer_id' => Auth::check() ? Auth::id() : null,
        ]);
    }
}
