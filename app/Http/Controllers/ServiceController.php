<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        // Fetch data from the database if needed
        return view('services.index'); // Change to your actual view file
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        // Validate and store data
        $request->validate([
            'name' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);

        // Save the services data to the database
        // Example: services::create($request->all());

        return redirect()->route('services.index')->with('success', 'services created successfully!');
    }

    // public function show($id)
    // {
    //     // Fetch the services by ID
    //     return view('services.show', compact('id')); // Adjust as needed
    // }

    public function edit($id)
    {
        // Fetch the services for editing
        return view('services.edit', compact('id')); // Adjust as needed
    }

    public function update(Request $request, $id)
    {
        // Validate and update the services data
        $request->validate([
            'name' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);

        // Update the services data in the database
        // Example: services::find($id)->update($request->all());

        return redirect()->route('services.index')->with('success', 'services updated successfully!');
    }

    public function destroy($id)
    {
        // Delete the services
        // Example: services::destroy($id);

        return redirect()->route('services.index')->with('success', 'services deleted successfully!');
    }
}