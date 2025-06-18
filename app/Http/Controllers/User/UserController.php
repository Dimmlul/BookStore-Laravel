<?php

namespace App\Http\Controllers\User;

use App\Models\Buku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // Pastikan pengguna sudah login dan adalah user
        if (Auth::user()->role != 'user') {
            abort(403, 'Unauthorized action.');  // Akses ditolak jika bukan user
        }

        // Mengambil semua data buku dari database
        $buku = Buku::all();  // Menggunakan $buku untuk mengambil data buku
        // dd($buku);
        // Kirim data buku ke view 'user.home'
        return view('user.home', compact('buku'));
    }
}
