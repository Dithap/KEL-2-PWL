<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    protected $table = 'books';

    protected $fillable = [
        'title',
        'author',
        'publisher',
        'year',
        'category_id',
        'language',
        'isbn',
        'description',
        'cover_image',
        'quantity_total',
        'enhancer_id',
    ];

    public function category()
    {
        return $this->belongsTo(BookCategory::class, 'category_id', 'id');
    }

    public function enhancer()
    {
        return $this->belongsTo(User::class, 'enhancer_id', 'id');
    }
}
