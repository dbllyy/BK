<?php

namespace App\Http\Controllers;

use App\Models\Komputer;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;


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


public function store(Request $request)
{
    // Validate and prepare data
    $validated = $request->validate([
        'cabang_id' => 'required|exists:cabangs,No_Cabang',
        'perangkat' => 'required|in:PC,Laptop,Printer',
        'merk' => 'required|string|max:255',
        'jumlah' => 'required|integer|min:1',
        'kondisi' => 'required|in:baru,baru rakitan,second',
        'keterangan' => 'nullable|string',
    ]);

    $validated['keterangan'] = $validated['keterangan'] ?? 'Tidak Ada';
// Create a DateTime object with the 'Asia/Jakarta' timezone
$tempdata = new DateTime('now', new DateTimeZone('Asia/Jakarta'));

// Set the 'diterima' field with the formatted date and time
$validated['diterima'] = $tempdata->format('Y-m-d H:i:s');

// Get the current date and time as a string for output
$currentDate = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
echo $currentDate->format('Y-m-d H:i:s');

    // Save data to the database
    Komputer::create($validated);

    // Redirect with a success message
    return redirect()->route('komputers.index')->with('success', 'Data perangkat berhasil disimpan.');
}


    // Menampilkan data komputer berdasarkan ID
    public function show($id)
    {
        $komputer = Komputer::findOrFail($id);
        return view('komputers.show', compact('komputer'));
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

    public function dashboard()
    {
        // Example: Retrieve all Komputers and Cabangs for the dashboard
        $komputers = Komputer::all();
        $cabangs = \App\Models\Cabang::all();

        // Pass the data to a dashboard view
        return view('dashboard', compact('komputers', 'cabangs'));
    }
}
