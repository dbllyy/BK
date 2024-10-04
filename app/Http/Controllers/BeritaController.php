<?php

namespace App\Http\Controllers;

use App\Models\BeritaAcara;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
{
    // Fetch services from the database
    $beritaacaras = BeritaAcara::all(); // Adjust this if you want specific conditions

    // Pass the $services variable to the view
    return view('beritaacara.index', compact('beritaacaras'));
}
    public function create()
    {
        return view('beritaacara.create');
    }

    public function store(Request $request)
    {
        // Validate and store data
        $request->validate([
            'name' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);

        // Save the beritaacara data to the database
        // Example: beritaacara::create($request->all());

        return redirect()->route('beritaacara.index')->with('success', 'beritaacara created successfully!');
    }

    // public function show($id)
    // {
    //     // Fetch the beritaacara by ID
    //     return view('beritaacara.show', compact('id')); // Adjust as needed
    // }

    public function edit($id)
    {
        // Fetch the beritaacara for editing
        return view('beritaacara.edit', compact('id')); // Adjust as needed
    }

    public function update(Request $request, $id)
    {
        // Validate and update the beritaacara data
        $request->validate([
            'name' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);

        // Update the beritaacara data in the database
        // Example: beritaacara::find($id)->update($request->all());

        return redirect()->route('beritaacara.index')->with('success', 'beritaacara updated successfully!');
    }

    public function destroy($id)
    {
        // Delete the beritaacara
        // Example: beritaacara::destroy($id);

        return redirect()->route('beritaacara.index')->with('success', 'beritaacara deleted successfully!');
    }
}
