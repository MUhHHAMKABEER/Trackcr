<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('1234567890'), // change this to something stronger
                'role' => 'user',
            ]
        );
    }
}

