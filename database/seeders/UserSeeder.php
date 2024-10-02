<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Buat pengguna dengan role admin
        User::create([
            'NIP' => '123456789', // Ganti dengan NIP yang valid
            'Nama_Staff' => 'admin',
            'Role' => 'admin',
            'password' => Hash::make('admin125'), // Ganti dengan password yang diinginkan
        ]);

        // Anda dapat menambahkan pengguna lain di sini
        User::create([
            'NIP' => '987654321', // Ganti dengan NIP yang valid
            'Nama_Staff' => 'staff',
            'Role' => 'staff',
            'password' => Hash::make('staff123'), // Ganti dengan password yang diinginkan
        ]);
    }
}

