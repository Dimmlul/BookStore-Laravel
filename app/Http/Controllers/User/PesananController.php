<?php

namespace App\Http\Controllers\User;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PesananController extends Controller
{
    // Menampilkan Daftar Pesanan User
    public function index()
    {
        $pesanan = auth()->user()->pesanan;
        return view('user.pesanan.index', compact('pesanan'));
    }

    // Menampilkan Detail Pesanan User
    public function show($id)
    {
        $pesanan = auth()->user()->pesanan()->findOrFail($id);
        return view('user.pesanan.show', compact('pesanan'));
    }
}
