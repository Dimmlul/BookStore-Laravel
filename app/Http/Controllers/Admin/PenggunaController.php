<?php

// app/Http/Controllers/Admin/PenggunaController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        $pengguna = User::all();  // Mengambil semua pengguna
        return view('admin.pengguna.index', compact('pengguna'));
    }

    public function show($id)
    {
        $pengguna = User::findOrFail($id);
        return view('admin.pengguna.show', compact('pengguna'));
    }
}
