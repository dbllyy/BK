<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use Illuminate\Http\Request;

class CabangController extends Controller
{
    // Menampilkan semua cabang
    public function index()
    {
        $cabang = Cabang::all();
        return response()->json($cabang);
/*************  ✨ Codeium Command ⭐  *************/
    /**
     * Display the form for creating a new cabang.
     *
     * @return \Illuminate\Http\Response
     */
/******  59a0aed9-6f17-48ca-a736-a6aaaca09718  *******/    }

    // Menyimpan cabang baru
    public function store(Request $request)
    {
        $request->validate([
            'Nama_Cabang' => 'required|string|max:255',
        ]);

        $cabang = Cabang::create([
            'Nama_Cabang' => $request->Nama_Cabang,
        ]);

        return response()->json($cabang, 201);
    }

    // Menampilkan cabang berdasarkan No_Cabang
    public function show($No_Cabang)
    {
        $cabang = Cabang::findOrFail($No_Cabang);
        return response()->json($cabang);
    }

    // Mengupdate data cabang
    public function update(Request $request, $No_Cabang)
    {
        $request->validate([
            'Nama_Cabang' => 'string|max:255',
        ]);

        $cabang = Cabang::findOrFail($No_Cabang);
        $cabang->update($request->all());

        return response()->json($cabang);
    }

    // Menghapus cabang
    public function destroy($No_Cabang)
    {
        $cabang = Cabang::findOrFail($No_Cabang);
        $cabang->delete();

        return response()->json(null, 204);
    }
}
