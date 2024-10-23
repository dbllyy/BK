<?php

namespace App\Http\Controllers;

use App\Models\Komputer;
use Illuminate\Http\Request;

class KomputerController extends Controller
{
    // Menampilkan daftar komputer
    public function index()
    {
        $komputers = Komputer::all();
        $cabangs = \App\Models\Cabang::all(); // Mengambil semua cabang dari tabel cabangs
        return view('komputers.index', compact('komputers', 'cabangs'));
    }

    // Menampilkan form untuk menambahkan komputer baru
    public function create()
    {
        $cabangs = \App\Models\Cabang::all(); // Mengambil semua cabang dari tabel cabangs
        return view('komputers.create', compact('cabangs'));
    }

    // Menyimpan data komputer baru
    public function store(Request $request)
    {
        // Validasi data yang dikirim dari form
        $validated = $request->validate([
            'cabang_id' => 'required|exists:cabangs,No_Cabang', // pastikan cabang_id cocok dengan No_Cabang
            'perangkat' => 'required|in:PC,Laptop,Printer', // perangkat harus salah satu dari nilai enum
            'merk' => 'required|string|max:255', // pastikan merk adalah string
            'jumlah' => 'required|integer|min:1', // jumlah harus integer dan lebih dari 0
            'kondisi' => 'required|in:baru,baru rakitan,second', // pastikan kondisi salah satu dari enum
            'keterangan' => 'nullable|string', // keterangan opsional
        ]);

        // Tambahkan waktu diterima secara otomatis
        $validated['diterima'] = now();

        // Simpan data ke database
        Komputer::create($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('komputers.index')->with('success', 'Data perangkat berhasil disimpan.');
    }

    // Menampilkan data komputer berdasarkan ID
    public function show($id)
    {
        $komputer = Komputer::findOrFail($id);
        return view('komputers.show', compact('komputer')); // Return the view with the computer details
    }

    // Menampilkan form untuk mengedit data komputer
    public function edit($id)
    {
        $komputer = Komputer::findOrFail($id);
        $cabangs = \App\Models\Cabang::all(); // Mengambil semua cabang dari tabel cabangs
        return view('komputers.edit', compact('komputer', 'cabangs'));
    }

    // Mengupdate data komputer
    public function update(Request $request, $id)
    {
        // Validasi input form
        $validated = $request->validate([
            'cabang_id' => 'required|exists:cabangs,No_Cabang', // Sesuaikan dengan primary key di cabangs
            'jumlah' => 'required|integer',
            'kondisi' => 'required|in:baru,second',
            'keterangan' => 'nullable|string',
        ]);

        // Update data komputer
        $komputer = Komputer::findOrFail($id);
        $komputer->update($validated);

        // Redirect ke index dengan pesan sukses
        return redirect()->route('komputers.index')->with('success', 'Komputer berhasil diperbarui.');
    }

    // Menghapus data komputer
    public function destroy($id)
    {
        $komputer = Komputer::findOrFail($id);
        $komputer->delete();

        // Redirect ke index dengan pesan sukses
        return redirect()->route('komputers.index')->with('success', 'Komputer berhasil dihapus.');
    }
}
