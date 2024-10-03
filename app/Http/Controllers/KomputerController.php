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
        return response()->json($komputers);
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
        return response()->json($komputer, 201);
    }

    // Menampilkan data komputer berdasarkan ID
    public function show($id)
    {
        $komputer = Komputer::findOrFail($id);
        return response()->json($komputer);
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
        return response()->json($komputer);
    }

    // Menghapus data komputer
    public function destroy($id)
    {
        $komputer = Komputer::findOrFail($id);
        $komputer->delete();
        return response()->json(null, 204);
    }
}
