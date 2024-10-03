<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaAcara extends Model
{
    use HasFactory;

    protected $table = 'berita_acaras'; // nama table di database

    protected $fillable = [
        'staff_id',
        'komputer_id',
        'cabang_id',
        'merek',
        'service',
        'status',
        'keterangan',
        'tgl_di_ambil',
    ];

    // Jika ada relasi dengan tabel Staff, Komputer, dan Cabang
    public function staff()
{
    return $this->belongsTo(User::class, 'NIP', 'NIP'); // Menghubungkan NIP di tabel services ke NIP di tabel users
}


    public function komputer()
    {
        return $this->belongsTo(Komputer::class, 'komputer_id');
    }

    public function cabang()
    {
        return $this->belongsTo(Cabang::class, 'cabang_id');
    }
}
