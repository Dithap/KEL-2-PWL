<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'title' => 'Belajar Laravel untuk Pemula',
                'author' => 'Rizky Ramadhan',
                'publisher' => 'Informatika Bandung',
                'year' => 2022,
                'category_id' => 1,
                'language' => 'Indonesia',
                'isbn' => '9781234567890',
                'description' => 'Panduan lengkap belajar Laravel untuk pemula.',
                'cover_image' => 'default.jpg',
                'quantity_total' => 10,
                'enhancer_id' => 1,
            ],
            [
                'title' => 'Mastering PHP OOP',
                'author' => 'Dian Eka',
                'publisher' => 'Tech Publisher',
                'year' => 2021,
                'category_id' => 2,
                'language' => 'English',
                'isbn' => '9780987654321',
                'description' => 'A deep dive into object-oriented PHP.',
                'cover_image' => 'default.jpg',
                'quantity_total' => 5,
                'enhancer_id' => 1,
            ],
            [
                'title' => 'Database Design Fundamentals',
                'author' => 'Ahmad Yusuf',
                'publisher' => 'Gramedia',
                'year' => 2020,
                'category_id' => 1,
                'language' => 'Indonesia',
                'isbn' => '9781122334455',
                'description' => 'Dasar-dasar desain database relasional.',
                'cover_image' => 'default.jpg',
                'quantity_total' => 8,
                'enhancer_id' => 1,
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
