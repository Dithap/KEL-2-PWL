<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookLoan extends Model
{
    use SoftDeletes;
    protected $table = 'book_loans';

    protected $fillable = [
        'book_id',
        'borrower_id',
        'loan_date',
        'due_date',
        'return_date',
        'loan_status',
        'status',
        'fine_amount',
        'notes',
        'enhancer_id',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }

    public function borrower()
    {
        return $this->belongsTo(User::class, 'borrower_id', 'id');
    }

    public function enhancer()
    {
        return $this->belongsTo(User::class, 'enhancer_id', 'id');
    }
}
