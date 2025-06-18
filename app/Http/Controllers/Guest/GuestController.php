<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buku;

class GuestController extends Controller
{
    // Menampilkan halaman Home untuk Guest
    public function home()
    {
        // Mengambil semua data buku dari tabel 'buku'
        $buku = Buku::all();  // Mengambil semua data buku

        // Kirim data buku ke view 'guest.home'
        return view('guest.home', compact('buku'));
    }

    // Menampilkan halaman Tentang untuk Guest
    public function tentang()
    {
        return view('static.tentang');
    }

    // Menampilkan halaman Kontak untuk Guest
    public function kontak()
    {
        return view('static.kontak');
    }
}
