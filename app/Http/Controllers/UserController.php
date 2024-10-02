<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'NIP' => 'required|string|unique:users,NIP',
            'Nama_Staff' => 'required|string',
            'Role' => 'required|in:admin,staff',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'NIP' => $request->NIP,
            'Nama_Staff' => $request->Nama_Staff,
            'Role' => $request->Role,
            'password' => Hash::make($request->password),
        ]);

        return response()->json($user, 201);
    }

    public function show($NIP)
    {
        return User::findOrFail($NIP);
    }

    public function update(Request $request, $NIP)
    {
        $request->validate([
            'Nama_Staff' => 'string',
            'Role' => 'in:admin,staff',
            'password' => 'string|min:8|nullable',
        ]);

        $user = User::findOrFail($NIP);
        $user->fill($request->only('Nama_Staff', 'Role'));

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return response()->json($user);
    }

/*************  ✨ Codeium Command ⭐  *************/
    /**
     * Delete a user.
     *
     * @param  string  $NIP
     * @return \Illuminate\Http\Response
     */
/******  620200fd-6df6-4f09-8ed4-6c7ed1055b98  *******/    public function destroy($NIP)
    {
        $user = User::findOrFail($NIP);
        $user->delete();

        return response()->json(null, 204);
    }
}
