<?php
// app/Http/Controllers/Admin/BukuController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Menampilkan daftar buku.
     */
    public function index()
    {
        // Mengambil semua data buku dari database
        $buku = Buku::all();
        return view('admin.buku.index', compact('buku')); // Mengirim data buku ke view
    }

    /**
     * Menampilkan form untuk menambah buku.
     */
    public function create()
    {
        // Mengambil semua kategori untuk ditampilkan di form
        $kategori = Kategori::all();
        return view('admin.buku.create', compact('kategori')); // Menampilkan form tambah buku
    }

    /**
     * Menyimpan buku baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'harga' => 'required|numeric',
            'bahasa' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required|integer',
            'ISBN' => 'required',
            'kategori_id' => 'required',
            'gambar' => 'required|image|max:2048', // Validasi gambar
        ]);

        // Mengambil semua data dari form
        $data = $request->all();

        // Cek apakah ada gambar yang diupload, jika ada simpan ke storage
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('images/buku', 'public');
        }

        // Simpan data buku ke database
        Buku::create($data);

        // Redirect ke halaman daftar buku setelah berhasil menambah buku
        return redirect()->route('admin.buku.index');
    }

    /**
     * Menampilkan form untuk mengedit buku.
     */
    public function edit($id)
    {
        // Menampilkan buku yang akan diedit berdasarkan ID
        $buku = Buku::findOrFail($id);
        $kategori = Kategori::all(); // Mengambil semua kategori

        // Menampilkan form edit buku dengan data buku dan kategori
        return view('admin.buku.edit', compact('buku', 'kategori'));
    }

    /**
     * Mengupdate data buku di database.
     */
    public function update(Request $request, $id)
    {
        // Menemukan buku berdasarkan ID
        $buku = Buku::findOrFail($id);

        // Validasi input dari form
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'harga' => 'required|numeric',
            'bahasa' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required|integer',
            'ISBN' => 'required',
            'kategori_id' => 'required',
            'gambar' => 'required|image|max:2048', // Validasi gambar
        ]);

        // Mengambil data dari form untuk update
        $data = $request->all();

        // Cek apakah ada gambar baru yang diupload
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($buku->gambar) {
                Storage::disk('public')->delete($buku->gambar);
            }

            // Upload gambar baru dan simpan path-nya
            $data['gambar'] = $request->file('gambar')->store('images/buku', 'public');
        }

        // Update data buku di database
        $buku->update($data);

        // Redirect ke halaman daftar buku setelah berhasil update
        return redirect()->route('admin.buku.index');
    }

    /**
     * Menghapus buku dari database.
     */
    public function destroy($id)
    {
        // Menemukan buku berdasarkan ID
        $buku = Buku::findOrFail($id);

        // Hapus gambar terkait jika ada
        if ($buku->gambar) {
            Storage::disk('public')->delete($buku->gambar);
        }

        // Menghapus buku dari database
        $buku->delete();

        // Redirect ke halaman daftar buku setelah berhasil dihapus
        return redirect()->route('admin.buku.index');
    }
}
