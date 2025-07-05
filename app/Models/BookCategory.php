<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookCategory extends Model
{
    use SoftDeletes;

    protected $table = 'book_categories';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'enhancer_id',
    ];

    public function books(){
        return $this->hasMany(Book::class, 'category_id', 'id');
    }
}
