<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TestUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@test.com'],
            [
                'name' => 'Admin Alivare',
                'password' => Hash::make('Admin123!'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'user@test.com'],
            [
                'name' => 'User Alivare',
                'password' => Hash::make('User123!'),
                'role' => 'user',
            ]
        );

        User::updateOrCreate(
            ['email' => 'pemilik@test.com'],
            [
                'name' => 'Pemilik Alivare',
                'password' => Hash::make('Pemilik123!'),
                'role' => 'owner',
            ]
        );
    }
}