<?php
// app/Http/Controllers/Admin/PesanController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    // Menampilkan daftar pesan
    public function index()
    {
        $pesan = Pesan::all();  // Mengambil semua pesan
        return view('admin.pesan.index', compact('pesan'));
    }

    // Menampilkan detail pesan berdasarkan ID
    public function show($id)
    {
        $pesan = Pesan::findOrFail($id);  // Menampilkan detail pesan
        return view('admin.pesan.show', compact('pesan'));
    }

    public function reply(Request $request, $id)
    {
        // Validasi data balasan pesan
        $request->validate([
            'admin_response' => 'required|string|min:10', // Memastikan balasan pesan ada dan cukup panjang
        ]);

        // Mencari pesan yang akan dibalas
        $pesan = Pesan::findOrFail($id);

        // Menyimpan balasan admin pada pesan
        $pesan->admin_response = $request->admin_response;
        $pesan->dibalas_pada = now(); // Menandai waktu dibalas
        $pesan->status = 'dibalas'; // Mengubah status menjadi "dibalas"
        $pesan->save();

        // Mengalihkan kembali ke halaman daftar pesan dengan pesan sukses
        return redirect()->route('admin.pesan.index')->with('success', 'Balasan pesan berhasil dikirim.');
    }
}
