<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('profil.update', compact('user'));
    }

    public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    // Validasi data
    $request->validate([
        'username' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $id,
        'password' => 'nullable|min:6',
    ]);

    // Update data user
    $user->username = $request->username;
    $user->email = $request->email;

    // Jika ada password baru, update
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()->route('dashboard')->with('success', 'User berhasil diperbarui');
}
}
