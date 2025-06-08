<?php

// app/Http/Controllers/Admin/PesananController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    // Menampilkan daftar pesanan
    public function index()
    {
        // Mengambil semua pesanan
        $pesanan = Pesanan::all();
        return view('admin.pesanan.index', compact('pesanan'));
    }

    // Menampilkan detail pesanan berdasarkan ID
    public function show($id)
    {
        // Mengambil pesanan beserta relasi 'isiPesanan' dan 'buku'
        $pesanan = Pesanan::with('isiPesanan.buku')->findOrFail($id);
        return view('admin.pesanan.show', compact('pesanan'));
    }

    // Mengubah status pesanan
    public function editStatus(Request $request, $id)
    {
        // Validasi input status
        $request->validate([
            'status' => 'required|in:pending,dibayar,dibatalkan',
        ]);

        // Menemukan pesanan berdasarkan ID
        $pesanan = Pesanan::findOrFail($id);

        // Update status pesanan
        $pesanan->update([
            'status' => $request->status,
            'dikonfirmasi_pada' => now(), // Menambahkan waktu saat status dikonfirmasi
        ]);

        // Redirect ke halaman daftar pesanan dengan pesan sukses
        return redirect()->route('admin.pesanan.index')->with('success', 'Status pesanan berhasil diperbarui!');
    }
}
