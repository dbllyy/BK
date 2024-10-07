<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Display a listing of the users
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Show the form for creating a new user
    public function create()
    {
        return view('users.create');
    }

    // Store a newly created user in storage
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'NIP' => 'required|unique:users,NIP',
            'Nama_Staff' => 'required|string|max:255',
            'Role' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'NIP' => $validatedData['NIP'],
            'Nama_Staff' => $validatedData['Nama_Staff'],
            'Role' => $validatedData['Role'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    // Display the specified user
    public function show($NIP)
    {
        $user = User::findOrFail($NIP);
        return view('users.show', compact('user'));
    }

    // Show the form for editing the specified user
    public function edit($NIP)
    {
        $user = User::findOrFail($NIP);
        return view('users.edit', compact('user'));
    }

    // Update the specified user in storage
    public function update(Request $request, $NIP)
    {
        $user = User::findOrFail($NIP);

        $validatedData = $request->validate([
            'Nama_Staff' => 'required|string|max:255',
            'Role' => 'required|string|max:255',
            'password' => 'nullable|string|min:6',
        ]);

        $user->Nama_Staff = $validatedData['Nama_Staff'];
        $user->Role = $validatedData['Role'];

        if ($request->filled('password')) {
            $user->password = Hash::make($validatedData['password']);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // Remove the specified user from storage
    public function destroy($NIP)
    {
        $user = User::findOrFail($NIP);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
