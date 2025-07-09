<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone_number' => '08123456789',
            'role_id' => 2,
            'status' => '1',
            'password' => 'Rahasia123@',
        ]);

        User::create([
            'name' => 'Ditha Indika Putri',
            'nim' => '241351080',
            'email' => 'ditha@gmail.com',
            'phone_number' => '08123456789',
            'role_id' => 1,
            'status' => '1',
            'password' => 'Rahasia123@',
        ]);
    }
}
