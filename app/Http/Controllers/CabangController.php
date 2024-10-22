<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use Illuminate\Http\Request;

class CabangController extends Controller
{
    public function index()
    {
        // Mengambil semua cabang dari database
        $cabangs = Cabang::all();

        // Melempar data cabang ke view
        return view('cabangs.index', compact('cabangs'));
    }

    public function create()
    {
        // Menampilkan form untuk membuat cabang baru
        return view('cabangs.create');
    }

    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'No_Cabang' => 'required|string|max:255|unique:cabangs,No_Cabang',
            'Nama_Cabang' => 'required|string|max:255|unique:cabangs,Nama_Cabang',
        ]);

        // Simpan data cabang baru ke database
        Cabang::create([
            'No_Cabang' => $request->No_Cabang,
            'Nama_Cabang' => $request->Nama_Cabang,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('cabangs.index')->with('success', 'Cabang berhasil ditambahkan!');
    }

    public function edit($No_Cabang)
    {
        // Ambil cabang berdasarkan No_Cabang untuk diedit
        $cabang = Cabang::where('No_Cabang', $No_Cabang)->firstOrFail();

        // Menampilkan view edit dengan data cabang
        return view('cabangs.edit', compact('cabang'));
    }

    public function update(Request $request, $No_Cabang)
{
    $request->validate([
        'Nama_Cabang' => 'required|string|max:255',
    ]);

    $cabang = Cabang::where('No_Cabang', $No_Cabang)->firstOrFail();
    $cabang->update([
        'Nama_Cabang' => $request->Nama_Cabang,
    ]);

    return redirect()->route('cabangs.index')->with('success', 'Cabang berhasil diperbarui!');
}


    public function destroy($No_Cabang)
    {
        // Hapus cabang berdasarkan No_Cabang
        $cabang = Cabang::where('No_Cabang', $No_Cabang)->firstOrFail();
        $cabang->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('cabangs.index')->with('success', 'Cabang berhasil dihapus!');
    }

    public function show($No_Cabang)
    {
        // Ambil cabang berdasarkan No_Cabang untuk ditampilkan
        $cabang = Cabang::where('No_Cabang', $No_Cabang)->firstOrFail();

        // Menampilkan view detail cabang
        return view('cabangs.show', compact('cabang'));
    }

    public function dashboard()
    {
        $cabangCount = Cabang::count(); // Hitung jumlah pengguna
        return view('dashboard', compact('cabangCount'));
    }
}
