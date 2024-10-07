<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    
    protected $primaryKey = 'NIP'; // Set NIP as the primary key

    public $incrementing = false;  // Since NIP is not an auto-incrementing ID

    protected $fillable = ['NIP', 'Nama_Staff', 'Role', 'password'];

    protected $hidden = ['password'];
}
