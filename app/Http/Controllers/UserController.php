<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Fetch all users from the database
        $users = User::all(); // Adjust if needed to add specific conditions

        // Pass the $users variable to the view
        return view('users.index', compact('users'));
    }

    public function create()
    {
        // Return the form for creating a new user
        return view('users.create');
    }

    public function store(Request $request)
    {
        // Validate and store data
        $request->validate([
            'NIP' => 'required|string|max:255|unique:users,NIP',
            'Nama_Staff' => 'required|string|max:255',
            'Role' => 'required|string|max:255',
        ]);

        // Save the user data to the database
        User::create([
            'NIP' => $request->NIP,
            'Nama_Staff' => $request->Nama_Staff,
            'Role' => $request->Role,
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    public function edit($NIP)
    {
        // Fetch the user for editing by NIP
        $user = User::findOrFail($NIP);

        // Return the edit form with user data
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $NIP)
    {
        // Validate and update the user data
        $request->validate([
            'Nama_Staff' => 'required|string|max:255',
            'Role' => 'required|string|max:255',
        ]);

        // Update the user data in the database
        $user = User::findOrFail($NIP);
        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    public function destroy($NIP)
    {
        // Delete the user by NIP
        User::destroy($NIP);

        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
    public function show($NIP)
    {
        $user = User::findOrFail($NIP);
        return view('users.show', compact('users')); // Return the view with the computer details
    }
}
