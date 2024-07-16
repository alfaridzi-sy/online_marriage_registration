<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Contoh data pengguna
        $users = [
            [
                'username' => 'jemaat',
                'password' => Hash::make('password'),
                'full_name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'phone_number' => '123456789',
                'role' => 'jemaat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'ketua_stasi',
                'password' => Hash::make('password'),
                'full_name' => 'Jane Doe',
                'email' => 'janedoe@example.com',
                'phone_number' => '987654321',
                'role' => 'ketua_stasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Masukkan data ke dalam tabel users
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
