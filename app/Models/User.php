<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable
{
    use Notifiable;

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'NIP', 'Nama_Staff', 'Role', 'password',
    ];

    // Karena NIP adalah primary key, kita harus memberi tahu Laravel
    protected $primaryKey = 'NIP';

    // Menonaktifkan auto-increment, karena NIP adalah string
    public $incrementing = false;

    // Tipe data dari primary key
    protected $keyType = 'string';

    // Tabel tidak menggunakan kolom 'remember_token'
    public $timestamps = true;

    protected $hidden = [
        'password', 'remember_token',
    ];
}
