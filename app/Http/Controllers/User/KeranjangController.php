<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KeranjangController extends Controller
{
    // Menampilkan halaman keranjang
    public function index()
    {
        $keranjang = Session::get('keranjang', []);
        return view('keranjang.index', compact('keranjang'));
    }

    // Menambahkan item ke dalam keranjang
    public function store(Request $request)
    {
        $item = [
            'id' => $request->id,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
        ];

        $keranjang = Session::get('keranjang', []);

        // Cek apakah item sudah ada
        if (array_key_exists($request->id, $keranjang)) {
            $keranjang[$request->id]['jumlah'] += $request->jumlah;
        } else {
            $keranjang[$request->id] = $item;
        }

        Session::put('keranjang', $keranjang);

        return redirect()->route('keranjang.index')->with('success', 'Item berhasil ditambahkan ke keranjang');
    }

    // Menghapus item dari keranjang
    public function destroy($id)
    {
        $keranjang = Session::get('keranjang', []);

        if (array_key_exists($id, $keranjang)) {
            unset($keranjang[$id]);
            Session::put('keranjang', $keranjang);
            return redirect()->route('keranjang.index')->with('success', 'Item berhasil dihapus dari keranjang');
        }

        return redirect()->route('keranjang.index')->with('error', 'Item tidak ditemukan di keranjang');
    }

    // Mengupdate jumlah item di keranjang
    public function update(Request $request, $id)
    {
        $keranjang = Session::get('keranjang', []);

        if (array_key_exists($id, $keranjang)) {
            $keranjang[$id]['jumlah'] = $request->jumlah;
            Session::put('keranjang', $keranjang);
            return redirect()->route('keranjang.index')->with('success', 'Jumlah item berhasil diperbarui');
        }

        return redirect()->route('keranjang.index')->with('error', 'Item tidak ditemukan di keranjang');
    }
}
