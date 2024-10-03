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
        return view('komputer.index', compact('komputers')); // Return the view with the list of computers
    }

    // Menampilkan form untuk menambahkan komputer baru
    public function create()
    {
        return view('komputers.create'); // Return the view for creating a new computer
    }

    // Menyimpan data komputer baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'cabang_id' => 'required|exists:cabangs,id',
            'jumlah' => 'required|integer',
            'kondisi' => 'required|in:baru,second',
            'keterangan' => 'nullable|string',
        ]);

        $komputer = Komputer::create($validated);
        return redirect()->route('komputers.index')->with('success', 'Komputer berhasil ditambahkan.'); // Redirect to index with success message
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
        return view('komputers.edit', compact('komputer')); // Return the view for editing the computer
    }

    // Mengupdate data komputer
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'cabang_id' => 'required|exists:cabangs,id',
            'jumlah' => 'required|integer',
            'kondisi' => 'required|in:baru,second',
            'keterangan' => 'nullable|string',
        ]);

        $komputer = Komputer::findOrFail($id);
        $komputer->update($validated);
        return redirect()->route('komputer.index')->with('success', 'Komputer berhasil diperbarui.'); // Redirect to index with success message
    }

    // Menghapus data komputer
    public function destroy($id)
    {
        $komputer = Komputer::findOrFail($id);
        $komputer->delete();
        return redirect()->route('komputers.index')->with('success', 'Komputer berhasil dihapus.'); // Redirect to index with success message
    }
}
