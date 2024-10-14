<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CabangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cabangs = [
            ['id' => 1, 'Nama_Cabang' => 'Jakarta Pusat'],
            ['id' => 2, 'Nama_Cabang' => 'Jakarta Selatan'],
            ['id' => 3, 'Nama_Cabang' => 'Jakarta Barat'],
            ['id' => 4, 'Nama_Cabang' => 'Jakarta Timur'],
            ['id' => 5, 'Nama_Cabang' => 'Jakarta Utara'],
            ['id' => 6, 'Nama_Cabang' => 'Bandung'],
            ['id' => 7, 'Nama_Cabang' => 'Surabaya'],
            ['id' => 8, 'Nama_Cabang' => 'Medan'],
            ['id' => 9, 'Nama_Cabang' => 'Yogyakarta'],
            ['id' => 10, 'Nama_Cabang' => 'Semarang'],
            ['id' => 11, 'Nama_Cabang' => 'Makassar'],
            ['id' => 12, 'Nama_Cabang' => 'Denpasar'],
            ['id' => 13, 'Nama_Cabang' => 'Malang'],
            ['id' => 14, 'Nama_Cabang' => 'Palembang'],
            ['id' => 15, 'Nama_Cabang' => 'Pontianak'],
            ['id' => 16, 'Nama_Cabang' => 'Balikpapan'],
            ['id' => 17, 'Nama_Cabang' => 'Pekanbaru'],
            ['id' => 18, 'Nama_Cabang' => 'Manado'],
            ['id' => 19, 'Nama_Cabang' => 'Batam'],
            ['id' => 20, 'Nama_Cabang' => 'Samarinda'],
        ];

        DB::table('cabangs')->insert($cabangs);
    }
}
