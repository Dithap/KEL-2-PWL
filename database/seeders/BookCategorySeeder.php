<?php

namespace Database\Seeders;

use App\Models\BookCategory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BookCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first() ?? User::factory()->create();

        $categories = [
            'Teknologi', 'Fiksi', 'Non-Fiksi', 'Sejarah', 'Pendidikan',
            'Biografi', 'Sains', 'Agama', 'Bisnis', 'Hukum',
            'Kesehatan', 'Kedokteran', 'Matematika', 'Filsafat', 'Psikologi',
            'Politik', 'Ekonomi', 'Fotografi', 'Astronomi', 'Komputer',
            'Pemrograman', 'Desain Grafis', 'Arsitektur', 'Sastra', 'Puisi',
            'Novel', 'Drama', 'Cerpen', 'Dongeng', 'Ensiklopedia',
            'Jurnal Ilmiah', 'Majalah', 'Komik', 'Manga', 'Anime',
            'Kamus', 'Musik', 'Olahraga', 'Traveling', 'Kuliner',
            'Peternakan', 'Pertanian', 'Lingkungan', 'Geografi', 'Geologi',
            'Antropologi', 'Sosial', 'Budaya', 'Edukasi Anak', 'Tutorial'
        ];

        foreach ($categories as $name) {
            BookCategory::create([
                'name' => $name,
                'slug' => Str::slug($name),
                'description' => 'Kategori untuk buku ' . strtolower($name),
                'enhancer_id' => $user->id,
            ]);
        }
    }
}
