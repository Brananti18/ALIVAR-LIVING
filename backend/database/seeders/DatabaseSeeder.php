<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Alivar',
            'email' => 'admin@alivar.com',
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Pemilik Kost',
            'email' => 'pemilik@alivar.com',
            'role' => 'pemilik',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Penyewa Kost',
            'email' => 'penyewa@alivar.com',
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);
    }
}
