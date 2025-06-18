<?php
// app/Http/Controllers/Admin/KategoriController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // Menampilkan daftar kategori
    public function index()
    {
        // Mengambil semua kategori
        $kategori = Kategori::all();
        return view('admin.kategori.index', compact('kategori'));
    }

    // Menampilkan form untuk menambah kategori
    public function create()
    {
        return view('admin.kategori.create');  // Menampilkan form tambah kategori
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        // Validasi untuk memastikan kategori tidak ada duplikat
        $request->validate([
            'kategori_buku' => 'required|unique:kategoris,kategori_buku',
        ], [
            'kategori_buku.unique' => 'Kategori dengan nama ini sudah ada.',
        ]);

        // Menyimpan kategori baru
        Kategori::create($request->all());

        // Redirect ke daftar kategori setelah berhasil menambah kategori baru
        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit kategori
    public function edit($id)
    {
        // Mengambil data kategori berdasarkan ID
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.edit', compact('kategori'));  // Mengirim data kategori ke form edit
    }

    // Mengupdate kategori yang sudah ada
    public function update(Request $request, $id)
    {
        // Mengambil data kategori berdasarkan ID
        $kategori = Kategori::findOrFail($id);

        // Validasi untuk memastikan kategori tidak ada duplikat saat edit
        $request->validate([
            'kategori_buku' => 'required|unique:kategoris,kategori_buku,' . $kategori->id,
        ], [
            'kategori_buku.unique' => 'Kategori dengan nama ini sudah ada.',
        ]);

        // Mengupdate kategori
        $kategori->update($request->all());

        // Redirect ke daftar kategori setelah berhasil mengupdate kategori
        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    // Menghapus kategori
    public function destroy($id)
    {
        // Menghapus kategori berdasarkan ID
        Kategori::destroy($id);

        // Redirect ke daftar kategori setelah berhasil menghapus kategori
        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
