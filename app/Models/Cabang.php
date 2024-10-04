<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    use HasFactory;

    // Define the table name if it's not following Laravel's plural naming convention
    protected $table = 'cabangs'; // Consider using plural name if possible

    // Specify the primary key
    protected $primaryKey = 'No_Cabang';

    // Disable auto-incrementing if the primary key is not auto-incrementing
    public $incrementing = false;

    // If the primary key is not an integer, specify the type (e.g., string)
    protected $keyType = 'string'; 

    // Specify which fields can be mass-assigned
    protected $fillable = ['No_Cabang', 'Nama_Cabang'];
}
