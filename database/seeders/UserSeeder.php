<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin125'), // Password yang di-hash
            'role' => 'admin', // Menggunakan 'role' alih-alih 'userType'
            'remember_token' => null,
        ]);
    }
}
