<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BookLoanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'book_id' => ['required'],
            'borrower_id' => ['required'],
            'loan_date' => ['required', 'date'],
            'due_date' => ['required', 'date'],
            'fine_amount' => ['nullable'],
            'notes' => ['nullable'],
            'enhancer_id' => ['required'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'book_id' => $this->book_id ? decrypt_id($this->book_id) : '',
            'borrower_id' => $this->borrower_id ? decrypt_id($this->borrower_id) : '',
            'enhancer_id' => Auth::check() ? Auth::id() : null,
        ]);
    }

    public function messages(): array
    {
        return [
            'book_id.required' => 'Buku harus dipilih.',
            'borrower_id.required' => 'Peminjam harus dipilih.',
            'loan_date.required' => 'Tanggal peminjaman wajib diisi.',
            'loan_date.date' => 'Tanggal peminjaman harus berupa format tanggal yang valid.',
            'due_date.required' => 'Tanggal jatuh tempo wajib diisi.',
            'due_date.date' => 'Tanggal jatuh tempo harus berupa format tanggal yang valid.',
            'fine_amount.required' => 'Jumlah denda wajib diisi.',
        ];
    }

}
