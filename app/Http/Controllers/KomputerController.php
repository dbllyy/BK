<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KomputerController extends Controller
{
    public function index()
    {
        // Fetch data from the database if needed
        return view('komputer.index'); // Change to your actual view file
    }

    public function create()
    {
        return view('komputer.create');
    }

    public function store(Request $request)
    {
        // Validate and store data
        $request->validate([
            'name' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);

        // Save the komputer data to the database
        // Example: Komputer::create($request->all());

        return redirect()->route('komputer.index')->with('success', 'Komputer created successfully!');
    }

    // public function show($id)
    // {
    //     // Fetch the komputer by ID
    //     return view('komputer.show', compact('id')); // Adjust as needed
    // }

    public function edit($id)
    {
        // Fetch the komputer for editing
        return view('komputer.edit', compact('id')); // Adjust as needed
    }

    public function update(Request $request, $id)
    {
        // Validate and update the komputer data
        $request->validate([
            'name' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);

        // Update the komputer data in the database
        // Example: Komputer::find($id)->update($request->all());

        return redirect()->route('komputer.index')->with('success', 'Komputer updated successfully!');
    }

    public function destroy($id)
    {
        // Delete the komputer
        // Example: Komputer::destroy($id);

        return redirect()->route('komputer.index')->with('success', 'Komputer deleted successfully!');
    }
}
