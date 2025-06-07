<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Pesanan;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::user()->role != 'admin') {
            abort(403, 'Unauthorized action.');
        }

        // Mengambil data jumlah buku, kategori, dan pesanan
        $jumlahBuku = Buku::count(); // Menghitung jumlah buku
        $jumlahKategori = Kategori::count(); // Menghitung jumlah kategori
        $jumlahPesanan = Pesanan::where('status', 'pending')->count(); // Menghitung jumlah pesanan yang masih pending

        // Mengirimkan data ke view dashboard
        return view('admin.dashboard', compact('jumlahBuku', 'jumlahKategori', 'jumlahPesanan'));
    }
}
