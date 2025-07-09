<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BookRequest extends FormRequest
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
            'title' => ['required', 'max:100'],
            'author' => ['required', 'max:100'],
            'publisher' => ['required', 'max:100'],
            'year' => ['required', 'max:4'],
            'category_id' => ['required', 'exists:book_categories,id'],
            'language' => ['required', 'max:100'],
            'isbn' => ['required', 'max:100'],
            'description' => ['nullable'],
        ];

        if($this->isMethod('post')){
            $rules['cover_image'] = ['required', 'image', 'mimes:png,jpg,jpeg', 'max:2048'];
        }else{
            $rules['cover_image'] = ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:2048'];
        }

        return $rules;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'category_id' => $this->category_id ? decrypt_id($this->category_id) : '',
            'enhancer_id' => Auth::check() ? Auth::id() : null,
        ]);
    }
}
