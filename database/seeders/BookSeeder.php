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
                'description' => '
                    <p><strong>Belajar Laravel untuk Pemula</strong> adalah buku yang dirancang khusus untuk membantu siapa saja yang ingin memulai perjalanan mereka dalam dunia pengembangan web menggunakan <em>Laravel</em>, salah satu framework PHP paling populer dan powerful saat ini.</p>
                    <p>Buku ini tidak hanya menyajikan teori, tetapi juga menekankan pada praktik langsung yang akan membantu pembaca memahami konsep-konsep inti Laravel secara lebih mendalam. Setiap bab disusun secara sistematis dan progresif, dimulai dari instalasi hingga membangun aplikasi web sederhana yang lengkap.</p>
                    <p>Beberapa hal yang akan kamu pelajari dalam buku ini:</p>
                    <ul>
                        <li>Pengenalan MVC (Model-View-Controller) dan bagaimana Laravel mengimplementasikannya</li>
                        <li>Penggunaan Blade Template Engine untuk membuat tampilan yang dinamis dan efisien</li>
                        <li>Membuat dan mengelola routing serta middleware untuk keamanan aplikasi</li>
                        <li>Manajemen basis data menggunakan Eloquent ORM</li>
                        <li>Implementasi autentikasi, otorisasi, validasi form, dan notifikasi</li>
                        <li>Studi kasus membangun aplikasi blog dari nol</li>
                    </ul>
                    <p>Dengan gaya bahasa yang sederhana, penjelasan rinci, serta ilustrasi kode yang mudah diikuti, buku ini sangat cocok digunakan baik oleh pelajar, mahasiswa, maupun profesional yang ingin beralih ke Laravel.</p>
                    <p><strong>Bonus:</strong> Terdapat akses ke repository GitHub berisi semua source code proyek yang dibahas dalam buku.</p>',
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
                'description' => '
                    <p><strong>Mastering PHP OOP</strong> is the definitive guide for developers who want to master the art of Object-Oriented Programming (OOP) in PHP. It is designed for intermediate to advanced PHP programmers who are looking to deepen their understanding and build more maintainable, reusable, and scalable code.</p>
                    <p>This book covers essential OOP concepts in detail, such as:</p>
                    <ul>
                        <li>Classes, Objects, Inheritance, Encapsulation, and Polymorphism</li>
                        <li>Abstract classes, Interfaces, Traits, and Namespaces</li>
                        <li>Advanced design principles including SOLID, DRY, and KISS</li>
                        <li>Applying popular design patterns (Factory, Strategy, Singleton, etc.)</li>
                        <li>Unit testing and mocking in OOP applications</li>
                        <li>How to structure large-scale applications using modern best practices</li>
                    </ul>
                    <p>Each chapter includes real-world examples and code walkthroughs to help you build confidence in applying these principles. Additionally, you’ll find mini-projects at the end of each section to reinforce the concepts learned.</p>
                    <p>Whether you’re building custom CMS, complex APIs, or enterprise-grade applications, this book will equip you with the tools and mindset required for professional-grade PHP development.</p>',
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
                'description' => '
                    <p><strong>Database Design Fundamentals</strong> adalah panduan komprehensif bagi siapa pun yang ingin memahami cara merancang struktur basis data yang baik dan efisien. Buku ini sangat cocok untuk mahasiswa, dosen, developer, maupun profesional IT yang terlibat dalam pengembangan sistem informasi.</p>
                    <p>Isi buku ini mencakup berbagai topik penting, antara lain:</p>
                    <ul>
                        <li>Konsep dasar basis data relasional dan arsitekturnya</li>
                        <li>Model Entity-Relationship dan pembuatan ERD</li>
                        <li>Proses normalisasi mulai dari 1NF hingga BCNF</li>
                        <li>Perancangan tabel dan relasi antar tabel</li>
                        <li>Pengenalan SQL untuk manipulasi dan pengambilan data</li>
                        <li>Studi kasus perancangan database untuk sistem perpustakaan, penjualan, dan keuangan</li>
                    </ul>
                    <p>Buku ini tidak hanya menjelaskan teori, tapi juga dilengkapi dengan latihan soal, studi kasus, dan pembahasan praktik yang relevan dengan kebutuhan industri saat ini.</p>
                    <p>Dengan membaca buku ini, pembaca akan mampu:</p>
                    <ol>
                        <li>Merancang struktur database yang optimal</li>
                        <li>Menghindari redundansi dan inkonsistensi data</li>
                        <li>Memahami pentingnya integrity constraint dan indexing</li>
                    </ol>
                    <p><strong>Bonus:</strong> Dilengkapi template perancangan database dan access ke latihan interaktif berbasis web.</p>',
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
