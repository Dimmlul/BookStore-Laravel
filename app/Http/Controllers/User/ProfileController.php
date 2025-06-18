<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Show the user's profile
    public function profil()
    {
        // Get the authenticated user's data
        $user = Auth::user();

        // Return the view with the user data
        return view('user.profil.index', compact('user'));
    }

    public function update(Request $request)
    {
        // Validate the input data
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'alamat' => 'nullable|string|max:255',
            'no_telp' => 'nullable|string|max:15',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Debug to ensure $user is an instance of User
        // dd($user); // This will show if $user is a proper instance of the User model.

        // If this is the correct instance of User, proceed with the update
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->no_telp = $request->no_telp;

        // If password is provided, update it
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        // Save the changes
        $user->save();

        // Redirect with success message
        return redirect()->route('user.profil')->with('success', 'Profile updated successfully!');
    }
}
