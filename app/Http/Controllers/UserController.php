<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Fetch all users from the database
        $users = User::all();

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
        $request->validate([
            'Nama_Staff' => 'required|string|max:255',
            'NIP' => 'required|unique:users,NIP',
            'password' => 'required|string|min:8',
            'Role' => 'required|string',
        ]);

        User::create([
            'Nama_Staff' => $request->Nama_Staff,
            'NIP' => $request->NIP,
            'password' => Hash::make($request->password),
            'Role' => $request->Role,
        ]);

        // Set session flash message
        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($NIP)
    {
        // Fetch the user for editing by NIP
        $user = User::where('NIP', $NIP)->firstOrFail();

        // Return the edit form with user data
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $nip)
    {
        $request->validate([
            'Nama_Staff' => 'required|string|max:255',
            'NIP' => 'required',
            'Role' => 'required|string',
        ]);

        $user = User::where('NIP', $nip)->firstOrFail();
        $user->Nama_Staff = $request->Nama_Staff;
        $user->NIP = $request->NIP;
        $user->Role = $request->Role;

        // Update password jika tidak kosong
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // Set session flash message
        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy($NIP)
    {
        // Delete the user by NIP
        $user = User::where('NIP', $NIP)->firstOrFail();
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }

    public function show($NIP)
    {
        // Fetch the user by NIP for the show page
        $user = User::where('NIP', $NIP)->firstOrFail();

        return view('users.show', compact('user')); // Return the view with the user details
    }

    // public function dashboard()
    // {
    //     $userCount = User::count(); // Hitung jumlah pengguna
    //     return view('dashboard', compact('userCount'));
    // }
}
