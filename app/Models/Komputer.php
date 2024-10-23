<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Komputer extends Model
{
    use HasFactory;

    protected $table = 'komputers';

    public $timestamps = false; // Karena kamu tidak menggunakan `created_at` dan `updated_at`

    protected $fillable = [
        'cabang_id',
        'perangkat',
        'merk',
        'jumlah',
        'kondisi',
        'keterangan',
        'diterima',
    ];

    // Event untuk mengisi 'diterima' otomatis saat model disimpan pertama kali
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->diterima = Carbon::now(); // Mengisi kolom 'diterima' dengan waktu saat ini
        });
    }

    public function cabang()
    {
        return $this->belongsTo(Cabang::class, 'cabang_id', 'No_Cabang');
    }
}
