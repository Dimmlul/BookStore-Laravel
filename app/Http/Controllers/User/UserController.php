<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // Pastikan pengguna sudah login dan adalah user
        if (Auth::user()->role != 'user') {
            abort(403, 'Unauthorized action.');
        }

        $user = Auth::user();
        return view('user.dashboard', compact('user'));
    }
}
