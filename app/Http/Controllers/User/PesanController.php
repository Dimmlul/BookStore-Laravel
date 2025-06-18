<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pesan;

class PesanController extends Controller
{
    // Menampilkan form kontak
    public function showForm()
    {
        return view('static.kontak');
    }

    // Menyimpan pesan kontak
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'subjek' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);

        // Menyimpan pesan
        Pesan::create([
            'user_id' => Auth::id(), // Menyimpan ID pengguna yang sedang login
            'subjek' => $request->subjek,
            'isi' => $request->isi,
            'status' => 'belum',
            'dikirim_pada' => now(),
        ]);

        // Kembali ke halaman kontak dengan pesan sukses
        return redirect()->route('guest.kontak')->with('success', 'Pesan Anda telah dikirim.');
    }
}
