<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserControllerOld extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user with hashed password
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hashing the password
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    } 

    public function index()
    {
        // Fetch data from the database if needed
        return view('user.index'); // Change to your actual view file
    }

}
