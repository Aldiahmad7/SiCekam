<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'admin',
        ]);

        // User
        User::create([
            'name' => 'Regular User',
            'email' => 'messi@gmail.com',
            'password' => Hash::make('123123'),
            'role' => 'user',
        ]);
    }
}

