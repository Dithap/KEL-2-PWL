<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Peminjaman;
use App\Models\User;
use Carbon\Carbon;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan ada user untuk testing
        $user = User::first();
        if (!$user) {
            $user = User::create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => bcrypt('password'),
            ]);
        }

        // Data dummy peminjaman
        $peminjamanData = [
            [
                'user_id' => $user->id,
                'judul_buku' => 'Laravel Framework Tutorial',
                'kode_buku' => 'LAR-001',
                'tanggal_pinjam' => Carbon::now()->subDays(5),
                'tanggal_harus_kembali' => Carbon::now()->addDays(2),
                'status' => 'dipinjam',
                'catatan' => 'Buku untuk belajar Laravel'
            ],
            [
                'user_id' => $user->id,
                'judul_buku' => 'PHP Programming Guide',
                'kode_buku' => 'PHP-002',
                'tanggal_pinjam' => Carbon::now()->subDays(10),
                'tanggal_harus_kembali' => Carbon::now()->subDays(2),
                'status' => 'dipinjam',
                'catatan' => 'Buku terlambat'
            ],
            [
                'user_id' => $user->id,
                'judul_buku' => 'Database Design Principles',
                'kode_buku' => 'DB-003',
                'tanggal_pinjam' => Carbon::now()->subDays(15),
                'tanggal_harus_kembali' => Carbon::now()->subDays(5),
                'tanggal_kembali' => Carbon::now()->subDays(5),
                'status' => 'dikembalikan',
                'catatan' => 'Sudah dikembalikan tepat waktu'
            ],
        ];

        foreach ($peminjamanData as $data) {
            Peminjaman::create($data);
        }
    }
}
