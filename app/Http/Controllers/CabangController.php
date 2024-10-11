<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use Illuminate\Http\Request;

class CabangController extends Controller
{
    public function index()
{
    // Fetch services from the database
    $cabangs = Cabang::all(); // Adjust this if you want specific conditions

    // Pass the $services variable to the view
    return view('cabang.index', ['cabangs' => $cabangs]);

    // return view('cabang.index', compact('cabangs'));

}


    public function create()
    {
        return view('cabangs.create');
    }

    public function store(Request $request)
    {
        // Validate and store data
        $request->validate([
            'name' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);

        // Save the cabang data to the database
        // Example: cabang::create($request->all());

        return redirect()->route('cabangs.index')->with('success', 'cabang created successfully!');
    }

    public function show($id)
    {
        $cabang = Cabang::findOrFail($id);
        return view('cabangs.show', compact('cabang'));
    }

    public function edit($id)
    {
        // Fetch the cabang for editing
        return view('cabangs.edit', compact('id')); // Adjust as needed
    }

    public function update(Request $request, $id)
    {
        // Validate and update the cabang data
        $request->validate([
            'name' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);

        // Update the cabang data in the database
        // Example: cabang::find($id)->update($request->all());

        return redirect()->route('cabangs.index')->with('success', 'cabang updated successfully!');
    }

    public function destroy($id)
    {
        // Delete the cabang
        // Example: cabang::destroy($id);

        return redirect()->route('cabangs.index')->with('success', 'cabang deleted successfully!');
    }
}
