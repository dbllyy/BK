<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services'; // Nama tabel di database

    protected $fillable = [
        'NIP',           // Gunakan 'NIP' sebagai nama kolom foreign key
        'komputer_id',   // Kolom foreign key ke tabel komputers
        'cabang_id',     // Kolom foreign key ke tabel cabangs
        'merek',         // Kolom merek
        'service',       // Tipe layanan
        'status',        // Status
        'di_kerjakan',   // Waktu pengerjaan
    ];

    // Relasi dengan tabel users (Staff)
    public function staff()
    {
        return $this->belongsTo(User::class, 'NIP', 'NIP'); // Menggunakan model User
    }

    // Relasi dengan tabel komputers
    public function komputer()
    {
        return $this->belongsTo(Komputer::class, 'komputer_id', 'id'); // Pastikan model Komputer ada
    }

    // Relasi dengan tabel cabangs
    public function cabang()
    {
        return $this->belongsTo(Cabang::class, 'cabang_id', 'No_Cabang'); // Pastikan model Cabang ada
    }
}
