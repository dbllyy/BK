<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CabangController extends Controller
{
    public function index()
    {
        // Fetch data from the database if needed
        return view('cabang.index'); // Change to your actual view file
    }

    public function create()
    {
        return view('cabang.create');
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

        return redirect()->route('cabang.index')->with('success', 'cabang created successfully!');
    }

    // public function show($id)
    // {
    //     // Fetch the cabang by ID
    //     return view('cabang.show', compact('id')); // Adjust as needed
    // }

    public function edit($id)
    {
        // Fetch the cabang for editing
        return view('cabang.edit', compact('id')); // Adjust as needed
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

        return redirect()->route('cabang.index')->with('success', 'cabang updated successfully!');
    }

    public function destroy($id)
    {
        // Delete the cabang
        // Example: cabang::destroy($id);

        return redirect()->route('cabang.index')->with('success', 'cabang deleted successfully!');
    }
}
