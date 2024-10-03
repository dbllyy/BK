<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komputer extends Model
{
    use HasFactory;

    protected $table = 'komputers'; // nama table di database

    protected $fillable = [
        'cabang_id',
        'jumlah',
        'kondisi',
        'keterangan',
    ];

    // Jika ada relasi dengan tabel Cabang
    public function cabang()
    {
        return $this->belongsTo(Cabang::class, 'cabang_id');
    }
}
